<?php 
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["role"]))
{
	header("location:login.php");
}

?>

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<title>Create Customers</title>
</head>
<script>
$(document).ready(function(){


	
    $("#customer_search").keyup(function(){
        
        if($("#customer_search").val()=="")
        {
        $('#customer_table').hide();
        $('#customer_message').hide();
        $('#customer_profile_message').hide();
        }
        else
        {
            search_customer($("#customer_search").val());
            
        }
    });



function search_customer(query) 
{




	$('#customer_table tbody > tr').remove();	

$.ajax({
    type: "POST",
   data: {'query': query},
    url: "DailySales/adddailysale.php",

    success: function(result) {
        console.log(result);


    	var json=JSON.parse(result);
    	if (json.length ==0)
    	{
    		$('#customer_table').hide();
    		$('#customer_message').text("No Users Found!!!");
    		$('#customer_message').show();
    		
    		
    	}
    	else
    	{
    		$('#customer_table').show();
    		$('#customer_message').hide();

        $.each(JSON.parse(result), function(i, customer) {
        	
        	$('#customer_table').append('<tr><td>'+customer.customer_id+'</td>'+'<td>'+customer.customer_fn+'</td>'+'<td>'+customer.customer_mn+'</td>'+'<td>'+customer.customer_ln+'</td>'+'<td>'+customer.customer_address+'</td>'+'<td>'+customer.customer_contact_number+'</td>'+'<td>'+customer.rate_per_can+'</td>'+'<td>'+customer.rate_per_jar+'</td>'+'<td>'+customer.customer_created_date+'</td><td><button onclick="edit_customer_profile('+customer.customer_id+')">Edit Profile</button><button onclick="set_daily_sale('+customer.customer_id+')">Daily Entry</button>');
        });
    	}
},
error: function (error) {
    console.log(error);
}
});
}
$("#customer_edit_btn").click(function()
{
 //$("#customer_table_details").hide();
 //alert("cahnges saved");


           var customer_id= $("#customer_id").val();
           var updated_customer_fn =$("#customer_fn").val();
           var updated_customer_mn= $("#customer_mn").val();
            var updated_customer_ln=$("#customer_ln").val();
            var updated_customer_address=$("#customer_address").val();
             var updated_customer_contact_number=$("#customer_contact_number").val();
              var updated_rate_per_can=$("#rate_per_can").val();
               var updated_rate_per_jar=$("#rate_per_jar").val();

 $.ajax({
    type: "POST",
   data: {'customer_id': customer_id,'updated_customer_fn':updated_customer_fn,'updated_customer_mn':updated_customer_mn,'updated_customer_ln':updated_customer_ln,'updated_customer_address':updated_customer_address,'updated_customer_contact_number':updated_customer_contact_number,'updated_rate_per_can':updated_rate_per_can,'updated_rate_per_jar':updated_rate_per_jar},
    url: "DailySales/updatecustomerprofile.php",
    
    success: function(result) {
    

        var json=JSON.parse(result);
        
        if (json.status =="true")
        {
            $('#customer_table_details').hide();
            $('#customer_table').hide();
            $('#customer_profile_message').text(json.message);
            $('#customer_profile_message').show();
            
            
        }
        else
        {
             $('#customer_table_details').hide();
            $('#customer_table').hide();
            $('#customer_profile_message').text(json.message);
            $('#customer_profile_message').show();
        }
},
error: function (error) {
    console.log(error);
}


});



});


$("#customer_enter_daily_btn").click(function()
{
              var customer_id_daily=  $("#customer_id_daily").val();
              var taken_can_daily= $("#taken_can").val();
              var return_can_daily= $("#return_can").val();
              var taken_jar_daily=   $("#taken_jar").val();
              var return_jar_daily=   $("#return_jar").val();
              var paid_amount_daily=    $("#paid_amount").val();
              var discount_daily= $("#discount").val();

 $.ajax({
    type: "POST",
   data: {'customer_id_daily':customer_id_daily,'taken_can_daily':taken_can_daily,'return_can_daily':return_can_daily,'taken_jar_daily':taken_jar_daily,'return_jar_daily':return_jar_daily,'paid_amount_daily':paid_amount_daily,'discount_daily':discount_daily},
    url: "DailySales/updatecustomerdailydetails.php",
    
    success: function(result) {
      console.log(result);

       var json=JSON.parse(result);
        
        if (json.status ==true)
        {
          $("#customer_daily_entry").hide();
          $("#customer_daily_entry_message").show();
          $("#customer_daily_entry_message").text("Daily Entry Successfully Done");


        }
        else
        {
          $("#customer_daily_entry").hide();
          $("#customer_daily_entry_message").show();
          $("#customer_daily_entry_message").text("Daily Entry Failed!!");
        }


    
},
error: function (error) {
    console.log(error);
}


});
});

	

});


function set_daily_sale(id) 
{

$("#customer_table_details").hide();


$.ajax({
    type: "POST",
   data: {'customer_id': id},
    url: "DailySales/getcustomerdailydetails.php",
    success: function(result) {

        
     
        var json=JSON.parse(result);


        $.each(JSON.parse(result), function(i, customer) {

               $("#customer_daily_entry").show();
          
                $("#customer_id_daily").val(id);
                $("#taken_can").val(customer.taken_can);
                $("#return_can").val(customer.return_can);
                $("#taken_jar").val(customer.taken_jar);
                $("#return_jar").val(customer.return_jar);
                $("#paid_amount").val(customer.paid_amount);
                $("#discount").val(customer.discount);
        });
      
        }
    });



}




function edit_customer_profile(id) 
{
  $("#customer_daily_entry").hide();
console.log(id);
$.ajax({
    type: "POST",
   data: {'customer_id': id},
    url: "DailySales/getcustomerdetails.php",
    success: function(result) {

        console.log(result);
        var json=JSON.parse(result);
        
         $.each(JSON.parse(result), function(i, customer) {

            $("#customer_id").val(customer.customer_id);
            $("#customer_fn").val(customer.customer_fn);
            $("#customer_mn").val(customer.customer_mn);
            $("#customer_ln").val(customer.customer_ln);
            $("#customer_address").val(customer.customer_address);
             $("#customer_contact_number").val(customer.customer_contact_number);
              $("#rate_per_can").val(customer.rate_per_can);
               $("#rate_per_jar").val(customer.rate_per_jar);

         });
        $("#customer_table_details").show();
        }
    });
}
</script>

<body>

<div>
<input type="text" id="customer_search">

</div>
<div>
<table border="1" id="customer_table" style="display:none">
<thead>
<tr>
<td>id</td>
<td>First Name</td>
<td>Middle Name</td>
<td>Last Name</td>
<td>Customer Address</td>
<td>Customer Contact</td>
<td>Rate /Can</td>
<td>Rate/Jar</td>
<td>Date Created</td>
<td>Operation</td>
</tr>
</thead>
<tbody>

</tbody>
</table>



<span style="display:none" id="customer_message"></span>
</div>




<table border="1" id="customer_table_details" style="display:none">
<tbody>
<tr>
<td>id</td>
<td><input type="text" id="customer_id"></td>
</tr>


<tr>
<td>First Name</td>
<td><input type="text" id="customer_fn"></td>
</tr>


<tr>
<td>Middle Name</td>
<td><input type="text" id="customer_mn"></td>
</tr>


<tr>
<td>Last Name</td>
<td><input type="text" id="customer_ln"></td>
</tr>


<tr>
<td>Address</td>
<td><input type="text" id="customer_address"></td>
</tr>

<tr>
<td>Customer Contact Number:</td>
<td><input type="text" id="customer_contact_number"></td>
</tr>

<tr>
<td>Rate Per Can:</td>
<td><input type="text" id="rate_per_can"></td>
</tr>

<tr>
<td>Rate Per Jar:</td>
<td><input type="text" id="rate_per_jar"></td>
</tr>

<tr>
<td></td>
<td><button id="customer_edit_btn">Save</button></td>
</tr>



</tbody>
</table>


<table border="1" id="customer_daily_entry" style="display:none">
<tbody>
<tr>
<td>id</td>
<td><input type="text" id="customer_id_daily"></td>
</tr>


<tr>
<td>Taken Can:</td>
<td><input type="text" id="taken_can"></td>
</tr>


<tr>
<td>Return Can:</td>
<td><input type="text" id="return_can"></td>
</tr>


<tr>
<td>Taken Jars:</td>
<td><input type="text" id="taken_jar"></td>
</tr>


<tr>
<td>Returned jars:</td>
<td><input type="text" id="return_jar"></td>
</tr>

<tr>
<td>Paid Amount:</td>
<td><input type="text" id="paid_amount"></td>
</tr>

<tr>
<td>Discount:</td>
<td><input type="text" id="discount"></td>
</tr>


<tr>
<td></td>
<td><button id="customer_enter_daily_btn">Enter</button></td>
</tr>



</tbody>
</table>




<span style="display:none" id="customer_profile_message"></span>

<span style="display:none" id="customer_daily_entry_message"></span>
</div>


</body>
</html>




