<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 01.11.17
 * Time: 14:26
 */

namespace Core\rout\customer;


use Core\rout\Router;

class TestProject extends Router {

  function registerRouter() {
    /**
     * @param $app
     * @return bool
     */
    function registerRouter() {
      $this->app->get('/testproject/{name}', function ($request, $response, $args) {
        return $response->write("Hello " . $args['name']);
      })->setName("ticket-detail");
    }
  }
}