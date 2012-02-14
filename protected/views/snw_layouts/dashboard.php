<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<title><?php echo CHtml::encode(Yii::app()->name); ?></title>
		<style>
		</style>
	</head>
	<body>
		
		<?php echo $content; ?>
			
		<div id="fb-root"></div>
<script>
	

	

	
	/********************* FACEBOOK INIT ************************/
	
	// standard facebook init stuff
  window.fbAsyncInit = function() {
    FB.init(
    	{
    		appId: '<?php echo Yii::app()->params['facebookAppId']; ?>', 
    		status: true, 
    		cookie: true,
    		oauth:  true,
				xfbml: true
			}
		);
		getLoginStatus();
	
		 
		// add function here to trigger after FB.init completes
  };
	(function(d){
		var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
		js = d.createElement('script'); js.id = id; js.async = true;
		js.src = "//connect.facebook.net/en_US/all.js";
		d.getElementsByTagName('head')[0].appendChild(js);
	}(document));
	
	 $(".fb_share_link").click(function(){
        	 var obj = {
		          method: 'feed',
		          link: '<?php echo Yii::app()->params['fanPageUrl']; ?>',
		          picture: '<?php echo Yii::app()->params['feedIcon']; ?>',
		          name: 'Snap Your Free Rooms from AsiaRooms.com',
		          caption: "Just snap some photos on the virtual instant camera, and snap more when you win 2-night room stays with breakfasts, transfers and/or spa packages. There's a prize every week, for 12 weeks!",
		        };
		    FB.ui(obj,function(){});
        });
</script>

	</body>
</html>