<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 */

 namespace App;

class LastFixtures extends BergerModel
{
  private $numberOfParticipans;
  private $lastParticipant;
  private $numberOfDays;

  public function __construct($numberOfParticipans, $lastParticipant, $numberOfDays)
  {
    $this->numberOfParticipans = $numberOfParticipans;
    $this->lastParticipant = $lastParticipant;
    $this->numberOfDays = $numberOfDays;
  }

  public function lastFixtures()
  {
    for($i=1; $i<$this->lastParticipant; $i++)
    {
      $day = $this->formula($i, $this->lastParticipant);
      $host = $this->host($i, $this->lastParticipant);
      $guest = $this->guest($i, $this->lastParticipant);

      if($this->getParticipant($this->lastParticipant) == false){
        $this->setLastFixtures($day, $i, 'slobodan');
        $day = $day + $this->numberOfDays;
        $this->setLastFixtures($day, $i, 'slobodan');
      }else{
        $this->setLastFixtures($day, $host, $guest);
        $day = $day + $this->numberOfDays;
        $this->setLastFixtures($day, $guest, $host);
      }
    }
  }

  private function formula($i, $lastId)
  {
    if(2 * $i > $lastId){
      $day = 2 * $i - $lastId;
    }elseif(2*$i <= $lastId){
      $day = 2 * $i - 1;
    }

    return $day;
  }

  private function host($i, $lastId)
  {
    if(($i + $lastId) % 2 == 0){

      $host = $lastId;

    }elseif(($i + $lastId) % 2 != 0){

      $host = $i;

    }

    return $host;
  }

  private function guest($i, $lastId)
  {
    if(($i + $lastId) % 2 == 0)
    {
      $guest = $i;
    }elseif(($i + $lastId) % 2 != 0)
    {
      $guest = $lastId;
    }

    return $guest;
  }
}
