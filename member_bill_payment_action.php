<!DOCTYPE html>


<?php
session_start();
if (@$_SESSION['uemail']!="")
{
	include '/global/userlogin_header.php';
?>
<?php

  $con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
  $uid=$_POST['uid'];
$sql="SELECT * FROM rent_and_other_cost WHERE uid='$uid'";
  $result=mysqli_query($con,$sql);
 $sql1="SELECT * FROM userinfo WHERE uemail='$_SESSION[uemail]'";
 $result1=mysqli_query($con,$sql1);
 while ($row1=mysqli_fetch_array($result1))
 {
   $mid=$row1 ['mid'];
 }

 $sql2="SELECT * from userinfo WHERE mid='$mid'";
 $result2=mysqli_query($con,$sql2);

 $sql3="SELECT * from user_payment WHERE uid='$uid'";
 $result3=mysqli_query($con,$sql3);


?>
<html>
<head>
	<title>Total Bill Payment</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>
<body>
<div align="center">
 <form action="member_bill_payment_action.php" method="POST">
  <h4>Members: <select name="uid" required>
     <?php while($row = mysqli_fetch_array($result2)):;?>
      <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
       <?php endwhile;?>
     </select>
  </h4>
  <button type="submit">Submit</button>
 </form>
 </div>
<?php

while ($row=mysqli_fetch_array($result))
{
  $uname= $row ['uname'];
  $houserent= $row ['uhouserent'];
  $electricitybill= $row ['uelectricitybill'];
  $gasbill= $row ['ugasbill'];
  $waterbill= $row ['uwaterbill'];
  $dustbill= $row ['udustbill'];
  $maidbill= $row ['umaidebill'];
  $internetbill= $row ['uinternetbill'];
  $otherbill= $row ['u_m_others'];
  $mealexpense= $row ['umealexpense'];
}
$total=$houserent+$electricitybill+$gasbill+$waterbill+$dustbill+$maidbill+$internetbill+$otherbill+$mealexpense;

while ($row1=mysqli_fetch_array($result3))
{
  
  $u_all_payment= $row1 ['u_all_payment'];
}
$due= $total-$u_all_payment;

echo "<html>";
echo "<div align='center'>";
echo "<br>";
echo "Member Name  <input type='text' value='".$uname."' disabled >";
echo "<br>";
echo "<br>";
echo "Total Bill  <input type='text' value='".$total."' disabled >";

echo "<br>";
echo "<br>";
echo "Bills to pay  <input type='text' value='".$due."' disabled >";
echo "<br>";
echo "<br>";
echo "<form action='member_update_payment.php' method='POST'>";
echo "<input type='hidden' name='uid' value='".$uid."' >";
echo "Paid Ammount  <input type='text' name='u_all_payment' value='".$u_all_payment."'>";
echo "<br>";
echo "<button type='submit'>Update Payment</button>";
echo "</form>";
echo "</div>";
echo "</html>";

?>
</body>
</html>


<?php include '/global/userlogin_footer.php'; 

}else
{
  header('Location: index.php');
}
?>