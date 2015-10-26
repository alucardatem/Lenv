<?php
    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/26/15
     * Time: 12:00 PM
     */

    namespace Lenv\App\Core;


    class BaseController{


        protected $urlValues;
        protected $action;
        protected $model;
        protected $view;


        public function __construct($action, $urlValues) {
            $this->action = $action;
            $this->urlValues = $urlValues;

            //establish the view object
            $this->view = new View(get_class($this), $action);
        }

        //execute method that has been requested
        public function executeAction() {
            return $this->{$this->action}();
        }


    }