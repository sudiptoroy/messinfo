<!DOCTYPE html>
<?php
echo '<div id="banner" align ="center">
<a href="home.php"><img src="images/banner.jpg" title="messinfo.com" alt="messinfo"></a>
</div><!--div banner end-->';
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-default" role="navigation"><!-- Navigarion bar in home page -->
    <div class="container">
    <ul class="nav navbar-nav">
      <li><a href="home.php">Home</a></li>
      <li><a href="search_mess.php">Search</a></li>
      <li><a href="user_profile.php">Profile</a></li>
      <li><a href="edit_user_profile.php">Account Settings</a></li>
      <!--<input type="text" name="" value="<?php echo @$_SESSION[role]; ?>">-->
      <?php if (@$_SESSION['role'] == "1"){ ?>
      <li><a href="mess_account.php">Create Mess Account</a></li>
      <?php } ?>
      <?php if (@$_SESSION['role'] == "2"){ ?>
      <li><a href="view_mess.php">View mess Profile</a></li>
      <?php } ?>

   </nav>
      <?php if (@$_SESSION['role'] == "3"){ ?>
      <!--<li><a href="manage_mess.php">Manage Mess Profiles</a></li>-->
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Manage Mess Profile
          <span class="caret"></span></button>
           <ul class="dropdown-menu">
             <li><a href="foodmenu.php">Manage Food Menu</a></li>
             <li><a href="supermarket_list_view.php">Manage Supermarket list</a></li>
             <li><a href="manage_member.php">Manage Members</a></li>
             <li><a href="manage_mess_cost.php">Manage Mess Costs</a></li>
             <li><a href="total_meal_market_count.php">Meal Rate</a></li>
             <li><a href="member_meal_count_view.php">Personal Meal Count</a></li>
          </ul>
        </div>
      <?php } ?>
      </ul>
    </div>
     
      
    
      



   
    </body>
</html>
