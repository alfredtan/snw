<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'AsiaRooms Snap to Win',
	'defaultController' => 'fanpage',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.vendors.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'giiyii',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		
		'session' => array(
				'class' => 'system.web.CDbHttpSession',
				'connectionID' => 'db',
				'autoCreateSessionTable' => false,
				'sessionTableName' => 'yiisession',
                ),
                
		// uncomment the following to enable URLs in path-format
		//*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		//*/
		
		
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=ar_snw',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'my$qlr00t',
			'charset' => 'utf8',
		),
		/*
		'session' => array (
		    'class' => 'CDbHttpSession',
		    'connectionID' => 'db',
		    'sessionTableName'=>'YiiSession',
		),*/
		
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning,info',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'facebookAppId'=>'211113102317615',
		'facebookAppSecret'=>'35adff393b13b5050d7969d0a92d035d',
		'facebookAppScope'=>'',
		'fanPageUrl'=>'http://www.facebook.com/pages/WooHoos-Test-Fan-Page/139884799379948?sk=app_211113102317615',
		'feedIcon'=>'http://fbrell.com/f8.jpg',
	),
);