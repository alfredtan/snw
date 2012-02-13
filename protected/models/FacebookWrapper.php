<?php

require('facebook/facebook.php');


class FacebookWrapper 
{
	private $facebook;


	public function FacebookWrapper()
  {
    	$this->facebook = new Facebook(array(
		  'appId'  => Yii::app()->params['facebookAppId'],
		  'secret' => Yii::app()->params['facebookAppSecret'],
		  'cookie' => true
		));
  }
	
	public function getSignedRequest()
	{
		return $this->facebook->getSignedRequest();
	}
	
	public function connect()
	{
		if (!$this->getFbid()) 
		{
			//die('die ' . $this->getLoginURL());
		    echo "<script type='text/javascript'>top.location.href = '" . $this->getLoginURL() . "';</script>";
		    exit;
		}
		else {
		    try 
		    {
	        $this->fbuser				=   $this->getMe();
					return true;
		
		    } 
		    catch (FacebookApiException $e) 
		    {
		        echo "<script type='text/javascript'>top.location.href = '" . $this->getLoginURL() . "';</script>";
		        exit;
		    }
		}
				
	}
	
	public function getLoginURL()
	{
		return $this->facebook->getLoginUrl(
	        array(
	        'redirect_uri'=> Yii::app()->createAbsoluteUrl('/facebook/authorize'),
	        'scope' => Yii::app()->params['facebookAppScope']
			)
		);
	}
	
	public function getAccessToken()
	{
		return $this->facebook->getAccessToken();
	}
	
	public function isConnected()
	{
		try 
	    {
	        $this->getMe();
			return true;
	    }
		catch (FacebookApiException $e) 
	    {
	        return false;
	    }
	}
	
	
	
	// ----- user objects starts here -------
	public function deleteObjectId($id)
	{
		try 
		{
			return $this->facebook->api("/$id",'DELETE');
    }          
		catch (FacebookApiException $e) 
		{
			//echo "error: ". $e->getMessage();
    }
	}
	 
	public function getFbid()
	{
		return $this->facebook->getUser();
	}
	
	// get the user data AND profile pic
	public function getMe()
	{
		$res = $this->facebook->api('/me');
		return $res;
	}
	
	function postToMyWall($params)
	{
		return $this->facebook->api('/553887054/feed','POST',$params);
	}
	
	public function attributeNames()
    {
            
    }
}
