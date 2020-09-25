<?php

/**
 *@package Berger System
 */

class Dbh
{

  private $server = 'localhost';
  private $user = 'admin';
  private $password = 'sna2405976';
  private $dbName = 'berger_system';

  protected function dbh()
  {
    $dsn = 'mysql: host=' . $this->hostname . '; dbname=' . $this->dbName;
    $pdo = new PDO($dsn, $this->username, $this->password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $pdo;
  }
}
