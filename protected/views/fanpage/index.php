 <div class="wrapper">
        	
    <div class="bkg_home">
    	<div class="bkg_home_1"></div>
        <div class="bkg_home_2"></div>
        <div class="bkg_home_3"></div>
        <div class="bkg_home_4"></div>
    </div>
    
    
    <div class="fb_share">
    	<a href="#" class="fb_share_link"></a>
    </div>
    
    <div class="snap_win">
    	<a href="javascript:;" id="myRevealButton" class="snap_win_link"></a>
    </div>

	<!-- modal -->
	<div id="myModal" class="reveal-modal medium">
			<div><img src="/images/register-header.jpg"></div>
			<br>
			<div id="form-msg" style="padding:5px; color:#f00; font-size:14px; font-family:Arial"></div>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'register-form',
				'enableAjaxValidation'=>true,
			)); ?>
			<?php echo $form->textField($model,'name', array('class'=>'input_txt', 'value'=>'Name')); ?><br><br>
			<?php echo $form->textField($model,'email', array('class'=>'input_txt', 'value'=>'Email')); ?>
			
			<div id="question">
				<p id="question_value" style="font-family: Arial; font-size:12px; color:#333333; padding:5px"></p>
				<p id="question_answers"></p>
			</div>
			
				
				<br><br>
				<?php echo CHtml::ajaxSubmitButton(
						'', 
						CHtml::normalizeUrl(array('fanpage/register')), 
						array(
							'beforeSend'=> 'js:function(){
								$("#form-msg").html("Please wait...");
							}',
							'success'=> 'js:function(data){onSuccess(data)}',
							'complete'=> 'js:function(){}'
						) 
				); ?>
				<?php $this->endWidget(); ?>
			<a class="close-reveal-modal">&#215;</a>
		</div>
    <!-- end modal -->
</div>
        
<div class="t_c">
    	©2012 AsiaRooms.com - All Rights Reserved. <a href="#">Terms and Conditions</a>
</div>


<script type="text/javascript">
$(document).ready(function() {
	
     $('#myRevealButton').click(function(e) {
     	
     		<?php
     			if( $registered )
				{
					echo 'location.href="/index.php/fanpage/snap"';
				}
				else
				{
     		?>
     	
     		e.preventDefault();
     		if( fb_login_status!='connected')
     		{
     			doConnect(reveal_registration);
     		}
     		else
     		{
     			reveal_registration();
     		}
     		
     		$('#formSubmitButton').click(function(){
		     	register();
		     });
		     
		    
     		<?php } ?>
			  
     });
     get_question();
     
     $("#User_name").focus(function()
     {
     	$(this).addClass('text_black');
     	if (this.value=='Name') this.value = ''
     });
     $("#User_name").blur(function()
     {
     	if (this.value=='')
     	{
     		this.value = 'Name';
     		$(this).removeClass('text_black');
     	}
     });
     
     $("#User_email").focus(function()
     {
     	$(this).addClass('text_black');
     	if (this.value=='Email') this.value = ''
     });
     $("#User_email").blur(function()
     {
     	if (this.value=='')
     	{
     		this.value = 'Email';
     		$(this).removeClass('text_black');
     	}
     });
});

function get_question()
{
	$.get(
		'/index.php/fanpage/getquestion',
		function(d){
			d=$.parseJSON(d);
			//console.log(d)
			$("#question_value").html(d.question);
			$("#question_answers").html(d.answers);
			Custom.init();
		}		
	);
}

function reveal_registration()
{
		$('#myModal').reveal({
		     animation: 'fade',                   //fade, fadeAndPop, none
		     animationspeed: 300,                       //how fast animtions are
		     closeonbackgroundclick: false,              //if you click background will modal close?
		});
		//Custom.init();
}

function onSuccess(d)
{
	
	var msg = '';
	d= $.parseJSON(d);
	//console.log(d);
	if ( d.status == 'fail')
	{
		for (x in d.data)
		{
			if( x == 'answer_correct')
			{
				// incorrect answer
				if(! d.data[x][0])
				{
					msg = msg + "Incorrect answer. Please try with a new question<br>";
					get_question();
				}
			}
			else
			{
				if( d.data[x][0] == 'Answer cannot be blank.')
				{
					d.data[x][0] = 'Please select an answer.';
				}
				msg = msg + d.data[x][0] + "<br>";
			}
		}
		$("#form-msg").html(msg);
	}
	else if ( d.status =='success')
	{
		$("#form-msg").html('Successful!');
		location.href='/index.php/fanpage/snap';
	}
	else if ( d.status =='not_connected')
	{
		$("#form-msg").html('not connected');
	}
	
	
}

</script>
