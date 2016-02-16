<?php
namespace Lenv\App\Config;

use Lenv\App\Core\Logger\FileLogger;
use Lenv\App\Core\Logger\LogLevel;

 class Setup
 {
 	public $username 	= "";
 	public $password 	= "";
 	public $host		= "";
 	public $port		= "";
 	public $loader 		= "";
 	public $database 	= "";
 	public $db_setup 	= "";
 	private $filePath	= "";
 	private $fileLogger = "";


 	public function __construct($filename)
 	{
 		$this->filePath = "./logs/setupLogger.log";
 		$this->fileLogger = new FileLogger($this->filePath);

 		$this->loader = parse_ini_file($filename);
 		/*
 		Setting up the database connection parameters
 		*/

 		$this->setUser($this->loader['username']);
 		$this->setHost($this->loader['hostname']);
 		$this->setPort($this->loader['port']);
 		$this->setPassword($this->loader['password']);
 		$this->setDatabase($this->loader['db_name']);

 		 $this->fileLogger->log('initialised setup and read configuration file', LogLevel::INFO);
 		 
        

  	}

 	public function setUser($username)
 	{
 		$this->username = $username;
 	}

 	public function setPassword($password)
 	{
 		$this->password = $password;
 	}
 	public function setHost($host)
 	{
 		$this->host = $host;

 	}
 	public function setPort($port="")
 	{
 		$this->port = $port;
 	}
 	public function setDatabase($database)
 	{
 		$this->database = $database;
 	}

 	public function getUser()
 	{
 		return $this->username;
 	}
 	public function getPassword()
 	{
 		return $this->password;
 	}
 	public function getHost()
 	{
 		return $this->host;
 	}
 	public function getPort()
 	{
 		return $this->port;
 	}

 	public function getDatabase()
 	{
 		return $this->database;
 	}

 	public function initDatabase()
 	{
 		$link = new \mysqli('localhost','root','root','mvcnewsletter');

 		if($link->connect_error)
 		{
 			$this->fileLogger->error('ERROR initialising the database. The error is: '.$link->connect_error);
 		}
 		else
 		{
 			$this->fileLogger->log('Connection Established', LogLevel::INFO);
 			return $link;
 		}

		

 	}
 }
