<?php
    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/15/15
     * Time: 2:41 PM
     */
    namespace Lenv\App\Core\Logger;

    interface LogInterface
    {
        public function info($msg);
        public function error($msg);
        public function warning($msg);
        public function log($msg, $logType);
        public function exception($msg);
        public function debug($msg);
    }