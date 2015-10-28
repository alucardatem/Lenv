<?php
    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/28/15
     * Time: 1:14 PM
     */

    namespace Lenv\App\Core;


    class View
    {
        public function render($view,array $params = [])
        {
            extract($params);

            ob_start();
            require __DIR__."/../" . $view . ".php";
            $output = ob_get_contents();
            ob_end_clean();

            return $output;
        }
    }