<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");
include("class.phpmailer.php");

if (!is_user_logged_in()) {
    header("location:index.php");
}
?>

<?php
if ($_POST['submit']) {
  $email_confirm = $_REQUEST['email_confirm'];
  $userid = $_SESSION['userid'];
	
        $user = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='".$userid."'"));
    
        if($user->email_confirm_code == $email_confirm){

            mysql_query("UPDATE `estejmam_user` SET `email_confirmed`=1 WHERE `id`='$userid'");

            $_SESSION['MSG'] = 1;
			header("location:email_veifyed_conf.php");
			exit();
        } else {
            $_SESSION['MSG'] = 2;
			header("location:email_veifyed_conf.php");
			exit();
        }
    
    
}

?>

<?php
$user = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . mysql_real_escape_string($_SESSION['userid']) . "'"));
if ($user['image'] != '') {
	$img = "upload/userimages/".$user['image'];
}
else
{
   $img ="upload/nouser.jpg";
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Estejmam</title>

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href='css/jquery.bxslider.css' rel='stylesheet' type='text/css'>
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/style5.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
        <link rel="stylesheet" type="text/css" href="css/style8.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

    </head>

    <body>
        
        
        <?php include 'includes/inner-header.php'; ?>

        <section class="my-account-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="top_dash">
                            <div class="dash_img"><img src="<?php echo $img; ?>" alt=""></div>
                            <div class="clearfix"></div>
                            <a href="profile-photo.php" class="add_pro_phto"><i class="fa fa-camera"></i> Add Profile Photo</a>
                            <div class="clearfix"></div>
                            <div class="panel-body">
                                <h2><?php echo $user['fname'].' '.$user['lname']; ?></h2>
                                <!-- <p><a href="">View Profile</a></p> -->
                                <a href="profile-edit.php" class="btn btn-primary">Edit Profile</a>
                            </div>
                        </div>
                        <div class="common_hold">
                            <h4 class="grey_bac">Verifications <i class="fa fa-question-circle"></i></h4>
                            <div class="common_hold-content-area">
                                <ul class="quick-listing">
                                    <li class="verified">
									<?php if($user['email_confirmed']==1) { ?>
                                        <span><img src="images/tick.png"></span>
										<?php } else { ?>
										<span><img src="images/basic_red.png"></span>
										<?php } ?>
                                        <a href="email_veifyed.php"><p>Email <br>Validated</p></a>
                                    </li>
                                    <li class="verified">
                                        <?php if($user['mobile_verifyed']==1) { ?>
                                        <span><img src="images/tick.png"></span>
										<?php } else { ?>
										<span><img src="images/basic_red.png"></span>
										<?php } ?>
                                        <a href="email_veifyed.php"><p>Phone <br>Validated</p></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="common_hold">
                            <h4 class="grey_bac">Quick Links</h4>
                            <div class="common_hold-content-area">
                                <ul class="quick-listing">
                                    <li><a href="">Upcoming Trips</a></li>
                                    <li><a href="">Hosting</a></li>
                                    <li><a href="">Travelling</a></li>
                                    <li><a href="">Help Center</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-8">
                        <div class="common_hold">
                            <h4 class="grey_bac">Email Verifications
							<?php 
							if($_SESSION['MSG'] == "1")
							{
							?>
							<span style="color:green;float:right;font-size:12px;">Email Varifyed</span>
							<?php $_SESSION['MSG'] =''; } ?>
							<?php 
							if($_SESSION['MSG'] == "2")
							{
							?>
							<span style="color:red;float:right;font-size:12px;">Please Enter Correct Code</span>
							<?php $_SESSION['MSG'] =''; } ?>
							</h4>
                           <form action="" method="POST">
                           
						
						   <div class="common_hold-content-area">
                                <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" name="email_confirm" placeholder="Enter Your Code" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                        </div>
                            </div>
							
							
							
							</form>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!--<div class="top_details">
                <div class="container">
                    <div class="my_account_left">

                            </div>
                            <div class="my_account_right">


                        <div class="right_hold">
                                            <h2 class="grey_bac">Lorem Ipsum dolor sit amet</h2>
                            <div class="left_info">
                                <ul class="ac_info">
                                    <li>
                                        <p>Lorem Ipsum dolor sit amet</p>
                                    </li>

                                </ul>
                             </div>
                             <div class="right_info">
                                <ul class="ac_info">

                                    <li> <input type="button" value="Save" class="btn right"></li>
                                </ul>
                             </div>
                            </div>



                    </div>
                <div class="clearfix"></div>
                </div>
            </div>-->

        </section>


        <?php include("includes/footer.php"); ?>
        
        

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>


    </body>
</html>
