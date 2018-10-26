<?php 
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["role"]) )
{
	header("location:dashboard.php");
}

?>


<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<title>Create Customers</title>
</head>
<script>
$(document).ready(function(){
	    $("#create_customer_button").click(function(){
				var customer_fn=$("#customer_fn").val();
				var customer_mn=$("#customer_mn").val();
				var customer_ln=$("#customer_ln").val();
				var customer_address=$("#customer_address").val();
				var customer_contact_number=$("#customer_contact_number").val();
				var customer_rate_per_can=$("#customer_rate_per_can").val();
				var customer_rate_per_jar=$("#customer_rate_per_jar").val();

			
					
		$.ajax({
    type: "GET",
    url: "Customer/create.php",
    data: {customer_fn: customer_fn,customer_mn: customer_mn,customer_ln:customer_ln,customer_address:customer_address,customer_contact_number:customer_contact_number,customer_rate_per_can:customer_rate_per_can,customer_rate_per_jar:customer_rate_per_jar},
    success: function(result) {
		console.log(result);
        var obj = jQuery.parseJSON(result);
		
if(obj.status=="success")
{
	
	$("#message").text(obj.message);
}
else

if(obj.status=="failure")
{
	
	$("#message").text(obj.message);
}
else
if(obj.status=="alreadyexist")
{
	
	$("#message").text(obj.message);
}
	}
});

		





		
		});
});
</script>

<body>



First Name:<input type = "text" id="customer_fn" required>
Middle Name:<input type = "text" id="customer_mn" required>
Last Name:<input type = "text" id="customer_ln"  required>
Address<input type = "text" id="customer_address" required>
Contact Number:<input type = "text" id="customer_contact_number" required>
Rate Per Can:<input type = "text" id="customer_rate_per_can"  required>
Rate Per Jar:<input type = "text" id="customer_rate_per_jar"  required>


<button id="create_customer_button" >Create</button>

<div>
<span id="message"></span>
</div>

</body>
</html>




