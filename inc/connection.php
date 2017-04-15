<?php

try{
	$db = new PDO("mysql:host=localhost;dbname=FreshCuts;port=8889","root","root");
	//$db = new PDO("mysql:host=mysql.qhafeezdomain.dreamhosters.com;dbname=freshcutsdb;port=3306","qhafeezdomaindre","3XLjSbBZ");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch(Exception $e) {
	echo $e->getMessage();
	exit;
}
