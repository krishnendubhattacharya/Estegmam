<?php
ob_start();
session_start();
include_once("includes/config.php");

if(isset($_POST['submit']))
{
	$un=$_REQUEST['un'];
	$pass=$_REQUEST['pass'];
	$sql="SELECT * FROM `estejmam_tbladmin` WHERE `admin_username`='".mysql_real_escape_string($un)."' and `admin_password`='".mysql_real_escape_string($pass)."'";
	//exit;
	$rs=mysql_query($sql) or die(mysql_error());
	if($row=mysql_fetch_object($rs))
	{
		
		$_SESSION['username']=$row->admin_username;
		$_SESSION['admin_id']=$row->id;
		$_SESSION['myy']=$row->id;
		header("location:dashboard.php");
	}
	else
	{
		$msg="Invalid Username or Password.";
	}
}

?><!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">

      <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" required class="input-block-level" placeholder="Username" name="un">
        <input type="password" required class="input-block-level" placeholder="Password" name="pass">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit" name="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>