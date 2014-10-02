<?php

# Définition de l'environnement pour surcharger la configuration globale
define('KALAHO_ENV',

	//	'prod'
	//	'dev'
		'local'
);

# Lancement de l'autoload de composer
$loader = require __DIR__ . '/../vendor/autoload.php';

# Lancement de l'application système
$app = new Tao\Application($loader, require __DIR__ . '/../Application/Config/global.php');

# Exécution de l'application
$app->run();

