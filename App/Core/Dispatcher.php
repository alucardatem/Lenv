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
            if( empty($this->queryVars['controller']) ) {
                $this->controllerName = "home";
                $this->controllerClassName = "HomeController";
                return '\\Lenv\App\Controllers\\'.$this->controllerClassName;
            }

                $this->controllerName = strtolower($this->queryVars['controller']);
                $this->controllerClassName = ucfirst(strtolower($this->queryVars['controller']))."Controller";
                return '\\Lenv\App\Controllers\\'.$this->controllerClassName;


        }

        public function getAction()
        {
            if( empty($this->queryVars["action"]) ) {
                $this->action = "IndexAction";
                return $this->action;
            } else {
                $this->action = ucfirst(strtolower($this->queryVars["action"]))."Action";
                return $this->action;
            }
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
                    throw new \Exception('There is no method:' . $controllerClassName . '::' . $methodName);
            }

            return $controller->$methodName();
        }

    }
