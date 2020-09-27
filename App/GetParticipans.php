<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 */

 namespace App;

 class GetParticipans extends BergerModel
 {

   public function getAllParticipans()
   {
     return $this->getParticipans();     
   }

 }
