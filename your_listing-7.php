<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';

mysql_query("SET SESSION character_set_results = 'UTF8'");
header('Content-Type: text/html; charset=UTF-8');

if (isset($_REQUEST['submit'])) {

    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $currency = isset($_POST['currency']) ? $_POST['currency'] : '';

    $fields = array(
        'price' => mysql_real_escape_string($price),
        'currency' => mysql_real_escape_string($currency),
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

            header('Location:your_listing-8.php');
            exit();
        }
    }

    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

        mysql_query($sql);

        if (mysql_query($editQuery)) {

            header('Location:your_listing-8.php?id=' . $_REQUEST['id'] . '&action=edit');
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

$cur = mysql_fetch_array(mysql_query("select * from `estejmam_currency` where `id`='" . $categoryRowset['currency'] . "'"));
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
                            <h2>Set a nightly price for your space</h2>
                            <p>You can set a price to reflect the space, amenities, and hospitality you'll be providing.</p>
                            <hr>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />
                                <h3>Base Price</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Nightly Price</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button class="btn" id="price" type="button" style="border: 1px solid #e1e1e1"><?php
                                                        if ($categoryRowset['currency'] != '') {
                                                            echo $cur['code'];
                                                        } else {
                                                            ?> ₹ <?php } ?></button>
                                                </span>
                                                <input type="text" name="price" class="form-control" value="<?php echo $categoryRowset['price'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    <div class="col-sm-7">
                                                                            <h5>Price tip: $65.00</h5>
                                                                        </div>-->
                                    <div class="clearfix"></div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Currency</label>
                                            <select name="currency" class="form-control" onchange="checksymbol(this.value)">
                                                <?php
                                                $ctype = mysql_query("select * from `estejmam_currency`");
                                                while ($curtype = mysql_fetch_array($ctype)) {
                                                    ?>
                                                    <option value="<?php echo $curtype['id'] ?>" <?php if ($categoryRowset['currency'] == $curtype['id']) { ?> selected <?php } ?>><?php echo $curtype['name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <p>You can offer discounts for longer stays</p>
                                        <hr>
                                        <p>
                                            <?php
                                            if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                ?>
                                                <a href="your_listing-6.php?id=<?php echo $_REQUEST['id'] ?>&action=edit">Back</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="your_listing-6.php">Back</a>
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
                            <h4 class="text-center">Nightly Price</h4>
                            <p>Some hosts start off with a lower price then raise the price after getting great reviews. You can always adjust your price, after you publish, for individual days, to account for seasonal changes in demand.</p>
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

        <script>
                                                function checksymbol(id)
                                                {
                                                    $.ajax({
                                                        type: "post",
                                                        url: "prop_currency_check.php",
                                                        data: {id: id},
                                                        success: function (msg) {
                                                            $('#price').html(msg);
                                                        }
                                                    });
                                                }


        </script>



    </body>
</html>
