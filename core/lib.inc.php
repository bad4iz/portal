<?php
/**
 * библиотека функций
 */

// регистрация автозагрузчика
spl_autoload_register('mAutoLoad');

// автозагрузка классов
function mAutoLoad($className) {
  $className = str_replace('\\', '/', $className);
  $ind = strpos($className, '/');
  if ($ind) {
    $package = strtolower(substr($className, 0,$ind)); // получаем имя пакета в нижнем регистре
    $className = substr($className, $ind + 1); // получаем путь
  }
  switch ($package){
    case 'core':
      requireFile(dirname(__DIR__). '/core/'  . $className . '.php');
      break;
    default:
      requireFile(dirname(__DIR__).'/project/' . $package . '/'  . $className . '.php');
  }
}

// подключение файла
function requireFile($path) {
  if (file_exists($path)) {
    include $path;
  }
}

/**
 * функция обработки ошибок
 * @param $errNum номер ошибки
 * @param $errMsg текст ошибки
 * @param $errFile файл
 * @param $errLine строка
 * @return bool
 *
 * $date дата
 * $str  строка для дом вывода
 * $log  строка для вывода в файл
 */
function mError($errNum, $errMsg, $errFile, $errLine) {
  $date = date("d-m-Y H-i:s");
  $path = substr($_SERVER['DOCUMENT_ROOT'], 0, -4) . "error.log";
  $log = '';
  $str = '';
  switch ($errNum) {
    case E_USER_ERROR:
      $str = "<b>My ERROR</b> [$errNum] $errMsg <br />\n";
      $str .= "  Фатальная ошибка в строке $errLine файла $errFile";
      $str .= ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
      $str .= "Завершение работы...<br />\n";
      $log = "[$date]  My ERROR [$errNum] $errMsg : Фатальная ошибка в строке $errLine файла $errFile PHP " . PHP_VERSION . " (" . PHP_OS . ")";
      break;

    case E_USER_WARNING:
      $str = "<b>My WARNING</b> [$errNum] <br /> $errMsg :  ошибка в строке $errLine файла $errFile <br /> \n";
      $log =  "[$date] WARNING [$errNum] $errMsg :  ошибка в строке $errLine файла $errFile ";
      break;

    case E_USER_NOTICE:
      $str = "<b>My NOTICE</b> [$errNum] <br /> $errMsg : ошибка в строке $errLine файла $errFile<br />\n";
      $log = "[$date] My NOTICE [$errNum] $errMsg : ошибка в строке $errLine файла $errFile";
      break;

    default:
      $str = "Неизвестная ошибка: [$errNum] <br /> $errMsg : ошибка в строке $errLine файла $errFile<br />\n";
      $log = "[$date] Неизвестная ошибка: [$errNum] $errMsg : ошибка в строке $errLine файла $errFile";
      break;
  }

  echo $str;

  error_log("$log \n", 3, $path);
  return true;
}


// /home/bad4iz/www/portal@2/project/uploadfile/controller/UploadFileController.php
//                           project/uploadFile/controller/UploadFileController.php