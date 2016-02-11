<?php
    namespace Lenv;

    use Lenv\App\Core\Dispatcher;


    error_reporting('0');
    ini_set("display_errors", 0);

    require_once __DIR__ . '/vendor/autoload.php';



    $dispatcher = new Dispatcher($_GET);
    $dispatched = $dispatcher->dispatch();
    echo $dispatched;


