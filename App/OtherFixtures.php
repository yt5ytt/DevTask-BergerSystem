<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 */

 namespace App;

class OtherFixtures extends BergerModel
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

  public function otherFixtures()
  {
    for($i=1; $i<$this->lastParticipant-1; $i++)
    {
      for($k=$i+1; $k<$this->lastParticipant; $k++)
      {
        $day = $this->formula($i, $k, $this->lastParticipant);
        $host = $this -> host($i, $k);
        $guest = $this -> guest($i, $k);

        $this->setOtherFixtures($day, $host, $guest);
        $day = $day + $this->numberOfDays;
        $this->setOtherFixtures($day, $guest, $host);
      }

      // if($this->getParticipant($this->lastParticipant) == false){
      //   $this->setLastFixtures($day, $i, 'slobodan');
      //   $day = $day + $this->numberOfDays;
      //   $this->setLastFixtures($day, $i, 'slobodan');
      // }else{
      //   $this->setLastFixtures($day, $host, $guest);
      //   $day = $day + $this->numberOfDays;
      //   $this->setLastFixtures($day, $guest, $host);
      // }
    }
  }

  private function formula($i, $k, $lastId)
  {
    if($i + $k > $lastId){
      $day = $i + $k - $lastId;
    }elseif($i + $k <= $lastId){
      $day = $i + $k - 1;
    }

    return $day;
  }

  private function host($i, $k)
  {
    if(($i + $k) % 2 == 0){

      $host = $k;

    }elseif(($i + $k) % 2 != 0){

      $host = $i;

    }

    return $host;
  }

  private function guest($i, $k)
  {
    if(($i + $k) % 2 == 0)
    {
      $guest = $i;

    }elseif(($i + $k) % 2 != 0)
    {
      $guest = $k;
    }

    return $guest;
  }
}
