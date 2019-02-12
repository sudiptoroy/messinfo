<?php
session_start();
if (@$_SESSION['uemail']!="")
{

include '/global/userlogin_header.php'; ?>
<?php

   /*if(!isset($_SESSION['uemail'])){

      header('Location: index.php');
   }*/
  
?>
<!DOCTYPE html>
<!-- Latest compiled and minified CSS -->
<?php include('config/css.php'); ?>
<?php include('scripts/js.php'); ?>

<!-- Latest compiled and minified JavaScript -->

<html>
<head>
	<title>Home</title>
  <link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>
<!-- 23292E -->
<body>
  <div class="container" align="center">
  <?php 
  if(@$_SESSION['message']!=""){
echo @$_SESSION['message'];
@$_SESSION['message']="";
  }  ?>
    <h1>Search</h1>
    <form action="search_mess_process.php" method="POST">
    <input type="text" name="ulocation" >
    <button type="submit"> Search </button>
    </form>
  </div>
</body>
</html>
<?php include '/global/userlogin_footer.php'; 

}else
{
  header('Location: index.php');
}
?>