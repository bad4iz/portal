<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 10.01.18
 * Time: 9:18
 */

namespace Core\Controller;


class Render
{
    public function render($file) {
        /* $file - текущее представление */
        ob_start();
        include($file);
        return ob_get_clean();
    }
}