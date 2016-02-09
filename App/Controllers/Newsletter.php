<?php

namespace Lenv\App\Controllers;
use Lenv\App\Core\BaseController;
use Lenv\App\Core\View;

class Newsletter{
	public function indexAction()
	{
	    return $this->render('views/newsletter/index');
	}
}