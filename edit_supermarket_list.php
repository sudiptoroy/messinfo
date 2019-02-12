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
$date1 = $_GET['date'];
$sql="SELECT * from super_market_list WHERE uid='$uid' AND date='$date1' ";

 $sql1="SELECT * FROM userinfo WHERE uemail='$_SESSION[uemail]'";
 $result1=mysqli_query($con,$sql1);

 while ($row=mysqli_fetch_array($result1))
{
  $mid=$row ['mid'];
}

$sql2="SELECT * from userinfo WHERE mid='$mid'";
$result2=mysqli_query($con,$sql2);

$result = mysqli_query($con,$sql);
while ($row=mysqli_fetch_array($result))
{
	$mid=$row ['mid'];
	$uid=$row ['uid'];
	$uname=$row ['uname'];
	$date=$row ['date'];
	$expense=$row ['expense'];
	
}
?>
<div align="center">
<fieldset>
<legend>Edit Super Market List of Members</legend>
<form action="edit_supermarket_list_action.php" method="POST">
    <!-- <input type="hidden" name="mid" value="<?php echo $mid; ?>"> -->
    <!-- <input type="hidden" name="uid" value="<?php echo $uid; ?>"> -->

    Name:&nbsp&nbsp<input type="text" name="uname" disabled  value="<?php echo $uname; ?>"> <br><br>
    <h4>Members: <select name="uid" required>
     <?php while($row = mysqli_fetch_array($result2)):;?>
      <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
       <?php endwhile;?>
     </select>
    </h4>
    Date:&nbsp&nbsp<input type="text" disabled value="<?php echo $date; ?>"> <br><br>
    Expense:&nbsp&nbsp<input type="text" name="expense" value="<?php echo $expense; ?>"> <br><br>
	<button type="submit" name="slistupdatebtn" value="slistbtn"> Update </button>

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