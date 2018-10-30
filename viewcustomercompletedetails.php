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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

 

  <script>
  $(document).ready(function(){
  	
    $("#customer_search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#customer_complete_details_table_body tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
   
   $.ajax({
    type: "POST",
    url: "CustomerBills/getcustomercompletedetails.php",

    success: function(result) {
      $("#customer_complete_details_table").show();
        $('#customer_complete_details_table_body tbody > tr').remove(); 
      console.log(result);
    
    		var json=JSON.parse(result);

        $.each(JSON.parse(result), function(i, customer) {
          
          $('#customer_complete_details_table').append('<tr><td>'+customer.customer_id+'</td>'+'<td>'+customer.customer_fn+" "+customer.customer_mn+" "+customer.customer_ln+'</td>'+'<td>'+customer.total_can+'</td>'+'<td>'+customer.total_jar+'</td>'+'<td>'+customer.balance_can+'</td>'+'<td>'+customer.balance_jar+'</td>'+'<td>'+customer.total_amount+'</td>'+'<td>'+customer.total_paid+'</td>'+'<td>'+customer.total_discount+'</td>'+'<td>'+customer.balance_amount+'</td>');
        });


  
},
error: function (error) {
    console.log(error);
}
});




  });


 


  </script>
</head>
<body>
 
<div class="ui-widget">
  <label for="cust_name">Search : </label>
  <input id="customer_search">
</div>

<table border="1" id="customer_complete_details_table" style="display:none">

<thead>
<tr>

  <td>Customer Id:</td>
  <td>Customer Name:</td>
  <td>Total Can:</td>
  <td>Total Jar:</td>
  <td>Balance Can:</td>
  <td>Balance Jar:</td>
  <td>Total Amount:</td>
  <td>Total Amount Paid:</td>
  <td>Total Discount:</td>
  <td>Balance Amount:</td>
  </tr>

</thead>
<tbody id="customer_complete_details_table_body">
  
</tbody>
</table>

<div>

<span id="customer_complete_details_table_message"></span>
</div>




 
 
</body>
</html>


