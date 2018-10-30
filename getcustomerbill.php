<?php 
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["role"]) )
{
	header("location:dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>JQuery- HTML to PDF - https://scotch.io/@nagasaiaytha/generate-pdf-from-html-using-jquery-and-jspdf</title>
  <!--Add External Libraries - JQuery and jspdf 
check out url - https://scotch.io/@nagasaiaytha/generate-pdf-from-html-using-jquery-and-jspdf
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/bill/style.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
  
    

<script>
	 $(document).ready(function(){

$.ajax({
  type: 'POST',
  url: "bill.php",
  dataType: 'html',
  data: FormData,
  success: function (response){
     //supposing you have an html element where you want to append 
     //the response, with an id like appendResponse
     $('#content').html(response);

let doc = new jsPDF('p','pt',[297, 210]);
doc.addHTML(document.body,function() {
    doc.save('html.pdf');
});

  }
});







	 });






</script>  
</head>

<body id="content">









</body>

</html>
