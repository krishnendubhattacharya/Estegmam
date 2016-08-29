<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';


if (isset($_REQUEST['submit'])) {



    $how_far_guest_book = isset($_POST['how_far_guest_book']) ? $_POST['how_far_guest_book'] : '';
    $guest_notice_period = isset($_POST['guest_notice_period']) ? $_POST['guest_notice_period'] : '';
    $ninimum_stay = isset($_POST['ninimum_stay']) ? $_POST['ninimum_stay'] : '';
    $maximum_stay = isset($_POST['maximum_stay']) ? $_POST['maximum_stay'] : '';
    $guest_time = isset($_POST['guest_time']) ? $_POST['guest_time'] : '';



    $fields = array(
        'how_far_guest_book' => mysql_real_escape_string($how_far_guest_book),
        'guest_notice_period' => mysql_real_escape_string($guest_notice_period),
        'ninimum_stay' => mysql_real_escape_string($ninimum_stay),
        'maximum_stay' => mysql_real_escape_string($maximum_stay),
        'guest_time' => mysql_real_escape_string($guest_time),
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

            header('Location:your_listing-9.php');
            exit();
        }
    }

    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

        mysql_query($sql);

        if (mysql_query($editQuery)) {

            header('Location:your_listing-9.php?id=' . $_REQUEST['id'] . '&action=edit');
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
                            <h2>Set Availability</h2>
                            <p>Availability settings help you get only the bookings you want</p>
                            <hr>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />
                                <h4>How far ahead can guests book?</h4>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Months</label>
                                            <select name="how_far_guest_book" class="form-control">
                                                <option value="">Select</option>

                                                <option value="0" <?php if ($categoryRowset['how_far_guest_book'] == '0') { ?> selected <?php } ?>>Any time in the future</option>
                                                <option value="1" <?php if ($categoryRowset['how_far_guest_book'] == '1') { ?> selected <?php } ?>>3 Months</option>
                                                <option value="2" <?php if ($categoryRowset['how_far_guest_book'] == '2') { ?> selected <?php } ?>>6 Months</option>
                                                <option value="3" <?php if ($categoryRowset['how_far_guest_book'] == '3') { ?> selected <?php } ?>>12 Months</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <h4>How much advance notice do you need for bookings?</h4>
                                <div class="row">

                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Advance notice</label>
                                            <select name="guest_notice_period" class="form-control" onchange="checkbed(this.value)">
                                                <option value="">Select</option>
                                                <option value="0" <?php if ($categoryRowset['guest_notice_period'] == '0') { ?> selected <?php } ?>>Same Day (customizable cutoff hour)</option>
                                                <option value="1" <?php if ($categoryRowset['guest_notice_period'] == '1') { ?> selected <?php } ?>>At least 1 Day's Notice</option>
                                                <option value="2" <?php if ($categoryRowset['guest_notice_period'] == '2') { ?> selected <?php } ?>>At least 2 Day's Notice</option>
                                                <option value="3" <?php if ($categoryRowset['guest_notice_period'] == '3') { ?> selected <?php } ?>>At least 3 Day's Notice</option>
                                            </select>
                                        </div>

                                        <div id="showhide" style="<?php if ($categoryRowset['guest_notice_period'] == '0') { ?> display:block; <?php } else { ?> display:none; <?php } ?>">
                                            <div class="form-group">
                                                <label>Guests can same-day instant book until</label>
                                                <select name="guest_time" class="form-control">
                                                    <option value="6am" <?php if ($categoryRowset['guest_time'] == '6am') { ?> selected <?php } ?>>6:00 A.M</option>
                                                    <option value="7am" <?php if ($categoryRowset['guest_time'] == '7am') { ?> selected <?php } ?>>7:00 A.M</option>
                                                    <option value="8am" <?php if ($categoryRowset['guest_time'] == '8am') { ?> selected <?php } ?>>8:00 A.M</option>
                                                    <option value="9am" <?php if ($categoryRowset['guest_time'] == '9am') { ?> selected <?php } ?>>9:00 A.M</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <hr>

                                <h4>What's the minimum and maximum time guests can stay?</h4>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Minimum stay</label>
<!--                                            <span class="input-group-btn">
                                                <input type="text" name="price" class="form-control" value="<?php echo $categoryRowset['price'] ?>"><button class="btn" id="price" type="button" style="border: 1px solid #e1e1e1">night</button>
                                            </span>-->
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="ninimum_stay" value="<?php
                                                if (isset($categoryRowset['ninimum_stay']) && $categoryRowset['ninimum_stay'] != '') {
                                                    echo $categoryRowset['ninimum_stay'];
                                                } else {
                                                    echo '1';
                                                }
                                                ?> ">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button">Night</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Maximum stay</label>
<!--                                            <span class="input-group-btn">
                                                <input type="text" name="price" class="form-control" value="<?php echo $categoryRowset['price'] ?>"><button class="btn" id="price" type="button" style="border: 1px solid #e1e1e1">night</button>
                                            </span>-->
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="maximum_stay" value="<?php echo $categoryRowset['maximum_stay'] ?>">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button">Night</button>
                                                </span>
                                            </div>
                                        </div>
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
                                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Next" />
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="addition-amenity-box">
                            <h4 class="text-center">Bathrooms</h4>
                            <p>If a bathroom doesn't include a place to shower or bathe, let travelers know by counting it as a half bathroom.</p>
                            <div class="bulb"><img src="images/bulb.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php include('includes/footer.php'); ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>

        <script>
                                                function checkbed(id)
                                                {

                                                    if (id == 0)
                                                    {

                                                        $("#showhide").show('slow');
                                                    }
                                                    else
                                                    {
                                                        $("#showhide").hide('hide');
                                                    }


                                                }
        </script>

    </body>
</html>
