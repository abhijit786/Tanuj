<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://crypto-js.googlecode.com/svn/tags/3.0.2/build/rollups/md5.js"></script>

<title>login</title>
</head>
<script>
$(document).ready(function(){
	    $("#signup_button").click(function(){
				var username=$("#username").val();
				var password=$("#password").val();
				
				
$.ajax({
    type: "GET",
    url: "User/signup.php",
    data: {username: username,password: password},
    success: function(result) {
		console.log(result);
        var obj = jQuery.parseJSON(result);
		
if(obj.status==true)
{
	
	$("#message").text("SUccess");
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

<button id="signup_button" >Signup</button>

<div>
<span id="message"></span>
</div>

</body>
</html>



