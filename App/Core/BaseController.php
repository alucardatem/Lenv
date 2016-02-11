<?php
    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/26/15
     * Time: 12:00 PM
     */

namespace Lenv\App\Core;
use Lenv\App\Models;


    class BaseController
    {
        protected $layout = "layout/defaultLayout";

        public function renderView($action,array $params = [] )
        {
            $view = new View();
            return $view->render($action,$params);
        }

        public function render($action, array $params = [])
        {
            $content = $this->renderView($action, $params);
            $viewVars = ['content' => $content];
            return $this->renderView($this->layout, $viewVars);
        }

        public function setLayout($layout)
        {
            $this->layout = $layout;
        }
        public function loadModel($model,$dbLink='')
        {

            $modelName = '\\Lenv\App\Models\\'.ucfirst(strtolower($model));
            $modelInstance = new $modelName($dbLink);
            //var_dump($modelInstance);
            return $modelInstance;
            
        }
    }