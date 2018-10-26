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

$id=$_POST["id"];

$customersale = new CustomerSale($db);
 
// set customer property values

// create the customer
$customersales = array();
$stmt=$customersale->getcustomersales($id);

while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
$customersales[] = $row; // appends each row to the array
}

echo json_encode($customersales);


