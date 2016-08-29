<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");

if (!is_user_logged_in()) {
    header("location:index.php");
}
?>

<?php
if ($_POST['submit']) {

    $password = $_REQUEST['password'];
    $newpass = $_REQUEST['newpass'];
    $dbpass = md5($password);

    if ($password == $password) {

        $profupdate = "update `estejmam_user` set `password`='" . $dbpass . "' where `id`='" . $_REQUEST['id'] . "'";

        mysql_query($profupdate);
        $_SESSION['msg'] = 'Password Updated Successfully ';
        header('location:change_password.php');
        exit();
    } else {
        $_SESSION['msg'] = 'Password Mismatch ';
        header('location:change_password.php');
        exit();
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
                            <h4>Change Password</h4>
                            <?php
                            if ($_SESSION['msg'] != '') {
                                echo $_SESSION['msg'];
                                $_SESSION['msg'] = '';
                            }
                            ?>
                            <form class="" action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="hidimage" value="<?php echo $prof['image'] ?>">
                                <div class="form-group">
                                    <label>New Password :</label>
                                    <input class="form-control" type="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label>Retype New Password :</label>
                                    <input class="form-control" type="password" name="newpass" required>
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