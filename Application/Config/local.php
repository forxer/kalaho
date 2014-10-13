<?php

# In local environment we simply retrieve the configuration for the development environment and we override it.
# So the configuration of the local environment is a particular development environment.
$local_config = [

	'debug' 				=> false,
];

$devConfig = require __DIR__ . '/dev.php';

return $local_config + $devConfig ;
