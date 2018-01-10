<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 01.11.17
 * Time: 14:12
 */

namespace Core\rout\customer;


use Core\rout\Router;
use TestProject\controller\HomeController;

class TestRouter extends Router {

  /**
   * @param $app
   * @return bool
   */
  function registerRouter() {
    $this->app->get('/test/{name}', HomeController::class . ':home');
  }
}