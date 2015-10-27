<?php
    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/27/15
     * Time: 5:35 PM
     */

    namespace Lenv\App\Views;


    class View
    {


        const POSTAction = "POST";
        const GETAction = "GET";


        public function createForm($name,$method,$action)
        {
            $this->form["start"] = '<form action="{$action}" name="{$name}" $method="{$method}">';

            $this->form["end"] = "</form>";

        }


    }