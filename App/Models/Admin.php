<?php

namespace Lenv\App\Models;

class Admin
{
	public function __construct($databaseHandle)
	{
		$this->dbHandle = $databaseHandle;
	}
}