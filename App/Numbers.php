<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 * Description: Sets important numbers
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

  public function lastParticipant()
  {
    if($this->numberOfParticipans % 2 == 0):
      $lastParticipant = $this->numberOfParticipans;
    else:
      $lastParticipant = $this->numberOfParticipans + 1;
    endif;

    return $lastParticipant;
  }
}
