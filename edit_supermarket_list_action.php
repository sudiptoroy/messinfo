<!DOCTYPE html>
<?php session_start(); ?>
<?php
  include('config/con_db.php');

  if($_POST['slistupdatebtn']=="slistbtn"){
  $mid=$_POST['mid'];
  $uid=$_POST['uid'];
  $date=$_POST['date'];
  $expense=$_POST['expense'];
  
  
  $sql="UPDATE `super_market_list` SET `uid` = '$uid', `uname` = '$uname', `expense` = '$expense' WHERE `mid` = '$uid' AND `date`='$date'";
  if (mysqli_query($con,$sql))
  {
    @$_SESSION['message']="Successfully list updated.";
    header('Location: supermarket_list_view.php');
  }
  else
  {
    @$_SESSION['message']="Failed to update";
    header('Location: supermarket_list_view.php');
    echo '<br>';
  }
}else{
  header('Location: index.php');
}
  
?>
<html>
<body>
<br>
<!--<a href="index.php">Back to Home</a>-->
</body>
</html>

