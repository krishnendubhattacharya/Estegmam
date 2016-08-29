<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';

if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
    $url = "your_listing-5.php?id=" . $_REQUEST['id'] . '&action=edit';
} else {
    $url = "your_listing-5.php";
}



if ($_REQUEST['del']) {
    $del = "delete from `estejmam_image` where `id`='" . $_REQUEST['del'] . "'";
    mysql_query($del);
    if ($_REQUEST['id'] != '') {
        header("location:your_listing-5.php?id=" . $_REQUEST['id'] . '&action=edit');
    } else {
        header("location:your_listing-5.php");
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
        <link href="css/uploadfilemulti.css" rel="stylesheet">

        <script src="js/jquery.min.js"></script>
    </head>

    <body>
        <?php include ('includes/inner-header.php'); ?>
        <section class="all-step-section">
            <div class="container-fluid">
                <div class="row">

                    <?php include 'includes/your_listing_sidebar.php'; ?>

                    <div class="col-md-7">
                        <div class="step-right-area">
                            <h2>Photos can bring your space to life</h2>
                            <p>Add photos of areas guests have access to. You can always come back later and add more.</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!--<span class="btn btn-default btn-file btn-block">-->
                                        <!--<i class="fa fa-photo"></i>	 Add Photos <div id="mulitplefileuploader" style="background-color: #38BE61 !important;">Add Photos</div>-->
                                        <!-- <input type="file"> -->
                                        
                                    <!--</span>-->
                                    <div id="mulitplefileuploader"><i class="fa fa-cloud-upload"></i>Add Photos</div>
                                    <div id="status"></div>
                                </div>
                                <div class="col-sm-5">
                                        <!-- <span class="btn btn-default btn-file btn-block">
                                    <i class="fa fa-mobile"></i> Add Photos from Mobile<input type="file">
                                                            </span> -->
                                </div>
                            </div>
                            <hr>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />
                                <div class="row">

                                    <?php
                                    if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {
                                        $res22 = mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='" . $_SESSION['prop_id'] . "'");
                                    }
                                    if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
                                        $res22 = mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='" . $_REQUEST['id'] . "'");
                                    }
                                    $tot = mysql_num_rows($res22);
                                    if ($tot > 0) {
                                        while ($row22 = mysql_fetch_array($res22)) {
                                            ?>
                                            <div class="col-md-3">
                                                <div class="photo-box">
                                                    <img src="upload/property/<?php echo $row22['image']; ?>" alt="">
                                                    <?php
                                                    if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                        ?>
                                                        <a href="your_listing-5.php?del=<?php echo $row22['id'] ?>&id=<?php echo $_REQUEST['id'] ?>"><i class="fa fa-minus"></i> Delete</a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="your_listing-5.php?del=<?php echo $row22['id'] ?>"><i class="fa fa-minus"></i> Delete</a>
                                                        <?php
                                                    }
                                                    ?>
                                                </div><br /></div>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <div class="col-md-12">
                                        <hr>
                                        <p>
                                                <!-- <input type="submit" class="btn btn-default pull-left" value="Back" /> -->
                                            <?php
                                            if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                ?>
                                                <a href="your_listing-4.php?id=<?php echo $_REQUEST['id'] ?>&action=edit">Back</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="your_listing-4.php">Back</a>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if ($_REQUEST['action'] == "edit" && $_REQUEST['id'] != '') {
                                                ?>
                                                <a href="your_listing-6.php?id=<?php echo $_REQUEST['id'] ?>&action=edit" class="btn btn-primary pull-right">Next</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="your_listing-6.php" class="btn btn-primary pull-right">Next</a>
                                                <?php
                                            }
                                            ?>

     <!-- <input type="submit" name="submit" class="btn btn-primary pull-right" value="Next" /> -->
                                        </p>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="addition-amenity-box">
                            <h4 class="text-center">Guests Love Photos</h4>
                            <p>Include a few well-lit photos. Cell phone photos are just fine.</p>
                            <div class="bulb"><img src="images/bulb.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php include ('includes/footer.php'); ?>



        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.fileuploadmulti.min.js"></script>

        <script>

            $(document).ready(function ()
            {

                var settings = {
                    url: "upload.php?id=<?php echo $_REQUEST['id'] ?>",
                    method: "POST",
                    allowedTypes: "jpg,png,gif,doc,pdf,zip",
                    fileName: "myfile",
                    multiple: true,
                    onSuccess: function (files, data, xhr)
                    {
                        $("#status").html("<font color='green'>Upload is success</font>");

                    },
                    afterUploadAll: function ()
                    {
                        //alert("all images uploaded!!");
                        window.location.href = '<?php echo $url ?>';
                    },
                    onError: function (files, status, errMsg)
                    {
                        $("#status").html("<font color='red'>Upload is Failed</font>");
                    }
                }
                $("#mulitplefileuploader").uploadFile(settings);

            });
        </script>



    </body>
</html>
