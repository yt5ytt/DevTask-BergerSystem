<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
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

  protected function checkParticipants()
  {
    $sql = "SELECT COUNT(*) from participans";
    $result = $this->dbh()->exec($sql);
    return $result;
  }

  protected function setParticipant($participant)
  {
    $sql = "INSERT INTO participans (participant) VALUES (?)";
    $result = $this->dbh()->prepare($sql);
    $result->execute([$participant]);
  }

  protected function getParticipans(){
    $sql = "SELECT * FROM participans";
    $result = $this->dbh()->prepare($sql);
    $result->execute();
    return $result->fetchAll();
  }
}
