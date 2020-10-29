<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 * Description: Create participans DB table
 */

 namespace App;

class ParticipansTable extends BergerModel
{

  function __construct()
  {
    $this->setParticipansTable();
  }
}
