<?php 
session_start();
if (@$_SESSION['uemail']!="")
{
include '/global/userlogin_header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Mess Cost</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>
<body>

<?php 

//$pass_email=$_POST['pass_email'];
//$uemail="sudiptoroy1122@gmail.com";
$con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
//$pass_email=$_POST['pass_email'];
//$uemail="sudiptoroy1122@gmail.com";
//$mid_temp=@$_SESSION['mid'];
//echo $mid_temp;
//echo @$_SESSION['mid'];
$sql2="SELECT mid from userinfo WHERE uid='$_SESSION[uid]'";

$result2 = mysqli_query($con,$sql2);

while ($row=mysqli_fetch_array($result2))
{
	 $mid=$row ['mid'];
}
$sql = "SELECT * from messinformation WHERE mid='$mid'";
$result = mysqli_query($con,$sql);
while ($row=mysqli_fetch_array($result))
{

	
	$mmealperday=$row ['mmealperday'];
	$mhouserent=$row ['mhouserent'];
	$melectricitybill=$row ['melectricitybill'];
	$mwaterbill=$row ['mwaterbill'];
	$mgasbill=$row ['mgasbill'];
	$mdustbill=$row ['mdustbill'];
	$mmaidbill=$row ['mmaidbill'];
	$minternetbill=$row ['minternetbill'];
	$m_others=$row ['m_others'];
}
?>
<div align="center">
<fieldset>
<legend>Manage Mess Cost</legend>
<form action="manage_mess_cost_action.php" method="POST">
    <input type="hidden" name="mid" value="<?php echo $mid; ?>">
    Meal Per day:&nbsp&nbsp<input type="text" name="mmealperday" placeholder="Enter Meal Per Day" value="<?php echo $mmealperday; ?>" required> <br><br>
	House Rent:&nbsp&nbsp<input type="text" name="mhouserent" placeholder="Enter House rent" value="<?php echo $mhouserent; ?>" required> <br><br>
	Electricity:&nbsp&nbsp<input type="text" name="melectricitybill" placeholder="Enter Electricity Bill" value="<?php echo $melectricitybill; ?>" required> <br><br>
	Water Bill:&nbsp&nbsp<input type="text" name="mwaterbill" placeholder="Enter Water Bill" value="<?php echo $mwaterbill; ?>" required> <br><br>
	Gas Bill:&nbsp&nbsp<input type="text" name="mgasbill" placeholder="Enter Gas Bill" value="<?php echo $mgasbill; ?>" required> <br><br>
	Dust Bill:&nbsp&nbsp<input type="text" name="mdustbill" placeholder="Enter Dust Bill" value="<?php echo $mdustbill; ?>" required> <br><br>
	Maid Bill:&nbsp&nbsp<input type="text" name="mmaidbill" placeholder="Enter Maid Bill" value="<?php echo $mmaidbill; ?>" required> <br><br>
	Internet Bill:&nbsp&nbsp<input type="text" name="minternetbill" placeholder="Enter Internet Bill" value="<?php echo $minternetbill; ?>"> <br><br>
	Other Bills:&nbsp&nbsp<input type="text" name="m_others" placeholder="Enter Internet Bill" value="<?php echo $m_others; ?>"> <br><br>
	<button type="submit" name="submitbtn" value="submit"> Submit </button>

</form>

</fieldset>
</div>
</body>

 <?php include '/global/userlogin_footer.php'; 

 }else
{
  header('Location: index.php');
}

?>
 </html>