<?php
#
# /!\ WARNING
#
# Do not edit configuration data below,
# use the environment dedicated files instead.
#
# Dedicated configuration files available are:
# 	- prod.php 		// config file for the production environment
# 	- dev.php		// config file for the development environment
# 	- local.php 	// config file for the local environment (special case of dev env)
#
# Moreover, you can create your own configuration file by defining
# a custom environment in the main front controller file (index.php).
#

$config = [

	#
	# Common settings
	#-------------------------------------------------

	# Enable/disable debug mode
	'debug' 					=> false,

	# Database connexion configuration.
	# Should be doctrine DBAL configuration params prefixed by "db."
	# see http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html
	'db.driver'					=> '',
	'db.host'   				=> '',
	'db.dbname'   				=> '',
	'db.user'   				=> '',
	'db.password'   			=> '',
	'db.charset' 				=> '',

	# Relative path to the application URL from the hostname.
	# The value should always begin and end with a slash.
	#
	# ex.:
	# 	http://localhost 		: '/'
	# 	http://localhost/app 	: '/app/'
	#   http://vhost 			: '/'
	# 	http://domain.tld 		: '/'
	# 	http://domain.tld/test  : '/test/'
	# 	etc.
	'app_url' 					=> '/',

	# Relative path to the assets URL
	# from the app_url configuration (see above).
	'assets_url' 				=> 'Assets',

	# Relative path to the components URL
	# from the app_url configuration (see above).
	'components_url' 			=> 'Components',

	#
	# Advanced settings
	#-------------------------------------------------

	# Absolute directory paths
	'dir.app' 					=> __DIR__ . '/..',
	'dir.cache' 				=> __DIR__ . '/../Storage/Cache',
	'dir.config' 				=> __DIR__ . '/../Config',
	'dir.controllers' 			=> __DIR__ . '/../Controllers',
	'dir.logs' 					=> __DIR__ . '/../Storage/Logs',
	'dir.models' 				=> __DIR__ . '/../Models',
	'dir.views' 				=> __DIR__ . '/../Views',
	'dir.web' 					=> __DIR__ . '/../../web',

	# Dependencies; where the Pimple DIC shows all its power
	# ('cause you can use other core class by simply configuration setting)
	'class.dbal.config'			=> 'Doctrine\DBAL\Configuration',
	'class.dbal.logging'		=> 'Doctrine\DBAL\Logging\DebugStack',
	'class.dbal.driver.manager'	=> 'Doctrine\DBAL\DriverManager',
	'class.dbal.query.builder'	=> 'Tao\Database\QueryBuilder',
	'class.http.request'		=> 'Symfony\Component\HttpFoundation\Request',
	'class.session'				=> 'Tao\Http\Session',
	'class.session.storage' 	=> 'Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage',
	'class.session.handler' 	=> '\SessionHandler',
	'class.logger' 				=> 'Monolog\Logger',
	'class.router' 				=> 'Tao\Routing\Router',
	'class.templating' 			=> 'Tao\Templating\Templating',

	# Cross-Site Request Forgery token name in session
	'sec.csrf_token_name' 		=> 'csrf_token',

];


# Merge with environment dedicated files
if (defined('KALAHO_ENV'))
{
	$envConfigFile = __DIR__ . '/' . KALAHO_ENV . '.php';

	if (file_exists($envConfigFile))
	{
		$envConfig = require $envConfigFile;

		$envConfig['env'] = KALAHO_ENV;

		return $envConfig + $config;
	}
}

# If no environment is specified with the KALAHO_ENV constant.
$config['env'] = null;

return $config;
