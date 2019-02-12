<?php
session_start();
if (@$_SESSION['uemail']!="")
{

include '/global/userlogin_header.php'; ?>
<?php

   /*if(!isset($_SESSION['uemail'])){

      header('Location: index.php');
   }*/
  
?>
<!DOCTYPE html>
<!-- Latest compiled and minified CSS -->
<?php include('config/css.php'); ?>
<?php include('scripts/js.php'); ?>

<!-- Latest compiled and minified JavaScript -->

<html>
<head>
	<title>Home</title>
</head>
<!-- 23292E -->
<body>
  <div class="container">
  <?php 
  if(@$_SESSION['message']!=""){
echo @$_SESSION['message'];
@$_SESSION['message']="";
  }  ?>
  <div>
    <h1>Seggestions according to your location</h1>
    </div>
  </div>
  <?php
  $con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
//$pass_email=$_POST['pass_email'];
//$uemail="sudiptoroy1122@gmail.com";
$sql = "SELECT * from messinformation WHERE ulocation='$_SESSION[ulocation]'";
$result = mysqli_query($con,$sql);

echo "<table border='3' align='center'>";
echo "<tr> <th>Mess Name</th> <th>Location</th> <th>Capacity</th>  ";
echo "</tr>";
while ($row=mysqli_fetch_array($result))
{
  echo "<tr>";//opens row
  echo "<td>" .$row ['mname']. "</td>";
  echo "<td>" .$row ['ulocation']. "</td>";
  echo "<td>" .$row ['mcapacity']. "</td>";
  echo '<br>';
  echo "</tr>";
}
echo "</table>";
?>
?>
</body>
</html>
<?php include '/global/userlogin_footer.php'; 

}else
{
  header('Location: index.php');
}
?>