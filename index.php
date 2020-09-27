<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 */

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

  new ParticipansTable();
  $count = new GetNumberParticipans();
  $get = new GetParticipans();

  include('formPage.php');

  if(isset($_POST['upisiEkipu'])){
    $participant = $_POST['team'];
    $input = new InputParticipant($participant);
    $input->inputParticipant();
  }


/**
 * Include footer
 */
  include('footer.php');
