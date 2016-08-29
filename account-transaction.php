<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';
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
                            <div class="grey_bac" style="padding-bottom: 0">
                                <ul class="nav nav-tabs transactions" role="tablist">
                                    <li role="presentation" class="active"><a href="#complete" aria-controls="complete" role="tab" data-toggle="tab">Completed Transactions</a></li>
                                    <li role="presentation"><a href="#future" aria-controls="future" role="tab" data-toggle="tab">Future Transactions</a></li>
                                    <li role="presentation"><a href="#gross" aria-controls="gross" role="tab" data-toggle="tab">Gross Earnings</a></li>
                                </ul>
                            </div>
                            <div class="common_hold-content-area">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="complete">
                                        <div class="row">
                                            <form>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <select class="form-control"><option>All payout method</option></select>
                                                    </div>
                                                    <span class="pull-left"><b>Date</b></span>
                                                    <span class="pull-right"><b>Type</b></span>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <select class="form-control"><option>All Listings</option></select>
                                                    </div>
                                                    <span class="pull-right"><b>Details</b></span>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <select class="form-control"><option></option></select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <select class="form-control"><option>From: January</option></select>
                                                    </div>
                                                    <p class="text-center"><b>Amount</b></p>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <select class="form-control"><option>To: December</option></select>
                                                    </div>
                                                    <p class="text-center"><b>Paid Out</b></p>
                                                </div>
                                            </form>
                                            <div class="col-md-12">
                                                <h2 class="text-center">No Transactions</h2>
                                            </div>
                                            <div class="col-md-12">
                                                <p>
                                                    <a href="" class="border-link"><i class="fa fa-angle-double-left"></i></a>
                                                    <a href="" class="border-link"><i class="fa fa-angle-double-right"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="future">Future</div>
                                    <div role="tabpanel" class="tab-pane" id="gross">Gross</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <?php include 'includes/footer.php'; ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>


    </body>
</html>
