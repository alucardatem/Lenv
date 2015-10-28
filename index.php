<?php
    namespace Lenv;

    use Lenv\App\Core\Dispatcher;

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once __DIR__ . '/vendor/autoload.php';

    $dispatcher = new Dispatcher($_GET);
    $dispatched = $dispatcher->dispatch();
    echo $dispatched;


