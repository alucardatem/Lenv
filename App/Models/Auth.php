<?php

namespace Lenv\App\Models;

class Auth
{
	private $dbHandle;
	private $salt = '87sjbe8';

	public function __construct($databaseHandle){
		$this->dbHandle = $databaseHandle;
	}

	public function validateLogin($user,$pass){
	
		if($stmt = $this->dbHandle->prepare("SELECT * from users where username = ? and password = ?")){
			$pwd = base64_encode(md5($pass,$this->salt));
			$stmt->bind_param("ss",$user,$pwd);
			$stmt->execute();
			$stmt->store_result();
			
			if($stmt->num_rows > 0){
				$stmt->close();
				$_SESSION['loggedid'] = 1;
				return 1;
			}
			$stmt->close();
			return 0;
		}
		return 1;
	}

	public function checkLoginStatus()
	{
		if(isset($_SESSION['loggedid'])){
			return 1;
		}
		return 0;
	}

	public function logout()
	{
		session_destroy();
		session_start();
		return 1;
	}
}