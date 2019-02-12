<!DOCTYPE html>
<?php 
session_start();
if (@$_SESSION['uemail']!="")
{
include '/global/userlogin_header.php'; 
?>
<html>
<head>
	<title>Members' Expenses</title>
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

$uid= $_POST['uid'];

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
?>
<div align="center">
 <form action="member_expenses_action.php" method="POST">
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
 echo "<div align='center'>";
echo "<table align='center'>";
echo "<tr> <th>Name</th> <th> House Rent</th>  <th> Electricity Bill</th> <th>Gas Bill</th> <th>Water Bill</th>  <th>Dust Bill</th> <th>Maid Bill</th> <th>Internet Bill</th> <th>Other Bills</th> <th>Meal Expense</th><th>Edit</th> ";
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
  
  //echo "<td><a href='#'><button>Add Member</button></a></td>";
  echo "<td><a href=\"edit_member_expenses.php?uid=".$row['uid']."\">Edit</a></td>";
  //echo "<td><a href=\"delete_supermarket_list.php?uid=".$row['uid']."&date=".$row['date']."\">Delete</a></td>";
  //."?date=".$row['date'].
  //echo "<td><a href='#'>Edit</a></td>";
  echo '<br>';
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
$total=$houserent+$electricitybill+$gasbill+$waterbill+$dustbill+$maidbill+$internetbill+$otherbill+$mealexpense;
echo "</table>";
echo "<html>";
echo "<br>";
echo "Total Bill  <input type='text' value='".$total."' disabled >";
echo "</html>";
echo "</div>";

?>
?>
</body>
</html>
<?php include '/global/userlogin_footer.php'; 
}else{
	header('Location: index.php');
}
?>