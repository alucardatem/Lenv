<?php

namespace Lenv\App\Models;

class Admin
{
	public $mvcID;
	public $title;
	public $content;
	public $author;
	public $timeStamp;


	public function __construct($databaseHandle)
	{
		$this->dbHandle = $databaseHandle;
	}

	public function parseData($postData)
	{
		$this->title = $postData['add_news_title'];
		$this->content = $postData['add_news_content'];
		$this->author = $postData['add_news_author'];
		$this->timeStamp = date('Y-m-d H:i:s');

		$this->addNews();
	}

	public function addNews(){
		$query = 'insert into newsletter(title,content,author,timestamp) values("'.$this->title.'","'.$this->content.'","'.$this->author.'","'.$this->timeStamp.'");';
		$result = $this->dbHandle->query($query);

	}

}