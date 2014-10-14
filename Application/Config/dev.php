<?php

$devConfig = [

	# Enable/disable debug mode
	'debug' 				=> true,

	# Database connexion configuration.
		'database.connection' => [
		'driver' => 'pdo_mysql',
		'host' => 'localhost',
		'dbname' => 'kalaho',
		'user' => 'root',
		'password' => '',
		'charset' => 'utf8'
	]
];


$config = require __DIR__ . '/prod.php';

return $devConfig + $config;
