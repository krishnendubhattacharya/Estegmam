<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';


if ($_REQUEST['eachrequest'] == '1') {

    $review_each_request = isset($_REQUEST['eachrequest']) ? $_REQUEST['eachrequest'] : '';


    $fields = array(
        'review_each_request' => mysql_real_escape_string($review_each_request),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_SESSION['prop_id']) . "'";

        if (mysql_query($editQuery)) {

            header('Location:guest-book.php');
            exit();
        }
    }

    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

        if (mysql_query($editQuery)) {

            header('Location:guest-book.php?id=' . $_REQUEST['id'] . '&action=edit');
            exit();
        }
    }
}



if ($_REQUEST['requestinstant'] == '2') {

    $guest_book_instant = isset($_REQUEST['requestinstant']) ? $_REQUEST['requestinstant'] : '';


    $fields = array(
        'guest_book_instant' => mysql_real_escape_string($guest_book_instant),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_SESSION['prop_id']) . "'";

        mysql_query($sql);

        if (mysql_query($editQuery)) {

            header('Location:guest_book_new.php');
            exit();
        }
    }

    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

        mysql_query($sql);

        if (mysql_query($editQuery)) {

            header('Location:guest_book_new.php?id=' . $_REQUEST['id'] . '&action=edit');
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
                            <h2>Choose how your guests book</h2>
                            <p>Get ready for guests by choosing your booking style.</p>
                            <hr>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />

                                <input type="hidden" name="review_each_request" value="1">
                                <input type="hidden" name="guest_book_instant" value="2">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="guest-box">
                                            <h4>Review Each Request</h4>
                                            <span class="comment-icon"><img src="images/comment-icon-1.png" alt=""></span>
                                            <div class="clearfix"></div>
                                            <hr>
                                            <ul>
                                                <li>Guests Send booking request</li>
                                                <li>Approve or decline within 24 hours.</li>
                                            </ul>
                                            <!--                                            <button type="submit" name="eachrequest" class="btn-select btn-block">Select</button>-->
<!--                                            <input type="submit" name="eachrequest" class="btn-select btn-block" value="Select">-->
                                            <?php
                                            if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                ?>
                                                <a href="your_listing-8.php?eachrequest=1&action=edit&id=<?php echo $_REQUEST['id'] ?>" class="btn-select btn-block">Select</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="your_listing-8.php?eachrequest=1" class="btn-select btn-block">Select</a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="guest-box">
                                            <h4>Guests book Instantly</h4>
                                            <span class="comment-icon"><img src="images/comment-icon-2.png" alt=""></span>
                                            <div class="clearfix"></div>
                                            <hr>
                                            <ul>
                                                <li>Set controls for who books and when.</li>
                                                <li>Guests book without needing approval.</li>
                                            </ul>
                                            <!--                                            <button type="submit" name="requestinstant" class="btn-select btn-block">Select</button>-->
<!--                                            <input type="submit" name="requestinstant" class="btn-select btn-block" value="Select">-->
                                            <?php
                                            if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                ?>
                                                <a href="your_listing-8.php?requestinstant=2&action=edit&id=<?php echo $_REQUEST['id'] ?>" class="btn-select btn-block">Select</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="your_listing-8.php?requestinstant=2" class="btn-select btn-block">Select</a>
                                                <?php
                                            }
                                            ?>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <p>
                                        <?php
                                        if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                            ?>
                                            <a href="your_listing-7.php?id=<?php echo $_REQUEST['id'] ?>&action=edit">Back</a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="your_listing-7.php">Back</a>
                                            <?php
                                        }
                                        ?>
<!--                                            <input type="submit" class="btn btn-default pull-left" value="Back" />-->

                                    </p>
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

        <style>
            a{
                text-decoration: none;
                //margin-left: 200px;
            }
        </style>

    </body>
</html>
