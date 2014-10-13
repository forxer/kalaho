<?php

# overload configuration for the development environment
return [

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
