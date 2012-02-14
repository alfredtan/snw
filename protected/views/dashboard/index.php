<div>
	
	
	<div>
		<?php echo CHtml::form(); ?>
		Week <?php echo CHtml::dropDownList(
									'current_week',
									$current_week['week'], 
									CHtml::listData($weeks,'week','week'),
									array('submit'=>'')
									);?> [<a href="<?php echo Yii::app()->createUrl('dashboard'); ?>">Current Week</a>]</div>
		<?php echo CHtml::endForm(); ?>
	<div>From <?php echo date("d-m-Y", strtotime($current_week['startDate'])); ?> to <?php echo date("d-m-Y", strtotime($current_week['stopDate'])); ?></div>
	<div>Total Users: <?php echo count($users); ?></div>
	<div>Total Users This Week: <?php echo count($users_this_week); ?></div>
	<div>Snap Attempts Total This Week: <?php echo count($snap_attempts_total_this_week); ?></div>
	<div>Snap Attempts Win This Week: <?php echo count($snap_attempts_win_this_week); ?></div>
	
	
	
	
</div>