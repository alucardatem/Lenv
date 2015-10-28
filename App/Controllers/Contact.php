<?php
    /**
     * Created by PhpStorm.
     * User: danr
     * Date: 10/27/15
     * Time: 5:20 PM
     */

    namespace Lenv\App\Controllers;
    use Lenv\App\Core\BaseController;
    use Lenv\App\Core\View;


    class Contact extends BaseController
    {

        public function indexAction()
        {
            return $this->render('views/contact/index');
        }

        public function resultAction()
        {
            if (!isset($_POST["Send"])) {
                return $this->indexAction();
            }

            $viewVars = $_POST;
            $viewVars["To"] = "vlad.balmos@code932.com";
            $_SESSION= $viewVars;


            $checkFields = $this->checkFields($_SESSION);
            $_SESSION = array_merge($_SESSION,$checkFields);


            if(count($checkFields)>0)
            {
                return $this->render('views/contact/index',$_SESSION);
            }

            return $this->render('views/contact/sendData',$viewVars);

        }

        public function checkFields(array $fields)
        {
            $errorData = [];
            if (!$fields["From"]) {
                $errorData["fromError"] ="no email address completed";
            }
            if (!$fields["Name"]) {
                $errorData ["nameError"] ="please fill in the name";
            }
            if (!$fields["Phone"]) {
                $errorData["phoneError"] = "please fill in the phonenumber";
            }
            if (!$fields["Message"]) {
                $errorData ["messageError"]= "please fill in the the message that you wish to deliver";
            }

            return $errorData;
        }


    }