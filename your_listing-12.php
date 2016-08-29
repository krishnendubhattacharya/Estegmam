<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';


if (isset($_REQUEST['submit'])) {

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';




    $fields = array(
        'name' => mysql_real_escape_string($name),
        'description' => mysql_real_escape_string($description),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_SESSION['prop_id']) . "'";

        if (mysql_query($editQuery)) {

            header('Location:your_listing-3.php');
            exit();
        }
    }


    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

        if (mysql_query($editQuery)) {

            header('Location:your_listing-3.php?id=' . $_REQUEST['id'] . '&action=edit');
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
                            <h2>Complete your Profile</h2>
                            <p>Both Guest and hosts must fill out a complete profile.</p>
                            <hr>
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Profile Photo</h3>
                                        <p>Add a friendly face to your listing.</p>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="profile_picture">
                                                    <img src="images/author.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <h3><a href="" class="btn btn-default btn-file btn-block"><i class="fa fa-facebook"></i> Use Facebook Photo</a></h3>
                                                <h3><a href="" class="btn btn-default btn-file btn-block"><i class="fa  fa-cloud-upload"></i> Upload a Photo</a></h3>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                        <h3>Phone Number</h3>
                                        <p>Show only to confirmed guests.</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">+91</span>
                                                        <input type="text" class="form-control" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <p>Not in India? <a href="">Change country</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                        <p>
                                            <?php
                                            if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                ?>
                                                <a href="your_listing-9.php?id=<?php echo $_REQUEST['id'] ?>&action=edit">Back</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="your_listing-9.php">Back</a>
                                                <?php
                                            }
                                            ?>
                                            <input type="submit" class="btn btn-primary pull-right" value="Finish Remaining Steps" />
                                        </p>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="addition-amenity-box">
                            <h4 class="text-center">Complete Your Profile</h4>
                            <p>People can filter their search by the amenities they want, so make sure you include every time you offer.</p>
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



    </body>
</html>
