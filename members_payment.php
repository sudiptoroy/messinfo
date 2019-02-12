<!DOCTYPE html>

<?php
session_start();
if (@$_SESSION['uemail']!="")
{
	include '/global/userlogin_header.php';
?>

<html>
<head>
	<title>Member Payments</title>
</head>
<body>
<br>
<br>
<br>
<br>
	<div align="center">
	  <a href="member_bill_payment.php"><button type="button" class="btn btn-primary btn-lg btn-block">Total Bill payments</button></a>
      <a href="#"><button type="button" class="btn btn-default btn-lg btn-block">Total Meal payments</button></a>

		
	</div>
</body>
</html>


<?php include '/global/userlogin_footer.php'; 

}else
{
  header('Location: index.php');
}
?>