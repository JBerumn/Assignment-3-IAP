<?php

$dsn = "mysql:host=localhost;dbname=inv_db";
$dbitemId = 0;
$dbitemName="root";
$dbitemCount=0;

try{
	$pdo = new PDO($dsn,$dbitemId,$dbitemName,$dbitemCount);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCPTION);
}

catch(PDOException $e){
	echo"Connection: ".$e->getMessage();
}




?>