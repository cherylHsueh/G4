<?php
	$dsn = "mysql:host=localhost;port=3306;dbname=cd103g4;charset=utf8";
	$user="root";
	$password="1qaz2wsx+";
	$options= array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO($dsn,$user,$password,$options);
?>