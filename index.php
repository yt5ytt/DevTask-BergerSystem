<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 */

 /**
  * DB creation for new game
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

  /**
   * Insert participans one by one
   */
  if(isset($_POST['upisiEkipu'])){
    $participant = $_POST['team'];
    $input = new InputParticipant($participant);
    $input->inputParticipant();
  }

  /**
   * If Start League is pressed, game begins
   */
  if(@$_GET['page'] != 'startLeague'):
    /**
     * Includes Form Page for insert participans
     */
    include('formPage.php');
  else:

    /**
     * Set important numbers
     */
    $numbers = new Numbers($count->getNumberParticipans());

    /**
     * Table creation for all days of league
     */
    for($i=1; $i<=$numbers->numberOfDays()*2; $i++){
      $tables = new DayTableCreation($i);
      $tables->createTables();
    }

    /**
     * Insert matches of last league number participant
     */
    $last = new LastFixtures($count->getNumberParticipans(), $numbers->lastParticipant(), $numbers->numberOfDays());
    $last->lastFixtures();

    /**
     * Insert matches of other participants
     */
    $other = new OtherFixtures($count->getNumberParticipans(), $numbers->lastParticipant(), $numbers->numberOfDays());
    $other->otherFixtures();

    include('allFixtures.php');


  endif;


/**
 * Include footer
 */
  include('footer.php');
