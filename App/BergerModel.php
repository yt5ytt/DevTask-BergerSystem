<?php

/**
 * @package Berger system
 */

 namespace App;

class BergerModel extends Dbh
{
  protected function setParticipansTable()
  {
    $sql = "CREATE TABLE IF NOT EXISTS participans
    (
      id int(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      participant VARCHAR(50) NOT NULL
    )";
    $result = $this->dbh()->prepare($sql);
    $tableCreation = $result->execute();
    return $tableCreation;
  }

  protected function setParticipant($participant)
  {

  }
}
