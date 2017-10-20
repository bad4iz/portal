<?php
/**
 * Created by PhpStorm.
 * User: bad4iz
 * Date: 20.10.17
 * Time: 11:25
 */

namespace core\model;

/**
 * подключение и работа с главной базой.
 * инициализация
 * $dbModel = DbCoreNotOrm::getInstance()
 * Class DbCore
 * @package Core\controller\db
 */

require_once dirname(__FILE__) . '/../lib/notorm-master/NotORM.php';

class DbCoreNotOrm {
  static private $_instance;
  public $db;

  private function __clone() { }

  private function __construct() {
//    $connection = new PDO("mysql:host=localhost;dbname=$dbname", "$user", "$passw");
    $connection = new \PDO("mysql:host=localhost;dbname=testNotOrm", "root", "");
    $this->db = new \NotORM($connection);

  }

  static function getInstance() {
    if (!self::$_instance) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }
}