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

        <?php include ('includes/inner-header.php'); ?>


        <section class="all-step-section">
            <div class="container-fluid">
                <div class="row">

                    <?php include 'includes/your_listing_sidebar.php'; ?>

                    <div class="col-md-7">
                        <div class="step-right-area">
                            <h2>Guests request to book</h2>
                            <p>You respond to each request within 24 hours. 
                                <!-- <a href="your_listing-8.php">Change</a> -->
                            </p>
                            <hr>
                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="padding: 10px;width: 100%;overflow: hidden;background: #CFFDDD;">
                                            <div class="row">
                                                <div class="col-sm-3">

                                                    <img src="images/bulb.png" style="display:block;margin: 10px auto;">
                                                </div>
                                                <div class="col-sm-9">
                                                    <h4>After you list, set up your calendar to get only the bookings you want.</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div></div>
                                <div class="row">
                                    <div class="col-md-12">
<!--                                        <p>Nightly Price</p>-->
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-btn">

                                                </span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="col-md-12">
                                        <hr>
                                        <p>
                                            <?php
                                            if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                ?>
                                                <a href="your_listing-8.php?id=<?php echo $_REQUEST['id'] ?>&action=edit">Back</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="your_listing-8.php">Back</a>
                                                <?php
                                            }
                                            ?>
<!-- <input type="submit" class="btn btn-default pull-left" value="Back" /> -->
                                            <?php
                                            if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                ?>
                                                <a href="your_listing-9.php?id=<?php echo $_REQUEST['id'] ?>&action=edit" class="btn btn-primary pull-right">Next</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="your_listing-9.php" class="btn btn-primary pull-right">Next</a>
                                                <?php
                                            }
                                            ?>
                                        </p>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>


<?php include ('includes/footer.php'); ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>



    </body>
</html>
