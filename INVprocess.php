<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "inv_db";

$itemID = $_POST['itemId'];
$itemName = $_POST['itemName'];
$itemCount = $_POST['itemCount'];

try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	
	//If connection fails
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$conn->beginTransaction();
	
	$stmt = $conn->prepare("INSERT INTO users (itemId, itemName, itemCount) VALUES (:itemId, :itemName, :itemCount)");
    $stmt->bindParam(':itemId', $itemID);
    $stmt->bindParam(':itemName', $itemName);
    $stmt->bindParam(':itemCount', $itemCount);

    $stmt->execute();
	$conn->commit(); 

	echo "New records created successfully";
}
catch(PDOException $e)
{
	$conn->rollback();
	echo "Error: " . $e->getMessage();
}

$conn = null;

header("Location: INV.html");
die();

?>