
<!--<?php
echo '<div id="footer" align="center">
<p><a href="home.php">Home</a> | <a href="login_about.php">About Us</a> | <a href="index.php">Logout</a>
</p>
<p>&copy; 2017 Messinfo.com | All rights reserved. </p>
</div> <!--div footer end-->';
?>-->
<?php
   include('config/css.php');
?>
<?php include('scripts/js.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

  </head>

  <body>

    <!-- Begin page content -->

    <footer class="footer">
      <div class="container">
        <!--<p class="text-muted">Place sticky footer content here.</p>-->
        <div id="footer" align="center">
           <p><a href="home.php">Home</a> | <a href="login_about.php">About Us</a> | <a href="logout.php">Logout</a>
           </p>
        <?php echo '<p>&copy; 2017 Messinfo.com | All rights reserved. </p>'; ?>
       </div> <!--div footer end-->
      </div>
    </footer>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

