<?php 

if(!isset($_SESSION["username"]) && !isset($_SESSION["role"]))
{
	header("location:../login.php");
}

?>
<?php
class CustomerSale{
 
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

function getcustomersales($id)
{

        $query = "select * from complete_details where customer_id='".$id."'";
    

      
        $sth = $this->conn->query($query);


        return $sth;
}

}
   






?>