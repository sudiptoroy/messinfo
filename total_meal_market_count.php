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
$tmealperday=0;
$texpense=0;
 while ($row=mysqli_fetch_array($result1))
{
  $mid=$row ['mid'];
}
$sql="SELECT * from u_meal WHERE `mid`='$mid'";

$result=mysqli_query($con,$sql);


 while ($row=mysqli_fetch_array($result))
{
  $mmealperday= $row['mmealperday'];
  $tmealperday= $tmealperday+$mmealperday;
 

}


$sql2="SELECT * from super_market_list WHERE `mid`='$mid'";

$result2=mysqli_query($con,$sql2);


 while ($row=mysqli_fetch_array($result2))
{
  $expense= $row['expense'];
  $texpense= $texpense+$expense;
 

}
$mealrate=$texpense/$tmealperday;


?>

<html>
<head>
	<title>Meal Rate</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>
<body>
<div align="center">
<fieldset>
   <legend>Meal Rate</legend>
   <input type="text" name="mealrate" value="<?php echo $mealrate; ?>" >
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