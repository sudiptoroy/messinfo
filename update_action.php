<!DOCTYPE html>
<?php session_start(); ?>
<?php
  include('config/con_db.php');

  if($_POST['updatebtn']=="update"){
  $uid= $_POST['uid'];
  $uname= $_POST['uname'];
  $uemail= $_POST['uemail'];
  $upassword= $_POST['upassword'];
  $uphone= $_POST['uphone'];
  $ulocation= $_POST['ulocation'];
  $ubirthdate=$_POST['ubirthdate'];
  $ubloodgroup=$_POST['ubloodgroup'];
  $sql="UPDATE `userinfo` SET `uname` = '$uname', `uemail` = '$uemail', `upassword` = '$upassword' , `uphone` = '$uphone', `ulocation` = '$ulocation', `ubirthdate` = '$ubirthdate' , `ubloodgroup` = '$ubloodgroup'  WHERE `uid` = '$uid'";
  if (mysqli_query($con,$sql))
  {
    @$_SESSION['message']="Profile successfully updated.";
    header('Location: user_profile.php');
  }
  else
  {
    @$_SESSION['message']="Failed to update";
    header('Location: user_profile.php');
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

