<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';


if (isset($_REQUEST['submit'])) {

    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $street_addr = isset($_POST['street_addr']) ? $_POST['street_addr'] : '';
    $zipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : '';
    $apt_suit_blding = isset($_POST['apt_suit_blding']) ? $_POST['apt_suit_blding'] : '';
    $street = isset($_POST['street']) ? $_POST['street'] : '';

    $latlng = getlatlang($zipcode);
    $lat = $latlng['lat'];
    $lng = $latlng['long'];




    $fields = array(
        'country' => mysql_real_escape_string($country),
        'state' => mysql_real_escape_string($state),
        'city' => mysql_real_escape_string($city),
        'street_addr' => mysql_real_escape_string($street_addr),
        'zipcode' => mysql_real_escape_string($zipcode),
        'apt_suit_blding' => mysql_real_escape_string($apt_suit_blding),
        'street' => mysql_real_escape_string($street),
        'lat' => $lat,
        'lng' => $lng,
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    if (isset($_SESSION['prop_id']) && $_SESSION['prop_id'] != '') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_SESSION['prop_id']) . "'";

        if (mysql_query($editQuery)) {

            header('Location:your_listing-4.php');
            exit();
        }
    }


    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_main_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

        if (mysql_query($editQuery)) {

            header('Location:your_listing-4.php?id=' . $_REQUEST['id'] . '&action=edit');
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
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">


        <title>Estejmam</title>

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href='css/jquery.bxslider.css' rel='stylesheet' type='text/css'>
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/style5.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
        <link rel="stylesheet" type="text/css" href="css/style8.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">

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
                            <h2>Help guests find your place</h2>
                            <p>Travelers will use this information to find a place that's in the right spot.</p>
                            <hr>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'] ?>">
                                <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />
                                <div class="row">
                                        <!-- <table id="address"> -->

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select name="country" class="form-control">
                                                <option value="" disabled selected>Select</option>
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
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Street Address</label>
                                            <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" class="form-control" name="street_addr" value="<?php echo $categoryRowset['street_addr'] ?>"></input>
                                        </div>
                                    </div>





                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Apt, Suite, Bldg. (Optional)</label>
                                            <input class="form-control" id="street_number"  name="apt_suit_blding" value="<?php echo $categoryRowset['apt_suit_blding'] ?>"></input>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Street</label>
                                            <input class="form-control" id="route" name="street" value="<?php echo $categoryRowset['street'] ?>"></input>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" id="locality" name="city" value="<?php echo $categoryRowset['city'] ?>"></input>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input class="form-control" id="administrative_area_level_1" name="state" value="<?php echo $categoryRowset['state'] ?>"></input>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Zip</label>
                                            <input class="form-control" id="postal_code" name="zipcode" value="<?php echo $categoryRowset['zipcode'] ?>"></input>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

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
<!-- <input type="submit" class="btn btn-default pull-left" value="Back" /> -->
                                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Ok, See Next" />
                                        </p>
                                    </div>


                                    <!-- </table> -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="addition-amenity-box">
                            <h4 class="text-center">Your location is private</h4>
                            <img src="images/location-approximate-location-451f717a7055fe30f3a39d55a8f7a806.png"  style="width:100%;">
                            <p>Only confirmed guests see your exact address.</p>
                            <div class="bulb"><img src="images/bulb.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php include ('includes/footer.php'); ?>


        <script src="js/bootstrap.js"></script>

        <script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

                                                var placeSearch, autocomplete;
                                                var componentForm = {
                                                    street_number: 'short_name',
                                                    route: 'long_name',
                                                    locality: 'long_name',
                                                    administrative_area_level_1: 'long_name',
                                                    //country: 'long_name',
                                                    postal_code: 'short_name'
                                                };

                                                function initAutocomplete() {
                                                    // Create the autocomplete object, restricting the search to geographical
                                                    // location types.
                                                    autocomplete = new google.maps.places.Autocomplete(
                                                            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                                                            {types: ['geocode']});

                                                    // When the user selects an address from the dropdown, populate the address
                                                    // fields in the form.
                                                    autocomplete.addListener('place_changed', fillInAddress);
                                                }

// [START region_fillform]
                                                function fillInAddress() {
                                                    // Get the place details from the autocomplete object.
                                                    var place = autocomplete.getPlace();

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
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
                                                function geolocate() {
                                                    if (navigator.geolocation) {
                                                        navigator.geolocation.getCurrentPosition(function (position) {
                                                            var geolocation = {
                                                                lat: position.coords.latitude,
                                                                lng: position.coords.longitude
                                                            };
                                                            var circle = new google.maps.Circle({
                                                                center: geolocation,
                                                                radius: position.coords.accuracy
                                                            });
                                                            autocomplete.setBounds(circle.getBounds());
                                                        });
                                                    }
                                                }
// [END region_geolocation]

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPiYOBtcG9lrQbrSdikcTqYQI6FcepDYk&signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>

    </body>
</html>
