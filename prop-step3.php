<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");

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

            header('Location:prop-list.php');
            exit();
        }
    }


    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

        if (mysql_query($editQuery)) {

            header('Location:prop-list.php');
            exit();
        }
    }
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
    <body onload="initialize()">

        <?php include("includes/inner-header.php"); ?>

        <section class="add-property">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">


                        <?php include("includes/my-account_left.php"); ?>



                    </div>
                    <div class="col-sm-9">
                        <div class="add-property_right">
                            <h3>Please fill the form</h3>
                            <h4>Tell travelers about your space</h4>
                            <form class="" action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h3>Common Amenities</h3>
                                            <label for="inputEmail3">Every space on Airbnb is unique. Highlight what makes your listing welcoming so that it stands out to guests who want to stay in your area.</label>
                                            <div>
                                                <?php
                                                $dbcommon = $categoryRowset['amenities'];
                                                $dbexpcommon = explode(',', $dbcommon);
                                                $common = mysql_query("select * from `estejmam_amenities` where `type`='1'");
                                                while ($commanaminities = mysql_fetch_array($common)) {
                                                    ?>
                                                    <input type="checkbox" name="amenities[]" value="<?php echo $commanaminities['name'] ?>" <?php if (in_array($commanaminities['name'], $dbexpcommon)) { ?> checked <?php } ?>/> <?php echo $commanaminities['name'] ?> <br />
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h3>Additional Amenities</h3>
                                            <div>
                                                <?php
                                                $additional = mysql_query("select * from `estejmam_amenities` where `type`='2'");
                                                while ($additionalaminities = mysql_fetch_array($additional)) {
                                                    ?>
                                                    <input type="checkbox" name="amenities[]" value="<?php echo $additionalaminities['name'] ?>" <?php if (in_array($additionalaminities['name'], $dbexpcommon)) { ?> checked <?php } ?>/> <?php echo $additionalaminities['name'] ?> <br />
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h3>Special Features</h3>
                                            <label for="inputEmail3">Features of your listing for guests with specific needs.</label>
                                            <div>
                                                <?php
                                                $special = mysql_query("select * from `estejmam_amenities` where `type`='3'");
                                                while ($specialalaminities = mysql_fetch_array($special)) {
                                                    ?>
                                                    <input type="checkbox" name="amenities[]" value="<?php echo $specialalaminities['name'] ?>" <?php if (in_array($specialalaminities['name'], $dbexpcommon)) { ?> checked <?php } ?>/> <?php echo $specialalaminities['name'] ?> <br />
                                                    <?php
                                                }
                                                ?> 
                                            </div>
                                        </div>
                                    </div>
                                </div>






                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Save">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>	

        <?php include("includes/footer.php"); ?>


        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
        <script type='text/javascript'>
        $(function () {
            //Keep track of last scroll
            var lastScroll = 100;
            $(window).scroll(function (event) {


                var s1 = $(this).scrollTop();


                if (s1 > 100)
                {
                    $('.navbar-fixed-top').addClass('scroll_head');
                    //alert("ok");
                }
                else {
                    //$('header').removeClass('transparent');
                    $('.navbar-fixed-top').removeClass('scroll_head');
                }
            });

        });
        </script>


        <script>
            function checkavil(val)
            {
                if (val == '3')
                {
                    $('#show').show('slow');
                }
                else
                {
                    $('#show').hide('slow');
                }
            }
        </script>

        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script>
            $(function () {
                $("#sdate,#edate").datepicker({
                });
            });
        </script>



<!--        <script>
            $(document).ready(function () {
                $('.bxslider').bxSlider({
                    auto: true,
                    autoControls: true
                });
            });
        </script>-->







    </body>
</html>