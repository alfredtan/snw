<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Asia Rooms Snap to Win</title>

<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/register.css" rel="stylesheet" type="text/css">

<link href="css/form.css" rel="stylesheet" type="text/css">

<script src="js/custom-form-elements.js" type="text/javascript"></script>

</head>

<body>
<!-- ### FB JS SDK - START ### -->
<div id="fb-root"></div>
<script >
window.fbAsyncInit = function () {
	FB.init({
		appId: '176007682508482',
		status: true,
		cookie: true,
		xfbml: false
	});
	
	FB.Canvas.setSize({width:520, height:800});
};

(function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
}());

</script>
<!-- ### FB JS SDK - END ### -->


		
        
        <div class="wrapper">
        	
            <div class="bkg_register">
            	<div class="bkg_register_1"></div>
                <div class="bkg_register_2"></div>
                <div class="bkg_register_3"></div>
            </div>
            
            <div class="form_container">
            	
                <form>
                
                	<input type="text" name="name" id="name" class="input_txt" onfocus="if (this.value=='Name') this.value = ''" value="Name" onblur="if (this.value=='') this.value = 'Name'" />
                    <br />
                    
                    <br />
                    <input type="text" name="email" id="email" class="input_txt" onfocus="if (this.value=='Email') this.value = ''" value="Email" onblur="if (this.value=='') this.value = 'Email'" />                    
                    
                    <br />
                    <br />
                    <br />
                    
                    <div style="margin:5px 0 0 0">
                    <select name="destination" class="styled" style="height:42px;">
                    	<option value="Phuket">Phuket</option>
                    	<option value="Bali">Bali</option>
                        <option value="Koh Samui">Koh Samui</option>
                        <option value="Langkawi">Langkawi</option>
                    </select>
                    </div>
                    
                    <div class="form_submit">
                    	<input type="image" src="images/form_submit.png" alt="Submit" />
                    </div>
                    
                </form>
                
            </div>
            
            
            <div class="fb_share">
            	<a href="#" class="fb_share_link"></a>
            </div>
            
            
            
        </div>
        
        <div class="t_c" style="top:700px;">
            	©2012 AsiaRooms.com - All Rights Reserved. <a href="#">Terms and Conditions</a>
        </div>
        
        
</body>
</html>