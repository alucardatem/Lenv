<?php
    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/15/15
     * Time: 1:48 PM
     */

    namespace Lenv\app\Core\Logger;

    class FileLogger implements LogInterface
    {
        private $_file;
        /**
         * FileLogger constructor.
         */
        public function __construct($file)
        {
            $this->_file = $file;
        }

        public function log($msg, $logType)
        {

            $logTypeArray = array("info", "warning", "error", "exception","debug");
            if (!in_array($logType, $logTypeArray)) {
                $logType = "info";
            }

            $message = "[" . strtoupper($logType) . "][" . date("H:i:s") . "]-->" . $msg . "\n";
            file_put_contents($this->_file, $message, FILE_APPEND | LOCK_EX);

        }

        public function info($msg)
        {
            $this->log($msg,LogLevel::INFO);
        }

        public function error($msg)
        {
            $this->log($msg,LogLevel::ERROR);
        }

        public function warning($msg)
        {
            $this->log($msg,LogLevel::WARNING);
        }

        public function exception($msg)
        {
            $this->log($msg,LogLevel::EXCEPTION);
        }

        public function debug($msg)
        {
            $this->log($msg,LogLevel::DEBUG);
        }

    }