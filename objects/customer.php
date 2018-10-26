<?php
class Customer{
 
    // database connection and table name
    private $conn;
    private $table_name = "customer";
 
    // object properties
    public $customer_id;
    public $customer_fn;
    public $customer_mn;
    public $customer_ln;
    public $customer_address;
    public $customer_contact_number;
    public $customer_rate_per_can;
    public $customer_rate_per_jar;
    public $customer_created_date;
    public $customer_created_by;

	
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup customer
    function createcustomer(){
		
       
        // query to insert record
		
		$this->customer_fn = !empty($this->customer_fn) ? "'".$this->customer_fn."'" : "null";
        $this->customer_mn = !empty($this->customer_mn) ? "'".$this->customer_mn."'" : "null";
        $this->customer_ln = !empty($this->customer_ln) ? "'".$this->customer_ln."'" : "null";


		
        $query1 = "INSERT INTO  ". $this->table_name ." (customer_fn,customer_mn,customer_ln,customer_address,customer_contact_number,rate_per_can,rate_per_jar,customer_created_date,customer_created_by) VALUES (".$this->customer_fn.",".$this->customer_mn.",".$this->customer_ln.",'".$this->customer_address."','".$this->customer_contact_number."','".$this->customer_rate_per_can."','".$this->customer_rate_per_jar."','".$this->customer_created_date."','".$this->customer_created_by."')";

        // prepare query
        $stmt1 = $this->conn->prepare($query1);
        $q1=$stmt1->execute();


        $query2="select customer_id from customer where customer_fn=".$this->customer_fn." and customer_mn=".$this->customer_mn." and customer_ln=".$this->customer_ln."";
        
        $stmt2= $this->conn->query($query2);
        while( $row = $stmt2->fetch(PDO::FETCH_ASSOC) ) {
        $customer_id=$row['customer_id']; // appends each row to the array
        }



        $query3 = "INSERT INTO daily_entry(customer_id,taken_can,return_jar,taken_jar,return_can,paid_amount,discount,taken_date,entry_by) VALUES (".$customer_id.",0,0,0,0,0,0,now(),'".$this->customer_created_by."')";
        
        // prepare query
        $stmt3 = $this->conn->prepare($query3);
        

         $query4 = "INSERT INTO complete_details(customer_id,total_can,total_jar,balance_can,balance_jar,total_amount,total_paid,total_discount,balance_amount,entry_date,entry_by) VALUES (".$customer_id.",0,0,0,0,0,0,0,0,now(),'".$this->customer_created_by."')";
       

        // prepare query
        $stmt4 = $this->conn->prepare($query4);
		
      
      
      $q2=$stmt2->execute();
      $q3=$stmt3->execute();
      $q4=$stmt4->execute();
      


    
        // execute query
        if($q1 && $q2 && $q3 && $q4){
          
            return true;
        }
    
        return false;
        
    }

	
    function isAlreadyExist(){
		
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                customer_fn='".$this->customer_fn."' and customer_mn='".$this->customer_mn."' and customer_ln='".$this->customer_ln."'";
				
				
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
		
		
		
        if(count($stmt->fetchAll()) > 0){
            return true;
			
        }
        else{
            return false;
        }
    }
}
?>