<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 * Description: Get number of participans
 */

 namespace App;

class GetNumberParticipans extends BergerModel
{

  function getNumberParticipans()
  {
    $count = $this->checkParticipants();
    return $count;
  }
}
