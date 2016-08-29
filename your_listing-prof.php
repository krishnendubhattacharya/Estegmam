<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';


if (isset($_REQUEST['submit'])) {

    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $country_code_id = isset($_POST['country_code_id']) ? $_POST['country_code_id'] : '';

    //$id = $_SESSION['prop_id'];

    $fields = array(
        'phone' => mysql_real_escape_string($phone),
        'country_code_id' => mysql_real_escape_string($country_code_id),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {

        $id = $_SESSION['prop_id'];

        $editQuery = "UPDATE `estejmam_user` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_SESSION['userid']) . "'";


        if (mysql_query($editQuery)) {

            $ck = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_main_property` WHERE `id`='" . mysql_real_escape_string($id) . "'"));

            $pk = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='" . mysql_real_escape_string($id) . "'"));
            $userpf = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . mysql_real_escape_string($_SESSION['userid']) . "'"));

            if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['name'] != '' && $ck['description'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] && $ck['amenities'] != '' && $pk['image'] != '' && $ck['price'] != '' && $ck['currency'] != '' && ($ck['review_each_request'] != 0 || $ck['guest_book_instant'] != 0) && ($ck['availability'] != 0 || $ck['availability'] != '') && $ck['home_safety'] != '' && $userpf['phone'] != '') {

                $status = 1;

                $up = "update `estejmam_main_property` set `status`='1' where `id`='" . $id . "'";
                mysql_query($up);
            }

            if ($_FILES['image']['tmp_name'] != '') {
                $target_path = "upload/userimages/";
                $userfile_name = $_FILES['image']['name'];
                $userfile_tmp = $_FILES['image']['tmp_name'];
                $img_name = $userfile_name;
                $img = $target_path . $img_name;
                move_uploaded_file($userfile_tmp, $img);

                $image = mysql_query("UPDATE `estejmam_user` SET `image`='" . $img_name . "' WHERE `id` = '" . mysql_real_escape_string($_SESSION['userid']) . "'");
            }

            header('Location:prop-list.php');
            exit();
        }
    }


    if ($_REQUEST['action'] == 'edit') {

        $id = $_REQUEST['id'];


        $editQuery = "UPDATE `estejmam_user` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_SESSION['userid']) . "'";


        if (mysql_query($editQuery)) {



            $ck = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_main_property` WHERE `id`='" . mysql_real_escape_string($id) . "'"));

            $pk = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='" . mysql_real_escape_string($id) . "'"));
            $userpf = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . mysql_real_escape_string($_SESSION['userid']) . "'"));

            if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['name'] != '' && $ck['description'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] && $ck['amenities'] != '' && $pk['image'] != '' && $ck['price'] != '' && $ck['currency'] != '' && ($ck['review_each_request'] != 0 || $ck['guest_book_instant'] != 0) && ($ck['availability'] != 0 || $ck['availability'] != '') && $ck['home_safety'] != '' && $userpf['phone'] != '') {

                $status = 1;

                $up = "update `estejmam_main_property` set `status`='1' where `id`='" . $id . "'";
                mysql_query($up);
            }

            if ($_FILES['image']['tmp_name'] != '') {
                $target_path = "upload/userimages/";
                $userfile_name = $_FILES['image']['name'];
                $userfile_tmp = $_FILES['image']['tmp_name'];
                $img_name = $userfile_name;
                $img = $target_path . $img_name;
                move_uploaded_file($userfile_tmp, $img);

                $image = mysql_query("UPDATE `estejmam_user` SET `image`='" . $img_name . "' WHERE `id` = '" . mysql_real_escape_string($_SESSION['userid']) . "'");
            }


            header('Location:prop-list.php');
            exit();
        }
    }
}

if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {
    $categoryRowset = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . mysql_real_escape_string($_SESSION['userid']) . "'"));
} elseif ($_REQUEST['action'] == 'edit') {
    $categoryRowset = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . mysql_real_escape_string($_SESSION['userid']) . "'"));
} else {
    $categoryRowset = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . mysql_real_escape_string($_SESSION['userid']) . "'"));
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
                            <h2>Complete your Profile</h2>
                            <p>Both Guest and hosts must fill out a complete profile.</p>
                            <hr>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Profile Photo</h3>
                                        <p>Add a friendly face to your listing.</p>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="profile_picture">

                                                    <img src="<?php if ($categoryRowset['image'] != '') { ?> upload/userimages/<?php echo $categoryRowset['image'] ?> <?php } else { ?> upload/nouser.jpg <?php } ?>" alt="" id="image_upload_preview">
                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <h3><a href="" class="btn btn-default btn-file btn-block"><i class="fa fa-facebook"></i> Use Facebook Photo</a></h3>
                                                <h3>
                                                    <a href="javascript:void(0);" class="btn btn-default btn-file btn-block test" ><i class="fa  fa-cloud-upload"></i> Upload a Photo</a>
                                                    <input type="file" name="image" class="btn btn-default btn-file btn-block test1" style="display: none;" id="inputFile">
                                                </h3>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                        <h3>Phone Number</h3>
                                        <p>Show only to confirmed guests.</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1"><?php
                                                            if ($categoryRowset['country_code_id'] != '') {
                                                                $cd = mysql_fetch_array(mysql_query("select * from `estejmam_country_code` where `id`='" . $categoryRowset['country_code_id'] . "'"));
                                                                echo $cd['code'];
                                                            } else {
                                                                ?>+00<?php } ?></span>
                                                        <input type="text" name="phone" class="form-control" value="<?php echo $categoryRowset['phone'] ?>" aria-describedby="basic-addon1" required>
                                                    </div>
                                                </div>
                                                <p>Not in India? <a href="javascript:void(0);" onclick="changecountry();">Change country</a></p>

                                                <div class="form-group" <?php if ($categoryRowset['country_code_id'] != '') { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?> id="countrydiv">
                                                    <label>Country</label>
                                                    <select name="country_code_id" class="form-control" onchange="checkcode(this.value)">
                                                        <option value="">Select Country</option>
                                                        <?php
                                                        $ctype = mysql_query("select * from `estejmam_country_code`");
                                                        while ($curtype = mysql_fetch_array($ctype)) {
                                                            ?>
                                                            <option value="<?php echo $curtype['id'] ?>" <?php if ($categoryRowset['country_code_id'] == $curtype['id']) { ?> selected <?php } ?>><?php echo $curtype['name'] ?>(<?php echo $curtype['code'] ?>)</option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                        <p>
                                            <?php
                                            if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                ?>
                                                <a href="your_listing-9.php?id=<?php echo $_REQUEST['id'] ?>&action=edit">Back</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="your_listing-9.php">Back</a>
                                                <?php
                                            }
                                            ?>
                                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Finish Remaining Steps" />
                                        </p>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="addition-amenity-box">
                            <h4 class="text-center">Complete Your Profile</h4>
                            <p>People can filter their search by the amenities they want, so make sure you include every time you offer.</p>
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
                                                        function checkcode(id)
                                                        {
                                                            $.ajax({
                                                                type: "post",
                                                                url: "prop_code_check.php",
                                                                data: {id: id},
                                                                success: function (msg) {
                                                                    $('#basic-addon1').html(msg);
                                                                }
                                                            });
                                                        }


                                                        function changecountry(id)
                                                        {
                                                            $('#countrydiv').toggle('slow');

                                                        }


                                                        function readURL(input) {
                                                            if (input.files && input.files[0]) {
                                                                var reader = new FileReader();

                                                                reader.onload = function (e) {
                                                                    $('#image_upload_preview').attr('src', e.target.result);
                                                                }

                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }

                                                        $(".test").click(function () {
                                                            $(".test1").trigger("click");


                                                        });


                                                        $("#inputFile").change(function () {
                                                            readURL(this);

                                                        });


        </script>


    </body>
</html>
