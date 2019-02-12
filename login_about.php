<?php 
session_start();
if (@$_SESSION['uemail']!="")
{
?>
<!DOCTYPE html>
<head>
<title>About</title>
	
</head>
<body>
<center>
<div id="article">
<!--<link rel="stylesheet" type ="text/css" href="assets/css/style.css">-->
<?php include 'config/css.php'; ?>
<?php include '/global/userlogin_header.php'; ?>

<!--<?php include '/global/navigation.php'; ?>-->

<div id="contents">

<!--<?php include '/global/sidebar.php'; ?>-->

<div id="components">
<h1>About Us</h1>
<p>Messinfo.com is a project of Code_X systems. It's corrently under development</p>

</div> <!--div components end-->

<?php include '/global/userlogin_footer.php'; ?>

</div> <!--div contents end-->




</div> <!--div article end-->


</center>
</body>
</html>
<?php
}else{
	header('Location: index.php');
}
?>