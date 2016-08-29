<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';

if (!is_user_logged_in()) {
    header("location:index.php");
}


if (isset($_REQUEST['submit'])) {

    $amenities = isset($_POST['amenities']) ? $_POST['amenities'] : '';
    $dbamenities = implode(',', $amenities);


    $fields = array(
        'amenities' => mysql_real_escape_string($dbamenities),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_SESSION['prop_id']) . "'";

        if (mysql_query($editQuery)) {

            header('Location:your_listing-5.php');
            exit();
        }
    }


    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

        if (mysql_query($editQuery)) {

            header('Location:your_listing-5.php?id=' . $_REQUEST['id'] . '&action=edit');
            exit();
        }
    }
}




if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {
    $categoryRowset = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_main_property` WHERE `id`='" . mysql_real_escape_string($_SESSION['prop_id']) . "'"));
}
if ($_REQUEST['action'] == 'edit') {
    $categoryRowset = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_main_property` WHERE `id`='" . mysql_real_escape_string($_REQUEST['id']) . "'"));
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
                            <h2>Tell travelers about your space</h2>
                            <p>Every space on Airbnb is unique. Highlight what makes your listing welcoming so that it stands out to guests who want to stay in your area.</p>
                            <hr>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Common Amenities</h4>
                                        <div class="row">
                                            <?php
                                            $dbcommon = $categoryRowset['amenities'];
                                            $dbexpcommon = explode(',', $dbcommon);
                                            $common = mysql_query("select * from `estejmam_amenities` where `type`='1'");
                                            while ($commanaminities = mysql_fetch_array($common)) {
                                                ?>

                                                <div class="col-md-4">
                                                    <p><input type="checkbox" name="amenities[]" value="<?php echo $commanaminities['name'] ?>" <?php if (in_array($commanaminities['name'], $dbexpcommon)) { ?> checked <?php } ?>/> <?php echo $commanaminities['name'] ?></p>
                                                </div>

                                                <?php
                                            }
                                            ?>
                                        </div>

                                        <hr>

                                        <h4>Additional Amenities</h4>
                                        <div class="row">
                                            <?php
                                            $additional = mysql_query("select * from `estejmam_amenities` where `type`='2'");
                                            while ($additionalaminities = mysql_fetch_array($additional)) {
                                                ?>
                                                <div class="col-md-4">
                                                    <p><input type="checkbox" name="amenities[]" value="<?php echo $additionalaminities['name'] ?>" <?php if (in_array($additionalaminities['name'], $dbexpcommon)) { ?> checked <?php } ?>/> <?php echo $additionalaminities['name'] ?></p>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <hr>
                                        <h4>Special Features</h4>
                                        <h5>Features of your listing for guests with specific needs.</h5>
                                        <div class="row">
                                            <?php
                                            $special = mysql_query("select * from `estejmam_amenities` where `type`='3'");
                                            while ($specialalaminities = mysql_fetch_array($special)) {
                                                ?>
                                                <div class="col-md-4"><p><input type="checkbox" name="amenities[]" value="<?php echo $specialalaminities['name'] ?>" <?php if (in_array($specialalaminities['name'], $dbexpcommon)) { ?> checked <?php } ?>/> <?php echo $specialalaminities['name'] ?></p></div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                        <p>
                                                <!-- <input type="submit" class="btn btn-default pull-left" value="Back" /> -->
                                            <?php
                                            if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                ?>
                                                <a href="your_listing-3.php?id=<?php echo $_REQUEST['id'] ?>&action=edit">Back</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="your_listing-3.php">Back</a>
                                                <?php
                                            }
                                            ?>
                                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Next" />
                                        </p>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="addition-amenity-box">
                            <h4 class="text-center">Additional Amenities</h4>
                            <p>People can filter their search by the amenities they want, so make sure you include every time you offer.</p>
                            <div class="bulb"><img src="images/bulb.png" alt=""></div>
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
