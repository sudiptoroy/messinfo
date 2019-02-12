<?php
session_start();
if (@$_SESSION['uemail']!="")
{

include '/global/userlogin_header.php'; ?>

<!DOCTYPE html>
<?php include('config/css.php'); ?>
<?php include('scripts/js.php'); ?>

<html>
<head>
	<title>Home</title>
  <link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>
<!-- 23292E -->
<body>
    
  <div class="container" align="center">
  <?php 
  if(@$_SESSION['message']!=""){
echo @$_SESSION['message'];
@$_SESSION['message']="";
  }  ?>
    <h1>Search</h1>
    <form action="search_mess_process.php" method="POST">
    <input type="text" name="ulocation" >
    <button type="submit"> Search </button>
    </form>
  </div>
</body>
</html>

<?php
  $ulocation=$_POST['ulocation'];
  $con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
//$pass_email=$_POST['pass_email'];
//$uemail="sudiptoroy1122@gmail.com";
$sql = "SELECT * from messinformation WHERE ulocation='$ulocation'";
$result = mysqli_query($con,$sql);
echo "<div align='center'>";
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
echo "</div>"
?>


<?php include '/global/userlogin_footer.php'; 

}else
{
  header('Location: index.php');
}
?>