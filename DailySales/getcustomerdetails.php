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
 $id=$_POST["customer_id"];


// create the customer
$customerdetails = array();
$stmt=$dailysale->getcustomerdetails($id);

while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
$customerdetails[] = $row; // appends each row to the array
}

echo json_encode($customerdetails);


