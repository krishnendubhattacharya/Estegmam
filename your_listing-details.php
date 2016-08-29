<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';


if (isset($_REQUEST['submit'])) {

    $the_space = isset($_POST['the_space']) ? $_POST['the_space'] : '';
    $guest_access = isset($_POST['guest_access']) ? $_POST['guest_access'] : '';
    $interection_guest = isset($_POST['interection_guest']) ? $_POST['interection_guest'] : '';
    $other_things = isset($_POST['other_things']) ? $_POST['other_things'] : '';
    $house_rule = isset($_POST['house_rule']) ? $_POST['house_rule'] : '';
    $overview = isset($_POST['overview']) ? $_POST['overview'] : '';
    $getting_arraound = isset($_POST['getting_arraound']) ? $_POST['getting_arraound'] : '';




    $fields = array(
        'the_space' => mysql_real_escape_string($the_space),
        'guest_access' => mysql_real_escape_string($guest_access),
        'interection_guest' => mysql_real_escape_string($interection_guest),
        'other_things' => mysql_real_escape_string($other_things),
        'house_rule' => mysql_real_escape_string($house_rule),
        'overview' => mysql_real_escape_string($overview),
        'getting_arraound' => mysql_real_escape_string($getting_arraound),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_SESSION['prop_id']) . "'";

        if (mysql_query($editQuery)) {

            header('Location:your_listing-2.php');
            exit();
        }
    }


    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

        if (mysql_query($editQuery)) {

            header('Location:your_listing-2.php?id=' . $_REQUEST['id'] . '&action=edit');
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
                            <h2>Add details that highlight your space and hospitality</h2>
                            <p>As a host, you can help your guests live like locals, relax in your space, or get ready for an important meeting. Let travelers know how you’ll welcome them.</p>
                            <hr>
                            <h2>The Trip</h2>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>The Space</label>
                                            <textarea class="form-control" name="the_space" placeholder="You can add more information about what makes your space unique." rows="5"><?php echo $categoryRowset['the_space'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Guest Access</label>
                                            <textarea class="form-control" name="guest_access" placeholder="Let travelers know what parts of the space they’ll be able to access." rows="5"><?php echo $categoryRowset['guest_access'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Interaction with Guests </label>
                                            <textarea class="form-control" name="interection_guest" placeholder="Tell guests if you’ll be available to offer help throughout their stay." rows="5"><?php echo $categoryRowset['interection_guest'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Other Things to Note</label>
                                            <textarea class="form-control" name="other_things" placeholder="Let travelers know if there are other details that will impact their stay." rows="5"><?php echo $categoryRowset['other_things'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> House Rules </label>
                                            <textarea class="form-control" name="house_rule" placeholder="How do you expect your guests to behave?" rows="5"><?php echo $categoryRowset['house_rule'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <h2 style="margin-left: 10px;">The Neighborhood</h2>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Overview </label>
                                            <textarea class="form-control" name="overview" placeholder="Show people looking at your listing page what makes your neighborhood unique." rows="5"><?php echo $categoryRowset['overview'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>  Getting Around  </label>
                                            <textarea class="form-control" name="getting_arraound" placeholder="You can let travelers know if your listing is close to public transportation (or far from it). You can also mention nearby parking options." rows="5"><?php echo $categoryRowset['getting_arraound'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <hr>
                                        <p>
                                            <?php
                                            if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                ?>
                                                <a href="your_listing-2.php?id=<?php echo $_REQUEST['id'] ?>&action=edit">Back</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="your_listing-2.php">Back</a>
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

                </div>
            </div>
        </section>

        <?php include ('includes/footer.php'); ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>



    </body>
</html>
