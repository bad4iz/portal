<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 22.10.17
 * Time: 16:07
 */

namespace core\Rout;

class HelloRouter extends Router {

  /**
   * @param $app
   * @return bool
   */
  function registerRouter() {
    $this->app->get('/hello/{name}', function ($request, $response, $args) {
      return $response->write("Hello " . $args['name']);
    })->setName("ticket-detail");;
  }
}