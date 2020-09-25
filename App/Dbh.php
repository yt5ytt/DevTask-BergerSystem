<?php

/**
 *@package Berger System
 */

 namespace App;

class Dbh
{

  private $hostname = 'localhost';
  private $username = 'admin';
  private $password = 'sna2405976';
  private $dbName = 'berger_system';

  protected function dbh()
  {
    $dsn = 'mysql: host=' . $this->hostname . '; dbname=' . $this->dbName;
    $pdo = new \PDO($dsn, $this->username, $this->password);
    $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
    return $pdo;
  }
}
