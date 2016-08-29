<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';


if (isset($_REQUEST['submit'])) {

    $fire_extingursher = isset($_POST['fire_extingursher']) ? $_POST['fire_extingursher'] : '';
    $fire_alarm = isset($_POST['fire_alarm']) ? $_POST['fire_alarm'] : '';
    $gas_valve = isset($_POST['gas_valve']) ? $_POST['gas_valve'] : '';

    $emargency_note = isset($_POST['emargency_note']) ? $_POST['emargency_note'] : '';
    $medical_phone = isset($_POST['medical_phone']) ? $_POST['medical_phone'] : '';
    $fire_phone = isset($_POST['fire_phone']) ? $_POST['fire_phone'] : '';
    $police_phone = isset($_POST['police_phone']) ? $_POST['police_phone'] : '';



    $home_safety = isset($_POST['home_safety']) ? $_POST['home_safety'] : '';
    $dbhomesafe = implode(',', $home_safety);




    $fields = array(
        'fire_extingursher' => mysql_real_escape_string($fire_extingursher),
        'fire_alarm' => mysql_real_escape_string($fire_alarm),
        'gas_valve' => mysql_real_escape_string($gas_valve),
        'emargency_note' => mysql_real_escape_string($emargency_note),
        'medical_phone' => mysql_real_escape_string($medical_phone),
        'fire_phone' => mysql_real_escape_string($fire_phone),
        'police_phone' => mysql_real_escape_string($police_phone),
        'home_safety' => mysql_real_escape_string($dbhomesafe),
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

            header('Location:your_listing-7.php');
            exit();
        }
    }

    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

        mysql_query($sql);

        if (mysql_query($editQuery)) {

            header('Location:your_listing-7.php?id=' . $_REQUEST['id'] . '&action=edit');
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
                            <h2>Home Safety</h2>
                            <p>Though rare, emergencies happen. Help your guests be prepared.</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                        <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />

                                        <?php
                                        $fetch_home_safty = $categoryRowset['home_safety'];
                                        $select_home_safty = explode(',', $fetch_home_safty);
                                        ?>

                                        <h4>Safety Checklist</h4>
                                        <p><input type="checkbox" name="home_safety[]" value="Smoke Detector" <?php if (in_array('Smoke Detector', $select_home_safty)) { ?> checked <?php } ?>/> Smoke Detector <i class="fa fa-question-circle"></i></p>
                                        <p><input type="checkbox" name="home_safety[]" value="Carbon Monoxide Detector" <?php if (in_array('Carbon Monoxide Detector', $select_home_safty)) { ?> checked <?php } ?>/> Carbon Monoxide Detector </p>
                                        <p><input type="checkbox" name="home_safety[]" value="First Aid Kit" <?php if (in_array('First Aid Kit', $select_home_safty)) { ?> checked <?php } ?>/> First Aid Kit <i class="fa fa-question-circle"></i></p>
                                        <p><input type="checkbox" name="home_safety[]" value="Safety Card" <?php if (in_array('Safety Card', $select_home_safty)) { ?> checked <?php } ?>/> Safety Card </p>
                                        <p><input type="checkbox" name="home_safety[]" value="Fire Extinguisher" <?php if (in_array('Fire Extinguisher', $select_home_safty)) { ?> checked <?php } ?>/> Fire Extinguisher </p>
                                        <hr>
                                        <h4>Safety Card</h4>
                                        <br />
                                        <p>A handy resource to keep in your listing for guests. A copy is included in the guest itinerary, too.</p>
                                        <br />
                                        <h4>Where are safety features located?</h4>
                                        <br />
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="col-sm-4">
                                                        <label for>Fire extinguisher</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="fire_extingursher" class="form-control" placeholder="In the kitchen, to the right of the stove..." value="<?php echo $categoryRowset['fire_extingursher'] ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="col-sm-4">
                                                        <label for>Fire alarm</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="fire_alarm" class="form-control" placeholder="In the hallway to the left of the front door..." value="<?php echo $categoryRowset['fire_alarm'] ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="col-sm-4">
                                                        <label for>Gas shutoff valve</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="gas_valve" class="form-control" placeholder="In the garage under the paint shelf..." value="<?php echo $categoryRowset['gas_valve'] ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <h4>Emergency Exit Instructions</h4>

                                                <textarea class="form-control" name="emargency_note" rows="4" placeholder="What's the safest way to get out of your space?"><?php echo $categoryRowset['emargency_note'] ?></textarea>

                                                <h4>Emergency Phone No.</h4>
                                                <a href="javascript:void(0);" class="btn btn-default">Edit</a>

                                                <div class="col-lg-12" style="margin-top: 10px;">
                                                    <div class="form-group">
                                                        <div class="col-sm-4">
                                                            <label for>Medical</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="medical_phone" class="form-control" value="<?php echo $categoryRowset['medical_phone'] ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <div class="col-sm-4">
                                                            <label for>Fire</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="fire_phone" class="form-control" value="<?php echo $categoryRowset['fire_phone'] ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <div class="col-sm-4">
                                                            <label for>Police</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="police_phone" class="form-control" value="<?php echo $categoryRowset['police_phone'] ?>"/>
                                                        </div>
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4>Printed safety Card</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sollicitudin fringilla leo et mollis. Integer et consequat mauris, at bibendum nibh. Proin mattis nisi ...</p>
                                                <a href="" class="btn btn-default">Review and Print</a>
                                                <hr>
                                                <p>
                                                    <?php
                                                    if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                        ?>
                                                        <a href="your_listing-5.php?id=<?php echo $_REQUEST['id'] ?>&action=edit">Back</a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="your_listing-5.php">Back</a>
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


                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="addition-amenity-box">
                            <h4 class="text-center">Home Safety</h4>
                            <p>Though rare, emergencies happen. Help your guests be prepared.</p>
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
