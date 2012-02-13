you have registered

<button id="fb-share">Invite</button>
				<div id="myModalFriends" class="reveal-modal medium" >
					<div><input type="text" id="friends-filter"></div>
					<div id="friends-markup" style="height:150px; overflow:auto">&nbsp;</div>
					<div><button id="invite-do">Invite</button></div>
			<a class="close-reveal-modal">&#215;</a>
		</div>
		
<script>
	$(document).ready( function(){
		$("#fb-share").click(function(){
			$('#myModalFriends').reveal({
				     animation: 'fade',                   //fade, fadeAndPop, none
				     animationspeed: 300,                       //how fast animtions are
				     closeonbackgroundclick: false,              //if you click background will modal close?
				});
				loadFriends();
    });
    
    $("#invite-do").click(function(){
    	var fbids= [];
    	$("#friends-markup li").find(':checked').each(function(){
    		fbids.push( $(this).val() );
    	});
    	//$.post('index.php/fanpage/invite');
    	FB.api('/me/permissions', function(r){
    		if( r.data.publish_stream == 1 )
    		{
    			$.post('index.php/fanpage/invite');
    		}
    		else
    		{
    			doConnect(function(){$.post('index.php/fanpage/invite');});
    		}
    	});
    });
	});
</script>