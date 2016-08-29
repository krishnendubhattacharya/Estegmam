<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");

if (!is_user_logged_in()) {
    header("location:index.php");
}
$userprofile = mysql_fetch_array(mysql_query("select * from `estejmam_payout` where `user_id`='" . $_SESSION['userid'] . "'"));
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
                            <h4 class="grey_bac">Payout Methods</h4>
                            <div class="common_hold-content-area">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...</p>
                                <hr>
                                <p><a href="" class="invite-friend" data-toggle="modal" data-target="#paymentmodal">Add Payout Method</a> &nbsp;<span>Direct deposit, Paypal etc.</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


		<div class="modal fade" id="paymentmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog custom-modal" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Payout Method</h4>
                    </div>
                    <div class="modal-body">
					<span id="review_msg3" style="display:none;color:green;font-size:12px;">Information Saved....</span>
					<form action="" method="POST" id="paymentmethod" class="paymentmethod" name="paymentmethod">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $userprofile['address']  ?>" required/>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address2/Zone</label>
                                    <input type="text" class="form-control" name="zone" value="<?php echo $userprofile['zone']  ?>"/>
                                </div>
                            </div>
                                    
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>City <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="city" value="<?php echo $userprofile['city']  ?>" required/>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>State/Province <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="state" value="<?php echo $userprofile['state']  ?>" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Postal Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="zipcode" value="<?php echo $userprofile['zipcode']  ?>" required/>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Country <span style="color:red;">*</span></label>
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
						<input type="submit" name="submit" value="Next" class="btn btn-primary">
                    </div>
                </div>
            </div>
			</form>
        </div>




		<!-- <div class="modal" id="paymentmodal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
            <div class="modal-dialog custom-modal" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Payout Method</h4>
                    </div>
                    <div class="modal-body">
					<span id="review_msg3" style="display:none;color:green;font-size:12px;">Information Saved....</span>
					<form action="" method="POST" id="paymentmethod_dlt" class="paymentmethod_dlt" name="paymentmethod_dlt">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                        <div class="row">
                         <div class="col-md-12">
                           <div class="panel panel-default">
  
  <div class="panel-heading">Payment</div>

  
  <table class="table">
   <th>Payout method</th>
   <th>Proccing time</th>
   <th>Additional fees</th>
   <th>Currency</th>
   <th>Details</th>

   <tr>
   <td><input type="radio" name="method" value="1"> Bank Trnsfer</td>
   <td>3-5 Buisness Days</td>
   <td>None</td>
   <td>INR</td>
   <td>Business day processing only; weekends and banking holidays may cause delays</td>
   </tr>
  </table>
</div>
</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        
						<input type="submit" name="submit" value="Next" class="btn btn-primary">
                    </div>
                </div>
            </div>
			</form>
        </div> -->



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
                url: "ajax_payment_payout.php",
                data: str,
                success: function(msg) { 
				
                if(msg.trim()=='suc'){
				//$('#loader').fadeOut('slow');
				$('#review_msg3').show('slow');
				//$('.plan_travel_content').scrollTop();
				setTimeout(function(){
				$("#review_msg3").fadeOut() }, 3000);
				//$("#paymentmethod")[0].reset();
				//$("#paymentmodal").hide();
                //$("#paymentmodal1").show();
				}
                }
    });
	});

/*$("#close1").click(function()
			{
	$("#paymentmodal1").addClass('fade');
	$("#paymentmodal").removeClass('fade in');
	$("#paymentmodal").addClass('fade');
	$(".modal").hide();
	$(".modal-backdrop").css("display","none");
			});*/
	});
</script>


    </body>
</html>
