<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'Frankly Math',
	// preloading 'log' component
	'preload' => array('log'),
	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
		'application.components.stripe.*',
		'ext.YiiMailer.YiiMailer',
	),
	// application components
	'components' => array(
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=db_frankly',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'staging' => array(
			'class' => 'CDbConnection',
			'connectionString' => 'mysql:host=localhost;dbname=db_frankly',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'production' => array(
			'connectionString' => 'mysql:host=localhost;dbname=db_frankly',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'test' => array(
			'connectionString' => 'mysql:host=localhost;dbname=db_frankly',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
			),
		),
	),
);
