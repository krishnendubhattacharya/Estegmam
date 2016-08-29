<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';

$sql = "SELECT * FROM `estejmam_main_property` WHERE `id`<>'' and `status`='1'";

$property_map = mysql_query($sql);
$property_num_rows = mysql_num_rows(mysql_query($sql));

$property_list = mysql_query($sql);
?>
<!DOCTYPE html>
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

        <script src="js/jquery.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="js/bootstrap.js"></script>

        <script>
                    var map;
                    var infoWindow;
                    var markersData = [
<?php
$i = 0;
while ($result = mysql_fetch_object($property_map)) {
    $image_details = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='$result->id' LIMIT 1"));
    $image = $image_details->image;
    ?>
    <?php if ($i < $property_num_rows) { ?>
                            {
                            lat: <?php echo $result->lat; ?>,
                                    lng: <?php echo $result->lng; ?>,
                                    name: "<?php echo $result->name; ?>",
                                    image: "<?php echo $image; ?>",
                                    id: "<?php echo $result->id; ?>"
                            },
    <?php } else { ?>
                            {
                            lat: <?php echo $result->lat; ?>,
                                    lng: <?php echo $result->lng; ?>,
                                    name: <?php echo $result->name; ?>,
                                    image: "<?php echo $image; ?>",
                                    id: "<?php echo $result->id; ?>"
                            }
        <?php
    }
    $i++;
}
?>
                    ];</script>
        <script type="text/javascript">
                    $(function () {
                    $("#edate").datepicker({
                    dateFormat: 'yy-mm-dd',
                            onSelect: function (date, instance) {
                            var alldata = $('#submit_review').serialize();
                                    $('#loding').show();
                                    $.ajax
                                    ({
                                    type: "Post",
                                            url: "ajax_search.php",
                                            data: alldata,
                                            success: function (result)
                                            {
                                            var data = result.split('!!!***');
                                                    var finaldata = data[0].trim();
                                                    $('#divshowresult').html(finaldata);
                                                    $('#loding').hide();
                                            }
                                    });
                            }
                    });
                    });</script>


        <script>
                    $(function () {
                    $("#sdate").datepicker({dateFormat: 'yy-mm-dd'});
                    });</script>


        <script>
                    $(function () {
                    $("#slider-range").slider({
                    range: true,
                            min: 500,
                            max: 50000,
                            values: [500, 50000],
                            slide: function (event, ui) {
                            $("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
                                    $("#min_price").val(ui.values[ 0 ]);
                                    $("#max_price").val(ui.values[ 1 ]);
                                    $("#amount").val("$" + ui.values[ 0 ]);
                                    $("#amount1").val("$" + ui.values[ 1 ]);
                            },
                            change: function (event, ui) {
                            var alldata = $('#submit_review').serialize();
                                    $('#loding').show();
                                    $.ajax({
                                    type: "Post",
                                            url: "ajax_search.php",
                                            data: alldata,
                                            success: function (result)
                                            {
                                            var data = result.split('!!!***');
                                                    var finaldata = data[0].trim();
                                                    $('#divshowresult').html(finaldata);
                                                    $('#loding').hide();
                                            }
                                    });
                            }

                    //$("#amount1").val("$" + $("#slider-range").slider("values", 0) +
                    //" - $" + $("#slider-range").slider("values", 1));
                    });
                    });</script>


        <script type="text/javascript">
                    function roomval(id) {
                    var alldata = $('#submit_review').serialize();
                            $.ajax({
                            type: "post",
                                    url: "ajax_search.php",
                                    data: alldata,
                                    success: function (msg) {
                                    $('#divshowresult').html(msg);
                                    }
                            });
                    }


            function checkguest(numgue) {
            var alldata = $('#submit_review').serialize();
                    $.ajax({
                    type: "post",
                            url: "ajax_search.php",
                            data: alldata,
                            success: function (msg) {
                            $('#divshowresult').html(msg);
                            }
                    });
            }


            function proptypechange(id) {
            var alldata = $('#submit_review').serialize();
                    $('#loding').show();
                    $.ajax({
                    type: "post",
                            url: "ajax_search.php",
                            data: alldata,
                            success: function (msg) {
                            var data = msg.split('!!!***');
                                    var finaldata = data[0].trim();
                                    $('#divshowresult').html(finaldata);
                                    markersData = [
                                            data[1].trim()
                                    ];
                                    //alert(markersData);
                                    initialize();
                                    $('#loding').hide();
                            }
                    });
            }

        </script>



        <script>
            $(function () {
            $('.submit_review').submit(function (event) {
            event.preventDefault();
                    $('.advncsrch_open').hide();
                    var str = $(".submit_review").serialize();
                    $('#loding').show();
                    $.ajax({
                    type: "post",
                            url: "ajax_search.php",
                            data: str,
                            success: function (msg) {
                            var data = msg.split('!!!***');
                                    var finaldata = data[0].trim();
                                    $('#divshowresult').html(finaldata);
                                    markersData = [
                                            data[1].trim()
                                    ];
                                    //alert(markersData);
                                    initialize();
                                    $('#loding').hide();
                            }
                    });
            });
            });</script>





        <style>
            .item-image:hover{
                cursor: pointer;
            }


            .control-label
            {
                text-align: left !important;
            }
        </style>

    </head>
    <body>

        <div id="loder" style="position: relative;width: 100%;height: 100%;display: none;"><img src="loading.png" alt="" style="position: absolute;top: 50%;left: 29%;z-index: 9999999999999999999;"></div>


        <?php include ('includes/inner-header.php'); ?>

        <section class="map">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7" style="height:100%;overflow-y: scroll;" id="height_map">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal submit_review" action="" method="get" name="submit_review" id="submit_review">
                                    <input type="hidden" name="min_price" id="min_price" value="" />
                                    <input type="hidden" name="max_price" id="max_price" value="" />
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Dates</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="check_in" id="sdate" placeholder="Check In" class="form-control checkindate" value="<?php echo $_GET['check_in']; ?>" />
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="check_out" id="edate"  placeholder="Check Out" class="form-control checkoutdate" value="<?php echo $_GET['check_out']; ?>"/>
                                        </div>
                                        <!-- <div class="col-sm-3">
                                            <select name="guest" class="form-control" onchange="checkguest(this.value);">
                                                <option value="">Select Guest</option>
                                                <option value="1" <?php if ($_GET['guest'] == '1') { ?> selected <?php } ?>>1 Guest</option>
                                                <option value="2" <?php if ($_GET['guest'] == '2') { ?> selected <?php } ?>>2 Guest</option>
                                                <option value="3" <?php if ($_GET['guest'] == '3') { ?> selected <?php } ?>>3 Guest</option>
                                                <option value="4" <?php if ($_GET['guest'] == '4') { ?> selected <?php } ?>>4 Guest</option>
                                                <option value="5" <?php if ($_GET['guest'] == '5') { ?> selected <?php } ?>>5 Guest</option>
                                                <option value="6" <?php if ($_GET['guest'] == '6') { ?> selected <?php } ?>>6 Guest</option>
                                                <option value="7" <?php if ($_GET['guest'] == '7') { ?> selected <?php } ?>>7 Guest</option>
                                                <option value="8" <?php if ($_GET['guest'] == '8') { ?> selected <?php } ?>>8 Guest</option>
                                                <option value="9" <?php if ($_GET['guest'] == '9') { ?> selected <?php } ?>>9 Guest</option>
                                                <option value="10" <?php if ($_GET['guest'] == '10') { ?> selected <?php } ?>>10 Guest</option>
                                                <option value="11" <?php if ($_GET['guest'] == '11') { ?> selected <?php } ?>>11 Guest</option>
                                                <option value="12" <?php if ($_GET['guest'] == '12') { ?> selected <?php } ?>>12 Guest</option>
                                                <option value="13" <?php if ($_GET['guest'] == '13') { ?> selected <?php } ?>>13 Guest</option>
                                                <option value="14" <?php if ($_GET['guest'] == '14') { ?> selected <?php } ?>>14 Guest</option>
                                                <option value="15" <?php if ($_GET['guest'] == '15') { ?> selected <?php } ?>>15 Guest</option>
                                                <option value="16" <?php if ($_GET['guest'] == '16') { ?> selected <?php } ?>>16 Guest</option>
                                            </select>
                                        </div> -->
                                    </div> 



                                    <!--                                    <div class="form-group">
                                                                            <label class="control-label col-sm-2">Room Type</label>
                                                                            <div class="col-sm-9">
                                    <?php
                                    $ame = mysql_query("select * from `estejmam_room_type` where 1");
                                    while ($amenities = mysql_fetch_array($ame)) {
                                        $c++;
                                        ?>
                                                                                                                                                                                                                                                                                                                                                                                    <div class="col-sm-4 padding_left_right">
                                                                                                                                                                                                                                                                                                                                                                                        <div class="fromgroup_check"><span><?php echo $amenities['name'] ?></span><input type="checkbox" name="room_type[]" value="<?php echo $amenities['name'] ?>" onchange="roomval(this.value)"></div></div>
                                        <?php
                                    }
                                    ?>
                                                                            </div>
                                    
                                                                        </div>-->

                                    <div class="form-group all_check">
                                        <label class="control-label col-sm-2">Property Type</label>
                                        <div class="col-sm-9">
                                            <?php
                                            $ame = mysql_query("select * from `estejmam_property_type` where 1");
                                            while ($amenities = mysql_fetch_array($ame)) {
                                                $c++;
                                                ?>
                                                <div class="col-sm-6 padding_left_right">
                                                    <div class="fromgroup_check"><span><?php echo $amenities['name'] ?></span><input type="checkbox" name="proptype[]" class="proptype" value="<?php echo $amenities['id'] ?>" onclick="proptypechange('<?php echo $amenities['id'] ?>')"></div></div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Price Range</label>
                                        <div class="col-sm-9">
                                            <div class="custome_range"><div id="slider-range"></div></div>
                                            <input type="text" id="amount" value="$500">
                                            <input type="text" id="amount1" value="$50000">
                                        </div>
                                    </div>
                                    <div class="advncsrch_open">
                                        <!--                                        <div class="form-group all_check">
                                                                                    <label class="control-label col-sm-2">Property Type</label>
                                                                                    <div class="col-sm-9">
                                        <?php
                                        $ame = mysql_query("select * from `estejmam_property_type` where 1");
                                        while ($amenities = mysql_fetch_array($ame)) {
                                            $c++;
                                            ?>
                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-sm-6 padding_left_right">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="fromgroup_check"><span><?php echo $amenities['name'] ?></span><input type="checkbox" name="proptype[]" value="<?php echo $amenities['id'] ?>"></div></div>
                                            <?php
                                        }
                                        ?>
                                                                                    </div>
                                                                                </div>-->

                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Size</label>
                                            <div class="col-sm-3">
                                                <select name="bedrooms" class="form-control">
                                                    <option value="">Select Bedrooms</option>
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
                                            <div class="col-sm-3">
                                                <select name="bathrooms" class="form-control">
                                                    <option value="">Select Bathrooms</option>
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
                                            <div class="col-sm-3">
                                                <select name="beds" class="form-control">
                                                    <option value="">Select Beds</option>
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

                                        <div class="form-group all_check">
                                            <label class="control-label col-sm-2">Amenities</label>
                                            <div class="col-sm-9">
                                                <?php
                                                $ame = mysql_query("select * from `estejmam_amenities` where 1");
                                                while ($amenities = mysql_fetch_array($ame)) {
                                                    $c++;
                                                    ?>
                                                    <div class="col-sm-6 padding_left_right">
                                                        <div class="fromgroup_check"><span><?php echo $amenities['name'] ?></span><input type="checkbox" name="ameniteis[]" value="<?php echo $amenities['name'] ?>"></div></div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <div class="col-sm-11">
                                            <!--                                            <button type="submit" class="btn btn-default pull-right">Apply Filters</button>-->
                                            <input type="submit" name="submit" value="Apply Filters" class="btn btn-default pull-right">
                                            <a class="btn btn-default pull-left" id="more_filter">More Filter</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="row map_left">
                            <div class="col-md-12">
                                <div id="loding" style="display:none;"><img src="Green-014-loading.gif" style="margin-left: 47%;position: relative;top: 775%;z-index: 9999999999999;"></div>
                                <div class="listing-content-area" id="divshowresult">
                                    <div class="row" id="myList">

                                        <?php
                                        while ($row = mysql_fetch_object($property_list)) {
                                            $user_details = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='$row->user_id'"));
                                            $image_details = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='$row->id' LIMIT 3"));
                                            $image = $image_details->image;
                                            ?>
                                            <li>
                                                <div class="col-md-6">
                                                    <div class="listing-content-hold">
                                                        <div class="list-content-top">
                                                            <img src="upload/property/<?php echo $image; ?>" alt="" class="item-image" onclick="window.location.href = 'property_details.php?id=<?php echo $row->id; ?>'">
                                                            <div class="heart"><img src="images/heart.png" alt=""></div>
                                                        </div>
                                                        <div class="list-content-bottom">
                                                            <div class="list-content-bottom-left">
                                                                <img src="images/author.jpg" alt="">
                                                            </div>
                                                            <div class="list-content-bottom-right">
                                                                <p><?php echo $row->name; ?></p>
                                                                <p><?php echo substr($row->description, 0, 30); ?></p>
                                                                <p class="rate"> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> (5)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>								
                            </div>

                            <div class="col-md-12">
                                <a class="btn btn-primary pull-left" id="loadMore">Show More</a>&nbsp;&nbsp;
                                <a class="btn btn-primary pull-left" id="showLess" style="margin-left:10px;">Show Less</a>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-5">
                        <div id="map_canvas" style="width: 100%; height: 1000px;"></div>
                        <!--<div class="map-right" style="width: 100%; height: 1045px;">
                            
                            <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
                        </div>
                    </div>-->
                    </div>
                </div>
            </div>
        </section>	


        <?php include('includes/footer.php'); ?>


        <script src="js/jquery.bxslider.js"></script>

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
                                                                    });</script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4shdTcO948O9HLcRCxND-nFJrledOog4&signed_in=true"></script>
        <script type="text/javascript">

                                                                    function initialize() {
                                                                    var mapOptions = {
                                                                    zoom: 12,
                                                                            center: new google.maps.LatLng(40.601203, - 8.668173),
                                                                            mapTypeId: 'roadmap',
                                                                    };
                                                                            map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
                                                                            infoWindow = new google.maps.InfoWindow();
                                                                            google.maps.event.addListener(map, 'click', function () {
                                                                            infoWindow.close();
                                                                            });
                                                                            displayMarkers();
                                                                    }

                                                            google.maps.event.addDomListener(window, 'load', initialize);
                                                                    function displayMarkers() {

                                                                    var bounds = new google.maps.LatLngBounds();
                                                                            for (var i = 0; i < markersData.length; i++) {
                                                                    var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
                                                                            var name = markersData[i].name;
                                                                            var img = markersData[i].image;
                                                                            var id = markersData[i].id;
                                                                            createMarker(latlng, img, name, id);
                                                                            bounds.extend(latlng);
                                                                    }
                                                                    map.fitBounds(bounds);
                                                                    }

                                                            function createMarker(latlng, image, name, id) {
                                                            var marker = new google.maps.Marker({
                                                            map: map,
                                                                    position: latlng,
                                                                    title: name
                                                            });
                                                                    google.maps.event.addListener(marker, 'click', function () {
                                                                    var iwContent = '<a href="property_details.php?id=' + id + '"><img src="upload/property/' + image + '" width="200" /></a><p>' + name + '</p>';
                                                                            infoWindow.setContent(iwContent);
                                                                            infoWindow.open(map, marker);
                                                                    });
                                                            }
        </script>

        <script>
            $(document).ready(function () {
            $('.bxslider').bxSlider({
            auto: true,
                    autoControls: true
            });
                    $('#height_map,#map_canvas').css('height', $(window).height() - 96);
                    $('#more_filter').click(function () {
            $('.advncsrch_open').slideToggle();
            });
                    size_li = $("#myList li").size();
                    x = 4;
                    $('#myList li:lt(' + x + ')').show();
                    $('#loadMore').click(function () {
            x = (x + 4 <= size_li) ? x + 4 : size_li;
                    $('#myList li:lt(' + x + ')').show();
            });
                    $('#showLess').click(function () {
            x = (x - 4 < 1) ? 4 : x - 4;
                    $('#myList li').not(':lt(' + x + ')').hide();
            });
            });
        </script>

        <style>
            #myList li{ display:none;
            }
            li {
                list-style-type:none;
            }
        </style>

                <!-- <script type="text/javascript">
$(document).ready(function() {
        $("#divshowresult" ).load( "ajax_search.php"); //load initial records
        
        //executes code below when user click on pagination links
        $("#divshowresult").on( "click", ".pagination a", function (e){
                e.preventDefault();
                $("#divshowresult").show(); //show loading element
                var page = $(this).attr("data-page"); //get page number from link
                $("#divshowresult").load("ajax_search.php",{"page":page}, function(){ //get content from PHP page
                        $("#divshowresult").hide(); //once done, hide loading element
                });
                
        });
});
</script> -->

    </body>
</html>