<!DOCTYPE html>
<?php session_start(); ?>
<?php
  include('config/con_db.php');

  if($_POST['submitbtn']=="submit"){
  $mid=$_POST['mid'];
  $mmealperday= $_POST['mmealperday'];
  $mhouserent= $_POST['mhouserent'];
  $melectricitybill= $_POST['melectricitybill'];
  $mwaterbill= $_POST['mwaterbill'];
  $mgasbill= $_POST['mgasbill'];
  $mdustbill= $_POST['mdustbill'];
  $mmaidbill= $_POST['mmaidbill'];
  $minternetbill= $_POST['minternetbill'];
  $m_others= $_POST['m_others'];
  
  $sql1="SELECT * FROM messinformation WHERE mid='$mid'";
  $result1=mysqli_query($con,$sql1);
  while ($row=mysqli_fetch_array($result1))
  {
    $mcurrent_users=$row ['mcurrent_users'];
  }

//$uid=
//$mid
//$uname
//$uhouserent
$uelectricitybill = $melectricitybill/$mcurrent_users;
$ugasbill = $mgasbill/$mcurrent_users;
$uwaterbill = $mwaterbill/$mcurrent_users;
$udustbill = $mdustbill/$mcurrent_users;
$umaidebill = $mmaidbill/$mcurrent_users;
$uinternetbill = $minternetbill/$mcurrent_users; 
$u_m_others = $m_others/$mcurrent_users;
//$umealexpense

  
  $sql="UPDATE `messinformation` SET `mmealperday` = '$mmealperday', `mhouserent` = '$mhouserent', `melectricitybill` = '$melectricitybill' , `mwaterbill` = '$mwaterbill', `mgasbill` = '$mgasbill', `mdustbill` = '$mdustbill' , `mmaidbill` = '$mmaidbill', `minternetbill` = '$minternetbill',`m_others` = '$m_others'  WHERE `mid` = '$mid'";

  $sql1="UPDATE `rent_and_other_cost` SET  `uelectricitybill` = '$uelectricitybill', `ugasbill` = '$ugasbill' , `uwaterbill` = '$uwaterbill', `udustbill` = '$udustbill', `umaidebill` = '$umaidebill' , `uinternetbill` = '$uinternetbill', `u_m_others` = '$u_m_others'  WHERE `mid` = '$mid'";
  mysqli_query($con,$sql1);

  if (mysqli_query($con,$sql))
  {
    @$_SESSION['message']="Mess Costs updated.";
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

