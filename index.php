<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 */

 if(!isset($_POST['upisiEkipu']) and @$_GET['page'] == ''){
   $db = new PDO("mysql:host=localhost", 'root', '');
   $initSql = 'DROP DATABASE berger_system';
   $initResult = $db->prepare($initSql);
   $initResult->execute();

   $createSql = 'CREATE DATABASE berger_system CHARACTER SET utf8mb4 collate=utf8mb4_unicode_520_ci';
   $createResult = $db->prepare($createSql);
   $createResult->execute();
 }

 /**
  * Define absolute path and absolute URL to the bergerSystem folder
  */
 define('ABSPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

 /**
  * Include header
  */
  include('header.php');

  /**
   * Include Composer autoload file
   */
  include(ABSPATH . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

  use App\ParticipansTable;
  use App\GetNumberParticipans;
  use App\InputParticipant;
  use App\GetParticipans;
  use App\Numbers;
  use App\DayTableCreation;
  use App\LastFixtures;
  use App\OtherFixtures;

  new ParticipansTable();
  $count = new GetNumberParticipans();
  $get = new GetParticipans();

  if(isset($_POST['upisiEkipu'])){
    $participant = $_POST['team'];
    $input = new InputParticipant($participant);
    $input->inputParticipant();
  }

  if(@$_GET['page'] != 'startLeague'):
    include('formPage.php');
  else:

    $numbers = new Numbers($count->getNumberParticipans());

    //Sada ide Bergerov sistem ovde... Pravi clase da mogu da rade posao.

    //napraviti tabele za sva kola
    for($i=1; $i<=$numbers->numberOfDays()*2; $i++){
      $tables = new DayTableCreation($i);
      $tables->createTables();
    }

    //uneti meceve poslednjeg na listi u tabele

    $last = new LastFixtures($count->getNumberParticipans(), $numbers->lastParticipant(), $numbers->numberOfDays());
    $last->lastFixtures();

    //uneti meceve ostalih ucesnika

    $other = new OtherFixtures($count->getNumberParticipans(), $numbers->lastParticipant(), $numbers->numberOfDays());
    $other->otherFixtures();


  endif;


/**
 * Include footer
 */
  include('footer.php');
