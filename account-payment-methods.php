<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");

if (!is_user_logged_in()) {
    header("location:index.php");
}

$userprofile = mysql_fetch_array(mysql_query("select * from `estejmam_card_details` where `user_id`='" . $_SESSION['userid'] . "'"));
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

        <div class="modal fade" id="paymentmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog custom-modal" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add New Payment Method</h4>
                    </div>
                    <div class="modal-body">
					<span id="review_msg3" style="display:none;color:green;font-size:12px;">Information Saved....</span>
					<form action="" method="POST" id="paymentmethod" class="paymentmethod" name="paymentmethod">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <p><img src="images/cards.png" alt=""></p>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Card Number</label>
                                    <input type="text" class="form-control" name="cardnumber" value="<?php echo $userprofile['cardnumber']  ?>" required/>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <label>Expires on</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control" name="exp_month" required>
											<option value="">mm</option>
											<?php
											for($i=1;$i<=12;$i++)
											{
											?>
											<option value="<?php echo $i ?>" <?php if ($userprofile['exp_month'] == $i) { ?> selected <?php } ?>><?php echo $i ?></option>
											<?php
											}
											?>
											</select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control" name="exp_year" required>
											<option value="">yyyy</option>
											<?php
											$year = date("Y");
											$nxtyear = $year+20;
											for($i=$year;$i<=$nxtyear;$i++)
											{
											?>
											<option value="<?php echo $i ?>" <?php if ($userprofile['exp_year'] == $i) { ?> selected <?php } ?>><?php echo $i ?></option>
											<?php
											}
											?>
											</select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Security Code</label>
                                    <input type="text" class="form-control" name="cvv" value="<?php echo $userprofile['cvv']  ?>" required/>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="fname" value="<?php echo $userprofile['fname']  ?>" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="lname" value="<?php echo $userprofile['lname']  ?>" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="text" class="form-control" name="post_code" value="<?php echo $userprofile['post_code']  ?>" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select name="country" class="form-control" required>
                                                <option value="" disabled selected>Select</option>
                                                <?php
                                                $coun = mysql_query("select * from `estejmam_countries`");
                                                while ($allcountry = mysql_fetch_array($coun)) {
                                                    ?>
                                                    <option value="<?php echo $allcountry['id'] ?>" <?php if ($userprofile['country'] == $allcountry['id']) { ?> selected <?php } ?>><?php echo $allcountry['name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <!-- <button type="button" class="btn btn-primary">Add Cart</button> -->
						<input type="submit" name="submit" value="Add Card" class="btn btn-primary">
                    </div>
                </div>
            </div>
			</form>
        </div>


        <?php include 'includes/inner-header.php'; ?>



        <section class="my-account-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <ul class="account-menu">
                            <li <?php echo ($pagename=='account-notification.php') ? 'class="selected"' : ''; ?>><a href="account-notification.php">Notifications</a></li>
                            <li <?php echo ($pagename=='account-payment-methods.php') ? 'class="selected"' : ''; ?>><a href="account-payment-methods.php">Payment Methods</a></li>
                            <li <?php echo ($pagename=='account-payment-payout.php') ? 'class="selected"' : ''; ?>><a href="account-payment-payout.php">Payout Preferences</a></li>
                            <li <?php echo ($pagename=='account-transaction.php') ? 'class="selected"' : ''; ?>><a href="account-transaction.php">Transaction History</a></li>
                            <li <?php echo ($pagename=='account-privacy.php') ? 'class="selected"' : ''; ?>><a href="account-privacy.php">Privacy</a></li>
                            <li <?php echo ($pagename=='account-security.php') ? 'class="selected"' : ''; ?>><a href="account-security.php">Security</a></li>
                            <li><a href="#">Connected Apps</a></li>
                            <li <?php echo ($pagename=='account-settings.php') ? 'class="selected"' : ''; ?>><a href="account-settings.php">Settings</a></li>
                            <li><a href="#">Badges</a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <p><a href="" class="invite-friend btn-block">Invite Friends</a></p>
                    </div>
                    <div class="col-md-9 col-sm-8">
                        <div class="common_hold">
                            <h4 class="grey_bac">Payment Methods</h4>
                            <div class="common_hold-content-area">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="" class="add-paymnt" data-toggle="modal" data-target="#paymentmodal">
                                            <i class="fa fa-plus fa-4x"></i>
                                            <p>Add Payment Method</p>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="common_hold">
                            <h4 class="grey_bac">Estejmam Gift Card</h4>
                            <div class="common_hold-content-area">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-balance">Estejmam Gift Card Balance: <span>$0</span></h3>
                                        <p>The credit balance from gift cards will be automatically applied when you book a trip</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter gift card code" />
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <a href="" class="btn btn-primary">Apply to account</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <p><a href="">Estejmam gift card help</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--    	<div class="top_details">
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


        <?php include 'includes/footer.php'; ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>


		<script>
	$(function() {
	$('.paymentmethod').submit(function(event){
			event.preventDefault();
			 //$('#loader').show();
	         var str = $(".paymentmethod").serialize();
            $.ajax({
                type: "post",
                url: "ajax_payment_save.php",
                data: str,
                success: function(msg) { 
				
                if(msg.trim()=='suc'){
				//$('#loader').fadeOut('slow');
				$('#review_msg3').show('slow');
				//$('.plan_travel_content').scrollTop();
				setTimeout(function(){
				$("#review_msg3").fadeOut() }, 3000);
				//$("#paymentmethod")[0].reset();
				}
                }
    });
	});
	});
</script>


    </body>
</html>
