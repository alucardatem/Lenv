<?php
    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/15/15
     * Time: 2:55 PM
     */

    namespace Lenv\App\Core\Logger;


    class LogLevel
    {
        /*const EMERGENCY = 'emergency';
        const ALERT     = 'alert';
        const CRITICAL  = 'critical';*/

        const ERROR     = 'error';
        const WARNING   = 'warning';
        const NOTICE    = 'notice';
        const INFO      = 'info';
        const DEBUG     = 'debug';
        const EXCEPTION     = 'exception';
    }