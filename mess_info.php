<!DOCTYPE html>
<?php session_start(); ?>
<?php
  include('config/con_db.php');

  if($_POST['regbtn']=="REGISTER"){
  $uname= $_POST['uname'];
  $upassword= $_POST['upassword'];
  $uphone= $_POST['uphone'];
  $uemail= $_POST['uemail'];
  $ugender= $_POST['ugender'];
  $ulocation= $_POST['ulocation'];
  $ubirthdate=$_POST['ubirthdate'];
  /*echo $pass_id ; 
  echo '<br>';
  echo $pass_name ;
  echo '<br>';
  echo $pass_pin ;
  echo '<br>';
  echo "password" ;
  echo '<br>';
  echo $phone_no ;
  echo '<br>';
  echo $pass_email ;
  echo '<br>';
  echo $gender ;
  echo '<br>';*/
  $uid=uniqid();
  $sql="INSERT INTO userinfo values('$uid','$uname','$uemail','$upassword',
  '$uphone','$ulocation',NULL,'1','$ugender','$ubirthdate',NULL,NULL)";
  if (mysqli_query($con,$sql))
  {
    @$_SESSION['message']="Successfully account created. Log in to continue";
    header('Location: index.php');
  }
  else
  {
    @$_SESSION['message']="Failed to log in!";
    header('Location: index.php');
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

