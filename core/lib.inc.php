<?php
/**
 * библиотека функций
 */

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
      requireFile('../core/' . $className . '.php');
      break;
    default:
      requireFile('/project/' . $package . '/'  . $className . '.php');
  }
}

// подключение файла
function requireFile($path) {
  if (file_exists($path)) {
    include $path;
  }
}