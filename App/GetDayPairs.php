<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 * Description: Creates all league days DB tables
 */

 namespace App;

class GetDayPairs extends BergerModel
{
  private $day;

  public function __construct($day)
  {
    $this->day = $day;
  }

  public function getDayPairs()
  {
    return $this->dayPairs($this->day);
  }
}
