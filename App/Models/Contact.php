<?php
    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/27/15
     * Time: 5:21 PM
     */

    namespace Lenv\App\Models;

    class Contact
    {
        public $from = "";
        public $to = [];
        public $message = "";
        public $name = "";
        public $phone = "";


        public function setName($name)
        {
            $this->name = $name;
        }

        public function getName()
        {
            return $this->name;
        }



        public function setFrom($name,$fromEmail)
        {

            $this->from = $name. "&lt;" . $fromEmail . "&gt;";
        }


        public function setTo($name,$toEmail)
        {

            $this->to = $name. " &lt;" . $toEmail . "&gt;";
        }


        public function getFrom()
        {
            return $this->from;
        }

        public function getTo()
        {
            return $this->to;
        }

        /**
         * @return string
         */
        public function getMessage()
        {
            return $this->message;
        }

        /**
         * @param string $message
         */
        public function setMessage($message)
        {
            $this->message = $message;
        }




    }
