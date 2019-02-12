<!DOCTYPE html>
<?php 
session_start();
if (@$_SESSION['uemail']!="")
{
include('config/con_db.php');
include '/global/userlogin_header.php'; 
?>
<?php
if($_POST['editbtn']=="EDIT"){
$uid= $_POST['uid'];
$date= $_POST['date'];
$mmealperday= $_POST['mmealperday'];

/*echo $uid;
echo "<br>";
echo $date;
$date=3;
echo $mmealperday;*/



$sql="UPDATE `u_meal` SET `mmealperday` = '$mmealperday'   WHERE `uid` = '$uid' AND `date`='$date'";
mysqli_query($con,$sql);
if (mysqli_query($con,$sql))
  {
    @$_SESSION['message']="Meal successfully updated";
    header('Location: member_meal_count.php');
  }
  else
  {
    @$_SESSION['message']="Failed to update!";
    header('Location: member_meal_count.php');
    echo '<br>';
  }
}else{
  header('Location: index.php');
}
 

?>


<?php include '/global/userlogin_footer.php'; 
}else{
	header('Location: index.php');
}
?>