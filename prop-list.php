<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");
unset($_SESSION['prop_id']);
if (!is_user_logged_in()) {
    header("location:index.php");
}
unset($_SESSION['prop_id']);

if (isset($_REQUEST['del']) && $_REQUEST['del'] != '') {

    $del = "delete from `estejmam_main_property` where `id`='" . $_REQUEST['del'] . "'";
    mysql_query($del);

    $del2 = "delete from `estejmam_image` where `prop_id`='" . $_REQUEST['del'] . "'";
    mysql_query($del2);

    $_SESSION['MSG'] = 1;
    header("location:prop-list.php");
    exit();
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

                        <?php //include("includes/my-account_left.php"); ?>
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
                                $prop = mysql_query("select * from `estejmam_main_property` where `user_id`='" . $_SESSION['userid'] . "' and `status`='1'");
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
                                        ?>
                                        <li>
                                            <img alt="" src="<?php echo $imag ?>" onclick="location.href = 'property_details.php?id=<?php echo $allprop['id'] ?>'" style="cursor: pointer;">
                                            <aside>
                                                <p><?php echo $allprop['name'] ?></p>
                                                <a href="your_listing-1.php?id=<?php echo $allprop['id'] ?>&action=edit">Manage Your Listing</a>
                                            </aside>
                                            <!--                                            <button class="btn btn-primary">Delete</button>-->
                                            <a href="javascript:void(0);" onclick="javascript:ConfirmDelete('<?php echo $allprop['id'] ?>')" class="btn btn-primary">Delete</a>
                                        </li>

                                        <?php
                                    }
                                }
                                ?>

                            </ul>
                        </div>
                        <!--<div class="row right-listing">

                        <?php
                        $prop = mysql_query("select * from `estejmam_main_property` where `user_id`='" . $_SESSION['userid'] . "' and `status`='1'");
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
                                ?>

                                                                                                                    <div class="col-md-4 col-sm-6">
                                                                                                                        <div class="list-box">
                                                                                                                            <img alt="" src="<?php echo $imag ?>" onclick="location.href = 'property_details.php?id=<?php echo $allprop['id'] ?>'" style="cursor: pointer;">
                                                                                                                            <div class="center-content">
                                                                                                                                <h4><?php echo $allprop['name'] ?></h4>
                                                                                                                                <p>By <?php echo $user['fname'] . ' ' . $user['lname'] ?></p>
                                                                                                                            </div>
                                                                                                                            <div class="bottom-content">
                                                                                                                                <h3>$<?php echo $allprop['price'] ?></h3>
                                                                                                                                <p><i class="fa fa-mail-forward"></i> 
                                                                                                                                    <a href="your_listing-1.php?id=<?php echo $allprop['id'] ?>&action=edit">Edit</a> |
                                                                                                                                    <a href="javascript:void(0);" onclick="javascript:ConfirmDelete('<?php echo $allprop['id'] ?>')">Delete</a>
                                                                                                                                </p>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                <?php
                            }
                        }
                        ?>



                        </div>-->
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