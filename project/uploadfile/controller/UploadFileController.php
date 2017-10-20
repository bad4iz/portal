<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 20.10.17
 * Time: 14:30
 */

namespace UploadFile\controller;

use UploadFile\model\UploadFileModel;

class UploadFileController {
  private $uploadFileModel;
  function __construct() {
    $this->uploadFileModel = new UploadFileModel();
  }

  function setFile($file) {



    $body = $this->uploadFileModel->body($file);
//    d($this->uploadFileModel->getBd($body));
    d($body);
  }
}