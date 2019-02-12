<!DOCTYPE html>


<?php 
session_start();
if (@$_SESSION['uemail']!="")
{
include '/global/userlogin_header.php'; 
?>
<html>
<head>
	<title>Expense View</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<?php

$con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
 $sql1="SELECT * FROM userinfo WHERE uemail='$_SESSION[uemail]'";
 $result1=mysqli_query($con,$sql1);

 while ($row1=mysqli_fetch_array($result1))
{
  $uid=$row1 ['uid'];
}

$sql="SELECT * FROM rent_and_other_cost WHERE uid='$uid'";
$result=mysqli_query($con,$sql);

$sql2="SELECT * FROM user_payment WHERE uid='$uid'";
$result2=mysqli_query($con,$sql2);
while ($row1=mysqli_fetch_array($result2)){

	$u_all_payment= $row1 ['u_all_payment'];
}


echo "<div align='center'>";
echo "<table align='center'>";
echo "<tr> <th>Name</th> <th> House Rent</th>  <th> Electricity Bill</th> <th>Gas Bill</th> <th>Water Bill</th>  <th>Dust Bill</th> <th>Maid Bill</th> <th>Internet Bill</th> <th>Other Bills</th> <th>Meal Expense</th> ";
echo "</tr>";

while ($row=mysqli_fetch_array($result))
{
  echo "<tr>";//opens row
  echo "<td>" .$row ['uname']. "</td>";
  echo "<td>" .$row ['uhouserent']. "</td>";
  echo "<td>" .$row ['uelectricitybill']. "</td>";
  echo "<td>" .$row ['ugasbill']. "</td>";
  echo "<td>" .$row ['uwaterbill']. "</td>";
  echo "<td>" .$row ['udustbill']. "</td>";
  echo "<td>" .$row ['umaidebill']. "</td>";
  echo "<td>" .$row ['uinternetbill']. "</td>";
  echo "<td>" .$row ['u_m_others']. "</td>";
  echo "<td>" .$row ['umealexpense']. "</td>";
  echo "</tr>";

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
echo "</table>";
echo "</div>";


$total=$houserent+$electricitybill+$gasbill+$waterbill+$dustbill+$maidbill+$internetbill+$otherbill+$mealexpense;
$due=$total-$u_all_payment;

echo "<html>";
echo "<div align='center'>";
echo "<br>";
echo "Total Bill  <input type='text' value='".$total."' disabled >";
echo "<br>";
echo "Paid Bills  <input type='text' value='".$u_all_payment."' disabled >";
echo "<br>";
echo "Bills to pay  <input type='text' value='".$due."' disabled >";
echo "</div>";
echo "</html>";

?>
</body>
</html>

<?php include '/global/userlogin_footer.php'; 
}else{
	header('Location: index.php');
}
?>