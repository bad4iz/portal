<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 10.01.18
 * Time: 9:14
 */

namespace TestProject\Controller;


use Core\Controller\Render;

class HomeController
{
    protected $view;

    public function home($request, $response, $args) {
        // your code here
        // use $this->view to render the HTML
        $render = new Render();
        return $response->write($render->render(__DIR__. '/../view/index.html') );
    }
}