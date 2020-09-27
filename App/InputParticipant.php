<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 */

 namespace App;

 class InputParticipant extends BergerModel
 {

   private $participant;

   public function __construct($participant)
   {
     $this->participant = $participant;
   }

   public function inputParticipant()
   {
     $this->setParticipant($this->participant);
   }
 }
