<?php
require_once( dirname(__FILE__) . '/../components/helpers.php');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

	'name'=>'Parafia NSPJ Wyry',
	'timeZone' => 'Europe/Berlin',
	// preloading 'log' component
	'preload'=>array('log'),
	// user language (for Locale)
    'language'=>'pl',
    //language for messages and views
    'sourceLanguage'=>'pl',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		//extensions
  		'application.extensions.EWideImage.WideImage', //WideImage
		'application.extensions.YiinfiniteScroll.YiinfiniteScroller', //WideImage
	),


	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'matzik',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

		'userGroups'=>array(
        	'accessCode'=>'matzik',
        	'profile' => array('UserProfile'),
    	)

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class'=>'userGroups.components.WebUserGroups',
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
			'showScriptName'=>false,
		),

		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=mysql-mazikwyr.ogicom.pl;dbname=mazikwyr_nspj',
			'emulatePrepare' => true,
			'username' => 'mazikwyr_mazik',
			'password' => 'matzik',
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
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
		'adminEmail'=>'wyry@archidiecezja.katowice.pl',
	),
);
