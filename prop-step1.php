<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");

if (!is_user_logged_in()) {
    header("location:index.php");
}

if (isset($_REQUEST['id'])) {
    $pid = $_REQUEST['id'];
} else {
    $pid = 0;
}


//$prof = mysql_fetch_array(mysql_query("select * from `alibabademo_user` where `id`='" . $_SESSION['user_id'] . "'"));
if (isset($_REQUEST['submit'])) {

    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';

    $bedrooms = isset($_POST['bedrooms']) ? $_POST['bedrooms'] : '';
    $beds = isset($_POST['beds']) ? $_POST['beds'] : '';
    $bathrooms = isset($_POST['bathrooms']) ? $_POST['bathrooms'] : '';

    $prop_type = isset($_POST['prop_type']) ? $_POST['prop_type'] : '';
    $room_type = isset($_POST['room_type']) ? $_POST['room_type'] : '';
    $accommodates = isset($_POST['accommodates']) ? $_POST['accommodates'] : '';

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $street_addr = isset($_POST['street_addr']) ? $_POST['street_addr'] : '';
    $zipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : '';

    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $currency = isset($_POST['currency']) ? $_POST['currency'] : '';

    $created_date = date("Y-m-d");
    $status = 1;

    $latlng = getlatlang($zipcode);
    $lat = $latlng['lat'];
    $lng = $latlng['long'];



    $fields = array(
        'user_id' => mysql_real_escape_string($user_id),
        'bedrooms' => mysql_real_escape_string($bedrooms),
        'beds' => mysql_real_escape_string($beds),
        'bathrooms' => mysql_real_escape_string($bathrooms),
        'prop_type' => mysql_real_escape_string($prop_type),
        'room_type' => mysql_real_escape_string($room_type),
        'accommodates' => mysql_real_escape_string($accommodates),
        'name' => mysql_real_escape_string($name),
        'description' => mysql_real_escape_string($description),
        'country' => mysql_real_escape_string($country),
        'state' => mysql_real_escape_string($state),
        'city' => mysql_real_escape_string($city),
        'street_addr' => mysql_real_escape_string($street_addr),
        'zipcode' => mysql_real_escape_string($zipcode),
        'price' => mysql_real_escape_string($price),
        'currency' => mysql_real_escape_string($currency),
        'created_date' => mysql_real_escape_string($created_date),
        'status' => $status,
        'lat' => $lat,
        'lng' => $lng,
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";


        $sql = "DELETE from `estejmam_image` where prop_id=" . $_REQUEST['id'];
        mysql_query($sql);

        if (mysql_query($editQuery)) {

            $prop_id = $_REQUEST['id'];

            foreach ($_REQUEST['images'] as $inv_video) {
                $video_link = basename($inv_video);
                $date_added = date('y-m-d h:i:s');
                mysql_query("INSERT INTO `estejmam_image` 
        (prop_id,image)  
        VALUES ('" . $_REQUEST['id'] . "','" . $video_link . "')");
            }


            header('Location:prop-step2.php?id=' . $_REQUEST['id'] . '&action=edit');
            exit();
        }
    } else {

        $addQuery = "INSERT INTO `estejmam_main_property` (`" . implode('`,`', array_keys($fields)) . "`)"
                . " VALUES ('" . implode("','", array_values($fields)) . "')";

        //exit;
        mysql_query($addQuery);
        $last_id = mysql_insert_id();
        $_SESSION['prop_id'] = $last_id;



        foreach ($_REQUEST['images'] as $inv_video) {
            $video_link = basename($inv_video);
            $date_added = date('y-m-d h:i:s');
            mysql_query("INSERT INTO `estejmam_image` 
        (prop_id,image)  
        VALUES ('" . $last_id . "','" . $video_link . "')");
        }

        header('Location:prop-step2.php');
        exit();
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
                            <h4>Rooms and Beds</h4>
                            <form class="" action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bedroom:</label>
                                            <select name="bedrooms" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="studio" <?php if ($categoryRowset['bedrooms'] == 'studio') { ?> selected <?php } ?>>Studio</option>
                                                <option value="1" <?php if ($categoryRowset['bedrooms'] == '1') { ?> selected <?php } ?>>1</option>
                                                <option value="2" <?php if ($categoryRowset['bedrooms'] == '2') { ?> selected <?php } ?>>2</option>
                                                <option value="3" <?php if ($categoryRowset['bedrooms'] == '3') { ?> selected <?php } ?>>3</option>
                                                <option value="4" <?php if ($categoryRowset['bedrooms'] == '4') { ?> selected <?php } ?>>4</option>
                                                <option value="5" <?php if ($categoryRowset['bedrooms'] == '5') { ?> selected <?php } ?>>5</option>
                                                <option value="6" <?php if ($categoryRowset['bedrooms'] == '6') { ?> selected <?php } ?>>6</option>
                                                <option value="7" <?php if ($categoryRowset['bedrooms'] == '7') { ?> selected <?php } ?>>7</option>
                                                <option value="8" <?php if ($categoryRowset['bedrooms'] == '8') { ?> selected <?php } ?>>8</option>
                                                <option value="9" <?php if ($categoryRowset['bedrooms'] == '9') { ?> selected <?php } ?>>9</option>
                                                <option value="10" <?php if ($categoryRowset['bedrooms'] == '10') { ?> selected <?php } ?>>10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Beds:</label>
                                            <select name="beds" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="1" <?php if ($categoryRowset['beds'] == '1') { ?> selected <?php } ?>>1</option>
                                                <option value="2" <?php if ($categoryRowset['beds'] == '2') { ?> selected <?php } ?>>2</option>
                                                <option value="3" <?php if ($categoryRowset['beds'] == '3') { ?> selected <?php } ?>>3</option>
                                                <option value="4" <?php if ($categoryRowset['beds'] == '4') { ?> selected <?php } ?>>4</option>
                                                <option value="5" <?php if ($categoryRowset['beds'] == '5') { ?> selected <?php } ?>>5</option>
                                                <option value="6" <?php if ($categoryRowset['beds'] == '6') { ?> selected <?php } ?>>6</option>
                                                <option value="7" <?php if ($categoryRowset['beds'] == '7') { ?> selected <?php } ?>>7</option>
                                                <option value="8" <?php if ($categoryRowset['beds'] == '8') { ?> selected <?php } ?>>8</option>
                                                <option value="9" <?php if ($categoryRowset['beds'] == '9') { ?> selected <?php } ?>>9</option>
                                                <option value="10" <?php if ($categoryRowset['beds'] == '10') { ?> selected <?php } ?>>10</option>
                                                <option value="11" <?php if ($categoryRowset['beds'] == '11') { ?> selected <?php } ?>>11</option>
                                                <option value="12" <?php if ($categoryRowset['beds'] == '12') { ?> selected <?php } ?>>12</option>
                                                <option value="13" <?php if ($categoryRowset['beds'] == '13') { ?> selected <?php } ?>>13</option>
                                                <option value="14" <?php if ($categoryRowset['beds'] == '14') { ?> selected <?php } ?>>14</option>
                                                <option value="15" <?php if ($categoryRowset['beds'] == '15') { ?> selected <?php } ?>>15</option>
                                                <option value="16" <?php if ($categoryRowset['beds'] == '16') { ?> selected <?php } ?>>16</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bathrooms:</label>
                                            <select name="bathrooms" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="0" <?php if ($categoryRowset['bathrooms'] == '0') { ?> selected <?php } ?>>0</option>
                                                <option value="0.5" <?php if ($categoryRowset['bathrooms'] == '0.5') { ?> selected <?php } ?>>0.5</option>
                                                <option value="1" <?php if ($categoryRowset['bathrooms'] == '1') { ?> selected <?php } ?>>1</option>
                                                <option value="1.5" <?php if ($categoryRowset['bathrooms'] == '1.5') { ?> selected <?php } ?>>1.5</option>
                                                <option value="2" <?php if ($categoryRowset['bathrooms'] == '2') { ?> selected <?php } ?>>2</option>
                                                <option value="2.5" <?php if ($categoryRowset['bathrooms'] == '2.5') { ?> selected <?php } ?>>2.5</option>
                                                <option value="3" <?php if ($categoryRowset['bathrooms'] == '3') { ?> selected <?php } ?>>3</option>
                                                <option value="3.5" <?php if ($categoryRowset['bathrooms'] == '3.5') { ?> selected <?php } ?>>3.5</option>
                                                <option value="4" <?php if ($categoryRowset['bathrooms'] == '4') { ?> selected <?php } ?>>4</option>
                                                <option value="4.5" <?php if ($categoryRowset['bathrooms'] == '4.5') { ?> selected <?php } ?>>4.5</option>
                                                <option value="5" <?php if ($categoryRowset['bathrooms'] == '5') { ?> selected <?php } ?>>5</option>
                                                <option value="5.5" <?php if ($categoryRowset['bathrooms'] == '5.5') { ?> selected <?php } ?>>5.5</option>
                                                <option value="6" <?php if ($categoryRowset['bathrooms'] == '6') { ?> selected <?php } ?>>6</option>
                                                <option value="6.5" <?php if ($categoryRowset['bathrooms'] == '6.5') { ?> selected <?php } ?>>6.5</option>
                                                <option value="7" <?php if ($categoryRowset['bathrooms'] == '7') { ?> selected <?php } ?>>7</option>
                                                <option value="7.5" <?php if ($categoryRowset['bathrooms'] == '7.5') { ?> selected <?php } ?>>7.5</option>
                                                <option value="8" <?php if ($categoryRowset['bathrooms'] == '8') { ?> selected <?php } ?>>8</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <h4>Listing</h4>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Property Type:</label>
                                            <select name="prop_type" class="form-control" required>
                                                <option value="Select">Select</option>

                                                <?php
                                                $ptype = mysql_query("select * from `estejmam_property_type` where `status`='1'");
                                                while ($proptype = mysql_fetch_array($ptype)) {
                                                    ?>
                                                    <option value="<?php echo $proptype['id'] ?>" <?php if ($categoryRowset['prop_type'] == $proptype['id']) { ?> selected <?php } ?>><?php echo $proptype['name'] ?></option>
                                                    <?php
                                                }
                                                ?>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Room Type:</label>
                                            <select name="room_type" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="Entire home/apt" <?php if ($categoryRowset['room_type'] == 'Entire home/apt') { ?> selected <?php } ?>>Entire home/apt</option>
                                                <option value="Private room" <?php if ($categoryRowset['room_type'] == 'Private room') { ?> selected <?php } ?>>Private room</option>
                                                <option value="Shared room" <?php if ($categoryRowset['room_type'] == 'Shared room') { ?> selected <?php } ?>>Shared room</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Accommodates:</label>
                                            <select name="accommodates" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="1" <?php if ($categoryRowset['accommodates'] == '1') { ?> selected <?php } ?>>1</option>
                                                <option value="2" <?php if ($categoryRowset['accommodates'] == '2') { ?> selected <?php } ?>>2</option>
                                                <option value="3" <?php if ($categoryRowset['accommodates'] == '3') { ?> selected <?php } ?>>3</option>
                                                <option value="4" <?php if ($categoryRowset['accommodates'] == '4') { ?> selected <?php } ?>>4</option>
                                                <option value="5" <?php if ($categoryRowset['accommodates'] == '5') { ?> selected <?php } ?>>5</option>
                                                <option value="6" <?php if ($categoryRowset['accommodates'] == '6') { ?> selected <?php } ?>>6</option>
                                                <option value="7" <?php if ($categoryRowset['accommodates'] == '7') { ?> selected <?php } ?>>7</option>
                                                <option value="8" <?php if ($categoryRowset['accommodates'] == '8') { ?> selected <?php } ?>>8</option>
                                                <option value="9" <?php if ($categoryRowset['accommodates'] == '9') { ?> selected <?php } ?>>9</option>
                                                <option value="10" <?php if ($categoryRowset['accommodates'] == '10') { ?> selected <?php } ?>>10</option>
                                                <option value="11" <?php if ($categoryRowset['accommodates'] == '11') { ?> selected <?php } ?>>11</option>
                                                <option value="12" <?php if ($categoryRowset['accommodates'] == '12') { ?> selected <?php } ?>>12</option>
                                                <option value="13" <?php if ($categoryRowset['accommodates'] == '13') { ?> selected <?php } ?>>13</option>
                                                <option value="14" <?php if ($categoryRowset['accommodates'] == '14') { ?> selected <?php } ?>>14</option>
                                                <option value="15" <?php if ($categoryRowset['accommodates'] == '15') { ?> selected <?php } ?>>15</option>
                                                <option value="16" <?php if ($categoryRowset['accommodates'] == '16') { ?> selected <?php } ?>>16</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <h4>
                                    Tell travelers about your space
                                </h4>
                                <div class="form-group">
                                    <label>Listing Name:</label>
                                    <input class="form-control" name="name" type="text" value="<?php echo $categoryRowset['name'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Summary:</label>
                                    <textarea class="form-control" rows="3" name="description" required><?php echo $categoryRowset['description'] ?></textarea>
                                </div>
                                <h4>
                                    Help guests find your place
                                </h4>
                                <div class="form-group">
                                    <label>Country:</label>
                                    <select name="country" class="form-control" required>
                                        <option value="">Select</option>
                                        <?php
                                        $coun = mysql_query("select * from `estejmam_countries`");
                                        while ($allcountry = mysql_fetch_array($coun)) {
                                            ?>
                                            <option value="<?php echo $allcountry['id'] ?>" <?php if ($categoryRowset['country'] == $allcountry['id']) { ?> selected <?php } ?>><?php echo $allcountry['name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Street Address:</label>
                                    <input class="form-control" name="street_addr" type="text" value="<?php echo $categoryRowset['street_addr'] ?>" id="autocomplete5" onFocus="geolocate()" required>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>City:</label>
                                            <input class="form-control" name="city" value="<?php echo $categoryRowset['city'] ?>" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>State:</label>
                                            <input class="form-control" name="state" value="<?php echo $categoryRowset['state'] ?>" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Zip:</label>
                                            <input class="form-control" name="zipcode" value="<?php echo $categoryRowset['zipcode'] ?>" type="text" required>
                                        </div>
                                    </div>
                                </div>

                                <h4>
                                    Set a nightly price for your space
                                </h4>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Price:</label>
                                            <input class="form-control" name="price" type="text" value="<?php echo $categoryRowset['price'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Currency:</label>
                                            <select name="currency" class="form-control" required>


                                                <?php
                                                $ctype = mysql_query("select * from `estejmam_currency`");
                                                while ($curtype = mysql_fetch_array($ctype)) {
                                                    ?>
                                                    <option value="<?php echo $curtype['code'] ?>" <?php if ($categoryRowset['currency'] == $curtype['code']) { ?> selected <?php } ?>><?php echo $curtype['code'] ?></option>
                                                    <?php
                                                }
                                                ?>



                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <h4>
                                    Photos can bring your space to life
                                </h4>

                                <div class="form-group">
                                    <label>Images:</label>
                                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                                </div>

                                <div id="content1">

                                    <?php
                                    if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
                                        $res22 = mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='" . $_REQUEST['id'] . "'");
                                        $tot = mysql_num_rows($res22);
                                        if ($tot > 0) {
                                            while ($row22 = mysql_fetch_array($res22)) {
                                                ?>                         
                                                <div style="float:left;width:70px;border:0px solid red;position:relative;" class="div_div"><input type="hidden" value="<?php echo $row22['image']; ?>" class="video_hid" name="images[]"><img border="0" src="upload/property/<?php echo $row22['image']; ?>" style="height:50px;width:50px;"><a class="del_this" id="<?php echo $row22['id']; ?>" href="javascript: void(0)"><img border="0" src="uploadify-cancel.png"></a></div>


                                                <?php
                                            }
                                        }
                                    }
                                    ?>
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



                <!--        <script>
                            $(document).ready(function () {
                                $('.bxslider').bxSlider({
                                    auto: true,
                                    autoControls: true
                                });
                            });
                        </script>-->


        <script type="text/javascript">
            $(document).ready(function () {
                $('#autocomplete5').change('input', function () {
                    setTimeout(function () {
                        getAutocomplete5val();
                    }, 1000);
                });
            });

            function getAutocomplete5val() {
                //alert('hiiii');
                var address = $("#autocomplete5").val();
                $('#autocomplete6').val(address);
            }


            var placeSearch, autocomplete, autocomplete1, autocomplete2, autocomplete3, autocomplete4, autocomplete5, autocomplete6, autocomplete7, autocomplete8, autocomplete9, autocomplete10, autocomplete11, autocomplete12, autocomplete13, autocomplete14, autocomplete15, autocomplete16, autocomplete17, autocomplete18, autocomplete19, autocomplete20, autocomplete21, autocomplete22, autocomplete23, autocomplete24, autocomplete25, autocomplete26, autocomplete27;
            var componentForm = {
                street_number: 'short_name',
                route: 'long_name',
                locality: 'long_name',
                administrative_area_level_1: 'short_name',
                country: 'long_name',
                postal_code: 'short_name'
            };

            function initialize() {
                // Create the autocomplete object, restricting the search
                // to geographical location types.
                autocomplete = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
                        {types: ['geocode']});
                autocomplete1 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete1')),
                        {types: ['geocode']});
                autocomplete2 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete2')),
                        {types: ['geocode']});
                autocomplete3 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete3')),
                        {types: ['geocode']});
                autocomplete4 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete4')),
                        {types: ['geocode']});
                autocomplete5 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete5')),
                        {types: ['geocode']});
                autocomplete6 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete6')),
                        {types: ['geocode']});
                autocomplete7 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete7')),
                        {types: ['geocode']});
                autocomplete8 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete8')),
                        {types: ['geocode']});
                autocomplete9 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete9')),
                        {types: ['geocode']});
                autocomplete10 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete10')),
                        {types: ['geocode']});
                autocomplete11 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete11')),
                        {types: ['geocode']});
                autocomplete12 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete12')),
                        {types: ['geocode']});
                autocomplete13 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete13')),
                        {types: ['geocode']});
                autocomplete14 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete14')),
                        {types: ['geocode']});
                autocomplete15 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete15')),
                        {types: ['geocode']});
                autocomplete16 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete16')),
                        {types: ['geocode']});
                autocomplete17 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete17')),
                        {types: ['geocode']});
                autocomplete18 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete18')),
                        {types: ['geocode']});
                autocomplete19 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete19')),
                        {types: ['geocode']});
                autocomplete20 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete20')),
                        {types: ['geocode']});
                autocomplete21 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete21')),
                        {types: ['geocode']});
                autocomplete22 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete22')),
                        {types: ['geocode']});
                autocomplete23 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete23')),
                        {types: ['geocode']});
                autocomplete24 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete24')),
                        {types: ['geocode']});
                autocomplete25 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete25')),
                        {types: ['geocode']});
                autocomplete26 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete26')),
                        {types: ['geocode']});
                autocomplete27 = new google.maps.places.Autocomplete(
                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete27')),
                        {types: ['geocode']});
                // When the user selects an address from the dropdown,
                // populate the address fields in the form.
                google.maps.event.addListener(autocomplete, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete1, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete2, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete3, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete4, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete5, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete6, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete7, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete8, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete9, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete10, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete11, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete12, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete13, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete14, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete15, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete16, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete17, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete18, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete19, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete20, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete21, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete22, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete23, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete24, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete25, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete26, 'place_changed', function () {
                    fillInAddress();
                });
                google.maps.event.addListener(autocomplete27, 'place_changed', function () {
                    fillInAddress();
                });
            }


            function fillInAddress() {
                // Get the place details from the autocomplete object.
                var place = autocomplete.getPlace();
                var place1 = autocomplete1.getPlace();
                var place2 = autocomplete2.getPlace();
                var place3 = autocomplete3.getPlace();
                var place4 = autocomplete4.getPlace();
                var place5 = autocomplete5.getPlace();
                var place6 = autocomplete6.getPlace();
                var place7 = autocomplete7.getPlace();
                var place8 = autocomplete8.getPlace();
                var place9 = autocomplete9.getPlace();
                var place10 = autocomplete10.getPlace();
                var place11 = autocomplete11.getPlace();
                var place12 = autocomplete12.getPlace();
                var place13 = autocomplete13.getPlace();
                var place14 = autocomplete14.getPlace();
                var place15 = autocomplete15.getPlace();
                var place16 = autocomplete16.getPlace();
                var place17 = autocomplete17.getPlace();
                var place18 = autocomplete18.getPlace();
                var place19 = autocomplete19.getPlace();
                var place20 = autocomplete20.getPlace();
                var place21 = autocomplete21.getPlace();
                var place22 = autocomplete22.getPlace();
                var place23 = autocomplete23.getPlace();
                var place24 = autocomplete24.getPlace();
                var place25 = autocomplete25.getPlace();
                var place26 = autocomplete26.getPlace();
                var place27 = autocomplete27.getPlace();
                //alert(place5);
                for (var component in componentForm) {
                    document.getElementById(component).value = '';
                    document.getElementById(component).disabled = false;
                }

                // Get each component of the address from the place details
                // and fill the corresponding field on the form.
                for (var i = 0; i < place.address_components.length; i++) {
                    var addressType = place.address_components[i].types[0];
                    if (componentForm[addressType]) {
                        var val = place.address_components[i][componentForm[addressType]];
                        document.getElementById(addressType).value = val;
                    }
                }
            }

            // Bias the autocomplete object to the user's geographical location,
            // as supplied by the browser's 'navigator.geolocation' object.
            function geolocate() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete1.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete2.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete3.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete4.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete5.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                        //alert(geolocation);
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete6.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete7.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete8.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete9.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete10.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete11.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete12.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete13.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete14.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete15.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete16.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete17.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete18.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete19.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete20.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete21.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete22.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete23.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete24.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete25.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete26.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = new google.maps.LatLng(
                                position.coords.latitude, position.coords.longitude);
                        autocomplete27.setBounds(new google.maps.LatLngBounds(geolocation,
                                geolocation));
                    });
                }
            }


        </script>


        <script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="uploadify.css">    


        <script type="text/javascript">
<?php $timestamp = time(); ?>
            $(function () {

                $('.del_this').click(function (event) {

                    $(this).closest('.div_div').remove();

                });


                $('#file_upload').uploadify({
                    'formData': {
                        'timestamp': '<?php echo $timestamp; ?>',
                        'token': '<?php echo md5('unique_salt' . $timestamp); ?>'
                    },
                    'swf': 'uploadify.swf',
                    'fileTypeExts': '*.jpg; *.png; *.jpeg; *.JPG; *.PNG; *.JPEG',
                    'buttonText': 'Add Images',
                    'cancelImg': 'uploadify-cancel.png',
                    'displayData': 'percentage',
                    'onUploadSuccess': function (file, data, response) {


                        $('#content1').append('<div class="div_div" style="float:left;width:70px;border:0px solid red;position:relative;"><input type="hidden" name="images[]" class="video_hid" value="' + data + '"><img border="0" style="height:50px;width:50px;" src=" ' + data + '" /><a href="javascript: void(0)" id="" class="del_this"><img border="0" src="uploadify-cancel.png"  border="0"/></a></div>');

                        $('.del_this').click(function (event) {

                            $(this).closest('.div_div').remove();

                        });

                        //$('#imageData').val(file.name);
                        //getFileLists(file.name,file.size);
                        //viewFirst();
                    },
                    'uploader': 'uploadify.php'
                });
            });
        </script>




    </body>
</html>