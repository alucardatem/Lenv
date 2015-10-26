<?php
    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/26/15
     * Time: 12:53 PM
     */

    namespace Lenv\App\Core;


    use Lenv\app\Core\Logger\FileLogger;

    class View
    {
        protected $viewFile;
        protected $writeToLog;

        /**
         * View constructor.
         * establish the view location
         * @params $controllerClass
         * @params $action
         *
         */

        public function __construct($controllerClass,$action)
        {
            $controllerName = str_replace("Controller", "", $controllerClass);
            $this->viewFile = "Views/" . $controllerName . "/" . $action . ".php";;
            $this->writeToLog = new FileLogger('viewInstance.log');
        }


        /**
         *
         * set the view output path
         *
         * @param string $template
         *
         */
        public function output($template='maintemplate'){

            $templateFile = "Views/".$template.".php";
            if( file_exists($this->viewFile) ) {
                if( $template ){
                    if(file_exists($templateFile)){
                        require_once($templateFile);
                    }
                    else{
                        $this->writeToLog->error("there is no template file for: ".$templateFile);
                    }
                } else {
                    require_once($this->viewFile);
                }
            } else {
                $this->writeToLog->error("there is no themplate for ".$this->viewFile);
            }
        }


    }