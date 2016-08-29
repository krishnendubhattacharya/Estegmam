<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");
unset($_SESSION['prop_id']);
if (!is_user_logged_in()) {
    header("location:index.php");
}

if (isset($_REQUEST['del']) && $_REQUEST['del'] != '') {

    $del = "delete from `estejmam_main_property` where `id`='" . $_REQUEST['del'] . "'";
    mysql_query($del);

    $del2 = "delete from `estejmam_image` where `prop_id`='" . $_REQUEST['del'] . "'";
    mysql_query($del2);

    $_SESSION['MSG'] = 1;
    header("location:prop-list.php");
    exit();
}



$id = $_REQUEST['id'];
$action = $_REQUEST['action'];

$is_comp = 10;

$ck = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_main_property` WHERE `id`='" . mysql_real_escape_string($id) . "'"));

$pk = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='" . mysql_real_escape_string($id) . "'"));

$userpf = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . mysql_real_escape_string($_SESSION['userid']) . "'"));

if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '') {

    $is_val = 1;
    $is_comp = 9;
}
if ($ck['name'] != '' && $ck['description'] != '') {

    $is_val1 = 1;
    $is_comp = 8;
}
if ($ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode']) {

    $is_val2 = 1;
    $is_comp = 7;
}
if ($ck['amenities'] != '') {

    $is_val3 = 1;
    $is_comp = 6;
}
if ($pk['image'] != '') {

    $is_val4 = 1;
    $is_comp = 5;
}
if ($ck['price'] != '' && $ck['currency'] != '') {

    $is_val5 = 1;
    $is_comp = 4;
}
if ($ck['review_each_request'] != 0 || $ck['guest_book_instant'] != 0) {

    $is_val6 = 1;
    $is_comp = 3;
}

if ($ck['availability'] != 0 || $ck['availability'] != '') {

    $is_val7 = 1;
    $is_comp = 2;
}
if ($ck['home_safety'] != '') {

    $is_val8 = 1;
    $is_comp = 1;
}
if ($userpf['phone'] != '') {

    $is_val9 = 1;
    $is_comp = 'Final';
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


        <script type="text/javascript">
            function ConfirmDelete(val)
            {
                var sss = confirm('Are You Sure?');

                if (sss)
                {
                    document.location.href = "prop-list.php?del=" + val;
                }
            }
        </script>

    </head>
    <body>

        <?php include("includes/inner-header.php"); ?>

        <section class="my-account-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">

                        <?php //include("includes/my-account_left.php");  ?>
                        <ul class="account-menu">
                            <li <?php echo ($pagename == 'prop-list-uncomp.php') ? 'class="selected"' : ''; ?>><a href="prop-list-uncomp.php">Unlisted</a></li>
                            <li <?php echo ($pagename == 'prop-list.php') ? 'class="selected"' : ''; ?>><a href="prop-list.php">Your Listings</a></li>
                            <li <?php echo ($pagename == 'prop-list-reserved.php') ? 'class="selected"' : ''; ?>><a href="prop-list-reserved.php">Your Reservations</a></li>
                            <li <?php echo ($pagename == 'prop-list-reserved-request.php') ? 'class="selected"' : ''; ?>><a href="prop-list-reserved-request.php">Reservation Request</a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <p><a href="your_listing.php" class="invite-friend btn-block">Add New Listings</a></p>
                    </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <ul class="poplist">
                                <?php
                                
                                $prop = mysql_query("select * from `estejmam_main_property` where `user_id`='" . $_SESSION['userid'] . "' and `status`='0'");
                                $num = mysql_num_rows($prop);
                                if ($num > 0) {
                                    while ($allprop = mysql_fetch_array($prop)) {
                                        $moreimage = mysql_fetch_array(mysql_query("select * from `estejmam_image` where `prop_id`='" . $allprop['id'] . "'"));
                                        if ($moreimage['image'] != '') {
                                            $imag = "upload/property/" . $moreimage['image'];
                                        } else {
                                            $imag = "upload/noimage.Jpeg";
                                        }
                                        $user = mysql_fetch_array(mysql_query("select * from `estejmam_user` where `id`='" . $allprop['user_id'] . "'"));
                                        $is_comp = 10;
                                        if ($user['phone'] == '') {
                                            $is_comp = 10;
                                        } else {
                                            $is_comp = $is_comp - 1;
                                        }
                                        //echo $is_comp;
                                        if ($allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '') {

                                            $is_val = 1;
                                            $is_comp = $is_comp - 1;
                                        }
                                        if ($allprop['name'] != '' && $allprop['description'] != '') {

                                            $is_val1 = 1;
                                            //if ($allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '') {
                                                $is_comp = $is_comp - 1;
                                            //}
                                        }
                                        if ($allprop['country'] != '' && $allprop['street_addr'] != '' && $allprop['state'] != '' && $allprop['city'] && $allprop['zipcode'] != '') {

                                            $is_val2 = 1;
                                            //if ($allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '') {
                                                $is_comp = $is_comp - 1;
                                            //}
                                        }
                                        if ($allprop['amenities'] != '') {

                                            $is_val3 = 1;
                                            //if ($allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['country'] != '' && $allprop['street_addr'] != '' && $allprop['state'] && $allprop['city'] && $allprop['zipcode'] != '') {
                                                $is_comp = $is_comp - 1;
                                            //}
                                        }
                                        if ($moreimage['image'] != '') {

                                            $is_val4 = 1;
                                            //if ($allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['country'] != '' && $allprop['street_addr'] != '' && $allprop['state'] && $allprop['city'] && $allprop['zipcode'] != '' && $allprop['amenities'] != '') {
                                                $is_comp = $is_comp - 1;
                                            //}
                                        }
                                        if ($allprop['home_safety'] != '') {

                                            $is_val8 = 1;
                                            //if ($allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['country'] != '' && $allprop['street_addr'] != '' && $allprop['state'] && $allprop['city'] && $allprop['zipcode'] && $allprop['amenities'] != '' && $moreimage['image'] != '') {
                                                $is_comp = $is_comp - 1;
                                            //}
                                        }
                                        if ($allprop['price'] != '' && $allprop['currency'] != '') {

                                            $is_val5 = 1;
                                            //if ($allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['country'] != '' && $allprop['street_addr'] != '' && $allprop['state'] && $allprop['city'] && $allprop['zipcode'] && $allprop['amenities'] != '' && $moreimage['image'] != '' && $allprop['home_safety'] != '') {
                                                $is_comp = $is_comp - 1;
                                            //}
                                        }
                                        if ($allprop['review_each_request'] != 0 || $allprop['guest_book_instant'] != 0) {

                                            $is_val6 = 1;
                                            //if ($allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['country'] != '' && $allprop['street_addr'] != '' && $allprop['state'] && $allprop['city'] && $allprop['zipcode'] && $allprop['amenities'] != '' && $moreimage['image'] != '' && $allprop['home_safety'] != '' && $allprop['price'] != '' && $allprop['currency'] != '') {
                                                $is_comp = $is_comp - 1;
                                            //}
                                        }
                                        if ($allprop['availability'] != 0 || $allprop['availability'] != '') {

                                            $is_val7 = 1;
                                            //if ($allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['country'] != '' && $allprop['street_addr'] != '' && $allprop['state'] && $allprop['city'] && $allprop['zipcode'] && $allprop['amenities'] != '' && $moreimage['image'] != '' && $allprop['home_safety'] != '' && $allprop['price'] != '' && $allprop['currency'] != '' && ($allprop['review_each_request'] != 0 || $allprop['guest_book_instant'] != 0)) {
                                                $is_comp = $is_comp - 1;
                                            //}
                                        }
                                        //if ($user['phone'] != '') {

                                            $is_val9 = 1;
                                            //if ($allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['bedrooms'] != '' && $allprop['beds'] != '' && $allprop['bathrooms'] !== '' && $allprop['prop_type'] != '' && $allprop['country'] != '' && $allprop['street_addr'] != '' && $allprop['state'] && $allprop['city'] && $allprop['zipcode'] && $allprop['amenities'] != '' && $moreimage['image'] != '' && $allprop['home_safety'] != '' && $allprop['price'] != '' && $allprop['currency'] != '' && ($allprop['review_each_request'] != 0 || $allprop['guest_book_instant'] != 0) && ($allprop['availability'] != 0 || $allprop['availability'] != '')) {
                                                //$is_comp = 'Final';
                                            //}
                                        //}
                                        ?>
                                        <li>
                                            <img alt="" src="<?php echo $imag ?>" onclick="location.href = 'property_details.php?id=<?php echo $allprop['id'] ?>'" style="cursor: pointer;">
                                            <aside>
                                                <p><?php echo $allprop['name'] ?></p>
                                                <a href="your_listing-1.php?id=<?php echo $allprop['id'] ?>&action=edit">Manage Your Listing</a>
                                            </aside>
                                            <!--                                            <button class="btn btn-primary">Delete</button>-->
                                            <a href="your_listing-1.php?id=<?php echo $allprop['id'] ?>&action=edit" class="btn btn-primary"><?php echo $is_comp; ?> steps to list</a>
                                        </li>

                                        <?php
                                    }
                                } else {
                                    echo "No Property Found.";
                                }
                                ?>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>	


        <?php include("includes/footer.php"); ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>
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
            $(document).ready(function () {
                $('.bxslider').bxSlider({
                    auto: true,
                    autoControls: true
                });
            });
        </script>

    </body>
</html>