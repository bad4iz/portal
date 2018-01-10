<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 22.10.17
 * Time: 18:47
 */

namespace core\rout;


use core\controller\FrontController;

abstract class Router implements IRouter {
  protected $app;

  function __construct() {
    $front = FrontController::getInstance();
    $this->app = $front->getParams();
  }

  abstract function registerRouter();
}