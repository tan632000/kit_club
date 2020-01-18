<?php 
	$connect = new PDO('mysql:host=localhost' , 'root' ,'');

	$sql = "CREATE DATABASE IF NOT EXISTS kit_schedule CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' ;";
	$connect -> exec($sql);

	$connect = new PDO('mysql:host=localhost;dbname=kit_schedule' , 'root' ,'');

	$sql = "CREATE TABLE IF NOT EXISTS tkb (
		id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		fullname VARCHAR(255) NOT NULL,
		username VARCHAR(255) NOT NULL,
		password VARCHAR(255) NOT NULL,
		text VARCHAR(20000) NOT NULL
)ENGINE=Innodb;";
	
	$connect ->exec($sql);

 ?>