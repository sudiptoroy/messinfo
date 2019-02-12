<?php 
session_start();
if (@$_SESSION['uemail']!="")
{
include '/global/userlogin_header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Your Profile</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>
<body>

<?php 

//$pass_email=$_POST['pass_email'];
//$uemail="sudiptoroy1122@gmail.com";
$con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
//$pass_email=$_POST['pass_email'];
//$uemail="sudiptoroy1122@gmail.com";
$sql = "SELECT * from userinfo WHERE uemail='$_SESSION[uemail]'";
$result = mysqli_query($con,$sql);

/*echo "<table border='3' align='center'>";
echo "<tr> <th>UniqueID</th> <th>Name</th> <th> Email</th> <th>Password</th> <th>Phone no.</th> <th>Location</th> <th>Mess Name</th> <th>Admin or not</th>  <th>Gender</th> <th>Birthdate</th> <th>Meal Count</th> <th>Blood Group</th>  ";
echo "</tr>";*/
while ($row=mysqli_fetch_array($result))
{
	/*echo "<tr>";//opens row
	echo "<td>".$row ['uid']."</td>";
	echo "<td>" .$row ['uname']. "</td>";
	echo "<td>" .$row ['uemail']. "</td>";
	echo "<td>" .$row ['upassword']. "</td>";
	echo "<td>" .$row ['uphone']. "</td>";
	echo "<td>" .$row ['ulocation']. "</td>";
	echo "<td>" .$row ['mid']. "</td>";
	echo "<td>" .$row ['role']. "</td>";
	echo "<td>" .$row ['ugender']. "</td>";
	echo "<td>" .$row ['ubirthdate']. "</td>";
	echo "<td>" .$row ['umealcount']. "</td>";
	echo "<td>" .$row ['ubloodgroup']. "</td>";
	echo '<br>';
	echo "</tr>";*/
	$uid=$row ['uid'];
	$uname=$row ['uname'];
	$uemail=$row ['uemail'];
	$upassword=$row ['upassword'];
	$uphone=$row ['uphone'];
	$ulocation=$row ['ulocation'];
	$ubirthdate=$row ['ubirthdate'];
	$ubloodgroup=$row ['ubloodgroup'];


}
?>

?>
<div align="center">
<fieldset>
<legend>Edit Information</legend>
<form action="update_action.php" method="POST">
    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
	Name:&nbsp&nbsp<input type="text" name="uname" value="<?php echo $uname; ?>" required> <br><br>
	Email:&nbsp&nbsp<input type="email" name="uemail" value="<?php echo $uemail; ?>" required> <br><br>
	Password:&nbsp&nbsp<input type="password" name="upassword" value="<?php echo $upassword; ?>" required> <br><br>
	Phone no.:&nbsp&nbsp<input type="text" name="uphone" value="<?php echo $uphone; ?>" required> <br><br>
	Location:&nbsp&nbsp<input type="text" name="ulocation" value="<?php echo $ulocation; ?>" required> <br><br>
	Birthdate:&nbsp&nbsp<input type="text" name="ubirthdate" value="<?php echo $ubirthdate; ?>" required> <br><br>
	Blood Group:&nbsp&nbsp<input type="text" name="ubloodgroup" placeholder="Blood Group" value="<?php echo $ubloodgroup; ?>"> <br><br>
	<button type="submit" name="updatebtn" value="update"> Update </button>

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