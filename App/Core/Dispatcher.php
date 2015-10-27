<?php
    namespace Lenv\App\Core;


    /**
     * Class Loader
     * @package Lenv\App\Core
     */
    class Dispatcher
    {


        private $controllerName;
        private $controllerClassName;
        private $action;
        private $queryVars;


        /**
         * Get the URL and store it on object creation
         */
        public function __construct($queryVars)
        {

            $this->queryVars = $queryVars;

        }

        public function getControllerClassName()
        {
            $this->controllerClassName = "HomeController";
            if( !empty($this->queryVars['controller']) ) {
                $this->controllerClassName = '\\Lenv\App\Controllers\\'.ucfirst(strtolower($this->queryVars['controller']))."Controller";
            }
            return $this->controllerClassName;


        }

        public function getAction()
        {
            $this->action = "IndexAction";

            if( !empty($this->queryVars["action"]) ) {
                $this->action = ucfirst(strtolower($this->queryVars["action"]))."Action";
            }
            return $this->action;
        }


        /**
         * That establishes the connection to the requested controller
         */
        public function dispatch()
        {

            $controllerClassName = $this->getControllerClassName();
            $methodName = $this->getAction();

            //check if the class exists
            if( !class_exists($controllerClassName) ) {
                throw new \Exception("There is no class ".$controllerClassName);
            }

            $controller = new $controllerClassName;

            if(!method_exists($controller, $methodName) ) {
                    throw new \Exception('There is no method: ' . $controllerClassName . '::' . $methodName);
            }

            return $controller->$methodName();
        }

    }
