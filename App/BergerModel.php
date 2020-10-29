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
      participant VARCHAR(50) CHARACTER SET utf8
    ) Engine=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci";
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
      host VARCHAR(50) CHARACTER SET utf8,
      guest VARCHAR(50) CHARACTER SET utf8,
      host_score int(1),
      guest_score int(1)
    ) Engine=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci";

    $result = $this->dbh()->prepare($sql);
    $tableCreation = $result->execute();
  }

  protected function setLastFixtures($day, $host, $guest){
    if($day < 10):
      $tableName = 'day_0' . $day;
    else:
      $tableName = 'day_' . $day;
    endif;

    if($guest == 'slobodan'):
      $host = $this->getParticipant($host);
    else:
      $host = $this->getParticipant($host);
      $guest = $this->getParticipant($guest);
    endif;

    $sql = "INSERT INTO $tableName (host, guest) VALUES (?, ?)";
    $result = $this->dbh()->prepare($sql);
    $result->execute([$host, $guest]);

  }

  protected function setOtherFixtures($day, $host, $guest){
    if($day < 10):
      $tableName = 'day_0' . $day;
    else:
      $tableName = 'day_' . $day;
    endif;

    $checkHost = "SELECT COUNT(host, guest) FROM $tableName WHERE host=$host";
    $result = $this->dbh()->prepare($checkHost);
    $result->execute();
    $countHost = $result->fetchColumn();

    $checkGuest = "SELECT COUNT(host, guest) FROM $tableName WHERE host=$guest";
    $result = $this->dbh()->prepare($checkGuest);
    $result->execute();
    $countGuest = $result->fetchColumn();

    if($countHost == 0 AND $countGuest == 0){
      $host = $this->getParticipant($host);
      $guest = $this->getParticipant($guest);

      $sql = "INSERT INTO $tableName (host, guest) VALUES (?, ?)";
      $result = $this->dbh()->prepare($sql);
      $result->execute([$host, $guest]);
    }
  }
}
