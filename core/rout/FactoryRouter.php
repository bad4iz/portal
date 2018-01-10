<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 01.11.17
 * Time: 13:50
 */

namespace core\rout;


class FactoryRouter {
  function getRouter($router){
    switch ($router){
      case 'IndexRouter': return 'core\rout\\' . $router;
      case 'HelloRouter': return 'core\rout\\' . $router;
      default:
        return 'core\rout\customer\\' . $router;
    }
  }
}