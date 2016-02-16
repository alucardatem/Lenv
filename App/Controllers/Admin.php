<?php
    namespace Lenv\App\Controllers;
    use Lenv\App\Core\BaseController;
    use Lenv\App\Core\Models;
    use Lenv\App\Core\View;
    use Lenv\App\Config\Setup;

class Admin extends BaseController
{
	public function __construct(){
		//echo '../Config/setup.ini';
		$this->database = new Setup('../Config/setup.ini');
        $this->connection = $this->database->initDatabase();
        $this->admin = $this->loadModel('admin',$this->connection);
	}
	public function indexAction()
    {
    
        return $this->render('views/Admin/index');
    }

    public function newAction()
    {
        if(!isset($_POST['Add'])){
            return $this->indexAction();
        }

        $this->admin->parseData($_POST);
        return $this->render('views/Admin/index');
    }
    

}