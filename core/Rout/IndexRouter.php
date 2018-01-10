<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 22.10.17
 * Time: 14:07
 */

namespace core\Rout;


class IndexRouter extends Router {

  function registerRouter() {

    $this->app->get('/', function ($request, $response, $args) {
      return $this->view->render($response, 'pages/index.twig', [
        'name' => 'name'
      ]);
    });

  }
}