<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 * Description: Get all participans
 */

 namespace App;

 class GetParticipans extends BergerModel
 {

   public function getAllParticipans()
   {
     return $this->getParticipans();
   }

 }
