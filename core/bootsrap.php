<?php
/**
 * файл начальной загрузки
 */


// подключение библиотеки
require_once  dirname(__FILE__) . "/lib.inc.php";



// регистрация автолоудера
spl_autoload_register('mAutoLoad');
// регистрация обработчика ошибок
set_error_handler('mError');

// подключение вендора
require_once dirname(__FILE__) . '/../vendor/autoload.php';

// подключение NotOrm
require_once dirname(__FILE__) . '/lib/notorm-master/NotORM.php';

// Глобальные настройки из env
$_ENV['env'] = parse_ini_file(dirname(__FILE__)  .'/../.env');
