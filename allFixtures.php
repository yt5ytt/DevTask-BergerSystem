<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 */

 use App\GetDayPairs;

 ?>

 <div id="fixtures">
   <div class="naslov">
     <h1>All fixtures</h1>
   </div>

  <?php
    for($i=1; $i<=$numbers->numberOfDays()*2; $i++){

      $pair = new GetDayPairs($i);
      echo 'Day ' . $i . '<br />';
      foreach($pair->getDayPairs() as $onePair){
        echo $onePair->host . ' : ' . $onePair->guest . '<br />';
      }

      echo '<br />';

    }
   ?>
   <!-- <div class="dayFixture">
     This is day fixture div
   </div>
   <div class="table">
     This is table div
   </div> -->
 </div>

 <?php

 ?>
