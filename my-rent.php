<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");

if (!is_user_logged_in()) {
    header("location:index.php");
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
                        <ul class="account-menu">
                            <li class="selected"><a href="">My Rents</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9 col-sm-8 profile-right-sec">
                        <div class="common_hold">
                            <form>
                                <h4 class="grey_bac">Your Trips</h4>
                                <div class="common_hold-content-area">
                                    <p>You have no current Rent</p>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" placeholder="Where are you going?" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="submit" value="Search" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
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
