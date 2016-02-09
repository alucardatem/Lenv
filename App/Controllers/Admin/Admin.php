<?php
namespace Lenv\App\Controllers\Admin;
use Lenv\App\Core\BaseController;
use Lenv\App\Core\View;

class Admin
{
	public function indexAction()
        {
            return $this->render('views/Admin/index');
        }

}