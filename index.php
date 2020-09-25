<?php

  /**
   * @package Berger system
   */

  /**
   * Define absolute path to the bergerSystem folder
   */
  define('ABSPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

  /**
   * Define absolute url to the bergerSystem folder
   */
   define('URL' , $_SERVER['HTTP_REFERER'] . basename(__DIR__) . DIRECTORY_SEPARATOR);

  /**
   * Include Composer autoload file
   */   
  include(ABSPATH . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

  use App\ParticipansTable;

  new ParticipansTable();

  include(ABSPATH . 'Includes' . DIRECTORY_SEPARATOR . 'indexPage.php');
