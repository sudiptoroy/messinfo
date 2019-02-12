<!DOCTYPE html>
<?php
session_start();
if (@$_SESSION['uemail']!="")
{

include '/global/userlogin_header.php'; 
include('config/con_db.php');
?>
<?php
$sql1="SELECT * FROM userinfo WHERE uemail='$_SESSION[uemail]'";
$result1=mysqli_query($con,$sql1);
$totalmeal=0;
while ($row=mysqli_fetch_array($result1))
{
  $uid=$row ['uid'];
}

$sql="SELECT * from u_meal WHERE uid='$uid'";
$result=mysqli_query($con,$sql);

while ($row=mysqli_fetch_array($result))
{
  $mmealperday=$row ['mmealperday'];
  $totalmeal=$totalmeal+$mmealperday;

}

?>

<html>
<head>
	<title>Total Meal</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>
<body>
   <div align="center">
   <fieldset>
   	<legend>Total Meal</legend>
   	<input type="text" name="totalmeal" value="<?php echo $totalmeal; ?>" disabled>
   </fieldset>
   </div>
</body>
</html>
<?php include '/global/userlogin_footer.php'; 

}else
{
  header('Location: index.php');
}
?>