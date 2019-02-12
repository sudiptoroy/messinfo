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
  $expense= $_POST['expense'];

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




$sql2="INSERT INTO super_market_list values('$mid','$uid','$uname','$date','$expense')";
if (mysqli_query($con,$sql2))
  {
    @$_SESSION['message']="Market Schedute assigned";
    header('Location: supermarket_list_view.php');
  }
  else
  {
    @$_SESSION['message']="Failed to assign!";
    header('Location: supermarket_list_view.php');
    echo '<br>';
  }

?>

<?php include '/global/userlogin_footer.php'; 
}else{
	header('Location: index.php');
}
?>