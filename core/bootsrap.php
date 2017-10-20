<?php
/**
 * файл начальной загрузки
 */

// подключение библиотеки
require_once '../../lib.inc.php';

// регистрация автолоудера
spl_autoload_register('mAutoLoad');
// регистрация обработчика ошибок
set_error_handler('mError');

// подключение вендора
require_once '../vendor/autoload.php';