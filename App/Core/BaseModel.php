<?php
    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/26/15
     * Time: 12:51 PM
     */

    namespace Lenv\App\Core;


    class BaseModel
    {
        protected $viewModel;
        //create the base and utility objects available to all models on model creation
        public function __construct()
        {
            $this->viewModel = new ViewModel();
            $this->commonViewData();
        }
    }