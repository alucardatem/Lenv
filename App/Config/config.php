<?php
    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/15/15
     * Time: 2:42 PM
     */

    namespace Lenv\app\Config;

    $generalPath = explode('/',dirname(__FILE__));
    $severPath = explode('/',$_SERVER['PHP_SELF']);
    

    $generalPath = array_values(array_filter($generalPath));
    $severPath = array_values(array_filter($severPath));
    unset($severPath[count($severPath)-1]);

    $baseURLPath='/'.implode('/',array_diff($generalPath,$severPath)).'/';

    $mySqlHost = 'localhost';
    $mySqlUserName = 'root';
    $mySqlPassword = 'root';
    $mySqlDatabase = 'newsletter';






