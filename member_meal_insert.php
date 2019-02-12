<?php 
session_start();
if (@$_SESSION['uemail']!="")
{
include '/global/userlogin_header.php'; 
?>

<?php
  $con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
  
  $uid= $_POST['uid'];
  $date= $_POST['date'];
  $mmealperday= $_POST['mmealperday'];

  $sql1="SELECT * FROM userinfo WHERE uemail='$_SESSION[uemail]'";
  $result1=mysqli_query($con,$sql1);

  while ($row=mysqli_fetch_array($result1))
 {
   $mid=$row ['mid'];
 }

 $sql3="SELECT * FROM userinfo WHERE uid='$uid'";
  $result3=mysqli_query($con,$sql3);

  while ($row1=mysqli_fetch_array($result3))
 {
   $uname=$row1 ['uname'];
 }




$sql2="INSERT INTO u_meal values('$uid','$mid','$uname','$date','$mmealperday')";
if (mysqli_query($con,$sql2))
  {
    @$_SESSION['message']="Meal added";
    header('Location: member_meal_count.php');
  }
  else
  {
    @$_SESSION['message']="Failed!";
    header('Location: member_meal_count.php');
    echo '<br>';
  }

?>

<?php include '/global/userlogin_footer.php'; 
}else{
	header('Location: index.php');
}
?>