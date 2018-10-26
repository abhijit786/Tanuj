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
$customer_id_daily=$_POST["customer_id_daily"];
$taken_can_daily=$_POST["taken_can_daily"];
$return_can_daily=$_POST["return_can_daily"];
$taken_jar_daily=$_POST["taken_jar_daily"];
$return_jar_daily=$_POST["return_jar_daily"];
$paid_amount_daily=$_POST["paid_amount_daily"];
$discount_daily=$_POST["discount_daily"];



// create the customer
$customers = array();
$stmt=$dailysale->update_customer_daily_details($customer_id_daily,$taken_can_daily,$return_can_daily,$taken_jar_daily,$return_jar_daily,$paid_amount_daily,$discount_daily);



if($stmt){
    $customers=array(
        "status" => true
     
    );
    print_r(json_encode($customers));
}
else
{
	    $customers=array(
        "status" => false
     
    );
    print_r(json_encode($customers));
}






