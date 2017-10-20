<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 20.10.17
 * Time: 13:40
 */

namespace UploadFile\model;


use core\model\DbCoreNotOrm;
use function FastRoute\TestFixtures\empty_options_cached;

class UploadFileModel {
  private $coreDbModel;

  function __construct() {
    $this->coreDbModel = DbCoreNotOrm::getInstance()->db;
  }

  /**
   *  запись файла
   * @param $tmpFile файл во временой дериктории
   */
  function saveFile($tmpFile) {

    if ($tmpFile['size'] > 9000000) {
      exit('big size');
    }

    // create new file name
    $dir = 'files/document_type/fileupload';
    if (!file_exists($dir)) {
      if (!mkdir($dir, 0777, true)) {
        throw new Exception('папка не был создан');
      };
    }
    $fileNameTmp = $dir . '/' . $tmpFile['name'];
    if (move_uploaded_file($tmpFile['file'], $fileNameTmp)) {
      return true;
    };
    return false;
  }

  /**
   * @param $tmpFile файл во временой дериктории
   * @return array
   */
  function readFile($tmpFile) {
    $arr = [];
    $string = '';
    // Читает содержимое файла в строку
    $string = file_get_contents('/home/bad4iz/Downloads/18.10.17 16 10.txt');
    $arr = explode("\r\n\r\n\r\n", $string);

    return $arr;
  }

  function header($arr) {
    $mass = [];
    $tmp = [];
//      tb_structure=D000;F000;F001;F002;
//      RecNow
//
//
//18.10.2017 16:13:59;0;0;0;
    $arr = explode("\r\n", $arr);
    foreach ($arr as $val) {
      $tmp = explode('=', $val);
      if (isset($tmp[1])) {
        $mass[$tmp[0]] = $tmp[1];
      }
    }
    $mass['tb_structure'] = explode(";", $mass['tb_structure']);

    return $mass;
  }

  function body($tmpFile) {
    $arrBody = [];
    $arr = $this->readFile($tmpFile);
    $arrBodyTmp = explode("\r\n", $arr[1]);
    $head = $this->header($arr[0]);
    foreach ($arrBodyTmp as $item) {
      $rowTmp = [];
      $row = explode(';', $item);
      foreach ($row as $key=>$item) {
        if($head['tb_structure'][$key]){
          $rowTmp[$head['tb_structure'][$key]] = $item;
        }
      }
      $ro = $this->getBd($rowTmp);
      d($ro);
      $arrBody[] = $rowTmp;
    }
    return $arrBody;
  }

  function getBd($arr){
    $this->coreDbModel->uploadFile()->insert_multi($arr);
  }
}