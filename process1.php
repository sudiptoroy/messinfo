<?php 
 session_start();?>
<?php
include('config/con_db.php');
if($_POST['logbtn']=="LOGIN"){
  @$_SESSION['uemail']=$_POST['uemail'];
  $upassword=$_POST['upassword'];

  $sql="SELECT * FROM userinfo where upassword='$upassword' and uemail='$_SESSION[uemail]'";
  

  $result=mysqli_query($con,$sql);
	
	if ($result)
	{
			$rec=mysqli_fetch_object($result);
		    @$_SESSION['uid']=$rec->uid;
		    @$_SESSION['role']=$rec->role;
		    @$_SESSION['mid']=$rec->mid;
		    @$_SESSION['ulocation']=$rec->ulocation;
		    @$_SESSION['message']="Welcome";
		    header('Location: home.php');
		
	}else{

		@$_SESSION['message']="Failed to log in!";
		header('Location: index.php');
	}

}else{
	header('Location: index.php');
}
?>
