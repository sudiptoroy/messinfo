<!DOCTYPE html>
<html>
<head>
	<title>Edit Member Expenses</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>
<body>
<?php
session_start();
if (@$_SESSION['uemail']!="")
{
//$mcurrent_users=0;
include '/global/userlogin_header.php'; ?>

<?php 
$con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
$uid = $_GET['uid'];
$sql="SELECT * from rent_and_other_cost WHERE uid='$uid'";


$result = mysqli_query($con,$sql);
while ($row=mysqli_fetch_array($result))
{
	
	$uid=$row ['uid'];
	$uname=$row ['uname'];
	$uhouserent= $row ['uhouserent'];
  $uelectricitybill= $row ['uelectricitybill'];
  $ugasbill= $row ['ugasbill'];
  $uwaterbill= $row ['uwaterbill'];
  $udustbill= $row ['udustbill'];
  $umaidebill= $row ['umaidebill'];
  $uinternetbill= $row ['uinternetbill'];
  $u_m_others= $row ['u_m_others'];
  $umealexpense=$row ['umealexpense'];
	
}
?>
<div align="center">
<fieldset>
<legend>Edit Member Expenses</legend>
<form action="edit_member_expenses_action.php" method="POST">
    <input type="hidden" name="uid" value="<?php echo $uid; ?>">

    Name:&nbsp&nbsp<input type="text" name="uname" placeholder="Name" value="<?php echo $uname; ?>" required> <br><br>

  House Rent:&nbsp&nbsp<input type="text" name="uhouserent" placeholder="Enter House rent" value="<?php echo $uhouserent; ?>"> <br><br>

  Electricity Bill:&nbsp&nbsp<input type="text" name="uelectricitybill" placeholder="Enter Electricity Bill" value="<?php echo $uelectricitybill; ?>" required> <br><br>

  Gas Bill:&nbsp&nbsp<input type="text" name="ugasbill" placeholder="Enter Gas Bill" value="<?php echo $ugasbill; ?>" required> <br><br>

  Water Bill:&nbsp&nbsp<input type="text" name="uwaterbill" placeholder="Enter Water Bill" value="<?php echo $uwaterbill; ?>" required> <br><br>

  Dust Bill:&nbsp&nbsp<input type="text" name="udustbill" placeholder="Enter Dust Bill" value="<?php echo $udustbill; ?>" required> <br><br>

  Maid Bill:&nbsp&nbsp<input type="text" name="umaidbill" placeholder="Enter Maid Bill" value="<?php echo $umaidebill; ?>" required> <br><br>

  Internet Bill:&nbsp&nbsp<input type="text" name="uinternetbill" placeholder="Enter Internet Bill" value="<?php echo $uinternetbill; ?>"> <br><br>

  Other Bills:&nbsp&nbsp<input type="text" name="u_m_others" placeholder="Enter Other Bills" value="<?php echo $u_m_others; ?>"> <br><br>
  <button type="submit" name="exbtn" value="ex"> Submit </button>

</form>

</fieldset>
</div>

<?php include '/global/userlogin_footer.php'; 

}else
{
  header('Location: index.php');
}
?>
</body>
</html>