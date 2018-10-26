<?php 
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["role"]))
{
	header("location:../login.php");
}
 
// get database connection
include_once '../config/database.php';
 
// instantiate customer object
include_once '../objects/customer.php';
 
$database = new Database();
$db = $database->getConnection();
 
$customer = new Customer($db);
 
// set customer property values


$customer->customer_fn = $_GET["customer_fn"];
$customer->customer_mn = $_GET["customer_mn"];
$customer->customer_ln = $_GET["customer_ln"];
$customer->customer_address=$_GET["customer_address"];
$customer->customer_contact_number=$_GET["customer_contact_number"];
$customer->customer_rate_per_can=$_GET["customer_rate_per_can"];
$customer->customer_rate_per_jar=$_GET["customer_rate_per_jar"];
$customer->customer_created_date=date('Y-m-d H:i:s');
$customer->customer_created_by=$_SESSION["username"];


 

// create the customer
 if($customer->isAlreadyExist()){
     $customer_arr=array(
        "status" => "alreadyexist",
        "message" => "Customer Already Exists!!"
		
    );
	print_r(json_encode($customer_arr));
        }
		else{
			
if($customer->createcustomer()){
    $customer_arr=array(
        "status" => "success",
        "message" => "Customer Successfully created!"
		
    );
	print_r(json_encode($customer_arr));
}
else{
 
 $customer_arr=array(
        "status" => "failure",
        "message" => "Error Addind Customer!!"
		
    );
	print_r(json_encode($customer_arr));
}

}
		
?>