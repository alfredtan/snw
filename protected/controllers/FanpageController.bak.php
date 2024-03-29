<?php
//alter table app_requests ADD CONSTRAINT `FK_request_user` FOREIGN KEY (`fromFbid`) REFERENCES `app_user` (`fbid`) ON DELETE CASCADE;
class FanpageController extends Controller
{
	public $layout = '//snw_layouts/main';
	
	private $facebook;
	
	public function beforeAction($action)
	{
		// forces yii to create session first
		Yii::app()->session['time']=time();
		$this->facebook = new FacebookWrapper();
		return true;
	}
	
	/**
	 * Declares class-based actions.
	 */
	
	public function actionIndex()
	{
		$model = new User;
		
		//$this->actionMe();
		$signedRequest = $this->facebook->getSignedRequest();
		
		// check if user has connected. we need his fbid to check for registration
		if( isset( $signedRequest['user_id'] ) && $signedRequest['user_id']> 0 )
		{
			// check if user has registered
			$data = $model->findByPk($signedRequest['user_id']);
			// true means registered
			if(! is_null($data))
			{
				$friends = UserFriend::model()->findAll('fbid=:fbid order by friendDate desc', array(':fbid'=>$signedRequest['user_id']));
				
				$this->render('index', array('friends'=>$friends));
				Yii::app()->end();
			}
		}
		
		// public user.
		$this->render('index', array('model'=>$model) );
	}

	public function actionRegister()
	{
		
		if( Yii::app()->request->isAjaxRequest )
		{
			try
			{
				$me ;//= $this->facebook->getMe();
			}
			catch( Exception $e)
			{
				echo CJSON::encode(array('status'=>'not_connected'));
				Yii::app()->end();
			}
			
			if(! $this->facebook->getFbid() > 0 )
			{
				echo CJSON::encode(array('status'=>'not_connected'));
				Yii::app()->end();
			}
			
			try
			{
				// for User
				$model = new User;
				$_POST['User']['fbid']=$this->facebook->getFbid();
				$model->attributes = $_POST['User'];
				
				//for ViewQuestionAnswer
				$modelQA = new RelUserQuestionAnswer;
				$_POST['ViewQuestionAnswer']['fbid'] = $this->facebook->getFbid();
				$_POST['ViewQuestionAnswer']['questionId'] = Yii::app()->session['questionId'];
				$modelQA->attributes = $_POST['ViewQuestionAnswer'];
				
				$userErrors = array();
				$qaErrors = array();
				$error = false;
				if( !$model->validate() )
				{
					$userErrors = $model->getErrors();
					$error = true;
				}
				
				if( !$modelQA->validate() )
				{
					$qaErrors = $modelQA->getErrors();
					$error = true;
				}
				else
				{
					$qaErrors['answer_correct'] = array(true);
					// check if answer is correct
					$answer = ViewQuestionAnswer::model()->find('questionId=:questionId AND answerId=:answerId', array('questionId'=>Yii::app()->session['questionId'], 'answerId'=>$_POST['ViewQuestionAnswer']['answerId']));
					if($answer['correct']==0)
					{
						$qaErrors['answer_correct'] = array(false);
						$error = true;
					}
				}
				
				// if validation error
				if (	$error )
				{
					$response = array(
						'status'=>'fail',
						'data'=> array_merge( $userErrors, $qaErrors )
					);
				}	
				// no validation error
				else
				{
					if( $model->save() && $modelQA->save() ) 
					{
						$response = array(
							'status'=>'success',
							'data'=>''
						);
						unset(Yii::app()->session['questionId']);
					}
					else
					{
						$response = array(
							'status'=>'fail',
							'data'=>array_merge( $model->getErrors(), $modelQA->getErrors() )
						);
					}
				}
				
				echo CJSON::encode( $response );
				Yii::app()->end();
			}
			catch( Exception $e )
			{
				$response = array(
						'status'=>'fail',
						'data'=>$model->getMessage()
					);
					echo CJSON::encode( $response );
					Yii::app()->end();
			}
			
		}
	}

	public function actionMe()
	{
		try
		{
			$this->facebook->getMe();
		}
		catch (Exception $e)
		{
			
		}
	}
	
	public function actionAccept()
	{
		/*if ( !empty ( Yii::app()->session['request_ids'] ) )
		{
			$request_ids = explode(',', Yii::app()->session['request_ids']);
			
			foreach ($request_ids as $request_id )
			{
				$this->facebook->deleteObjectId($request_id.'_'.$this->facebook->getFbid());
			}
			
		}*/
	}
	
	
	public function manageFriendRequest($request_ids)
	{
		foreach ($request_ids as $request_id )
		{
			$request = Request::model()->find('requestId=:requestId', array(':requestId'=>$request_id));
			/*
			echo 'request id is ' . $request_id . '<br>';
								echo 'sender is ' . $request['fromFbid'] . '<BR>';
								echo 'me is ' . $this->facebook->getFbid() . '<BR>';*/
			
			
			//check if current user is requestor's friend, if not add
			if ( ! $this->isFriend( $request['fromFbid'], $this->facebook->getFbid() ) )
			{
				// current user accepted requestor's invite, so it should be added 
				// as requestor's friend
				$this->addFriend($request['fromFbid'], $this->facebook->getFbid());
			}
			
			// delete this object
			$this->facebook->deleteObjectId($request_id.'_'.$this->facebook->getFbid());
		}
	}
	// this will be called after a user is connected
	// this function checks the session for stored request_ids and delete one by one
	public function actionProcessRequest()
	{
		if( Yii::app()->request->isAjaxRequest )
		{
			if ( !empty ( Yii::app()->session['request_ids'] ) )
			{
				//$this->manageFriendRequest(explode(',', Yii::app()->session['request_ids']));
				unset(Yii::app()->session['request_ids']);
			}
		}
	}
	
	// viewer is the fbid we are acting as
	public function isFriend($viewer, $friend)
	{
		$friend = UserFriend::model()->findAll('fbid=:viewer AND friendFbid=:friendFbid', array(':viewer'=>$viewer, ':friendFbid'=>$friend));
		return (count($friend)==0) ? false:true;
	}
	
	// viewer is the fbid we are acting as
	public function addFriend($viewer, $friend)
	{
		if( $friend > 0 )
		{
			$model = new UserFriend;
			$model->attributes = array('fbid'=>$viewer, 'friendFbid'=>$friend);
			$model->save();
		}
	}
	
	public function actionJoin()
	{
		// get request_ids from url
		$request_ids = Yii::app()->request->getQuery('request_ids');
		
		// empty, just go to fan page
		if( empty ($request_ids))
		{
			$this->jsRedirect('http://www.facebook.com/pages/WooHoos-Test-Fan-Page/139884799379948?sk=app_211113102317615');
		}
		else
		{
			Yii::app()->session['request_ids'] = Yii::app()->request->getQuery('request_ids');
			$this->manageFriendRequest(explode(',', Yii::app()->session['request_ids']));
			$this->jsRedirect('http://www.facebook.com/pages/WooHoos-Test-Fan-Page/139884799379948?sk=app_211113102317615');
			
			// if ( $this->facebook->isConnected())
			// {
				// // clear requests
				// // clear request session
			// }
			// else
			// {
				// $this->facebook->connect();
			// }
		}
		//Yii::app()->redirect('http://www.facebook.com/pages/WooHoos-Test-Fan-Page/139884799379948?sk=app_211113102317615');
		
		
	}
	
	public function actionRequest()
	{
		
		if( Yii::app()->request->isAjaxRequest )
		{
				$toIds = $_POST['to'];
				
				foreach ($toIds as $toId)
				{
					$model = new Request;
					$data = array();
					$data['requestId'] = $_POST['request'];
					$data['toFbid'] = $toId;
					$data['fromFbid'] = $this->facebook->getFbid();
					$model->attributes= $data;
					$model->save();
				}
		}
	}


	public function actionGetQuestion()
	{
		
		if ( !isset(Yii::app()->session['questionId']))
		{
			// get a random questionId
			$questionId = rand(1,10);
		}
		else
		{
			$questionId=Yii::app()->session['questionId'];
			$questionId=(++$questionId>10) ? 1 : $questionId;
		}
		Yii::app()->session['questionId'] = $questionId;
		$question = ViewQuestionAnswer::model()->findAll('questionId=:questionId', array('questionId'=>$questionId));
		
		$response = array(
			'question'=>$question[0]['question'],
			'answers'=>CHtml::activeDropDownList( ViewQuestionAnswer::model(),'answerId', CHtml::listData($question, 'answerId', 'answer'), array('empty'=>'- Select one -') )
			); 
		
		echo CJSON::encode( $response );
		Yii::app()->end();		
	}
	
	public function jsRedirect($url)
	{
		echo "<script type='text/javascript'>top.location.href = '" . $url . "';</script>";
    exit;
	}

}