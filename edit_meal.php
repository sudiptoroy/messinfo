<!DOCTYPE html>
<html>
<head>
  <title>Edit Super Market List</title>
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
$date = $_GET['date'];
$sql="SELECT * from u_meal WHERE `uid`='$uid' AND `date`='$date' ";

 /*$sql1="SELECT * FROM userinfo WHERE uemail='$_SESSION[uemail]'";
 $result1=mysqli_query($con,$sql1);

 while ($row=mysqli_fetch_array($result1))
{
  $mid=$row ['mid'];
}*/

//$sql2="SELECT * from userinfo WHERE mid='$mid'";
//$result2=mysqli_query($con,$sql2);

$result = mysqli_query($con,$sql);
while ($row=mysqli_fetch_array($result))
{
  
  $uname=$row ['uname'];
  $date=$row ['date'];
  $mmealperday=$row ['mmealperday'];
  
}
?>
<div align="center">
<fieldset>
<legend>Edit Meal</legend>

    <!-- <input type="hidden" name="mid" value="<?php echo $mid; ?>"> -->
    <!-- <input type="hidden" name="uid" value="<?php echo $uid; ?>"> -->

    Name:&nbsp&nbsp<input type="text" name="uname" disabled  value="<?php echo $uname; ?>"> <br><br>
  <form action="edit_meal_action.php" method="POST">
    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
    Date:&nbsp&nbsp<input type="text" name="date" disabled value="<?php echo $date; ?>"> <br><br>

    Meal-Per-Day:&nbsp&nbsp<input type="text" name="mmealperday" value="<?php echo $mmealperday; ?>"> <br><br>
  <button type="submit" name="editbtn" value="EDIT"> Update </button>

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