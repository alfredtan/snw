<?php

class FacebookController extends Controller
{
	private $facebook;
	
	public function beforeAction($action)
	{
		$this->facebook = new FacebookWrapper();
		return true;		
	}
	
	public function actionConnect()
	{
		$this->facebook->connect();
	}
	
	public function actionAuthorize()
	{
		if ($this->facebook->isConnected() )
		{
			if ( !empty ( Yii::app()->session['request_ids'] ) )
			{
				$this->redirect('/index.php/fanpage/accept');
			}
			else {
				$this->redirect('/?ok');
			}
		}
		else
		{
			$this->redirect('/');
		}
		Yii::app()->end();
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}