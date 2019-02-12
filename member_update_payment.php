<?php

$con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
$uid= $_POST['uid'];
$u_all_payment= $_POST['u_all_payment'];
$sql2="SELECT * from user_payment WHERE uid='$uid'";
$result=mysqli_query($con,$sql2);
while ($row=mysqli_fetch_array($result))
{
  $u_all_payment1= $row ['u_all_payment'];
}
$u_all_payment_new=$u_all_payment+$u_all_payment1;
$sql="UPDATE `user_payment` SET `u_all_payment` = '$u_all_payment_new' WHERE `uid` = '$uid'";
  if (mysqli_query($con,$sql))
  {
    @$_SESSION['message']="Payment Successfully updated.";
    header('Location: member_bill_payment.php');
  }
  else
  {
    @$_SESSION['message']="Failed to update";
    header('Location: member_bill_payment.php');
    echo '<br>';
  }
?>