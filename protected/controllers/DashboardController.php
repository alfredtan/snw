<?php

class DashboardController extends Controller
{
	public $layout = '//snw_layouts/dashboard';
	
	public function actionIndex()
	{
		if (isset($_POST['current_week']) && $_POST['current_week'] > 0)
		{
			$current_week = $this->getWeek($_POST['current_week']);
		}
		else 
		{
			$current_week = $this->getCurrentWeek();
		}
		
		$weeks = WeekSettings::model()->findAll();
		$users = User::model()->findAll();
		$users_this_week = User::model()->findAll(
			'dateEntry between :startDate and :stopDate',
			array(':startDate'=>$current_week['startDate'],
						':stopDate'=>$current_week['stopDate']
			)
		);
		
		$snap_attempts_total_this_week = SnapAttempts::model()->findAll(
			'attemptDate between ":startDate" and ":stopDate"',
			array(':startDate'=>$current_week['startDate'],
						':stopDate'=>$current_week['stopDate']
			)
		);
		
		$snap_attempts_win_this_week = SnapAttempts::model()->findAll(
			'attemptDate between ":startDate" and ":stopDate" AND status="win"',
			array(':startDate'=>$current_week['startDate'],
						':stopDate'=>$current_week['stopDate']
			)
		);
		
		$this->render('index', array('current_week'=>$current_week, 
																'weeks'=>$weeks,
																'users'=>$users,
																'users_this_week'=>$users_this_week,
																'snap_attempts_total_this_week'=>$snap_attempts_total_this_week,
																'snap_attempts_win_this_week'=>$snap_attempts_win_this_week
																));
	}
	
	
	/********************************************/
	private function getCurrentWeek()
	{
		return WeekSettings::model()->find('startDate<=NOW() order by startDate desc');
	}
	
	private function getWeek($num)
	{
		
		return WeekSettings::model()->find('week=:week order by startDate desc', array(':week'=>$num));
	}
	
	
	
	
}