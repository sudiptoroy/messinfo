<!DOCTYPE html>

<?php
session_start();
if (@$_SESSION['uemail']!="")
{
include '/global/userlogin_header.php'; ?>
<?php include('config/con_db.php'); 

if($_POST['exbtn']=="ex"){
  $uid=$_POST['uid'];
  $uname=$_POST['uname'];
  $uhouserent=$_POST['uhouserent'];
  $uelectricitybill=$_POST['uelectricitybill'];
  $ugasbill=$_POST['ugasbill'];
  $uwaterbill=$_POST['uwaterbill'];
  $udustbill=$_POST['udustbill'];
  $umaidebill=$_POST['umaidebill'];
  $uinternetbill=$_POST['uinternetbill'];
  $u_m_others=$_POST['u_m_others'];

  
  
  $sql="UPDATE `rent_and_other_cost` SET `uname` = '$uname', `uhouserent` = '$uhouserent' , `uelectricitybill` = '$uelectricitybill' , `ugasbill` = '$ugasbill' , `uwaterbill` = '$uwaterbill' , `udustbill` = '$udustbill', `umaidebill` = '$umaidebill' , `uinternetbill` = '$uinternetbill' , `u_m_others` = '$u_m_others'   WHERE `uid` = '$uid'";
  if (mysqli_query($con,$sql))
  {
    @$_SESSION['message']="Successfully updated.";
    header('Location: member_expenses.php');
  }
  else
  {
    @$_SESSION['message']="Failed to update";
    header('Location: member_expenses.php');
    echo '<br>';
  }
}

?>
<?php include '/global/userlogin_footer.php'; 

}else
{
  header('Location: index.php');
}
?>