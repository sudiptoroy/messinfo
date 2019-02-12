<?php
session_start();
if (@$_SESSION['uemail']!="")
{

include '/global/userlogin_header.php'; ?>
<?php 
  if(@$_SESSION['message']!=""){
echo @$_SESSION['message'];
@$_SESSION['message']="";
  }  ?>
<?php
$con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());

$sql="SELECT * FROM userinfo GROUP BY ulocation HAVING COUNT(*)>=1";
//$sql="SELECT * FROM userinfo WHERE ulocation='$_SESSION[ulocation]'";
$result=mysqli_query($con,$sql);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Members</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>
<body>
<div align="center">
<form action="view_searched_members.php" method="POST">
<h4>Registered Member Location <select name="ulocation1">
<?php while($row = mysqli_fetch_array($result)):;?>
<option><?php echo $row[5];?></option>
<?php endwhile;?>
</select>
</h4>

<button type="submit" name="searchbtn" value="SEARCH" > Search Members </button>
</form>
</div> 
   
</body>
</html>




<?php include '/global/userlogin_footer.php'; 

}else
{
  header('Location: index.php');
}
?>