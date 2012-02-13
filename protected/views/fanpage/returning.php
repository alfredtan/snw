<?php
		$exclude_ids = array();
		$latest_friends = 0;
		$eligible=0;
		foreach ($exclude as $arr)
		{
			$exclude_ids[] =$arr['friendFbid'];
		}
		foreach( $friends as $k=>$friend)
		{
			if($friend['eligible']==1) $eligible++;
			$latest_friends++;
		}
	?>
	<div class="wrapper">
		
            <div class="bkg_instructions">
            	<div class="bkg_instructions_1"></div>
                <div class="bkg_instructions_2"></div>
                <div id="flashContent" style="width:100%; height:100%">
				<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="520" height="600" id="camera" align="middle">
					<param name="movie" value="/swf/camera.swf" />
					<param name="quality" value="high" />
					<param name="bgcolor" value="#ffffff" />
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="wmode" value="transparent" />
					<param name="scale" value="showall" />
					<param name="menu" value="true" />
					<param name="devicefont" value="false" />
					<param name="salign" value="" />
					<param name="allowScriptAccess" value="sameDomain" />
					<!--[if !IE]>-->
					<object type="application/x-shockwave-flash" data="/swf/camera.swf" width="520" height="600">
						<param name="movie" value="/swf/camera.swf" />
						<param name="quality" value="high" />
						<param name="bgcolor" value="#ffffff" />
						<param name="play" value="true" />
						<param name="loop" value="true" />
						<param name="wmode" value="transparent" />
						<param name="scale" value="showall" />
						<param name="menu" value="true" />
						<param name="devicefont" value="false" />
						<param name="salign" value="" />
						<param name="allowScriptAccess" value="sameDomain" />
					<!--<![endif]-->
						<a href="http://www.adobe.com/go/getflash">
							<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
						</a>
					<!--[if !IE]>-->
					</object>
					<!--<![endif]-->
				</object>
			</div>
            </div>
            
            <div class="fb_friends">
            	<ul>
            		<?php
						$exclude_ids = array();
						$counter=0;
						foreach( $friends as $k=>$friend)
						{
							echo '<li><div class="profile_frame"><img src="https://graph.facebook.com/'.$friend['friendFbid'].'/picture?type=square" width="63" border="0" /></div></li>';
							$counter++;
							// echo '<img src="https://graph.facebook.com/'.$friend['friendFbid'].'/picture">';
							$exclude_ids[] =$friend['friendFbid'];
						}
						while($counter<4)
						{
							echo '<li><div class="profile_frame"><img src="https://fbcdn-profile-a.akamaihd.net/static-ak/rsrc.php/v1/yo/r/UlIqmHJn-SK.gif" width="63" border="0" /></div></li>';
							$counter++;
						}
					?>
                </ul>
            </div>
            
            <div class="invite_friends">
            	<a class="invite_friends_link" href="javascript:;"></a>
            </div>
            
            <div class="fb_share_game">
            	<a href="javascript:;" class="fb_share_link"></a>
            </div>
            
            
            
            
        </div>
        
        <div class="t_c">
            	©2012 AsiaRooms.com - All Rights Reserved. <a href="#">Terms and Conditions</a>
        </div>
        
        <!-- winModal -->
        <div id="winModal" class="reveal-modal medium" style="box-shadow:none; background: none">
        	<table width="451" border="0" cellspacing="0" cellpadding="0" background="/images/bg-win.png">
		      <tr>
		        <td height="448" align="left" valign="top"><table width="451" border="0" cellspacing="0" cellpadding="0">
		          <tr>
		            <td height="150">&nbsp;</td>
		          </tr>
		          <tr>
		            <td><table width="451" border="0" cellspacing="0" cellpadding="0">
		              <tr>
		                <td width="123">&nbsp;</td>
		                <td width="56" height="60"><img id="result1" src="/images/spacer.gif" width="56"></td>
		                <td width="22">&nbsp;</td>
		                <td width="56"><img id="result2" src="/images/spacer.gif" width="56"></td>
		                <td width="24">&nbsp;</td>
		                <td width="56"><img id="result3" src="/images/spacer.gif" width="56"></td>
		                <td width="24">&nbsp;</td>
		                <td width="56"><img id="result4" src="/images/spacer.gif" width="56"></td>
		                <td >&nbsp;</td>
		              </tr>
		            </table></td>
		          </tr>
		          <tr>
		            <td height="120">&nbsp;</td>
		          </tr>
		          <tr>
		            <td align="center" valign="top"><table width="451" border="0" cellspacing="0" cellpadding="0">
		              <tr>
		                <td width="175">&nbsp;</td>
		                <td width="117" align="left" valign="top"><a href="javascript:;" id="share-win-msg"><img src="/images/btn-share.png" width="117" height="63" id="Image1" onmouseover="MM_swapImage('Image1','','/images/btn-share-roll.png',1)" onmouseout="MM_swapImgRestore()" /></a></td>
		                <td>&nbsp;</td>
		              </tr>
		            </table></td>
		          </tr>
		        </table></td>
		      </tr>
		    </table>
		    <a class="close-reveal-modal" style="top:108px">&#215;</a>
        </div>
        <!-- !winModal -->
        
        <!-- losemodal invite -->
        <div id="loseModalInvite" class="reveal-modal medium" style="box-shadow: none; background: none">
        	<table width="417" border="0" cellspacing="0" cellpadding="0" style="background:url(/images/bg-lose-after-win-invite-fren.png) top center no-repeat">
		      <tr>
		        <td height="448" align="left" valign="top"><table width="417" border="0" cellspacing="0" cellpadding="0">
		          <tr>
		            <td height="350">&nbsp;</td>
		          </tr>
		          <tr>
		            <td align="center" valign="top">
							<a href="javascript:;" onclick="invite_friends();"><img src="/images/btn-invite-fren.png" width="117" height="63" id="Image1" onmouseover="MM_swapImage('Image1','','/images/btn-invite-fren-roll.png',1)" onmouseout="MM_swapImgRestore()" /></a>
		           </td>
		          </tr>
		        </table></td>
		      </tr>
		    </table>
		    <a class="close-reveal-modal" style="top:138px; right:40px">&#215;</a>
        </div>
        <!-- /losemodal invite-->
        
        <!-- losemodal no friends invite -->
        <div id="loseModalNoFriendInvite" class="reveal-modal medium" style="box-shadow: none; background: none">
        	<table width="417" border="0" cellspacing="0" cellpadding="0" style="background:url(/images/bg-lose-no-friends-invite.png) top center no-repeat">
		      <tr>
		        <td height="448" align="left" valign="top"><table width="417" border="0" cellspacing="0" cellpadding="0">
		          <tr>
		            <td height="350">&nbsp;</td>
		          </tr>
		          <tr>
		            <td align="center" valign="top">
							<a href="javascript:;" onclick="invite_friends();"><img src="/images/btn-invite-fren.png" width="117" height="63" id="Image1" onmouseover="MM_swapImage('Image1','','/images/btn-invite-fren-roll.png',1)" onmouseout="MM_swapImgRestore()" /></a>
		           </td>
		          </tr>
		        </table></td>
		      </tr>
		    </table>
		    <a class="close-reveal-modal" style="top:138px; right:40px">&#215;</a>
        </div>
        <!-- /losemodal no friends invite-->
        
        <!-- losemodal can't invite  -->
        <div id="loseModalNoInvite" class="reveal-modal medium" style="box-shadow: none; background: none">
        	<table width="417" border="0" cellspacing="0" cellpadding="0" style="background:url(/images/bg-invite-full.png) top center no-repeat">
		      <tr>
		        <td height="448" align="left" valign="top"><table width="417" border="0" cellspacing="0" cellpadding="0">
		          <tr>
		            <td height="350">&nbsp;</td>
		          </tr>
		        </table></td>
		      </tr>
		    </table>
		    <a class="close-reveal-modal" style="top:138px; right:40px">&#215;</a>
        </div>
        <!-- /losemodal no friends invite-->
        
        <!-- losemodal -->
        <div id="loseModal" class="reveal-modal medium" style="box-shadow:none; background: none">
        	<table width="451" border="0" cellspacing="0" cellpadding="0" background="/images/bg-lose-eligible.png">
			      <tr>
			        <td height="448" align="left" valign="top"><table width="451" border="0" cellspacing="0" cellpadding="0">
			          <tr>
			            <td height="235">&nbsp;</td>
			          </tr>
			          
			          <tr>
			            <td height="90" align="left" valign="top"><table width="451" border="0" cellspacing="0" cellpadding="0">
			              <tr>
			                <td width="70">&nbsp;</td>
			                <td style="font-family:arial; font-size:12px; " id="tip-msg"></td>
			                <td width="35">&nbsp;</td>
			              </tr>
			            </table></td>
			          </tr>
			          <tr>
			            <td align="center" valign="top">
			            	<a href="javascript:;" id="share-tip-msg"><img src="/images/btn-share-tips.png" width="117" height="63" id="Image2" onmouseover="MM_swapImage('Image2','','/images/btn-share-tips-roll.png',1)" onmouseout="MM_swapImgRestore()" /></a>
			              </td>
			          </tr>
			        </table></td>
			      </tr>
			    </table>
			    <a class="close-reveal-modal" style="top:108px">&#215;</a>
        </div>
		<!-- !losemodal 
you have registered

<button id="fb-share">Invite</button>
<button id="win">Win</button>
<button id="lose">Lose</button>
		
<div>
	Your latest friends are <br>
	<?php
		$exclude_ids = array();
		$latest_friends = 0;
		foreach ($exclude as $arr)
		{
			$exclude_ids[] =$arr['friendFbid'];
		}
		foreach( $friends as $k=>$friend)
		{
			echo '<img src="https://graph.facebook.com/'.$friend['friendFbid'].'/picture">';
			$latest_friends++;
		}
	?>
	
</div>
	<a href="index.php/game/play">play</a>
-->
<script>
	var eligible_friends = <?php echo $eligible; ?>;
	var num_friends = <?php echo count($exclude); ?>;
	
	
	$(document).ready( function(){
		$(".invite_friends_link").click(function(){
			
			invite_friends();
	        
	    });
	    
	   
        
        $("#share-win-msg").click(function(){
        	 var obj = {
		          method: 'feed',
		          link: '<?php echo Yii::app()->params['fanPageUrl']; ?>',
		          picture: '<?php echo Yii::app()->params['feedIcon']; ?>',
		          name: "I'm in the Running to Snap Free Rooms from AsiaRooms.com",
		          caption: "And you could be too. Just snap some photos on their virtual instant camera to win 2-night room stays with breakfasts, transfers and/or spa packages. There's a prize every week, for 12 weeks!",
		        };
		        
		    $('#winModal').trigger('reveal:close');
		    FB.ui(obj,function(){});
        });
        
        $("#share-tip-msg").click(function(){
        	 var obj = {
		          method: 'feed',
		          link: '<?php echo Yii::app()->params['fanPageUrl']; ?>',
		          picture: '<?php echo Yii::app()->params['feedIcon']; ?>',
		          name: "Snap Your Free Rooms from AsiaRooms.com",
		          caption: "Here's a travel tip when you DO win: " . $("#tip-msg").html(),
		        };
		        
		    $('#loseModal').trigger('reveal:close');
		    FB.ui(obj,function(){});
        });
        
        $("#win").click(function(){
        	win()
        })
        $("#lose").click(function(){
        	lose()
        })
    
	});
	
	function invite_friends()
	{
		var max_recipient_count = 4 - eligible_friends;
				
				if( max_recipient_count == 0 )
				{
					$('#loseModalNoInvite').reveal({
					     animation: 'fade',                   //fade, fadeAndPop, none
					     animationspeed: 300,                       //how fast animtions are
					     closeonbackgroundclick: false,              //if you click background will modal close?
					});
					return;
				}
				
				FB.ui({method: 'apprequests',
	          message: "I'm trying to snap free room stays from AsiaRooms.com. Join me & try your luck too. Just snap some photos on their virtual instant camera & snap more when you win 2-night room stays with breakfasts, transfers and/or spa packages.",
	          max_recipients:max_recipient_count,
	          exclude_ids:[<?php echo implode(',', $exclude_ids); ?>],
	        }, requestCallback);
	}
	function win()
	{
		$('#winModal').reveal({
		     animation: 'fade',                   //fade, fadeAndPop, none
		     animationspeed: 300,                       //how fast animtions are
		     closeonbackgroundclick: false,              //if you click background will modal close?
		});
		
		eligible_friends=0;
		
		$.get(
			'/index.php/game/result',
			function(d)
			{
				d = $.parseJSON(d);
				for(key in d)
				{
					$("#"+key).attr('src','https://graph.facebook.com/' + d[key] + '/picture?type=square');
				}
			}
		)
	}
	
	function lose_invite()
	{
		$('#loseModalInvite').reveal({
		     animation: 'fade',                   //fade, fadeAndPop, none
		     animationspeed: 300,                       //how fast animtions are
		     closeonbackgroundclick: false,              //if you click background will modal close?
		});
		
	}
	
	function lose_no_friend_invite()
	{
		$('#loseModalNoFriendInvite').reveal({
		     animation: 'fade',                   //fade, fadeAndPop, none
		     animationspeed: 300,                       //how fast animtions are
		     closeonbackgroundclick: false,              //if you click background will modal close?
		});
		
	}
	
	
	function lose()
	{
		// has no friends at all. ask to invite
		if( num_friends==0 )
		{
			lose_no_friend_invite();
		}
		// has friends, but not enough
		else if (num_friends%4>0 )
		{
			lose_no_friend_invite();
		}
		// has enough friends, but none eligible
		else if (num_friends%4==0 && eligible_friends==0 )
		{
			lose_invite();
		}
		// have 4 friends, and all 4 can be used
		// show message with tip
		else
		{
			$('#loseModal').reveal({
			     animation: 'fade',                   //fade, fadeAndPop, none
			     animationspeed: 300,                       //how fast animtions are
			     closeonbackgroundclick: false,              //if you click background will modal close?
			});
			
			$("#tip-msg").html('Loading...');
			$.get(
				'/index.php/game/tip',
				function(d)
				{
					d=$.parseJSON(d);
					$("#tip-msg").html(d.tip);
					
				}
			);
		}
	}
	
	
	function requestCallback(data)
	{
		
		if(!data)
		{
			//console.log('no data');
			return;
		}
		else
		{
			$.post(
					'/index.php/fanpage/request',
					data,
					function(){ location.href=location.href;}
			)
		}
		
	}
</script>
