<div class="wrapper">
        	
    <div class="bkg_home">
    	<div class="bkg_home_1"></div>
        <div class="bkg_home_2"></div>
        <div class="bkg_home_3"></div>
        <div class="bkg_home_4"></div>
        <div class="bkg_home_5"></div>
    </div>
    
    
    <div class="fb_share">
    	<a href="javascript:;" class="fb_share_link"></a>
    </div>
    
    <div class="snap_win">
    	<a id="snap_win_btn" class="snap_win_link"></a>
    </div>
    
    <div class="weekly_winner">
    	
        <ul>
        	<li>
            	<div>
                	<span><b>Week 1:</b></span> <br />
                	<img src="/images/weekly_winner.jpg" border="0" alt="winner" />
                </div>
            </li>
            <li>
            	<div>
                	<span><b>Week 2:</b></span> <br />
                	<img src="/images/weekly_winner.jpg" border="0" alt="winner" />
                </div>
            </li>
            <li>
            	<div>
                	<span><b>Week 3:</b></span> <br />
                	<img src="/images/weekly_winner.jpg" border="0" alt="winner" />
                </div>
            </li>
            <li>
            	<div>
                	<span><b>Week 4:</b></span> <br />
                	<img src="/images/weekly_winner.jpg" border="0" alt="winner" />
                </div>
            </li>
            <li>
            	<div>
                	<span><b>Week 5:</b></span> <br />
                	<img src="/images/weekly_winner.jpg" border="0" alt="winner" />
                </div>
            </li>
            <li>
            	<div>
                	<span><b>Week 6:</b></span> <br />
                	<img src="/images/weekly_winner.jpg" border="0" alt="winner" />
                </div>
            </li>
            <li>
            	<div>
                	<span><b>Week 7:</b></span> <br />
                	<img src="/images/weekly_winner.jpg" border="0" alt="winner" />
                </div>
            </li>
            <li>
            	<div>
                	<span><b>Week 8:</b></span> <br />
                	<img src="/images/weekly_winner.jpg" border="0" alt="winner" />
                </div>
            </li>
            <li>
            	<div>
                	<span><b>Week 9:</b></span> <br />
                	<img src="/images/weekly_winner.jpg" border="0" alt="winner" />
                </div>
            </li>
            <li>
            	<div>
                	<span><b>Week 10:</b></span> <br />
                	<img src="/images/weekly_winner.jpg" border="0" alt="winner" />
                </div>
            </li>
            <li>
            	<div>
                	<span><b>Week 11:</b></span> <br />
                	<img src="/images/weekly_winner.jpg" border="0" alt="winner" />
                </div>
            </li>
            <li>
            	<div>
                	<span><b>Week 12:</b></span> <br />
                	<img src="/images/weekly_winner.jpg" border="0" alt="winner" />
                </div>
            </li>
        </ul>
        
    </div>
                
    
</div>

<div class="t_c" style="top:1352px;">
    	©2012 AsiaRooms.com - All Rights Reserved. <a href="#">Terms and Conditions</a>
</div>


<!-- modal -->
	<div id="myModal" class="reveal-modal small">
			<div><img src="/images/register-header.jpg"></div>
			<br>
			<div id="form-msg" style="padding:5px; color:#f00; font-size:14px; font-family:Arial"></div>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'register-form',
				'enableAjaxValidation'=>true,
			)); ?>
			<?php echo $form->textField($model,'name', array('class'=>'input_txt', 'value'=>'Name')); ?><br><br>
			<?php echo $form->textField($model,'email', array('class'=>'input_txt', 'value'=>'Email')); ?>
			<span style="font-size:9px; font-family:Arial; color:#898686; margin:0 0 0 8px;">*We will use this email address to notify you if you are a winner.</span>    
			<div id="question" style="margin-top:5px">
				<p id="question_value" style="font-family: Arial; font-size:12px; color:#898686; padding:5px"></p>
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

<script type="text/javascript">
$(document).ready(function() {
	
	$("#snap_win_btn").live('mouseover',function() {
		$(this).css({cursor:'pointer'});
	});
	
     $('#snap_win_btn').click(function(e) {
     	
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
					msg = msg + "Incorrect answer. Please try again with a new question.<br>";
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
