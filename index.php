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

  if(isset($_POST['upisiEkipu'])){
    $participant = $_POST['team'];
    $input = new InputParticipant($participant);
    $input->inputParticipant();
  }

  if(@$_GET['page'] != 'startLeague'):
    include('formPage.php');
  else:
    if($count->getNumberParticipans() % 2 != 0):
      $input = new InputParticipant('slobodan');
      $input->inputParticipant();
    endif;

    //Sada ide Bergerov sistem ovde... Pravi clase da mogu da rade posao.

  endif;


/**
 * Include footer
 */
  include('footer.php');
