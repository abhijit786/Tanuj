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
$date_from=$_POST["date_from"];
$date_to=$_POST["date_to"];

$customerbill = new CustomerBill($db);
 // set customer property values

// create the customer
$customerhistorydatewise = array();
$stmt=$customerbill->getcustomerhistorydatewise($id,$date_from,$date_to);

while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
$customerhistorydatewise[] = $row; // appends each row to the array
}

echo json_encode($customerhistorydatewise);


