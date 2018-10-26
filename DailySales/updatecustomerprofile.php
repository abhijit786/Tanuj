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
 $customer_id=$_POST["customer_id"];
 $updated_customer_fn=$_POST["updated_customer_fn"];
 $updated_customer_mn=$_POST["updated_customer_mn"];
 $updated_customer_ln=$_POST["updated_customer_ln"];
 $updated_customer_address=$_POST["updated_customer_address"];
 $updated_customer_contact_number=$_POST["updated_customer_contact_number"];
 $updated_rate_per_can=$_POST["updated_rate_per_can"];
 $updated_rate_per_jar=$_POST["updated_rate_per_jar"];


// create the customer
$result = array();
$stmt=$dailysale->update_customer_profile($customer_id,$updated_customer_fn,$updated_customer_mn,$updated_customer_ln,$updated_customer_address,$updated_customer_contact_number,$updated_rate_per_can,$updated_rate_per_jar);


if($stmt->execute())
{
	$result=array(
        "status" => "true",
        "message" => "Customer Profile Updated!!"
		
    );
	print_r(json_encode($result));
}
else
{
	$result=array(
        "status" => "false",
        "message" => "Error Updating Customer Data!"
		
    );
	print_r(json_encode($result));
}









	
	
?>