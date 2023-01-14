<?php

class Connect extends PDO {
  private $servername = 'ddev-booklist-db:3306';
  private $username = 'db';
  private $password = 'db';
  private $dbname = 'db';

  public function __construct() {
    try {
      parent::__construct("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password,
      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
      echo $e;
    }
  }
}

?>