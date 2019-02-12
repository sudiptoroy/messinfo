<?php
session_start();
if (@$_SESSION['uemail']!="")
{

include '/global/userlogin_header.php'; ?>
<?php
$con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());

$ulocation1= $_POST['ulocation1'];
//echo @$_SESSION['ulocation'];
//echo $ulocation1;


$sql2="SELECT * FROM userinfo WHERE ulocation='$ulocation1' AND mid IS NULL";
$result2=mysqli_query($con,$sql2);

$sql="SELECT * FROM userinfo GROUP BY ulocation HAVING COUNT(*)>=1";
$result=mysqli_query($con,$sql);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Members</title>
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
<div align="center">
<form action="view_searched_members.php" method="POST">
<h4>Registered Member Location <select name="ulocation1">
<?php while($row = mysqli_fetch_array($result)):;?>
<option><?php echo $row[5];?></option>
<?php endwhile;?>
</select>
</h4>
<button type="submit" name="searchbtn" value="SEARCH" > Search Members </button>
</form>
</div>
<?php
echo "<div align='center'>";
echo "<table align='center'>";
echo "<tr> <th>Name</th> <th> Email</th> <th>Phone no.</th> <th>Location</th> <th>Gender</th> <th>Blood Group</th> <th>Add Member</th>  ";
echo "</tr>";
while ($row=mysqli_fetch_array($result2))
{
	echo "<tr>";//opens row
	echo "<td>" .$row ['uname']. "</td>";
	echo "<td>" .$row ['uemail']. "</td>";
	echo "<td>" .$row ['uphone']. "</td>";
	echo "<td>" .$row ['ulocation']. "</td>";
	echo "<td>" .$row ['ugender']. "</td>";
	echo "<td>" .$row ['ubloodgroup']. "</td>";
	//echo "<td><a href='#'><button>Add Member</button></a></td>";
	echo "<td><a href=\"add_members_action.php?uid=".$row['uid']."\">Add Member</a></td>";
	echo '<br>';
	echo "</tr>";
}
echo "</table>";

echo "</div>"


?>
</body>
</html>




<?php include '/global/userlogin_footer.php'; 

}else
{
  header('Location: index.php');
}
?>