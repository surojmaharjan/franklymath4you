<?php

require_once(dirname(__FILE__) . '/../../env.php');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

if (environment_setting() == "development") {
	$database = 'db_frankly';
	$username = 'root';
	$password = '';
	$admin_email = 'mjsanish@yahoo.com';
	$connectionString = 'mysql:host=localhost;dbname=' . $database;
     $is_live = false;
} else if (environment_setting() == "staging") {
	$database = 'franklymath';
     $username = 'frankly';
     $password = 'thebestwebsite';
     $admin_email = 'mjsanish@yahoo.com';
     $connectionString = 'mysql:host=localhost;dbname=' . $database;
     $is_live = false;
} else if (environment_setting() == 'production') {
	$database = 'frankly';
	$username = 'frankly';
	$password = 'thebestwebsite';
	$admin_email = 'mjsanish@yahoo.com';
	$connectionString = 'mysql:host=localhost;dbname=' . $database;
     $is_live = true;
}

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'Frankly Math',
	'defaultController' => 'home',
	// preloading 'log' component
	'preload' => array('log'),
	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
		'ext.YiiMailer.YiiMailer',
		'application.components.stripe.*',
	),
	'modules' => array(
		// uncomment the following to enable the Gii tool
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'sailendra',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array('127.0.0.1', '::1'),
		),
	),
	// application components
	'components' => array(
		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
			'class' => 'WebUser',
			'authTimeout' => 60 * 60 * 6,
		),
		'Paypal' => array(
			'class' => 'application.components.Paypal',
			'apiUsername' => 'sanishmaharjan_api1.lftechnology.com',
			'apiPassword' => '1376672818',
			'apiSignature' => 'AlwhKqWKLPwz3-wih05jdQJi79iLAiI3ZO..CM0ain49I74uuV0496JS',
			'apiLive' => $is_live,
			'returnUrl' => 'home', //regardless of url management component
			'cancelUrl' => 'home', //regardless of url management component
		),
		// uncomment the following to enable URLs in path-format
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'caseSensitive' => false,
			'rules' => array(
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
				'<controller:home>' => 'home',
				'<controller:admin>' => 'admin',
				'<controller:page>' => 'page',
				'<controller:setting>' => 'setting',
				'<controller:gii>' => 'gii',
				'<action:\w+>' => 'home/<action>',
			),
		),
		/* 'db'=>array(
		  'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		  ), */
		// uncomment the following to use a MySQL database
		'db' => array(
			'connectionString' => $connectionString,
			'emulatePrepare' => true,
			'username' => $username,
			'password' => $password,
			'charset' => 'utf8',
		),
		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'error',
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
				// uncomment the following to show log messages on web pages

				/*array(
					'class' => 'CWebLogRoute',
					'enabled' => true,
					'categories' => 'system.db.*',
				),*/
			),
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		'adminEmail' => $admin_email,
	),
);
