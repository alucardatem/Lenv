<?php
    namespace Lenv;

    use Lenv\App\Core\BaseController;
    use Lenv\App\Core\BaseModel;
    use Lenv\App\Core\View;
    use Lenv\App\Core\ViewModel;
    use Lenv\App\Core\Dispatcher;

    require_once __DIR__ . '/vendor/autoload.php';

    $dispatcher = new Dispatcher($_GET);
    $output = $dispatcher->dispatch();
    echo $output;

