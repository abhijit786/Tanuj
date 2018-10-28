<?php 

if(!isset($_SESSION["username"]) && !isset($_SESSION["role"]))
{
	header("location:../login.php");
}

?>
<?php
class Dailysale{
 
    // database connection and table name
    private $conn;
    private $table_name = "customer";
 
	
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup customer


        function searchcustomers(){
        
       
        // query to insert record

        
        $query = "select * from ".$this->table_name." where customer_created_by='".$_SESSION["username"]."'"; 
        


      
        $sth = $this->conn->query($query);


        return $sth;
        
    }


    function getcustomerdetails($id){
        
       
        // query to insert record

        
        $query = "select * from ".$this->table_name." where customer_created_by='".$_SESSION["username"]."' and customer_id=".$id;
    

      
        $sth = $this->conn->query($query);


        return $sth;
        
    }




    function update_customer_profile($customer_id,$updated_customer_fn,$updated_customer_mn,$updated_customer_ln,$updated_customer_address,$updated_customer_contact_number,$updated_rate_per_can,$updated_rate_per_jar)
    {
          $query = "Update ".$this->table_name." set customer_fn='".$updated_customer_fn."' , customer_mn = '".$updated_customer_mn."', customer_ln = '".$updated_customer_ln."', customer_address = '".$updated_customer_address."', customer_contact_number = '".$updated_customer_contact_number."', rate_per_can = '".$updated_rate_per_can."', rate_per_jar = '".$updated_rate_per_jar."' where customer_created_by='".$_SESSION["username"]."' and customer_id=".$customer_id;
    
         
      
        $sth = $this->conn->query($query);


        return $sth;
    }



 function get_customer_daily_details($customer_id)
    {
          $query = "select * from  daily_entry where customer_id=".$customer_id;
    
         
      
        $sth = $this->conn->query($query);


        return $sth;
    }


   function update_customer_daily_details($customer_id_daily,$taken_can_daily,$return_can_daily,$taken_jar_daily,$return_jar_daily,$paid_amount_daily,$discount_daily,$date_daily)

    {
        

           $query1 = "UPDATE daily_entry set taken_can=taken_can +".$taken_can_daily.",return_can=return_can+".$return_can_daily.",taken_jar=taken_jar+".$taken_jar_daily.",return_jar=return_jar+".$return_jar_daily.",paid_amount=paid_amount+".$paid_amount_daily.",discount=discount+".$discount_daily.",taken_date='".$date_daily."' where customer_id=".$customer_id_daily;
        // prepare query
           
         
        
        $stmt1 = $this->conn->prepare($query1);
        $q1=$stmt1->execute();



        $query2 = "INSERT INTO  daily_entry_history(customer_id,taken_can,return_can,taken_jar,return_jar,paid_amount,discount,taken_date,entry_by) VALUES('".$customer_id_daily."','".$taken_can_daily."','".$return_can_daily."','".$taken_jar_daily."','".$return_jar_daily."','".$paid_amount_daily."','".$discount_daily."','".$date_daily."','".$_SESSION["username"]."')";
        $stmt2 = $this->conn->prepare($query2);
        $q2=$stmt2->execute();

        

        $query3="select * from daily_entry";
        $stmt3= $this->conn->query($query3);
        $q3=$stmt3->execute();
        while( $row = $stmt3->fetch(PDO::FETCH_ASSOC) ) {
        $taken_can_up=$row['taken_can']; 
        $return_can_up=$row['return_can']; 
        $taken_jar_up=$row['taken_jar']; 
        $return_jar_up=$row['return_jar']; 
        $paid_amount_up=$row['paid_amount']; 
        $discount_up=$row['discount']; 

        }

        $query4="select * from customer where customer_id=".$customer_id_daily;
        $stmt4= $this->conn->query($query4);
        $q4=$stmt4->execute();
        while( $row = $stmt4->fetch(PDO::FETCH_ASSOC) ) {
        $rate_per_can=$row['rate_per_can']; 
        $rate_per_jar=$row['rate_per_jar']; 
        }

        $query5="select * from complete_details where customer_id=".$customer_id_daily;
       
        $stmt5= $this->conn->query($query5);
        $q5=$stmt5->execute();
        while( $row = $stmt5->fetch(PDO::FETCH_ASSOC) ) {
        $total_can_frmtable=$row['total_can']; 
        $total_jar_frmtable=$row['total_jar']; 
        $balance_can_frmtable=$row['balance_can']; 
        $balance_jar_frmtable=$row['balance_jar']; 
        $total_amount_frmtable=$row['total_amount']; 
        $total_paid_frmtable=$row['total_paid']; 
        $total_discount_frmtable=$row['total_discount']; 
        $balance_amount_frmtable=$row['balance_amount']; 
        }

        //calculations

        $total_can=$taken_can_up;
        $total_jar=$taken_jar_up;
        $balance_can=($taken_can_up)-($return_can_up);
        $balance_jar=($taken_jar_up)-($return_jar_up);
        $total_amount=($total_can*$rate_per_can)+($total_jar*$rate_per_jar);
        $total_paid=($paid_amount_up);
        $total_discount=($discount_up);
        $balance_amount=($total_amount-$total_paid)-($total_discount);

        






        $query6 = "update complete_details set total_can=".$total_can.",total_jar=".$total_jar.",balance_can=".$balance_can.",balance_jar=".$balance_jar.",total_amount=".$total_amount.",total_paid=".$total_paid.",total_discount=".$total_discount.",balance_amount=".$balance_amount.",entry_date=now(),entry_by='".$_SESSION["username"]."' where customer_id=".$customer_id_daily;
        

        $stmt6 = $this->conn->prepare($query6);
        $q6=$stmt6->execute();




                if($q1 && $q2 && $q3 && $q4 && $q5 && $q6)
        {
            return true;
        }
        return false;


}
    
}




?>