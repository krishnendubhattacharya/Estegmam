<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';


if ($_SESSION['userid'] == '') {
    header("location:index.php");
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

        <?php include ('includes/inner-header.php'); ?>

        <section class="your-listing-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top_your_list">
                            <h1>List Your Space</h1>
                            <p class="text-center">Estejmam lets you make money renting out your place. </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bottom_your_list">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 middle-div">
                        <div class="row">
                            <form action="your_listing-1.php" method="POST">
                                <div class="col-md-8">
                                    <ul class="ur_list_desc">
                                        <li>
                                            <p>Property Type</p>
                                            <ul class="common_desc">
                                                <?php
                                                $ame = mysql_query("select * from `estejmam_property_type` where 1");
                                                while ($amenities = mysql_fetch_array($ame)) {
                                                    $c++;
                                                    ?>   

                                                    <li id="prop_<?php echo $amenities['id'] ?>" name="<?php echo $amenities['id'] ?>" onclick="propcheck('<?php echo $amenities['id'] ?>')" class="propClass"><a href="javascript:void(0);"><i class="fa fa-building-o"></i><?php echo $amenities['name']; ?></a></li>
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </li>
                                        <input type="hidden" name="prophidid" id="prophidid" value="">
                                        <input type="hidden" name="weekval" id="weekval" value="">
                                        <li>
                                            <p>City</p>
                                            <ul class="common_desc">
                                                <li>
                                                    <span class="icon"><i class="fa fa-map-marker fa-2x"></i></span>
                                                    <input type="text" name="location" id="autocomplete5" placeholder="San Fransisco, Rome..">
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <input type="submit" value="Continue" class="btn btn-primary">
                                        </li>
                                    </ul>
                                </div>
                            </form>
                            <div class="col-md-4">
                                <div class="earn-box">
                                    <p class="text-center">See what you could earn</p>
                                    <div id="loding" style="display:none;"><img src="Green-014-loading.gif" style="position:absolute;margin-left:34%;"></div>
                                    <h1 class="text-center" id="price">$0</h1>
                                    <div class="form-group">
                                        <select class="form-control" onchange="chkweek(this.value)">
                                            <option value="">Select</option>
                                            <option value="1">For 1 Week</option>
                                            <option value="2">For 2 Week</option>
                                            <option value="3">For 3 Week</option>
                                            <option value="4">For 1 Month</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php include('includes/footer.php'); ?>

        <script src="js/jquery.min.js"></script>
<!--        <script src="js/jquery.bxslider.js"></script>-->
        <script src="js/bootstrap.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

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


                                            var placeSearch, autocomplete5;
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
                                                        /** @type {HTMLInputElement} */(document.getElementById('autocomplete5')),
                                                        {types: ['geocode']});

                                                // When the user selects an address from the dropdown,
                                                // populate the address fields in the form.
                                                google.maps.event.addListener(autocomplete5, 'place_changed', function () {
                                                    fillInAddress();
                                                });
                                                google.maps.event.addListener(autocomplete5, 'place_changed', function () {
                                                    fillInAddress();
                                                });

                                            }


                                            function fillInAddress() {
                                                // Get the place details from the autocomplete object.
                                                var place = autocomplete5.getPlace();

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
                                                        autocomplete5.setBounds(new google.maps.LatLngBounds(geolocation,
                                                                geolocation));
                                                    });
                                                }

                                            }


        </script>

        <script>
            function propcheck(id)
            {
                $('#loding').show();
                $('#price').css({"color": "white"});
                $(".propClass a").css({"background": "#fff", "color": "#ccc", "text-decoration": "none"});
                $('#prop_' + id + ' a').css({"background": "#5fd080", "color": "#fff", "text-decoration": "none"});
                $('#prophidid').attr('value', id);
                var idd = $('#weekval').val();
                $.ajax({
                    type: "post",
                    url: "prop_price_check.php",
                    data: {id: id, wid: idd},
                    success: function (msg) {
                        $('#price').html(msg);
                        $('#loding').hide();
                        $('#price').css({"color": "black"});
                    }
                });
            }


        </script>

        <script>
            function chkweek(id)
            {
                var idd = $('#prophidid').val();
                $('#weekval').attr('value', id);
                $('#loding').show();
                $('#price').css({"color": "white"});
                $.ajax({
                    type: "post",
                    url: "prop_price_check.php",
                    data: {id: idd, wid: id},
                    success: function (msg1) {
                        $('#price').html(msg1);
                        $('#loding').hide();
                        $('#price').css({"color": "black"});
                    }
                });
            }


        </script>



        <style>
            .normal{background-color:#fff;}
        </style>

    </body>
</html>
