<?php 

if(!isset($_SESSION["username"]) && !isset($_SESSION["role"]))
{
	header("location:../login.php");
}

?>
<?php
class CustomerBill{
 
    // database connection and table name
    private $conn;
    private $table_name = "customer";
 
	
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup customer


    function getcustomerdetails(){
        
       
        // query to insert record

        
        $query = "select * from ".$this->table_name." where customer_created_by='".$_SESSION["username"]."'";
    

      
        $sth = $this->conn->query($query);


        return $sth;
        
    }




    function getcustomerhistory($id){
        
       
        // query to insert record

        
        $query = "select * from daily_entry_history where customer_id='".$id."' order by taken_date";
    

      
        $sth = $this->conn->query($query);


        return $sth;
        
    }


function viewcustomercompletedetails()
{

        $query = "SELECT complete_details.customer_id,customer.customer_fn,customer.customer_mn,customer.customer_ln,complete_details.total_can,complete_details.total_jar,complete_details.balance_can,complete_details.balance_jar,complete_details.total_amount,complete_details.total_paid,complete_details.total_discount,complete_details.balance_amount FROM complete_details INNER JOIN customer on complete_details.customer_id=customer.customer_id and customer.customer_created_by='".$_SESSION["username"]."'";
    

      
        $sth = $this->conn->query($query);


        return $sth;
}


function getcustomerhistorydatewise($id,$date_from,$date_to)
{

     
        $query = "select * from daily_entry_history where customer_id='".$id."' and taken_date between '".$date_from."' and '".$date_to."' order by taken_date";    

   

        $sth = $this->conn->query($query);


        return $sth;
}

function viewcustomercompletedetailsbyid($id)
{

     
        $query = "SELECT complete_details.customer_id,customer.customer_fn,customer.customer_mn,customer.customer_ln,customer.customer_address,customer.customer_contact_number,customer.rate_per_can,customer.rate_per_jar,complete_details.total_can,complete_details.total_jar,complete_details.balance_can,complete_details.balance_jar,complete_details.total_amount,complete_details.total_paid,complete_details.total_discount,complete_details.balance_amount FROM complete_details INNER JOIN customer on complete_details.customer_id=customer.customer_id and customer.customer_created_by='".$_SESSION["username"]."' and customer.customer_id='".$id."'";

   

        $sth = $this->conn->query($query);


        return $sth;
}









}
   






?>