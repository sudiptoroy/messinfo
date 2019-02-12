<?php 
session_start();
if (@$_SESSION['uemail']!="")
{
include '/global/userlogin_header.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Food Menu</title>
</head>
<link rel="stylesheet" type="text/css" href="./styles/style.css">
<body>
<?php
 $con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
 $sql="SELECT mid from userinfo WHERE uid='$_SESSION[uid]'";
 $result = mysqli_query($con,$sql);
 while ($row=mysqli_fetch_array($result))
{
	 $mid=$row ['mid'];
}
 $sql1="SELECT mealitem from food_menu WHERE mid='$mid' AND day='Saturday'";
 $sql2="SELECT mealitem from food_menu WHERE mid='$mid' AND day='Sunday'";
 $sql3="SELECT mealitem from food_menu WHERE mid='$mid' AND day='Monday'";
 $sql4="SELECT mealitem from food_menu WHERE mid='$mid' AND day='Tuesday'";
 $sql5="SELECT mealitem from food_menu WHERE mid='$mid' AND day='Wednesday'";
 $sql6="SELECT mealitem from food_menu WHERE mid='$mid' AND day='Thursday'";
 $sql7="SELECT mealitem from food_menu WHERE mid='$mid' AND day='Friday'";

 $result1 = mysqli_query($con,$sql1);
 $result2 = mysqli_query($con,$sql2);
 $result3 = mysqli_query($con,$sql3);
 $result4 = mysqli_query($con,$sql4);
 $result5 = mysqli_query($con,$sql5);
 $result6 = mysqli_query($con,$sql6);
 $result7 = mysqli_query($con,$sql7);

 while ($row=mysqli_fetch_array($result1))
{
	 $saturday_meal=$row ['mealitem'];
}
while ($row=mysqli_fetch_array($result2))
{
	 $sunday_meal=$row ['mealitem'];
}
while ($row=mysqli_fetch_array($result3))
{
	 $monday_meal=$row ['mealitem'];
}
while ($row=mysqli_fetch_array($result4))
{
	 $tuesday_meal=$row ['mealitem'];
}
while ($row=mysqli_fetch_array($result5))
{
	 $wednesday_meal=$row ['mealitem'];
}
while ($row=mysqli_fetch_array($result6))
{
	 $thursday_meal=$row ['mealitem'];
}
while ($row=mysqli_fetch_array($result7))
{
	 $friday_meal=$row ['mealitem'];
}
?>
<div align="center">
<fieldset>
<legend>Food Menu</legend>
<form action="food_menu_action.php" method="POST">
    <input type="hidden" name="mid" value="<?php echo $mid; ?>">
    Saterday:&nbsp&nbsp<input type="text" name="saturday_meal" placeholder="Enter Meal for Saturday" value="<?php echo $saturday_meal; ?>" required> <br><br>
	Sunday:&nbsp&nbsp<input type="text" name="sunday_meal" placeholder="Enter Meal for Sunday" value="<?php echo $sunday_meal; ?>" required> <br><br>
	Monday:&nbsp&nbsp<input type="text" name="monday_meal" placeholder="Enter Meal for Monday" value="<?php echo $monday_meal; ?>" required> <br><br>
	Tuesday:&nbsp&nbsp<input type="text" name="tuesday_meal" placeholder="Enter Meal for Tuesday" value="<?php echo $tuesday_meal; ?>" required> <br><br>
	Wednesday:&nbsp&nbsp<input type="text" name="wednesday_meal" placeholder="Enter Meal for Wednesday" value="<?php echo $wednesday_meal; ?>" required> <br><br>
	Thursday:&nbsp&nbsp<input type="text" name="thursday_meal" placeholder="Enter Meal for Thursday" value="<?php echo $thursday_meal; ?>" required> <br><br>
	Friday:&nbsp&nbsp<input type="text" name="friday_meal" placeholder="Enter Meal for Friday" value="<?php echo $friday_meal; ?>" required> <br><br>
	
	<button type="submit" name="submitbtn" value="submit"> Submit </button>

</form>

</fieldset>
</div>

<?php include '/global/userlogin_footer.php'; 
}else{
	header('Location: index.php');
}
?>

</body>
</html>