var fb_login_status = null;

jQuery.expr[':'].Contains = function(a,i,m){
    return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
};

function doConnect(cb)
{
	FB.login(function(response) 
	{
		//console.log('login status is: ' + response.status)
		if(response.status=="connected")
		{
			fb_login_status=="connected";
			$.get( "/index.php/fanpage/me", function(d){
				$.get("/index.php/fanpage/processrequest")
			});
			cb();
		}
	});
}
			 
function getLoginStatus()
{
	FB.getLoginStatus(function(response) 
	{
		//console.log ('login statuss: ' + response.status);
		fb_login_status=response.status;
		if (response.status=='connected') 
		{
			$.get("/index.php/fanpage/processrequest")
		} 
		else
		{
			//console.log('not connected')
		}
	}, true);
}

function loadFriends()
{
	 var markup = '';
	var queryOnFriends2 = "SELECT uid, name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1=me())";
	var query = FB.Data.query(queryOnFriends2);
  query.wait(function(rows){
  	
  	markup = "<ul style='list-style:none;margin:0px;padding:0px;'>"
		for( var x=1; x<=rows.length; x++)
		{
//				console.log(rows[x]['uid'])
			markup += '<li style="list-style:none;margin:0px;padding:0px;display:inline-block; width:175px" ><input type="checkbox" id="'+rows[x-1]['uid']+'" value="'+rows[x-1]['uid']+'"><label for="'+rows[x-1]['uid']+'"><img width="25px" alt="'+rows[x-1]['name']+'" src="https://graph.facebook.com/'+rows[x-1]['uid']+'/picture?type=square">'+rows[x-1]['name']+'</label></li>';
		}
		markup += "</ul>"
		$("#friends-markup").html( markup );
		
		$("#friends-markup li").find('input').change(function(){
			if($(this).is(':checked'))
				$(this).parent().css('background','#cccccc')
			else
				$(this).parent().css('background','none')
		})	
  	
  	$('#friends-filter').keyup(function(){
		var filter = $(this).val();
		if(filter)
		{
		 $("#friends-markup").find("li:not(:Contains(" + filter + "))").hide();
		 $("#friends-markup").find("li:Contains(" + filter + ")").show();
		}
		else
		{
			$("#friends-markup").find("li").hide();
			}
		});
  });
  
  
		
	return;
	FB.api( '/me/friends', function(result) {
 
  var numFriends = result ? Math.min(5, result.length) : 0;
  if (numFriends > 0) {
    for (var i=0; i<numFriends; i++) {
    	//console.log(result);
      markup += (
        '<img src="https://graph.facebook.com/'+result[i]+'/picture?type=square"><br>'
      );
    }
  }
  $("#friends-markup").html( markup );
  FB.XFBML.parse();
});
}


function friends_filter_init()
{
	
}

/*
function invite_friends()
{
	$("#fb-share").click(function(){
		$('#myModalFriends').reveal({
			     animation: 'fade',                   //fade, fadeAndPop, none
			     animationspeed: 300,                       //how fast animtions are
			     closeonbackgroundclick: false,              //if you click background will modal close?
			});
			loadFriends();
			return;
		FB.ui({
        method: 'feed',
        link: 'http://google.com',
        display: 'iframe',
        to: '553887054,100002372034326',
        name: 'Click to view my app',
        caption: 'Hello my app'

    });
		
	})
}
*/