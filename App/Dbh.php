<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 */

 namespace App;

class Dbh
{

  private $hostname = 'localhost';
  private $username = 'root';
  private $password = '';
  private $dbName = 'berger_system';

  protected function dbh()
  {
    $dsn = 'mysql: host=' . $this->hostname . '; dbname=' . $this->dbName . '; charset=utf8; connect_timeout=30';
    $pdo = new \PDO($dsn, $this->username, $this->password);
    $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
    return $pdo;
  }
}
