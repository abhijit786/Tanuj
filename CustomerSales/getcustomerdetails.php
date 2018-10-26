<?php 
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["role"]))
{
	header("location:../login.php");
}
 
// get database connection
include_once '../config/database.php';
 
// instantiate customer object
include_once '../objects/customersale.php';
 
$database = new Database();
$db = $database->getConnection();

 
$customersale = new CustomerSale($db);
 
// set customer property values

// create the customer
$customerdetails = array();
$stmt=$customersale->getcustomerdetails();

while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
$customerdetails[] = $row; // appends each row to the array
}

echo json_encode($customerdetails);


