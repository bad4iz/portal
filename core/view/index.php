<?php

use MyClass\controller\FrontController;
use Slim\App;

require 'vendor/autoload.php';

// Create and configure Slim app
$config = ['settings' => [
  'addContentLengthHeader' => false,
]];

$app = new App($config);

/* Инициализация и запуск FrontController */
$front = FrontController::getInstance();
$front->routeInitialize($app);

// Run app
$app->run();
