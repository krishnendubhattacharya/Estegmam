<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';

if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {
    $categoryRowset = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_main_property` WHERE `id`='" . mysql_real_escape_string($_SESSION['prop_id']) . "'"));
}

if ($_REQUEST['action'] == 'edit') {
    $categoryRowset = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_main_property` WHERE `id`='" . mysql_real_escape_string($_REQUEST['id']) . "'"));
}

if ($_REQUEST['submit']) {

    if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
        $id = $_REQUEST['id'];
        header('Location:your_listing-prof.php?id=' . $_REQUEST['id'] . '&action=edit');
    }
    if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {
        $id = $_SESSION['prop_id'];
        header('Location:your_listing-prof.php');
    }



    exit();
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


        <?php include ('includes/inner-header.php'); ?>


        <section class="all-step-section">
            <div class="container-fluid">
                <div class="row">

                    <?php include 'includes/your_listing_sidebar.php'; ?>

                    <div class="col-md-7">
                        <div class="step-right-area">
                            <h2>Show guests when they can book</h2>
                            <p>An accurate calendar is the most important first step for hosting.</p>
                            <h4>When are you available?</h4>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="javascript:void(0);" class="cal-box" id="1" onclick="first('0')">
                                            <div class="img-box" style="position: relative;">
                                                <img src="images/calendar-1.png" alt="">
                                                <div <?php if ($categoryRowset['availability'] == '0') { ?>style="display: block;" <?php } else { ?> style="display: none;" <?php } ?> id="image1">
                                                    <div class="round-image" style="bottom: 18px;height: 34px;position: absolute;right: 23px;width: 34px;">
                                                        <img src="images/tick.png" alt="" style="margin: 0;">
                                                    </div>
                                                </div>
                                            </div>
                                            <h4>Always</h4>
                                            <p>Any day is bookable.</p>
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="javascript:void(0);" class="cal-box" id="2" onclick="second('1')">
                                            <div class="img-box" style="position: relative;">
                                                <img src="images/calendar-2.png" alt="">
                                                <div <?php if ($categoryRowset['availability'] == '1') { ?>style="display: block;" <?php } else { ?> style="display: none;" <?php } ?> id="image2">
                                                    <div class="round-image" style="bottom: 18px;height: 34px;position: absolute;right: 23px;width: 34px;">
                                                        <img src="images/tick.png" alt="" style="margin: 0;">
                                                    </div>
                                                </div>
                                            </div>
                                            <h4>Sometimes</h4>
                                            <p>Block days when you can't host.</p>
                                        </a>
                                    </div>
                                    <div class = "col-sm-4">
                                        <?php
                                        if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                            ?>
                                            <a href="your_listing-10.php?id=<?php echo $_REQUEST['id'] ?>&action=edit" class="cal-box">
                                                <?php
                                            } else {
                                                ?>
                                                <a href="your_listing-10.php" class="cal-box">
                                                    <?php
                                                }
                                                ?>
                                                <div class="img-box" style="position: relative;">
                                                    <img src="images/calendar-3.png" alt="">
                                                    <div <?php if ($categoryRowset['availability'] == '3') { ?>style="display: block;" <?php } else { ?> style="display: none;" <?php } ?> id="image2">
                                                        <div class="round-image" style="bottom: 18px;height: 34px;position: absolute;right: 23px;width: 34px;">
                                                            <img src="images/tick.png" alt="" style="margin: 0;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4>One time</h4>
                                                <p>Host for just one period of time.</p>
                                            </a>
                                    </div>
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
                                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Save" />
                                    <!--                                        <input type="submit" class="btn btn-default pull-left" value="Back" />-->
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


        <script>
                                            function first(id)
                                            {
                                                $.ajax({
                                                    type: "post",
                                                    url: "calender_date_check.php",
                                                    data: {id: id, propid:<?php echo $categoryRowset['id'] ?>},
                                                    success: function (msg) {
                                                        //$('#image1').html(msg);
                                                        $('#image1').show();
                                                        $('#image2').hide();
                                                        $("#rightshow").addClass("right");
                                                    }
                                                });
                                            }


                                            function second(id)
                                            {
                                                $.ajax({
                                                    type: "post",
                                                    url: "calender_date_check.php",
                                                    data: {id: id, propid:<?php echo $categoryRowset['id'] ?>},
                                                    success: function (msg) {
                                                        //$('#image2').html(msg);
                                                        $('#image2').show();
                                                        $('#image1').hide();
                                                        $("#rightshow").addClass("right");
                                                    }
                                                });
                                            }


        </script>

    </body>
</html>
