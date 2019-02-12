<?php

$con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
$uid = $_GET['uid'];
$date = $_GET['date'];

$sql="DELETE FROM `super_market_list` WHERE `super_market_list`.`uid` ='$uid' AND `date` ='$date' ";
//AND `date` = '$date'
if (mysqli_query($con,$sql))
  {
    @$_SESSION['message']="Successfully deleted.";
    header('Location: supermarket_list_view.php');
  }
  else
  {
    @$_SESSION['message']="Failed to delete!";
    header('Location: supermarket_list_view.php');
    echo '<br>';
  }

?>