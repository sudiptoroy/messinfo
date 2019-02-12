<?php

$con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
$uid = $_GET['uid'];
$date = $_GET['date'];

$sql="DELETE FROM `u_meal` WHERE `u_meal`.`uid` ='$uid' AND `date` ='$date' ";
//AND `date` = '$date'
if (mysqli_query($con,$sql))
  {
    @$_SESSION['message']="Successfully deleted.";
    header('Location: member_meal_count.php');
  }
  else
  {
    @$_SESSION['message']="Failed to delete!";
    header('Location: member_meal_count.php');
    echo '<br>';
  }

?>