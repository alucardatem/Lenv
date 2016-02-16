<?php

 namespace Lenv\App\Models;

class Newsletter 
{
	public $title = "";
	public $body = "";
	public $author= "";
	public $timeStamp = "";

	public function __construct($databaseHandle)
	{
		$this->dbHandle = $databaseHandle;
	}
	/**
	* @param string $title
	*/
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
     * @return string
     */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	* @param string $body
	*/
	public function setBody($body)
	{
		$this->body = $body;
	}

	/**
     * @return string
     */
	public function getBody()
	{
		return $this->body;
	}

	/**
	* @param string $body
	*/
	public function setAuthor($author)
	{
		$this->author = $author;
	}
	
	/**
     * @return string
     */
	public function getAuthor()
	{
		return $this->author;
	}

	/**
	* @param timestamp $timeStamp
	*/

	public function setTimeStamp($timeStamp)
	{
		$this->timeStamp = $timeStamp;
	}
	
	/**
     * @return string
     */
	public function getTimeStamp()
	{
		return $this->timeStamp;
	}

	public function createNewsTable()
	{
		$query = 'create table newsletter(
											id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
										    title varchar(20),
										    content varchar(500),
										    author varchar(100),
										    timestamp varchar(20)
										    );';
		$connection = $this->dbHandle;
		$result = $connection->query($query);
	}
	
	public function getNews()
	{
		$statement = 'SELECT * from newsletter Order by timeStamp ASC';
		$result = $this->dbHandle->query($statement);
		if(!$result){
			return ['ERROR'];
		}
		$result_arr = array();
		while ($result_arr['newsItem'][] = mysqli_fetch_assoc($result)){}
		
		$result_arr['newsItem'] = array_filter($result_arr['newsItem']);
		//var_dump($result_arr);
		
		//process the query result to see if there are new records or not

		//if records > 0 paginate the results
		return $result_arr;
	}

}