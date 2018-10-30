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


$id=$_POST["id"];

$customerbill = new CustomerBill($db);
 // set customer property values

// create the customer
$customerhistory = array();
$stmt=$customerbill->getcustomerhistory($id);

while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
$customerhistory[] = $row; // appends each row to the array
}

echo json_encode($customerhistory);


