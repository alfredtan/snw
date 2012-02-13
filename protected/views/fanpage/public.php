not registered- <button id="myRevealButton">reveal</button>


		<div id="myModal" class="reveal-modal medium">
			<div id="form-msg"></div>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'register-form',
				'enableAjaxValidation'=>true,
			)); ?>
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name'); ?>
			<?php echo $form->error($model,'name'); ?><br>
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email'); ?>
			<?php echo $form->error($model,'email'); ?><br>
			
			<div id="question">
				<p id="question_value"></p>
				<p id="question_answers"></p>
			</div>
			
				
				<br>
				<?php echo CHtml::ajaxSubmitButton(
						'Register', 
						CHtml::normalizeUrl(array('fanpage/register')), 
						array(
							'beforeSend'=> 'js:function(){}',
							'success'=> 'js:function(data){onSuccess(data)}',
							'complete'=> 'js:function(){}'
						) 
				); ?>
				<?php $this->endWidget(); ?>
			<a class="close-reveal-modal">&#215;</a>
		</div>




<script type="text/javascript">
$(document).ready(function() {
     $('#myRevealButton').click(function(e) {
     		e.preventDefault();
     		if( fb_login_status!='connected')
     		{
     			doConnect(reveal_registration);
     		}
     		else
     		{
     			reveal_registration();
     		}
			  
     });
     
     $('#formSubmitButton').click(function(){
     	register();
     });
     
     get_question();
});

function get_question()
{
	$.get(
		'/index.php/fanpage/getquestion',
		function(d){
			d=$.parseJSON(d);
			$("#question_value").html(d.question);
			$("#question_answers").html(d.answers);
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
					msg = msg + "Incorrect answer. Please try another question<br>";
					get_question();
				}
			}
			else
			{
				msg = msg + d.data[x][0] + "<br>";
			}
		}
		$("#form-msg").html(msg);
	}
	else if ( d.status =='success')
	{
		$("#form-msg").html('successful!');
		location.href='/index.php/fanpage/snap';
	}
	else if ( d.status =='not_connected')
	{
		$("#form-msg").html('not connected');
	}
	
	
}

</script>
