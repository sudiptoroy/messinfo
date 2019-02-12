<!DOCTYPE html>
<?php
session_start();
if (@$_SESSION['uemail']!="")
{ ?>
<?php
  include('config/con_db.php');

  if($_POST['messbtn']=="mess"){
  $uid=$_POST['uid'];
  $uname= $_POST['uname'];
  $mname= $_POST['mname'];
  $ulocation= $_POST['ulocation'];
  $mcapacity= $_POST['mcapacity'];

  $mid=uniqid();
  $sql="INSERT into messinformation values('$mid','$mname','$ulocation','$mcapacity',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";

  $sql9="INSERT into rent_and_other_cost values('$mid','$uid','$uname',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
  mysqli_query($con,$sql9);
   $sql10="INSERT into user_payment values('$mid','$uid','$uname',NULL,NULL)";
  mysqli_query($con,$sql10);

  $sql1="INSERT into food_menu values('Saturday',NULL,'$mid')";
  $sql2="INSERT into food_menu values('Sunday',NULL,'$mid')";
  $sql3="INSERT into food_menu values('Monday',NULL,'$mid')";
  $sql4="INSERT into food_menu values('Tuesday',NULL,'$mid')";
  $sql5="INSERT into food_menu values('Wednesday',NULL,'$mid')";
  $sql6="INSERT into food_menu values('Thursday',NULL,'$mid')";
  $sql7="INSERT into food_menu values('Friday',NULL,'$mid')";
  
  mysqli_query($con,$sql1);
  mysqli_query($con,$sql2);
  mysqli_query($con,$sql3);
  mysqli_query($con,$sql4);
  mysqli_query($con,$sql5);
  mysqli_query($con,$sql6);
  mysqli_query($con,$sql7);


  $sql8="UPDATE `userinfo` SET `role` = '3', `mid` = '$mid' WHERE `userinfo`.`uid` = '$uid'";
  @$_SESSION['role']=3;
  mysqli_query($con,$sql8);
  if (mysqli_query($con,$sql))
  {
    @$_SESSION['message']="Successfully messacount created";
    header('Location: home.php');
  }
  else
  {
    @$_SESSION['message']="Failed to create mess!";
    header('Location: home.php');
    echo '<br>';
  }
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

