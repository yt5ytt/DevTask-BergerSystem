<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 * Description: Gets all league pairs of all days
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
