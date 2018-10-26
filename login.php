<?php 
session_start();
if(isset($_SESSION["username"]) && isset($_SESSION["role"]) )
{
	header("location:dashboard.php");
}

?>


<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<title>login</title>
</head>
<script>
$(document).ready(function(){
	    $("#login_button").click(function(){
				var username=$("#username").val();
				var password=$("#password").val();
				var role=$("#role").val();

				
$.ajax({
    type: "GET",
    url: "User/login.php",
    data: {username: username,password: password,role:role},
    success: function(result) {
		console.log(result);
        var obj = jQuery.parseJSON(result);
		
if(obj.status==true)
{
	
	window.location.href = "dashboard.php";

}
else
{
	$("#message").text("Failure");
   }
	}
});
		});
});
</script>

<body>



<input type = "text" id="username">
<input type = "password" id="password">
<select id="role">
<option id="admin" value="admin">Admin</option>
<option id="user" value="employee">Employee</option>
<option id="owner" value="owner">Owner</option>
</select>


<button id="login_button" >Login</button>

<div>
<span id="message"></span>
</div>

</body>
</html>



