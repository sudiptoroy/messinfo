
<?php 
session_start();
if (@$_SESSION['uemail']!="")
{
  include '/global/userlogin_header.php';
  

?>
<?php include('config/css.php'); ?>
<?php include('scripts/js.php'); ?>
<?php include('config/con_db.php'); ?>
<?php 
$sql="SELECT * from userinfo WHERE uemail='$_SESSION[uemail]'";
$result=mysqli_query($con,$sql);

while ($row=mysqli_fetch_array($result))
{
  $uname= $row ['uname'];
 

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Mess Account</title>
	
</head>

<body>
   <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <div class="container" align="center">

    <h2 class="h2_element">Creating Mess Account</h2>
 		 <form action="mess_create_process.php" method="POST">
 		   <input type="hidden" name="uid" value="<?php echo @$_SESSION[uid]; ?>">
 		   <input type="hidden" name="uname" value="<?php echo $uname; ?>">
 		   <input type="text" name="mname" size="25" placeholder="Mess name" required> <br><br>
 		   <input type="text" name="ulocation" size="25" placeholder="Location" required> <br><br>
 		   <input type="text" name="mcapacity" placeholder="Mess Capacity" required> <br><br>
           <button type="submit" name="messbtn" value="mess"> Create </button>

    </div>

<?php include '/global/userlogin_footer.php';
}else{
  header('Location: index.php');
} ?>
</body>
</html>