<?php

# Lancement de l'autoload de composer
$loader = require __DIR__ . '/../vendor/autoload.php';

# Lancement de l'application système
$app = new Tao\Application($loader);

# Exécution de l'application
$app->run();
