<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 01.11.17
 * Time: 13:50
 */

namespace core\Rout;


class FactoryRouter {
  function getRouter($router){
    switch ($router){
      case 'IndexRouter': return 'core\Rout\\' . $router;
      case 'HelloRouter': return 'core\Rout\\' . $router;
      default:
        return 'core\Rout\Customer\\' . $router;
    }
  }
}