<?php

/**
 * @package Berger system
 * @author Aleksandar Safranec <yt5ytt@gmail.com>
 */

 /**
  * Define absolute path and absolute URL to the bergerSystem folder
  */
 define('ABSPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
 define('URL' , $_SERVER['HTTP_REFERER'] . basename(__DIR__) . DIRECTORY_SEPARATOR);

 /**
  * Include header
  */
  include(ABSPATH . 'Includes' . DIRECTORY_SEPARATOR . 'Pages' . DIRECTORY_SEPARATOR . 'header.php');  

  /**
   * Include Composer autoload file
   */
  include(ABSPATH . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

  use App\ParticipansTable;
  use App\GetNumberParticipans;

  new ParticipansTable();
  $count = new GetNumberParticipans();
  if(!$count->getNumberParticipans()):
    echo 'Nema ucesnika jos uvek';
  elseif($count->getNumberParticipans()):
    echo 'Ima ucesnika';
  endif;

/**
 * Include footer
 */
  include(ABSPATH . 'Includes' . DIRECTORY_SEPARATOR . 'Pages' . DIRECTORY_SEPARATOR . 'footer.php');
