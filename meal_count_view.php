<?php 
session_start();
if (@$_SESSION['uemail']!="")
{
include '/global/userlogin_header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>View Meals</title>
</head>
<body>
<nav class="navbar navbar-default" role="navigation"><!-- Navigarion bar in home page -->
    <div class="container">
    <ul class="nav navbar-nav">
      <li><a href="home.php">Home</a></li>
      <li><a href="#">Search</a></li>
      <li><a href="user_profile.php">Profile</a></li>
      <li><a href="#">Account Settings</a></li>
      <li><a href="view_mess.php">View Mess Details</a></li>
    </ul>
    </div>
      



    </nav> 
<?php 
 $con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
//$pass_email=$_POST['pass_email'];
//$uemail="sudiptoroy1122@gmail.com";
$sql = "SELECT * from mess_meal WHERE uid='$_SESSION[uid]'";
if ($sql){
	echo "success";
}
$result = mysqli_query($con,$sql);

echo "<table border='3' align='center'>";
echo "<tr> <th>Date</th> <th> Month</th> <th>Year</th> <th>Meal-Per-Day</th>";
echo "</tr>";
while ($row=mysqli_fetch_array($result))
{
	echo "<tr>";//opens row
	echo "<td>" .$row ['date']. "</td>";
	echo "<td>" .$row ['month']. "</td>";
	echo "<td>" .$row ['year']. "</td>";
	echo "<td>" .$row ['mmealperday']. "</td>";
	echo '<br>';
	echo "</tr>";
}
echo "</table>";

?>
    </body>

 <?php include '/global/userlogin_footer.php'; 

 }else
{
  header('Location: index.php');
}

?>
 </html>