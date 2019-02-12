<?php
session_start();
session_destroy();

@$_SESSION['uemail']="";
@$SESSION['role']="";
@$_SESSION['mid']="";
@$_SESSION['ulocation']="";
header('Location: index.php');
?>