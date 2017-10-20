<?php

// начальная загрузка
require_once dirname(__FILE__) . '/../bootsrap.php';

use core\model\DbCoreNotOrm;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use UploadFile\controller\UploadFileController;

$app = new \Slim\App;

$coreDbModel = DbCoreNotOrm::getInstance();

//$db->user()->insert(['name'=>'вася']);

$res = '';
foreach ($coreDbModel->db->application() as $application) {
  $res .= $application->author["name"] . ": $application[title]  <br>";
}

// регистрация роутов
$app->post('/', function (Request $request, Response $response) use ($res) {
  $response->getBody()->write("Hello, $res");
  return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response) use ($res) {
  $name = $request->getAttribute('name');
  $response->getBody()->write("Hello, $res");

  return $response;
});


$app->post('/upload', function (Request $request, Response $response) {
  $files = $request->getUploadedFiles()['userfile'];
d($files);
    $uploadFileController = new UploadFileController();
  $uploadFileController->setFile($files);

  return $response;
});



$app->run();