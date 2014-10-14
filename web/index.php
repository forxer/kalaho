<?php

# Lancement de l'autoload de composer
$loader = require __DIR__ . '/../vendor/autoload.php';

//$config = require __DIR__ . '/../Application/Config/prod.php';
$config = require __DIR__ . '/../Application/Config/dev.php';

# Lancement de l'application
$app = new Application\Application($loader, $config);

# Exécution de l'application
$app->run();
