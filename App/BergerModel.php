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
    $result = $this->dbh()->prepare($sql);
    $result->execute();
    $count = $result->fetchColumn();
    return $count;
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

  protected function getParticipant($id){
    $sql = "SELECT participant FROM participans WHERE id='$id'";
    $result = $this->dbh()->prepare($sql);
    $result->execute();
    $participant = $result->fetchColumn();
    return $participant;
  }

  protected function createDayTables($day){

    if($day < 10):
      $tableName = 'day_0' . $day;
    else:
      $tableName = 'day_' . $day;
    endif;

    $sql = "CREATE TABLE IF NOT EXISTS $tableName
    (
      id int(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      host VARCHAR(50) NOT NULL,
      guest VARCHAR(50) NOT NULL,
      host_score int(1),
      guest_score int(1)
    )";

    $result = $this->dbh()->prepare($sql);
    $tableCreation = $result->execute();
  }
}
