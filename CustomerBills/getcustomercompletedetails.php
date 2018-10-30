<?php 
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["role"]))
{
	header("location:../login.php");
}
 
// get database connection
include_once '../config/database.php';
 
// instantiate customer object
include_once '../objects/customerbill.php';
 
$database = new Database();
$db = $database->getConnection();


$customerbill = new CustomerBill($db);
 
// set customer property values

// create the customer
$customercompletedetails = array();
$stmt=$customerbill->viewcustomercompletedetails();

while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
$customercompletedetails[] = $row; // appends each row to the array
}

echo json_encode($customercompletedetails);


