<?php 
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["role"]))
{
	header("location:../login.php");
}
 
// get database connection
include_once '../config/database.php';
 
// instantiate customer object
include_once '../objects/dailysale.php';
 
$database = new Database();
$db = $database->getConnection();

 
$dailysale = new Dailysale($db);
 
// set customer property values
 $q=isset($_POST["query"]);


// create the customer
$customers = array();
$stmt=$dailysale->searchcustomers($q);

while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
$customers[] = $row; // appends each row to the array
}

echo json_encode($customers);










	
	
?>