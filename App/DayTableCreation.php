<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 */

 namespace App;

class DayTableCreation extends BergerModel
{
  private $day;

  public function __construct($day)
  {
    $this->day = $day;
  }

  public function createTables()
  {
    $this->createDayTables($this->day);
  }
}
