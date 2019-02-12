<?php 
session_start(); 
if (@$_SESSION['uemail']=="")
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Messinfo - Login or Signup</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>
<body>
  <div class="headerMenu">
  	<div id="wrapper">
  	  <div class="logo">
  	  	<img src="./images/messinfo.png" title="messinfo.com" alt="messinfo.com logo">
  	  </div>
  	  <div>
  	  
  		
  	</div>
  </div>
  
  <div style="width: 800px; margin: 0px auto 0px auto;">
 <table>
 	<tr>
 		<td width="60%" valign="top">
 		 <h2 class="h2_element">Don't have an account? Sign up here</h2>
 		 <form action="mess_info.php" method="POST">
 		   <input type="text" name="uname" size="25" placeholder="Name" required> <br><br>
 		   <input type="password" name="upassword" size="25" placeholder="Password" required> <br><br>
 		   <input type="text" name="uphone" size="25" placeholder="Phone no" required> <br><br>
 		   <input type="email" name="uemail" size="25" placeholder="Email" required> <br><br>
 		   <input type="text" name="ubirthdate" size="25" placeholder="Birthdate" required> <br><br>
 		   <input type="text" name="ulocation" placeholder="Location" required> <br><br>
 		   <input type="radio" name="ugender" value="Male" required> Male <br>
           <input type="radio" name="ugender" value="Female" required> Female <br><br>
           <button type="submit" name="regbtn" value="REGISTER"> Register </button>

 		 	
 		 </form>
 	 <?php 
  if(@$_SESSION['message']!=""){
echo @$_SESSION['message'];
@$_SESSION['message']="";
  }  ?>

 		</td>
 		<td width="40%" valign="top">
 		 <h2 class="h2_element">Log in</h2>
 		 <form action="process1.php" method="POST">
 		   <input type="email" name="uemail" size="25" placeholder="Email" required> <br><br>
 		   <input type="password" name="upassword" size="25" placeholder="Password" required> <br><br>
           <button type="submit" name="logbtn" value="LOGIN"> Login </button>

 		 	
 		 </form>

 		</td>

 	</tr>
 </table>
 </div>
</body>
<br>
<br>
<br>
</html>
<?php include '/global/footer.php'; 
}else{
  header('Location: home.php');
}?>