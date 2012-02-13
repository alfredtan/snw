<?php

class GameController extends Controller
{
	private $photos;
	private $facebook;
	
	public function beforeAction($action)
	{
		header('P3P: CP="HONK"');
		// force yii to create session first
		Yii::app()->session['time']=time();
		$this->facebook = new FacebookWrapper();
		return true;
	}
	
	public function actionComplete()
	{
		$data= array();
		$data['fbid'] = $this->facebook->getFbid();
		$data['picture1'] = Yii::app()->session['game']['photos'][0];
		$data['picture2'] = Yii::app()->session['game']['photos'][1];
		$data['picture3'] = Yii::app()->session['game']['photos'][2];
		$data['picture4'] = Yii::app()->session['game']['photos'][3];
		
		$model = new SnapAttempts();
		//echo Yii::app()->session['game']['per'] . ' x';
		
		
		
		if(Yii::app()->session['game']['per'] >= 75)
		{
			//win
			$records = UserFriend::model()->updateAll(array('eligible'=>0), 'friendFbid in ('. implode(',', Yii::app()->session['game']['photos']). ')');
			$data['status'] = 'win';
			$model->attributes = $data;
			if( !$model->save() )
			{
				
			}
			$response = '<response><status>ok</status><data>win</data></response>';
		}
		else 
		{
			// lose	
			$data['status'] = 'lose';
			$model->attributes = $data;
			$model->save();
			$response = '<response><status>ok</status><data>lose</data></response>';
		}
		
		echo $response;
	}

	public function actionResult()
	{
		$response = array(
			'result1'=>Yii::app()->session['game']['photos'][0],
			'result2'=>Yii::app()->session['game']['photos'][1],
			'result3'=>Yii::app()->session['game']['photos'][2],
			'result4'=>Yii::app()->session['game']['photos'][3]
		);
		
		echo CJSON::encode($response);
		Yii::app()->end();
	} 
	
	public function actionSession()
	{
		echo '<pre>';
		print_r($_SESSION);
		echo '</pre>';
	}
	public function actionPlay()
	{
		$this->photos=array();
		Yii::app()->session['game'] = array();
		
		$per = 25 * rand(0,1);
		$per += 25 * rand(0,1);
		$per += 25 * rand(0,1);
		$per += 25 * rand(0,1);

		$friend = UserFriend::model()->findAll('fbid=:fbid and eligible=1 order by friendDate desc LIMIT 0,4', array(':fbid'=>$this->facebook->getFbid()));

		// check number of friends available to match. if less than 4, not eligible to win
		// user can still play but cannot win;
		if (count($friend) ==0 )
		{
			$per=0;
		}
		else if (count($friend)>0 && count($friend) < 4 )
		{
			$per=(count($friend)-1)*25;
		}		
		
		$response=array();
		switch($per)
		{
			case 0:
				$this->photos[]='lose';
				$this->photos[]='lose';
				$this->photos[]='lose';
				$this->photos[]='lose';
				break;

			case 25:
				$this->photos[]='lose';
				$this->photos[]='lose';
				$this->photos[]='lose';
				$this->photos[]='friend';
				break;
				
			case 50:
				$this->photos[]='lose';
				$this->photos[]='lose';
				$this->photos[]='friend';
				$this->photos[]='friend';
				break;
				
			case 75:
			case 100:
				$this->photos[]='friend';
				$this->photos[]='friend';
				$this->photos[]='friend';
				$this->photos[]='friend';
				// $this->photos[]='http://graph.facebook.com/'.$friend[3]['friendFbid'].'/picture?type=large';
				
				break;
		}

		$xml = '<photos per="'.$per.'">';
		$friendCounter = 0;
		$arrPhotos = array();
		foreach ($this->photos as $photo)
		{
			if ($photo == 'friend')
			{
				$xml .= '<photo><![CDATA[https://graph.facebook.com/'.$friend[$friendCounter]['friendFbid'].'/picture?type=large]]></photo>';
				$arrPhotos[] = $friend[$friendCounter]['friendFbid'];
				$friendCounter++;
			}
			else
			{
				$arrPhotos[] = $losingPhoto = $this->getLosingPhoto();
				$xml .= '<photo><![CDATA[' . $losingPhoto . ']]></photo>';
			}
		}


		Yii::app()->session['game']= array('per'=>$per, 'photos'=>$arrPhotos);
		$xml .= '</photos>';

		echo $xml;
	}
	
	public function getLosingPhoto()
	{
		$lose = array(
			'/images/polaroid/a.png',
			'/images/polaroid/b.png',
			'/images/polaroid/c.png',
			'/images/polaroid/d.png',
			'/images/polaroid/e.png',
			'/images/polaroid/f.png',
			'/images/polaroid/g.png',
			'/images/polaroid/p1.png',
			'/images/polaroid/p2.png',
			'/images/polaroid/p3.png',
			'/images/polaroid/p4.png',
			'/images/polaroid/p5.png',
			'/images/polaroid/p6.png',
			'/images/polaroid/p7.png',
			'/images/polaroid/p8.png',
			'/images/polaroid/p9.png',
			'/images/polaroid/p10.png',
			'/images/polaroid/p11.png',
			'/images/polaroid/p12.png',
			'/images/polaroid/p13.png',
			'/images/polaroid/p14.png',
			'/images/polaroid/p15.png',
			'/images/polaroid/p16.png',
			'/images/polaroid/p17.png',
			'/images/polaroid/p18.png',
			'/images/polaroid/p19.png',
			'/images/polaroid/p20.png'
		);
		
		return $lose[rand(0,count($lose)-1)];
		
	}
	
	public function actionTip()
	{
		$tips = array();
		
		$tips[] = "Avoid flashy, luxurious luggage. It's a good tip to thieves that the contents will also be flashy or luxurious.";
		$tips[] = "When buying a luggage for your trip, keep in mind these criteria: durable, expandable & wheelable.";
		$tips[] = "Stock up on travel-size toiletries, even from the hotels you stayed at. This makes packing easier & you can also pack some in your carry-on without going over the liquid limit on airplanes.";
		$tips[] = "If you're flying, avoid caffeine & alcohol beverages as it dehydrates you & makes jetlag worse when you arrive at your destination.";
		$tips[] = "Do try to tip the housekeeping staff, especially at the beginning, to ensure a pleasant, comfortable stay throughout.";
		$tips[] = "Let your bank know you're going to be out of town. Using your ATM or credit card overseas might trigger red flags in their system & this might lead to your card's deactivation.";
		$tips[] = "If you love your gagdets, the travel adapter is your best friend. Some countries don't use the same sockets so the adapter makes sure you'll always be able to plug in your gadgets.";
		$tips[] = "When packing, roll up all of your clothes individually. It saves so much space & they will unroll crease-free.";
		$tips[] = "The weather's unpredictable, so always pack your sunblock, even if you're not hitting the beach.";
		$tips[] = "If you're flying, check in online to avoid rushing or waiting in line. Nowadays, most airlines offer web check-in.";
		$tips[] = "Hitting the amusement parks? Most people would automatically turn right at the entrances so to avoid the horde of people, turn left & start exploring from there instead.";
		$tips[] = "Not sure about the weather of your destination? Dress in layers. This way, you can add/remove a layer according to the weather.";
		$tips[] = "Looking forward to see shows/musicals in your destination? Buy tickets online ahead of time to avoid bad seats or sold-out shows.";
		$tips[] = "Going on a road trip? Make sure to service your car beforehand to avoid mishaps along the way.";
		$tips[] = "You'll never know what will happen on your trips so take up travel insurance before your trip.";
		$tips[] = "If you have prescription medication, pack 2 sets – one in your checked-in luggage & one with you at all times.";
		$tips[] = "Pack your clothes around a colour scheme, so you can mix & match your outfits for any weather or activity.";
		$tips[] = "Insect repellent is as essential as sunblock! Insects differ from countries, so be prepared.";
		$tips[] = "Even if you're not hitting the beaches, a pair of flip flops is handy when you're just going to a spa in your hotel or any nearby places.";
		$tips[] = "Go for a pair of dark-coloured, comfortable shoes or sneakers that is comfy for daytime sightseeing as well as dressier evenings.";
		$tips[] = "When you check in to the hotel, ask for an upgrade. You never know until you try, especially in low seasons.";
		$tips[] = "Check for free WiFi at hotels to stay connected to loved ones at home or to do some research about your next day's itinerary.";
		$tips[] = "Travelling doesn't have to be expensive. Many museums, university cultural events & art institutes are free or have free days.";
		$tips[] = "Book now, pay later. With AsiaRooms.com, pay only when you arrive at the hotel (unless of course, it's an early bird deal). Your credit card details will be used to secure your booking.";
		$tips[] = "Getting enough sleep is important on your trip for you to enjoy it. Bring along a travel pillow, preferably an inflatable one so you can fold them in your carry-on.";
		$tips[] = "Read up on reviews of the hotel before booking, but don't take one bad review too seriously. You might be pleasantly surprised as different individuals enjoy different things.";
		$tips[] = "Use the hotel safe to keep your valuables – don't leave them around your room when you're out.";
		$tips[] = "Learn a few simple phrases, like “Good morning” or “Where's the washroom?” if you're going to a foreign country – this helps you get around easier.";
		$tips[] = "Going to the likes of Thailand or Indonesia? Brush up on your bargaining skills – you might be surprised how much you'll save!";
		$tips[] = "It might be difficult to find clean water in some of the places you visit. Bring along a foldable water bottle so you can refill it at your hotel & bring it with you when you're out.";
		$tips[] = "Only take taxis that use the meter to avoid being overcharged.";
		$tips[] = "Don't be afraid to get lost in the city because you never know what you might find.";
		$tips[] = "Travelling's more fun on a full stomach, so do try to catch the free breakfasts at your hotel.";
		$tips[] = "Always double-check your receipts, including hotels, to make sure all costs are accounted for & you've not been slipped any additional charges.";
		$tips[] = "Want to know where the great street food is? Ask your taxi driver or guide where the locals like to eat.";
		$tips[] = "Prep for security & don't hold the line! Remove your phones, wallet, keys & the rest, then put it into your carry-on as you're in line or approaching the security scanner.";
		$tips[] = "Carry all important documents, like your booking printouts & receipts, in a clear plastic folder for easy access. This helps you review your trip once you're back home too.";
		$tips[] = "Save money, avoid long lines, crowds & traffic by traveling during the off-season. Every area has a different slow season, so you can still travel year-round.";
		$tips[] = "Change some money into the local currency before you depart. This gives you one less thing to worry about & will stop you from pulling a large amount of money out at the airport.";
		$tips[] = "Don't deal with packing, rather, just stay packed. Instead of having to deal with the stress of last minute or constant packing, try to keep a travel case that is always ready.";
		$tips[] = "Try to look as if you know where you are going. This may not be easy it's your first time in that country, but look confident as if you know. This keeps away unwanted attention.";
		$tips[] = "Do not carry your passport around, leave it in the safe in your hotel. A photocopy will suffice if local law states that you need to.";
		$tips[] = "An e-book reader is a great travel investment – you'll have a library of books with you without having to lug your heavy books around.";
		$tips[] = "When packing, lay out everything you think you need on your bed. Put half of it back. There's nothing worse than having to lug around a bag full of things you're not going to wear/use.";
		$tips[] = "Invest in a waterproof bag or pouch if you're heading to the beach, island or even swimming pool. This keeps all your important stuff, including cash, dry & with you at all times.";
		$tips[] = "Bring old clothes & dispose of them each day leaving more room for mementos to bring home if you choose. It also cuts down on items that need frequent washing while away.";
		$tips[] = "Want to quickly dry a piece of clothing while on holiday? Roll a towel over wet fabric & squeeze tightly.";
		$tips[] = "Don't overplan. Keep your travel itinerary fluid to soak up the atmosphere in each place. Leave room for the unexpected & when plans don't work out, treat it as an opportunity!";
		$tips[] = "Smile a lot & take time to talk to the locals. You might discover hidden gems or interesting stories to take home.";
		$tips[] = "Get up early. In hot climates, this will help you avoid the heat of the day; in any climate, it will help you avoid the crowds & get more out of your day at a more leisurely pace.";
		
		if(isset($_GET['num']) && $_GET['num']>0)
		{
			$response = array('tip'=> $tips[$_GET['num']-1]);
		}
		else
		{
			$response = array('tip'=> $tips[rand(0, count($tips)-1)]);
		}
		
		echo CJSON::encode( $response );
		Yii::app()->end();		
		
		
	}
	
}