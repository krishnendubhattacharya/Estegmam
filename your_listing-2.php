<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';


if (isset($_REQUEST['submit'])) {

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
        $id = $_REQUEST['id'];
    }
    if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {
        $id = $_SESSION['prop_id'];
    }

    $ft = mysql_fetch_array(mysql_query("select * from `estejmam_main_property` where `id`='" . $id . "'"));
    $val = $ft['step_comp'];

    if ($_POST['name'] != '' && $_POST['description'] != '') {
        $val1 = $val + 1;
        mysql_query("update `estejmam_main_property` set `step_comp`='" . $val1 . "' where `id`='" . $id . "'");
    } else {
        mysql_query("update `estejmam_main_property` set `step_comp`='" . $val . "' where `id`='" . $id . "'");
    }

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


        <script language="javascript" type="text/javascript">
            function limitText(limitField, limitCount, limitNum) {
                if (limitField.value.length > limitNum) {
                    limitField.value = limitField.value.substring(0, limitNum);
                } else {
                    limitCount.value = limitNum - limitField.value.length;
                }
            }

            function limitText1(limitField, limitCount, limitNum) {
                if (limitField.value.length > limitNum) {
                    limitField.value = limitField.value.substring(0, limitNum);
                } else {
                    limitCount.value = limitNum - limitField.value.length;
                }
            }
        </script>

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
                            <p>Every space on Estejmam is unique. Highlight what makes your listing welcoming so that it stands out to guests who want to stay in your area.</p>
                            <hr>
                            <form action="" method="POST" name="review">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Listing Name <span class="character"><input type="text" name="nam" value="35" readonly disabled style="border:none;background:white;width:20px;">Characters left</span></label>
                                            <input type="text" name="name" value="<?php echo $categoryRowset['name'] ?>" class="form-control" placeholder="Be clear and descriptive." onKeyDown="limitText(this.form.name, this.form.nam, 35);"onKeyUp="limitText(this.form.name, this.form.nam, 35);">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Summery <span class="character"><input type="text" name="namdes" value="250" readonly disabled style="border:none;background:white;width:25px;">Characters left</span></label>
                                            <textarea class="form-control" name="description" placeholder="Tell travelers what you love about the space. You can include details about the decor, the amenities it includes, and the neighborhood" rows="5" onKeyDown="limitText(this.form.description, this.form.namdes, 250);"onKeyUp="limitText(this.form.description, this.form.namdes, 250);"><?php echo $categoryRowset['description'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <?php
                                        if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                            ?>
                                            <p>You can add more <a href="your_listing-details.php?id=<?php echo $_REQUEST['id'] ?>&action=edit">details</a> to tell travelers about your space and hosting style. </p>
                                            <?php
                                        } else {
                                            ?>
                                            <p>You can add more <a href="your_listing-details.php">details</a> to tell travelers about your space and hosting style. </p>
                                            <?php
                                        }
                                        ?>
                                        <hr>
                                        <p>
                                            <?php
                                            if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                ?>
                                                <a href="your_listing-1.php?id=<?php echo $_REQUEST['id'] ?>&action=edit">Back</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="your_listing-1.php">Back</a>
                                                <?php
                                            }
                                            ?>
<!--                                            <input type="submit" class="btn btn-default pull-left" value="Back" />-->
                                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Next" />
                                        </p>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="addition-amenity-box">
                            <h4 class="text-center">Listing name</h4>
                            <p>Make a great first impression for guests. Try including the unique qualities or benefits of your space.
                                Example: Sunny, family-friendly Soho apartment</p>
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
