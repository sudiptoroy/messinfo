<!DOCTYPE html>
<?php session_start(); ?>
<?php
  include('config/con_db.php');
  
  $flag1=0;
  $flag2=0;
  $flag3=0;
  $flag4=0;
  $flag5=0;
  $flag6=0;
  $flag7=0;

  if($_POST['submitbtn']=="submit"){
  $mid=$_POST['mid'];
  $saturday_meal= $_POST['saturday_meal'];
  $sunday_meal= $_POST['sunday_meal'];
  $monday_meal= $_POST['monday_meal'];
  $tuesday_meal= $_POST['tuesday_meal'];
  $wednesday_meal= $_POST['wednesday_meal'];
  $thursday_meal= $_POST['thursday_meal'];
  $friday_meal= $_POST['friday_meal'];

 $sql1="UPDATE food_menu SET `mealitem`='$saturday_meal' WHERE mid='$mid' AND day='Saturday'";
 $sql2="UPDATE food_menu SET `mealitem`='$sunday_meal' WHERE mid='$mid' AND day='Sunday'";
 $sql3="UPDATE food_menu SET `mealitem`='$monday_meal' WHERE mid='$mid' AND day='Monday'";
 $sql4="UPDATE food_menu SET `mealitem`='$tuesday_meal' WHERE mid='$mid' AND day='Tuesday'";
 $sql5="UPDATE food_menu SET `mealitem`='$wednesday_meal' WHERE mid='$mid' AND day='Wednesday'";
 $sql6="UPDATE food_menu SET `mealitem`='$thursday_meal' WHERE mid='$mid' AND day='Thursday'";
 $sql7="UPDATE food_menu SET `mealitem`='$friday_meal' WHERE mid='$mid' AND day='Friday'";

  if (mysqli_query($con,$sql1))
  {
    $flag1=1;
  }
   if (mysqli_query($con,$sql2))
  {
    $flag2=1;
  }
   if (mysqli_query($con,$sql3))
  {
    $flag3=1;
  }
   if (mysqli_query($con,$sql4))
  {
    $flag4=1;
  }
   if (mysqli_query($con,$sql5))
  {
    $flag5=1;
  }
   if (mysqli_query($con,$sql6))
  {
    $flag6=1;
  }
   if (mysqli_query($con,$sql7))
  {
    $flag7=1;
  }



  if ($flag1==1 && $flag2==1 && $flag3==1 && $flag4==1 && $flag5==1 && $flag6==1 && $flag7==1)
  {
    @$_SESSION['message']="Food Menu Updated";
    header('Location: manage_mess.php');
  }
  else
  {
    @$_SESSION['message']="Failed to update";
    header('Location: manage_mess.php');
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

