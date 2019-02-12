<?php
session_start();
if (@$_SESSION['uemail']!="")
{
//$mcurrent_users=0;
include '/global/userlogin_header.php'; ?>
<?php
$con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());

$uid = $_GET['uid']; // $id is now defined
$sql1 = "SELECT mid from userinfo WHERE uemail='$_SESSION[uemail]'";
$result=mysqli_query($con,$sql1);
while ($row=mysqli_fetch_array($result))
{

	$mid=$row ['mid'];
}
// or assuming your column is indeed an int
// $id = (int)$_GET['id'];
$sql5="SELECT * from userinfo WHERE uid='$uid'";
$result5=mysqli_query($con,$sql5);
while ($row5=mysqli_fetch_array($result5))
{
   $uname=$row5 ['uname'];
  
}
$sql2= "SELECT * from messinformation WHERE mid='$mid'";
$result1=mysqli_query($con,$sql2);
while ($row1=mysqli_fetch_array($result1))
{
   $mcapacity=$row1 ['mcapacity'];
   $mcurrent_users=$row1 ['mcurrent_users'];
	
}
if (($mcapacity-1)>$mcurrent_users){
	$sql="UPDATE `userinfo` SET `role` = '2', `mid`='$mid' WHERE `uid` = '$uid'";
  $sql4="INSERT into rent_and_other_cost values('$mid','$uid','$uname',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
  $sql6="INSERT into user_payment values('$mid','$uid','$uname',NULL,NULL)";

  mysqli_query($con,$sql4);
  mysqli_query($con,$sql6);


	$mcurrent_users=$mcurrent_users+1;
	$sql3="UPDATE `messinformation` SET `mcurrent_users` = '$mcurrent_users' WHERE `messinformation`.`mid` = '$mid'";
	mysqli_query($con,$sql3);
	if (mysqli_query($con,$sql))
  {
    @$_SESSION['message']="Member Successfully added.";
    header('Location: add_members.php');
  }
  else
  {
    @$_SESSION['message']="Failed";
    header('Location: add_members.php');
    echo '<br>';
  }
}
else{
	@$_SESSION['message']="No enough space for new member";
    header('Location: add_members.php');
    echo '<br>';
}



?> 
<?php include '/global/userlogin_footer.php'; 

}else
{
  header('Location: index.php');
}
?>