<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'PromoShop Panel Administración',
	'sourceLanguage' => '00',
   'language' => 'es',
   // preloading 'log' component
	'preload'=>array('log'),

	// path aliases
    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'),
    ),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'bootstrap.helpers.TbHtml',
		'bootstrap.helpers.TbArray',
		'bootstrap.behaviors.TbWidget',
		'bootstrap.widgets.TbDataColumn',
      'bootstrap.widgets.TbActiveForm',
      'application.modules.rights.*',
      'application.modules.rights.components.*',
      'application.modules.account.models.*'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'cambiala',
			'generatorPaths' => array('bootstrap.gii'),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
		),
		'account'=>array(
            'defaultController'=>'account',
        ),
      'rights'=>array( 
          'superuserName'=>'fernandolachica@gmail.com', // Name of the role with super user privileges. 
          'authenticatedName'=>'Authenticated', // Name of the authenticated user role.
          'userClass' => 'Account',  
          'userIdColumn'=>'id', // Name of the user id column in the database. 
          'userNameColumn'=>'email', // Name of the user name column in the database. 
          'enableBizRule'=>true, // Whether to enable authorization item business rules. 
          'enableBizRuleData'=>false, // Whether to enable data for business rules. 
          'displayDescription'=>true, // Whether to use item description instead of name. 
          'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages. 
          'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages. 
          'install'=>false, // Whether to install rights. 
          'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested. 
          'layout'=>'rights.views.layouts.main', // Layout to use for displaying Rights. 
          'appLayout'=>'application.views.layouts.main', // Application layout. 
          'cssFile'=>'rights.css', // Style sheet file to use for Rights. 
          'debug'=>false, // Whether to enable debug mode. 
      ), 
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('/account/account/login'),
         'class'=>'RWebUser', 
		),
      'authManager'=>array( 
         'class'=>'RDbAuthManager', // Provides support authorization item sorting. 
       ), 
		'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',   
      ),
      
      'mailer'=>array(
        'class'=>'ext.mail.Mailer',
         'backend'=>'mail',
         'mimeParams'=>array(
            'text_encoding' => '7bit',
           'text_charset'  => 'UTF-8',
           'html_charset'  => 'UTF-8',
           'head_charset'  => 'UTF-8'
         ),
        ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		// development environment
      'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=promoshop',
			'emulatePrepare' => true,
			'username' => 'promoshop',
			'password' => 'promoshop',
			'charset' => 'utf8',
		),

      // production environment
      /*'db'=>array(
			'connectionString' => 'mysql:host=db475228301.db.1and1.com;dbname=db475228301',
			'emulatePrepare' => true,
			'username' => 'dbo475228301',
			'password' => 'cambiala',
			'charset' => 'utf8',
		),*/
		// uncomment the following to use a MySQL database
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
		'adminEmail'=>'fernando@desarrollo.wion.es',
      'alertEmail' => 'fernandolachica@gmail.com',
	),
);
