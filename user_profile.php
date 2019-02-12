<?php 
session_start();
if (@$_SESSION['uemail']!="")
{
include '/global/userlogin_header.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
</head>
<body>
<!--<input type="text"  value="<?php echo $_SESSION['uemail']; ?>" />-->
 <?php 
  if(@$_SESSION['message']!=""){
echo @$_SESSION['message'];
@$_SESSION['message']="";
  }  ?>
<?php
$con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
//$pass_email=$_POST['pass_email'];
//$uemail="sudiptoroy1122@gmail.com";
$sql = "SELECT * from userinfo WHERE uemail='$_SESSION[uemail]'";
$result = mysqli_query($con,$sql);

echo "<table border='3' align='center'>";
echo "<tr> <th>UniqueID</th> <th>Name</th> <th> Email</th> <th>Password</th> <th>Phone no.</th> <th>Location</th> <th>Mess Name</th> <th>Admin or not</th>  <th>Gender</th> <th>Birthdate</th> <th>Meal Count</th> <th>Blood Group</th>  ";
echo "</tr>";
while ($row=mysqli_fetch_array($result))
{
	echo "<tr>";//opens row
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
	echo "</tr>";
}
echo "</table>";
?>
<br>
<br>
<div align="center">
<a href="edit_user_profile.php"><button type="" name="editbtn" value="UPDATE"> Edit </button></a>
</div>
<?php include '/global/userlogin_footer.php'; 
}else{
	header('Location: index.php');
}
?>

</body>
</html>