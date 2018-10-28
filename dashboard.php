<?php 
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["role"]) )
{
	header("location:login.php");
}

?>


<html>

<head>
<body>
<?php if( $_SESSION["role"]=="employee") { ?>
<span>Hello !!! <?php echo $_SESSION["username"]; ?></span>
<a href="addcustomers.php"> Add Customers</a>
<a href="adddailysale.php"> Add Daily Entry</a>
<a href="viewcustomerbill.php"> View Customer Bill</a>
<a href="viewcustomercompletedetails.php"> View Customer Complete Details</a>
<a href="#"> </a>
<a href="logoff.php"> logoff</a>
<?php } else if( $_SESSION["role"]=="admin") {?>
<span>Hello !!! <?php echo $_SESSION["username"]; ?></span>
<a href="viewbills.php"> Viewbills</a>
<a href="logoff.php"> logoff</a>
<?php } else if( $_SESSION["role"]=="owner") { ?>
<a href="addusers.php"> addusers</a>
<a href="viewbills.php"> Viewbills</a>
<a href="viewbills.php"> remove Billsd</a>
<a href="viewbills.php"> Remove Users</a>
<a href="logoff.php"> logoff</a>
<?php } ?>


</head>
</body>
</html>


