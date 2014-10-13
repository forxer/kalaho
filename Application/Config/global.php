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

	# The application identifier (used internally)
	'app_id' => 'kalaho',

	# Enable/disable debug mode
	'debug' 					=> false,

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


	# Database
	# ----------------------------------------------------------

	# Database connexion configuration.
	'database.connection' => [
		'driver' => '',
		'host' => '',
		'dbname' => '',
		'user' => '',
		'password' => '',
		'charset' => ''
	],

	'database.config_class' => 'Doctrine\DBAL\Configuration',
	'database.logger_class' => 'Doctrine\DBAL\Logging\DebugStack',
	'database.driver_manager_class' => 'Doctrine\DBAL\DriverManager',
	'database.query_builder_class' => 'Tao\Database\QueryBuilder',

	'database.models_namespace' => 'Application\Models',


	# Http
	# ----------------------------------------------------------

	'http.request_class' => 'Symfony\Component\HttpFoundation\Request',


	# Logger
	# ----------------------------------------------------------

	'logger.class' => 'Monolog\Logger',


	# Routing
	# ----------------------------------------------------------

	# List of directories to search resources
	'routing.resources_dirs' => [
		__DIR__ . '/../Config'
	],

	# Name of resource files
	'routing.resource_name' => 'routes.yml',

	'routing.controllers_namespace' => 'Application\Controllers',

	'routing.cache_dir' => __DIR__ . '/../Storage/Cache/Router',

	'routing.router_class' => 'Symfony\Component\Routing\Router',
	'routing.loader_class' => 'Symfony\Component\Routing\Loader\YamlFileLoader',
	'routing.locator_class' => 'Symfony\Component\Config\FileLocator',
	'routing.request_context_class' => 'Symfony\Component\Routing\RequestContext',

	'routing.generator_class' => 'Symfony\Component\Routing\Generator\UrlGenerator',
	'routing.generator_base_class' => 'Symfony\Component\Routing\Generator\UrlGenerator',
	'routing.generator_dumper_class' => 'Symfony\Component\Routing\Generator\Dumper\PhpGeneratorDumper',
	'routing.generator_cache_class' => null,

	'routing.matcher_class' => 'Symfony\Component\Routing\Matcher\UrlMatcher',
	'routing.matcher_base_class' => 'Symfony\Component\Routing\Matcher\UrlMatcher',
	'routing.matcher_dumper_class' => 'Symfony\Component\Routing\Matcher\Dumper\PhpMatcherDumper',
	'routing.matcher_cache_class' => null,

	'routing.resource_type' => null,
	'routing.strict_requirements' => true,


	# Session
	# ----------------------------------------------------------

	'session.class' => 'Tao\Http\Session',
	'session.storage_class' => 'Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage',
	'session.handler_class' => '\SessionHandler',


	# Translator
	# ----------------------------------------------------------

	'translator.locales' 			=> [
		'fr' => 'Français',
		'en' => 'English'
	],

	'translator.fallback' 			=> 'fr',

	'translator.dir' => __DIR__ . '/../Translations',

	'translator.class' => 'Symfony\Component\Translation\Translator',
	'translator.messages_selector_class' => 'Symfony\Component\Translation\MessageSelector',


	# Templating
	# ----------------------------------------------------------

	'templating.path.patterns' => __DIR__ . '/../Views/%name%.php',

	'templating.class' => 'Tao\Templating\Templating',
	'templating.escaper_class' => 'Tao\Templating\Escaper\ZendEscaper',
	'templating.loader_class' => 'Symfony\Component\Templating\Loader\FilesystemLoader',
	'templating.name_parser_class' => 'Symfony\Component\Templating\TemplateNameParser',

	'templating.load_default_helpers' => true,



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
