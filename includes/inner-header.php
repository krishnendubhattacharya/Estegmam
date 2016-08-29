<!-- Land lord signin -->
<?php
$userquery = mysql_fetch_array(mysql_query("select * from `estejmam_user` where `id`='" . $_SESSION['userid'] . "'"));
if ($userquery['image'] != '') {
    $imguser = "upload/userimages/" . $userquery['image'];
} else {
    $imguser = "upload/nouser.jpg";
}
$pagename = end(explode('/', $_SERVER['REQUEST_URI']));
?>

<div class="modal fade" id="signin_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Sign In to Your Account</h4>
                <div class="tag"><img src="images/tag.png" alt="" /></div>
            </div>
            <div class="modal-body">
                <form id="signin">

                    <p class="msg"></p>

                    <div class="form-group has-feedback">
                        <span aria-hidden="true" class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Email">
                    </div>
                    <div class="form-group has-feedback">
                        <span aria-hidden="true" class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <input type="password" class="form-control" name="userpass" id="userpass" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <p>
                            <span class="pull-left"><input type="checkbox"> Remember me</span> <span class="pull-right"><a href="" class="up">Forgot your password?</a></span>
                        </p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary" value="Sign In">
                    </div>

                    <div class="form-group ">
                        <div class="or">
                            <img style=" margin: 0 auto; widrh:44px ; height: 18px; display: block;" alt="" src="images/or.jpg">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-xs-6 pad-left0">
                        <a href="" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                    </div>
                    <div class="form-group col-xs-6 pad-right0">
                        <a href="" class="btn btn-instagram"><i class="fa fa-instagram"></i> Instagram</a>
                    </div>
                    <p>Not A Member Yet? <a href="" class="up">Sign Up Now</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Land lord signup -->
<div class="modal fade" id="landlord_signup_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Landlord Sign Up</h4>
                <div class="tag"><img src="images/tag.png" alt="" /></div>
            </div>
            <div class="modal-body">
                <form id="landlord_signup">

                    <p class="msg"></p>

                    <div class="form-group has-feedback">
                        <span aria-hidden="true" class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <input type="text" class="form-control" name="ls_fname" id="ls_fname" placeholder="First Name">
                    </div>
                    <div class="form-group has-feedback">
                        <span aria-hidden="true" class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <input type="text" class="form-control" name="ls_lname" id="ls_lname" placeholder="Last Name">
                    </div>
                    <div class="form-group has-feedback">
                        <span aria-hidden="true" class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <input type="text" class="form-control" name="ls_email" id="ls_email" placeholder="Email">
                    </div>
                    <div class="form-group has-feedback">
                        <span aria-hidden="true" class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <input type="password" class="form-control" name="ls_pass" id="ls_pass" placeholder="Password">
                    </div>
                    <div class="form-group has-feedback">
                        <span aria-hidden="true" class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <input type="password" class="form-control" name="ls_cpass" id="ls_cpass" placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <p>
                            <span class="pull-left"><input type="checkbox"> Remember me</span> <span class="pull-right"><a href="" class="up">Forgot your password?</a></span>
                        </p>
                        <div class="clearfix"></div>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary" value="Sign Up">
                    </div>

                    <div class="form-group ">
                        <div class="or">
                            <img style=" margin: 0 auto; widrh:44px ; height: 18px; display: block;" alt="" src="images/or.jpg">
                        </div>
                        <div class="clearfix"></div>
                    </div>


                    <p>Already A Member Yet? <a href="" class="up signin">Sign In</a></p>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- User signup -->
<div class="modal fade" id="user_signup_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">User Sign Up</h4>
                <div class="tag"><img src="images/tag.png" alt="" /></div>
            </div>
            <div class="modal-body">
                <form id="user_signup">

                    <p class="msg"></p>

                    <div class="form-group has-feedback">
                        <span aria-hidden="true" class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <input type="text" class="form-control" name="us_fname" id="us_fname" placeholder="First Name">
                    </div>
                    <div class="form-group has-feedback">
                        <span aria-hidden="true" class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <input type="text" class="form-control" name="us_lname" id="us_lname" placeholder="Last Name">
                    </div>
                    <div class="form-group has-feedback">
                        <span aria-hidden="true" class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <input type="text" class="form-control" name="us_email" id="us_email" placeholder="Email">
                    </div>
                    <div class="form-group has-feedback">
                        <span aria-hidden="true" class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <input type="password" class="form-control" name="us_pass" id="us_pass" placeholder="Password">
                    </div>
                    <div class="form-group has-feedback">
                        <span aria-hidden="true" class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <input type="password" class="form-control" name="us_cpass" id="us_cpass" placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <p>
                            <span class="pull-left"><input type="checkbox"> Remember me</span> <span class="pull-right"><a href="" class="up">Forgot your password?</a></span>
                        </p>
                        <div class="clearfix"></div>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary" value="Sign Up">
                    </div>

                    <div class="form-group ">
                        <div class="or">
                            <img style=" margin: 0 auto; widrh:44px ; height: 18px; display: block;" alt="" src="images/or.jpg">
                        </div>
                        <div class="clearfix"></div>
                    </div>


                    <p>Already A Member Yet? <a href="" class="up signin">Sign In</a></p>

                </form>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-default navbar-fixed-top inner-page-header">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand page-scroll"><img src="upload/site_logo/<?php echo $settings['sitelogo']; ?>" alt="<?php echo $settings['alt_text']; ?>" class="img-responsive" title="<?php echo $settings['alt_text']; ?>" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <div class="input-group custom-input-grp">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                        <input type="text" class="form-control" placeholder="Search Here....">
                    </div>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right right_navi">
                <?php if (is_user_logged_in()) { ?>
                    <!-- <li class="become-landlord">
                         <a href="#" data-target="#landlord_signup_modal" data-toggle="modal">Become a landlord</a>
                     </li>
                     <li>
                         <a href="#">Help</a>
                     </li>
                     <li>
                         <a href="#" data-target="#signin_modal" data-toggle="modal">Sign In</a>
                     </li>
                     <li>
                         <a href="#" data-target="#user_signup_modal" data-toggle="modal">Sign Up</a>
                     </li>-->
                    <li>
                        <a href="index.php"><i class="fa fa-home"></i>Home</a>	
                    </li>
                    <li>
                        <a href="inbox.php"><i class="fa fa-envelope"></i>Message</a>	
                    </li>
                    <li>
                        <a><i class="fa fa-question-circle"></i>Help</a>	
                    </li>
                    <li>
                        <a href="my_account.php"><span><img alt="" src="<?php echo $imguser; ?>"></span><?php echo $userquery['fname'] . ' ' . $userquery['lname']; ?></a>	
                    </li>
                <?php } else { ?>
                    <li>
                        <a><i class="fa fa-home"></i>Become A Host</a>	
                    </li>
                    <li>
                        <a><i class="fa fa-envelope"></i>Help</a>	
                    </li>
                    <li>
                        <a><i class="fa fa-question-circle"></i>Sign Up</a>	
                    </li>
                    <li>
                        <a><i class="fa fa-question-circle"></i>Login</a>	
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->

    <?php
    if (is_user_logged_in()) {
        if ($pagename != 'property_list.php' && $pagename != 'property_details.php?id='.$_REQUEST['id']) {
            ?>

            <nav class="dashboard-menu-section">
                <div class="container-fluid">
                    <ul class="nav navbar-nav navbar-left">
                        <li <?php echo ($pagename == 'my_account.php') ? 'class="active"' : ''; ?>><a href="my_account.php">Dashboard</a></li>
                        <li <?php echo ($pagename == 'inbox.php') ? 'class="active"' : ''; ?>><a href="inbox.php">Inbox</a></li>
                        <li <?php echo ($pagename == 'prop-list.php' || $pagename == 'prop-list-uncomp.php' || $pagename == 'your_listing.php' || $pagename == 'your_listing-1.php' || $pagename == 'your_listing-2.php' || $pagename == 'your_listing-3.php' || $pagename == 'your_listing-4.php' || $pagename == 'your_listing-5.php' || $pagename == 'your_listing-6.php' || $pagename == 'your_listing-7.php' || $pagename == 'your_listing-8.php' || $pagename == 'your_listing-9.php' || $pagename == 'your_listing-10.php' || $pagename == 'guest-book.php' || $pagename == 'guest_book_new.php' || $pagename == 'your_listing-prof.php' || $pagename == 'prop-list-reserved.php' || $pagename == 'prop-list-reserved-request.php') ? 'class="active"' : ''; ?>><a href="prop-list.php">Your Listings</a></li>
                        <li <?php echo ($pagename == 'my-rent.php') ? 'class="active"' : ''; ?>><a href="my-rent.php">Your Rent</a></li>
                        <li <?php
                        if ($pagename == 'profile-edit.php' || $pagename == 'profile-photo.php' || $pagename == 'profile-verification.php' || $pagename == 'profile-reviews.php') {
                            echo 'class="active"';
                        }
                        ?>><a href="profile-edit.php">Profile</a></li>
                        <li <?php
                        if ($pagename == 'account-notification.php' || $pagename == 'account-payment-methods.php' || $pagename == 'account-payment-payout.php' || $pagename == 'account-transaction.php' || $pagename == 'aaccount-privacy.php' || $pagename == 'account-security.php' || $pagename == 'account-settings.php') {
                            echo 'class="active"';
                        }
                        ?>><a href="account-notification.php">Account</a></li>
                        <!--                    <li><a href="your_listing.php">Add Your Listing</a></li>-->
                    </ul>
                </div>
            </nav>

            <?php
        }
    }
    ?>

</nav>





<script>
    $(function () {

        $('#signin').submit(function () {
            $.ajax({
                type: 'POST',
                url: 'functions/ajax.php',
                data: {
                    action: 'signin',
                    username: $('#username').val(),
                    userpass: $('#userpass').val()
                },
                success: function (res) {
                    var data = $.parseJSON(res);

                    if (data.ack == 1) {
                        $('#signin p.msg').text(data.msg);
                        window.location.href = data.redirect_url;
                    } else {
                        $('#signin p.msg').text(data.msg);
                    }

                }
            });
            return false;
        });


        $('#user_signup').submit(function () {
            $.ajax({
                type: 'POST',
                url: 'functions/ajax.php',
                data: {
                    action: 'user_signup',
                    fname: $('#us_fname').val(),
                    lname: $('#us_lname').val(),
                    email: $('#us_email').val(),
                    pass: $('#us_pass').val(),
                    cpass: $('#us_cpass').val()
                },
                success: function (res) {
                    var data = $.parseJSON(res);

                    if (data.ack == 1) {
                        $('#user_signup p.msg').text(data.msg);
                        window.location.href = data.redirect_url;
                    } else {
                        $('#user_signup p.msg').text(data.msg);
                    }
                }
            });

            return false;
        });


        $('#landlord_signup').submit(function () {
            $.ajax({
                type: 'POST',
                url: 'functions/ajax.php',
                data: {
                    action: 'landlord_signup',
                    fname: $('#ls_fname').val(),
                    lname: $('#ls_lname').val(),
                    email: $('#ls_email').val(),
                    pass: $('#ls_pass').val(),
                    cpass: $('#ls_cpass').val()
                },
                success: function (res) {
                    var data = $.parseJSON(res);

                    if (data.ack == 1) {
                        $('#landlord_signup p.msg').text(data.msg);
                        window.location.href = data.redirect_url;
                    } else {
                        $('#landlord_signup p.msg').text(data.msg);
                    }
                }
            });

            return false;
        });


        $('.signin').click(function (e) {
            e.preventDefault();
            $(this).closest('div.modal').modal("hide");
            $("#signin_modal").modal("show");
        });

    });
</script>