<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';


if (isset($_REQUEST['submit'])) {


//    $allpost = isset($_POST);
//    $count = count($allpost);
//    echo $count;
//    exit;



    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';

    $bedrooms = isset($_POST['bedrooms']) ? $_POST['bedrooms'] : '';
    $beds = isset($_POST['beds']) ? $_POST['beds'] : '';
    $bathrooms = isset($_POST['bathrooms']) ? $_POST['bathrooms'] : '';
    $prop_type = isset($_POST['prop_type']) ? $_POST['prop_type'] : '';
    $bedtype = isset($_POST['bedtype']) ? $_POST['bedtype'] : '';
    $date = date("Y-m-d");
    $lat = '00.0000000';
    $lng = '00.0000000';


    $fields = array(
        'user_id' => mysql_real_escape_string($user_id),
        'bedrooms' => mysql_real_escape_string($bedrooms),
        'beds' => mysql_real_escape_string($beds),
        'bathrooms' => mysql_real_escape_string($bathrooms),
        'prop_type' => mysql_real_escape_string($prop_type),
        'bed_type' => mysql_real_escape_string($bedtype),
        'created_date' => mysql_real_escape_string($date),
        'lat' => mysql_real_escape_string($lat),
        'lng' => mysql_real_escape_string($lng),
        'step_comp' => 1,
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

            header('Location:your_listing-2.php');
            exit();
        }
    }

    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

        mysql_query($sql);

        if (mysql_query($editQuery)) {

            header('Location:your_listing-2.php?id=' . $_REQUEST['id'] . '&action=edit');
            exit();
        }
    } else {

        $addQuery = "INSERT INTO `estejmam_main_property` (`" . implode('`,`', array_keys($fields)) . "`)"
                . " VALUES ('" . implode("','", array_values($fields)) . "')";

        //exit;
        mysql_query($addQuery);
        $last_id = mysql_insert_id();
        $_SESSION['prop_id'] = $last_id;

        header('Location:your_listing-2.php');
        exit();
    }
}

if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {
    $categoryRowset = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_main_property` WHERE `id`='" . mysql_real_escape_string($_SESSION['prop_id']) . "'"));
}

if ($_REQUEST['action'] == 'edit') {
    $categoryRowset = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_main_property` WHERE `id`='" . mysql_real_escape_string($_REQUEST['id']) . "'"));
}

function propvalidcheck() {
    if (isset($_REQUEST['prophidid']) && $_REQUEST['prophidid'] != '') {
        return true;
    } else {
        return false;
    }
    if ($categoryRowset['prop_type'] != '') {
        return true;
    } else {
        return false;
    }
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
                            <h2>Help travelers find the right fit</h2>
                            <p>People searching on Estejmam can filter by listing basics to find a space that matches their needs.</p>
                            <hr>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />
                                <input type="hidden" name="listing1" value="4" />
                                <h4>Rooms and Beds</h4>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bedrooms</label>
                                            <select name="bedrooms" class="form-control" required>
                                                <option value="" disabled selected>Select</option>
                                                <option value="studio" <?php if ($categoryRowset['bedrooms'] == 'studio') { ?> selected <?php } ?>>Studio</option>
                                                <option value="1" <?php if ($categoryRowset['bedrooms'] == '1') { ?> selected <?php } ?>>1</option>
                                                <option value="2" <?php if ($categoryRowset['bedrooms'] == '2') { ?> selected <?php } ?>>2</option>
                                                <option value="3" <?php if ($categoryRowset['bedrooms'] == '3') { ?> selected <?php } ?>>3</option>
                                                <option value="4" <?php if ($categoryRowset['bedrooms'] == '4') { ?> selected <?php } ?>>4</option>
                                                <option value="5" <?php if ($categoryRowset['bedrooms'] == '5') { ?> selected <?php } ?>>5</option>
                                                <option value="6" <?php if ($categoryRowset['bedrooms'] == '6') { ?> selected <?php } ?>>6</option>
                                                <option value="7" <?php if ($categoryRowset['bedrooms'] == '7') { ?> selected <?php } ?>>7</option>
                                                <option value="8" <?php if ($categoryRowset['bedrooms'] == '8') { ?> selected <?php } ?>>8</option>
                                                <option value="9" <?php if ($categoryRowset['bedrooms'] == '9') { ?> selected <?php } ?>>9</option>
                                                <option value="10" <?php if ($categoryRowset['bedrooms'] == '10') { ?> selected <?php } ?>>10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Beds</label>
                                            <select name="beds" class="form-control" required onclick="checkbed(this.value)">
                                                <option value="" disabled selected>Select</option>
                                                <option value="1" <?php if ($categoryRowset['beds'] == '1') { ?> selected <?php } ?>>1</option>
                                                <option value="2" <?php if ($categoryRowset['beds'] == '2') { ?> selected <?php } ?>>2</option>
                                                <option value="3" <?php if ($categoryRowset['beds'] == '3') { ?> selected <?php } ?>>3</option>
                                                <option value="4" <?php if ($categoryRowset['beds'] == '4') { ?> selected <?php } ?>>4</option>
                                                <option value="5" <?php if ($categoryRowset['beds'] == '5') { ?> selected <?php } ?>>5</option>
                                                <option value="6" <?php if ($categoryRowset['beds'] == '6') { ?> selected <?php } ?>>6</option>
                                                <option value="7" <?php if ($categoryRowset['beds'] == '7') { ?> selected <?php } ?>>7</option>
                                                <option value="8" <?php if ($categoryRowset['beds'] == '8') { ?> selected <?php } ?>>8</option>
                                                <option value="9" <?php if ($categoryRowset['beds'] == '9') { ?> selected <?php } ?>>9</option>
                                                <option value="10" <?php if ($categoryRowset['beds'] == '10') { ?> selected <?php } ?>>10</option>
                                                <option value="11" <?php if ($categoryRowset['beds'] == '11') { ?> selected <?php } ?>>11</option>
                                                <option value="12" <?php if ($categoryRowset['beds'] == '12') { ?> selected <?php } ?>>12</option>
                                                <option value="13" <?php if ($categoryRowset['beds'] == '13') { ?> selected <?php } ?>>13</option>
                                                <option value="14" <?php if ($categoryRowset['beds'] == '14') { ?> selected <?php } ?>>14</option>
                                                <option value="15" <?php if ($categoryRowset['beds'] == '15') { ?> selected <?php } ?>>15</option>
                                                <option value="16" <?php if ($categoryRowset['beds'] == '16') { ?> selected <?php } ?>>16</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bathrooms</label>
                                            <select name="bathrooms" class="form-control" required>
                                                <option value="" disabled selected>Select</option>
                                                <option value="0" <?php if ($categoryRowset['bathrooms'] == '0') { ?> selected <?php } ?>>0</option>
                                                <option value="0.5" <?php if ($categoryRowset['bathrooms'] == '0.5') { ?> selected <?php } ?>>0.5</option>
                                                <option value="1" <?php if ($categoryRowset['bathrooms'] == '1') { ?> selected <?php } ?>>1</option>
                                                <option value="1.5" <?php if ($categoryRowset['bathrooms'] == '1.5') { ?> selected <?php } ?>>1.5</option>
                                                <option value="2" <?php if ($categoryRowset['bathrooms'] == '2') { ?> selected <?php } ?>>2</option>
                                                <option value="2.5" <?php if ($categoryRowset['bathrooms'] == '2.5') { ?> selected <?php } ?>>2.5</option>
                                                <option value="3" <?php if ($categoryRowset['bathrooms'] == '3') { ?> selected <?php } ?>>3</option>
                                                <option value="3.5" <?php if ($categoryRowset['bathrooms'] == '3.5') { ?> selected <?php } ?>>3.5</option>
                                                <option value="4" <?php if ($categoryRowset['bathrooms'] == '4') { ?> selected <?php } ?>>4</option>
                                                <option value="4.5" <?php if ($categoryRowset['bathrooms'] == '4.5') { ?> selected <?php } ?>>4.5</option>
                                                <option value="5" <?php if ($categoryRowset['bathrooms'] == '5') { ?> selected <?php } ?>>5</option>
                                                <option value="5.5" <?php if ($categoryRowset['bathrooms'] == '5.5') { ?> selected <?php } ?>>5.5</option>
                                                <option value="6" <?php if ($categoryRowset['bathrooms'] == '6') { ?> selected <?php } ?>>6</option>
                                                <option value="6.5" <?php if ($categoryRowset['bathrooms'] == '6.5') { ?> selected <?php } ?>>6.5</option>
                                                <option value="7" <?php if ($categoryRowset['bathrooms'] == '7') { ?> selected <?php } ?>>7</option>
                                                <option value="7.5" <?php if ($categoryRowset['bathrooms'] == '7.5') { ?> selected <?php } ?>>7.5</option>
                                                <option value="8" <?php if ($categoryRowset['bathrooms'] == '8') { ?> selected <?php } ?>>8</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="showhide" style="<?php if ($categoryRowset['beds'] == '1') { ?> display:block; <?php } else { ?> display:none; <?php } ?>">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Bed Type</label>
                                                <select name="bedtype" class="form-control">
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="Airbed" <?php if ($categoryRowset['bed_type'] == 'Airbed') { ?> selected <?php } ?>>Airbed</option>
                                                    <option value="Futon" <?php if ($categoryRowset['bed_type'] == 'Futon') { ?> selected <?php } ?>>Futon</option>
                                                    <option value="Pull-out Sofa" <?php if ($categoryRowset['bed_type'] == 'Pull-out Sofa') { ?> selected <?php } ?>>Pull-out Sofa</option>
                                                    <option value="Couch" <?php if ($categoryRowset['bed_type'] == 'Couch') { ?> selected <?php } ?>>Couch</option>
                                                    <option value="Real" <?php if ($categoryRowset['bed_type'] == 'Real') { ?> selected <?php } ?>>Real</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <hr>
                                <h4>Listing</h4>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Property Type</label>
                                            <select name="prop_type" class="form-control" required>
                                                <?php
                                                $ptype = mysql_query("select * from `estejmam_property_type` where `status`='1'");
                                                while ($proptype = mysql_fetch_array($ptype)) {
                                                    ?>
                                                    <option value="<?php echo $proptype['id'] ?>" <?php if ($categoryRowset['prop_type'] == $proptype['id']) { ?> selected <?php } else if ($_REQUEST['prophidid'] == $proptype['id']) { ?> selected <?php } ?>><?php echo $proptype['name'] ?></option>
                                                    <?php
                                                }
                                                ?>


                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                        <p>
                                            <a href="prop-list.php">Back</a>
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

                                                    if (id == 1)
                                                    {

                                                        $("#showhide").show();
                                                    }
                                                    else
                                                    {
                                                        $("#showhide").hide();
                                                    }


                                                }
        </script>

    </body>
</html>
