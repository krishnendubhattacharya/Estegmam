<?php
ob_start();
session_start();
include('administrator/includes/config.php');
if(isset($_REQUEST['email']) and $_REQUEST['email']!='')
{
$sql=mysql_query("select * from vacation_user where email='".$_REQUEST['email']."' and password='".md5($_REQUEST['password'])."'");
if(mysql_num_rows($sql)>0){
$row=mysql_fetch_assoc($sql);
$_SESSION['user_id']=$row['id'];
header("Location:my_account.php");
}
else{
$_SESSION['login_error']=1;
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home Vacation</title>
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
<link href="css/font-awesome.css" type="text/css" rel="stylesheet" media="all">
<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/carosel_bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">

<script src="js/jquery.bxslider.js"></script>

<script src="js/jquery.js"></script>

<script src="js/jquery_002.js"></script>

<script type="text/javascript">
$(document).ready(function(){ 
	$('.bxslider').bxSlider({
	  minSlides: 1,
	  maxSlides: 1,
	  slideWidth: 360,
	  slideMargin: 10
	});
});
</script>
<script type="text/javascript">
$(document).ready(function(){ 
	$('.bxslider_location').bxSlider({
	  minSlides: 1,
	  maxSlides: 1,
	  slideWidth: 360,
	  slideMargin: 10
	});
});
</script>
</head>
<body>
<?php include('includes/header.php');?>  
    <section class="signup_sec login_sec">
    	<div class="container">
        
        	<div class="signup_box login_box">
            	<div role="alert" class="alert alert-danger" style="display:<?php echo $_SESSION['login_error']==1?'block':'none'; ?>">
                <strong>Log In Error!</strong>&nbsp;Invalid Email or Password
                </div>
                <?php $_SESSION['login_error']=0;?>
            	<h1>Sign in to Home Vacation Club</h1>
                <p>Need an account?<a href="signup.php"> Sign Up</a> </p>
            	<form method="post">
                  <div class="form-group">
                    <input class="form-control" id="exampleInputEmail1" placeholder="Email Address" type="text" name="email" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password" name="password" required>
                  </div>
                  
                   <div class="forgot_remem">
                    <label class="pull-left"><a href="#">Forgot Password</a></label>
                    <label class="pull-right"><input type="checkbox"> Remember me</label>
                    <div class="clearfix"></div>
                  </div>  
                   <div class="forgot_remem">               
                  <button type="submit" class="btn btn_blue" name="submit">Sign in</button>  
                   </div>                                  
                  <p>Sign in to different account </p>
                </form>
                <div class="signup_social">
                	<a href=""><img src="images/signup_face.png" class="signup_img"></a>
                    <a href=""><img src="images/signup_twitter.png"></a>
                </div>
            </div>
        </div>
    </section>  
	
    <section class="secondbg">
          <div class="container secondbg_box">
          <div class="home_gal_lft home_gal_lft_location">
             <div class="homegallery_boxes_ul">
            <ul>
              <li> 
                <img src="images/100percent.png" style="width:100%;"> 
                <div class="popularbx">
                  <div class="popular_txt"><p></p></div>
                </div>
                <div class="popularbx_btm">
                  <div class="popular_txt"><p></p></div>
                </div>
              </li>
            </ul>
            <div class="clearfix"></div>
            <ul class="secondul">
              <li>
                <div class="popularbx2">
                  <div class="popular_txt"><p></p></div>
                </div>
                <div class="popularbx_btm2">
                  <div class="popular_txt"><p></p></div>
                </div>
              </li>
            </ul>
            <div class="clearfix"></div>

            <?php include('includes/sidebar.php');?>      

          </div>

          </div> 
          <?php include('reservation_new.php');?>

          <div class="clearfix"></div>

          </div>

           </section>
    <?php include('includes/footer.php')?>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jssor.slider.mini.js"></script>
<script type="text/javascript" src="js/jssor.js"></script>

</body>

</html>

