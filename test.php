<?php
$clientIP = $_SERVER["REMOTE_ADDR"];
$table = shell_exec("arp -an | grep '".$clientIP."'");
$table = explode(" ",$table);
$table = array_values(array_filter($table));

foreach($table as $key => $value){
	if(strstr($value,":")){
		echo $clientIP."---".$value."\n";
		break;
	}
}

