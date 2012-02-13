<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<title><?php echo CHtml::encode(Yii::app()->name); ?></title>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/facebook.wrapper.js"></script>
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/reveal.css" type="text/css" rel="stylesheet">
		
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css_snw/main.css" type="text/css" rel="stylesheet">
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css_snw/instructions.css" rel="stylesheet" type="text/css">
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css_snw/register.css" rel="stylesheet" type="text/css">
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css_snw/form.css" rel="stylesheet" type="text/css">
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom-form-elements.js" type="text/javascript"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.reveal.js"></script>
		
		<style>
			body
			{
				width:520px;
			}
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
		FB.Canvas.scrollTo(0,0);
		FB.Canvas.setAutoGrow();
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
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

	</body>
</html>