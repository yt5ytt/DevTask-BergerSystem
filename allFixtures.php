<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 */

 use App\GetDayPairs;

    for($i=1; $i<=$numbers->numberOfDays()*2; $i++){

      $pair = new GetDayPairs($i);

      echo 'Day ' . $i . '<br />';

      foreach($pair->getDayPairs() as $onePair){
        echo $onePair->host . ' : ' . $onePair->guest . '<br />';
      }

      echo '<br />';

    }

    ?>

    <button onclick="newGame()">New Game</button>
