<?php
    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/26/15
     * Time: 12:52 PM
     */

    namespace Lenv\App\Core;


    class ViewModel
    {
        //add a property or method to the ViewModel
        public function set($name,$val) {
            $this->$name = $val;
        }

        //returns the requested property value
        public function get($name) {
            if (isset($this->{$name})) {
                return $this->{$name};
            } else {
                return null;
            }
        }
    }