<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 */

 namespace App;

class Numbers
{

  private $numberOfParticipans;

  public function __construct($numberOfParticipans)
  {
    $this->numberOfParticipans = $numberOfParticipans;
  }

  public function numberOfDays()
  {
    if($this->numberOfParticipans % 2 == 0):
      $numberOfDays = $this->numberOfParticipans - 1;
    else:
      $numberOfDays = $this->numberOfParticipans;
    endif;

    return $numberOfDays;
  }

  public function passParticipant()
  {
    $passParticipant = $this->numberOfParticipans + 1;

    return $passParticipant;
  }
}
