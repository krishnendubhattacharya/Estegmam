<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");

if (!is_user_logged_in()) {
    header("location:index.php");
}


if (isset($_REQUEST['submit'])) {


    $availability = isset($_POST['availability']) ? $_POST['availability'] : '';
    $home_safety = isset($_POST['home_safety']) ? $_POST['home_safety'] : '';

    $dbhomesafe = implode(',', $home_safety);

    $booking_start_date = isset($_POST['booking_start_date']) ? $_POST['booking_start_date'] : '';
    $booking_end_date = isset($_POST['booking_end_date']) ? $_POST['booking_end_date'] : '';





    $fields = array(
        'availability' => mysql_real_escape_string($availability),
        'home_safety' => mysql_real_escape_string($dbhomesafe),
        'booking_start_date' => mysql_real_escape_string($booking_start_date),
        'booking_end_date' => mysql_real_escape_string($booking_end_date),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_SESSION['prop_id']) . "'";

        if (mysql_query($editQuery)) {

            header('Location:prop-step3.php');
            exit();
        }
    }


    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

        if (mysql_query($editQuery)) {

            header('Location:prop-step3.php?id=' . $_REQUEST['id'] . '&action=edit');
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
    <body>

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
                            <h4>Home Safety</h4>
                            <form class="" action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />

                                <?php
                                $fetch_home_safty = $categoryRowset['home_safety'];
                                $select_home_safty = explode(',', $fetch_home_safty);
                                ?>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="inputEmail3">Safety Checklist</label>
                                            <div>
                                                <input type="checkbox" name="home_safety[]" value="Smoke Detector" <?php if (in_array('Smoke Detector', $select_home_safty)) { ?> checked <?php } ?>/> Smoke Detector <br />
                                                <input type="checkbox" name="home_safety[]" value="Carbon Monoxide Detector" <?php if (in_array('Carbon Monoxide Detector', $select_home_safty)) { ?> checked <?php } ?>/> Carbon Monoxide Detector <br />
                                                <input type="checkbox" name="home_safety[]" value="First Aid Kit" <?php if (in_array('First Aid Kit', $select_home_safty)) { ?> checked <?php } ?>/> First Aid Kit  <br />
                                                <input type="checkbox" name="home_safety[]" value="Safety Card" <?php if (in_array('Safety Card', $select_home_safty)) { ?> checked <?php } ?>/> Safety Card  <br />
                                                <input type="checkbox" name="home_safety[]" value="Fire Extinguisher" <?php if (in_array('Fire Extinguisher', $select_home_safty)) { ?> checked <?php } ?>/> Fire Extinguisher <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h4>Show guests when they can book</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="inputEmail3">When are you available?</label>
                                            <div>
                                                <select name="availability" class="form-control" onchange="checkavil(this.value)">
                                                    <option value="">Select Option</option>
                                                    <option value="0" <?php if ($categoryRowset['availability'] == '0') { ?> selected <?php } ?>>Always available</option>
                                                    <option value="1" <?php if ($categoryRowset['availability'] == '1') { ?> selected <?php } ?>>Sometime available</option>
                                                    <option value="3" <?php if ($categoryRowset['availability'] == '3') { ?> selected <?php } ?>>Onetime available</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="show" <?php if ($categoryRowset['availability'] == '3') { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Start Date:</label>
                                                <input class="form-control" name="booking_start_date" id="sdate" type="text" value="<?php echo $categoryRowset['booking_start_date'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>End Date:</label>
                                                <input class="form-control" name="booking_end_date" id="edate" type="text" value="<?php echo $categoryRowset['booking_end_date'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Next">
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
                $("#sdate,#edate").datepicker({dateFormat: 'yy-mm-dd'});
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