<?php 
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["role"]) )
{
	header("location:dashboard.php");
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="css/jquery/jquery-ui.css">
 
  <script src="js/jquery/jquery-1.12.4.js"></script>
  <script src="js/jquery/jquery-ui.js"></script>
  <script>
  $(document).ready(function(){
  	
   
   $.ajax({
    type: "POST",
    url: "CustomerSales/getcustomerdetails.php",

    success: function(result) {
    		var json=JSON.parse(result);
    		console.log(result);
        var finalData =$.map(json, function(customer) {
	 		
	 	    	  return {
	 	    		   label:customer.customer_fn+" "+customer.customer_mn+" "+customer.customer_ln,
	 	    		   id:customer.customer_id
	 	    		     
				}
	 		   
	 	       });



    $( "#cust_name" ).autocomplete({
      source: finalData,
      select: function( event, ui ) {

  console.log(view_customer_sales(ui.item.id,ui.item.label));

    
}

    });


  
},
error: function (error) {
    console.log(error);
}
});




  });


  function view_customer_sales(id,name)
  {
  	$("#customer_sales").hide();
  	 $.ajax({
  	data:{'id':id},
    type: "POST",
    url: "CustomerSales/getcustomersales.php",

    success: function(result) {
    	
    	var json=JSON.parse(result);
    	
    	if(json.length ==0)
    	{

    		return false;

    	}
    	else
    	{
    	$.each(JSON.parse(result), function(i, customer) {


    			$("#cust_id").text(id);
    			$("#cust_name_tb").text(name);
    			$("#cust_totalcan").text(customer.total_can);
    			$("#cust_totaljar").text(customer.total_jar);
    			$("#cust_balancecan").text(customer.balance_can);
    			$("#cust_balancejar").text(customer.balance_jar);
    			$("#cust_totalamount").text(customer.total_amount);
    			$("#cust_totalamountpaid").text(customer.total_paid);
    			$("#cust_totaldiscount").text(customer.total_discount);
    			$("#cust_balanceamount").text(customer.balance_amount);

    			$("#customer_sales").show();


    	});
    	return true;
    }

        	

    },
error: function (error) {
    console.log(error);
}
});

  }
  </script>
</head>
<body>
 
<div class="ui-widget">
  <label for="cust_name">Search : </label>
  <input id="cust_name">
</div>

<div id="customer_sales" style="display:none">
  Customer Id:<span id="cust_id"></span><br>
  Customer Name:<span id="cust_name_tb"></span><br>
  Total Can:<span id="cust_totalcan"></span><br>
  Total Jar:<span id="cust_totaljar"></span><br>
  Balance Can:<span id="cust_balancecan"></span><br>
  Balance Jar:<span id="cust_balancejar"></span><br>
  Total Amount:<span id="cust_totalamount"></span><br>
  Total Amount Paid:<span id="cust_totalamountpaid"></span><br>
  Total Discount:<span id="cust_totaldiscount"></span><br>
  Balance Amount:<span id="cust_balanceamount"></span><br>

</div>

<div>

<span id="customer_sales_message"></span>
</div>


 
 
</body>
</html>


