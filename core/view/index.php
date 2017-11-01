<?php


use Core\controller\FrontController;
use Slim\App;

include_once dirname(__FILE__) . "/../../vendor/autoload.php";


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
