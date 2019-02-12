<!DOCTYPE html>
<?php 
session_start();
if (@$_SESSION['uemail']!="")
{
include '/global/userlogin_header.php'; 
?>
<?php 
  if(@$_SESSION['message']!=""){
echo @$_SESSION['message'];
@$_SESSION['message']="";
  }  ?>
<?php

 $con=mysqli_connect("localhost","root","","mess_db_2") OR die('Error: '.mysqli_connect_error());
 $sql1="SELECT * FROM userinfo WHERE uemail='$_SESSION[uemail]'";
 $result1=mysqli_query($con,$sql1);
 while ($row=mysqli_fetch_array($result1))
 {
   $mid=$row ['mid'];
 }

 $sql2="SELECT * from userinfo WHERE mid='$mid'";
 $result2=mysqli_query($con,$sql2);
?>
<html>
<head>
	<title>Members' Expenses</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
	
</head>
<body>

 <div align="center">
 <form action="member_expenses_action.php" method="POST">
  <h4>Members: <select name="uid" required>
     <?php while($row = mysqli_fetch_array($result2)):;?>
      <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
       <?php endwhile;?>
     </select>
  </h4>
  <button type="submit" name="expensesbtn" value="EXPENSE">Submit</button>
 </form>
 </div>

<?php

//$sql3="SELECT * FROM rent_and_other_cost WHERE mid='$mid'";

?>



</body>
</html>

<?php include '/global/userlogin_footer.php'; 
}else{
	header('Location: index.php');
}
?>
