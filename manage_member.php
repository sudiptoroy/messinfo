<?php
session_start();
if (@$_SESSION['uemail']!="")
{

include '/global/userlogin_header.php'; ?>
<DOCTYPE html>
<html lang="en">
<head>
	<title>Add Members</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<br>
<br>
<br>
<br>
	<div align="center">
	  <a href="add_members.php"><button type="button" class="btn btn-primary btn-lg btn-block">Add Members</button></a>
      <a href="member_expenses.php"><button type="button" class="btn btn-default btn-lg btn-block">Members' Expenses</button></a>
      <a href="members_payment.php"><button type="button" class="btn btn-primary btn-lg btn-block">Members' Payment</button></a>
      <a href="member_meal_count.php"><button type="button" class="btn btn-default btn-lg btn-block">Members' Meal</button></a>

		
	</div>
</body>



</html>
<?php include '/global/userlogin_footer.php'; 

}else
{
  header('Location: index.php');
}
?>
