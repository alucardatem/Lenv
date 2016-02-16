<?php

    namespace Lenv\App\Controllers;
    use Lenv\App\Core\BaseController;
    use Lenv\App\Core\Models;
    use Lenv\App\Core\View;
    use Lenv\App\Config\Setup;

class Newsletter extends BaseController
{
	public function __construct(){
		//echo '../Config/setup.ini';
		$this->database = new Setup(__DIR__.'/../Config/setup.ini');
        $this->connection = $this->database->initDatabase();
        $this->newsletter = $this->loadModel('newsletter',$this->connection);

        

	}
	public function indexAction()
	{
		//$this->newsletter->createNewsTable();
		$news = $this->newsletter->getNews();	
		//var_dump($news);
	    return $this->render('views/newsletter/index', $news);
	}
}