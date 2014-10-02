<?php

# overload configuration for the development environment
return [

	# Enable/disable debug mode
	'debug' 				=> false,

	# Database connexion configuration
	# should be doctrine DBAL configuration params prefixed by "db."
	# see http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html
	'db.driver'				=> 'pdo_mysql',
	'db.host'   			=> 'localhost',
	'db.dbname'   			=> 'kalaho',
	'db.user'   			=> 'root',
	'db.password'   		=> '',
	'db.charset' 			=> 'utf8',

];
