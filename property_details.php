<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';

mysql_query("SET SESSION character_set_results = 'UTF8'");
header('Content-Type: text/html; charset=UTF-8');

$pid = $_REQUEST['id'];
$property_details = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_main_property` WHERE `id`='$pid'"));
$user_details = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='$property_details->user_id'"));

$image_details = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='$property_details->id' LIMIT 1"));
$image = $image_details->image;

$image_gallery = mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='$property_details->id'");
$image_galleryall = mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='$property_details->id'");

$image_count = mysql_num_rows(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='$property_details->id'"));

if ($image != '') {
    $propertyimage = "upload/property/" . $image;
} else {
    $propertyimage = "upload/noimage.Jpeg";
}

$latlng = getlatlang($property_details->zipcode);


if ($user_details->image != '') {
    $img = "upload/userimages/" . $user_details->image;
} else {
    $img = "upload/nouser.jpg";
}

if ($property_details->availability == '0') {
    $avb = "Always available";
}
if ($property_details->availability == '1') {
    $avb = "Sometime available";
}
if ($property_details->availability == '3') {
    $avb = "Onetime available";
}


$country = mysql_fetch_object(mysql_query("select * from `estejmam_countries` where `id`='" . $property_details->country . "'"));

$prop_type_name = mysql_fetch_object(mysql_query("select * from `estejmam_property_type` where `id`='" . $property_details->prop_type . "'"));


$curency = mysql_fetch_object(mysql_query("select * from `estejmam_currency` where `id`='" . $property_details->currency . "'"));


$propcheck = mysql_num_rows(mysql_query("select * from `estejmam_booking` where `user_id`='".$_SESSION['userid']."' and `prop_id`='".$_REQUEST['id']."'"));
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
        <script src="js/bootstrap.js"></script>



        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4shdTcO948O9HLcRCxND-nFJrledOog4&signed_in=true"></script>

        <script type="text/javascript">
            var map;
            function initialize() {
                var mapOptions = {
                    zoom: 12,
                    center: {lat: <?php echo $latlng['lat']; ?>, lng: <?php echo $latlng['long']; ?>}
                };
                map = new google.maps.Map(document.getElementById('map_canvas'),
                        mapOptions);

                var marker = new google.maps.Marker({
                    // The below line is equivalent to writing:
                    // position: new google.maps.LatLng(-34.397, 150.644)
                    position: {lat: <?php echo $latlng['lat']; ?>, lng: <?php echo $latlng['long']; ?>},
                    map: map
                });

                // You can use a LatLng literal in place of a google.maps.LatLng object when
                // creating the Marker object. Once the Marker object is instantiated, its
                // position will be available as a google.maps.LatLng object. In this case,
                // we retrieve the marker's position using the
                // google.maps.LatLng.getPosition() method.
                var infowindow = new google.maps.InfoWindow({
                    //content: '<p>Marker Location:' + marker.getPosition() + '</p>'
                    content: '<img src="upload/property/<?php echo $image; ?>" width="200" />'
                });

                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);

        </script>
    </head>
    <body >

        <?php include 'includes/inner-header.php'; ?>

        <section class="details-top" style="background: url('<?php echo $propertyimage ?>') no-repeat top center; background-size: cover; position: relative;height: 453px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 middle-div">
                        <div style="width:100%; position:relative; height:453px">
                            <div class="search-holder">
                                <form action="pay.php" method="POST">
								<input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
								<input type="hidden" name="price" value="<?php echo $property_details->price ?>">
								<input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>">
								<input type="hidden" name="uploder_userid" value="<?php echo $property_details->user_id ?>">
								<input type="hidden" name="currency" value="<?php echo $curency->name ?>">
                                    <div class="search_box">
                                        <ul>
                                            <li style="background: none"><h1 class="per-day"><?php echo $curency->code . $property_details->price ?>/<span>Day</span> </h1></li>
                                            <li><input type="text" name="sdate" id="sdate" placeholder="Check In" required/></li>
                                            <li><input type="text" name="edate" id="edate" placeholder="Check Out" required/></li>
											<?php if($property_details->user_id==$_SESSION['userid']) { ?>
                                            <li><button class="btn btn-primary" type="submit" disabled>Book</button></li>
											<?php }
											elseif($propcheck>0) { ?>
											<li><button class="btn btn-primary" type="submit" disabled>Book</button></li>
											<?php
											}
											else { ?>
											<li><button class="btn btn-primary" type="submit">Book</button></li>
											<?php } ?>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="landlord-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="landlord-details-left">
                            <div class="landlord-image-area">
                                <img src="<?php echo $img ?>" alt="">
                                <h4 class="text-center"><?php echo $user_details->fname . ' ' . $user_details->lname; ?></h4>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-7">
                        <div class="landlord-details-center">
                            <h2><?php echo $property_details->name; ?></h2>
                            <p class="rating"><?php echo $property_details->city; ?>, <?php echo $property_details->state; ?>, <?php echo $country->name; ?> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> (12) </p>
                            <ul>
                                <li>
                                    <p class="text-center"><i class="fa fa-home fa-3x"></i></p>
                                    <p><?php echo $prop_type_name->name; ?></p>
                                </li>
                                <li>
                                    <p class="text-center"><i class="fa fa-users fa-3x"></i></p>
                                    <p><?php echo $property_details->bedrooms; ?> <?php echo ($property_details->bedrooms != 1) ? 'Bedrooms' : 'Bedrooms'; ?></p>
                                </li>
                                <li>
                                    <p class="text-center"><i class="fa fa-bed fa-3x"></i></p>
                                    <p><?php echo $property_details->beds; ?> <?php echo ($property_details->beds != 1) ? 'Beds' : 'Bed'; ?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="landlord-details-right">
                            <h3>landlord</h3>
                            <div class="form-group">
                                <a href="javascript:void(0);" class="btn btn-success "><i class="fa fa-envelope"></i> Mail the Landlord</a>
                            </div>
                            <div class="form-group">
                                <a href="javascript:void(0);" class="btn btn-success"><i class="fa fa-phone"></i> Contact Landlord</a>
                            </div>
                            <div class="form-group">
                                <a href="javascript:void(0);" class="btn btn-success" id="wishlist" onclick="wishlist('<?php echo $property_details->id ?>','<?php echo $_SESSION['userid'] ?>');"> <i class="fa fa-heart"></i> <span id="wish"> Add to Wishlist</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="details-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h3>Description</h3>
                        <p><?php echo $property_details->description; ?></p>

                        <ul class="property_dtl">
                            <li>
                                <div class="left_dtl">
                                    <p>The Space </p>
                                </div>
                                <div class="center_dtl">
                                    <p>Bedrooms: <b><?php echo $property_details->bedrooms; ?></b></p>
                                    <p>Beds: <b><?php echo $property_details->beds; ?></b></p>
                                    <p>Bathrooms: <b><?php echo $property_details->bathrooms; ?></b></p>
                                </div>
                                <div class="right_dtl">
                                    <p>Property Type: <b><?php echo $prop_type_name->name; ?></b></p>
<!--                                    <p>Room Type: <b><?php echo $property_details->room_type; ?></b></p>
                                    <p>Accommodates: <b><?php echo $property_details->accommodates; ?></b></p>-->
                                </div>
                            </li>

                            <li>
                                <div class="left_dtl">
                                    <p>Amenities</p>
                                </div>
                                <?php
                                $amenities = explode(',', $property_details->amenities);
                                $cnt = count($amenities);
                                $left_cnt = ceil($cnt / 2);
                                ?>
                                <div class="center_dtl">
                                    <?php
                                    for ($i = 0; $i < $left_cnt; $i++) {
                                        $amenity = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_amenities` WHERE `name` LIKE '%" . $amenities[$i] . "%'"));
                                        ?>
                                        <p><i class="<?php echo $amenity->image ?>"></i>&nbsp;&nbsp;<?php echo $amenities[$i]; ?></p>
                                    <?php } ?>
                                </div>

                                <div class="right_dtl">
                                    <?php
                                    for ($j = $i; $j < $cnt; $j++) {
                                        //$amenity = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_amenities` WHERE `id`='$amenities[$j]'"));
                                        $amenity = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_amenities` WHERE `name` LIKE '%" . $amenities[$i] . "%'"));
                                        ?>
                                        <p><i class="<?php echo $amenity->image ?>"></i>&nbsp;&nbsp;<?php echo $amenities[$i]; ?></p>
                                    <?php } ?>
                                </div>

                            </li>


                            <li>
                                <div class="left_dtl">
                                    <p>Home Safety</p>
                                </div>
                                <?php
                                $amenities = explode(',', $property_details->home_safety);
                                $cnt = count($amenities);
                                $left_cnt = ceil($cnt / 2);
                                ?>
                                <div class="center_dtl">
                                    <?php
                                    for ($i = 0; $i < $left_cnt; $i++) {
                                        //$amenity = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_amenities` WHERE `id`='" . $amenities[$i] . "'"));
                                        ?>
                                        <p><?php echo $amenities[$i]; ?></p>
                                    <?php } ?>
                                </div>

                                <div class="right_dtl">
                                    <?php
                                    for ($j = $i; $j < $cnt; $j++) {
                                        //$amenity = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_amenities` WHERE `id`='$amenities[$j]'"));
                                        ?>
                                        <p><?php echo $amenities[$i]; ?></p>
                                    <?php } ?>
                                </div>

                            </li>


                            <li>
                                <div class="left_dtl">
                                    <p>Prices</p>
                                </div>
                                <div class="center_dtl">
<!--                                    <p>Extra people: <b>No Charge</b></p>-->
                                    <p>Price: <b><?php echo $curency->code . $property_details->price; ?> / Per Day</b></p>
                                </div>
                                <!--                                <div class="right_dtl">
                                                                    <p>Cancellation: <a href="">Stricts</a></p>
                                                                </div>-->
                            </li>
                            <li>
                                <div class="left_dtl">
                                    <p>Availability</p>
                                </div>
                                <div class="center_dtl">
                                    <p><?php echo $avb; ?></p>
                                </div>
                                <!--                                <div class="right_dtl">
                                                                    <p><a href="">View  Calender</a></p>
                                                                </div>-->
                            </li>
                            <li>
                                <!--                                <div class="left_dtl">
                                                                    <p>Cancellation Policy</p>
                                                                </div>
                                                                <div class="merge_dtl">
                                                                    <p><a href="">Strict</a></p>
                                                                    <p>Integer auctor tincidunt sem a mollis. Praesent tempor lectus a odio hendrerit gravida. Curabitur nec velit ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                                </div>-->
                                <div class="right_dtl">

                                </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>

                        <div class="fb_gallery">
                            <span data-toggle="modal" data-target="#myModal">See all <?php echo $image_count; ?> photos</span>
                            <ul>
                                <?php while ($img_gal = mysql_fetch_object($image_gallery)) { ?>
                                    <li><a class="fancybox" rel="group" href="upload/property/<?php echo $img_gal->image; ?>" title="Exciting Title!" data-fancybox-group="gallery" title="" data-caption=""><img src="upload/property/<?php echo $img_gal->image; ?>" alt="" /></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row revw-top">
                            <div class="col-sm-8">
                                <h4>5 reviews <span aria-hidden="true" class="glyphicon glyphicon-star"></span> <span aria-hidden="true" class="glyphicon glyphicon-star"></span> <span aria-hidden="true" class="glyphicon glyphicon-star"></span> <span aria-hidden="true" class="glyphicon glyphicon-star"></span> <span aria-hidden="true" class="glyphicon glyphicon-star"></span></h4>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <a href="javascript:void(0);" class="btn btn-default btn-block" style="font-size: 14px;">Search Reviews</a>
                                </div>
                            </div>
                        </div>
                        <div class="row revw-summery">
                            <div class="col-sm-2">
                                <p style="color: #989797; font-size:12px">Summery</p>
                            </div>
                            <div class="col-sm-5">
                                <ul>
                                    <li>
                                        <p>Accuracy</p>
                                        <span><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span>
                                    </li>
                                    <li>
                                        <p>Communication</p>
                                        <span><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span>
                                    </li>
                                    <li>
                                        <p>Cleanliness</p>
                                        <span><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-5">
                                <ul>
                                    <li>
                                        <p>Location</p>
                                        <span><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span>
                                    </li>
                                    <li>
                                        <p>Check In</p>
                                        <span><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span>
                                    </li>
                                    <li>
                                        <p>Value</p>
                                        <span><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="revw-comment">
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img class="revw-image" src="images/author.jpg" alt>
                                                <p class="text-center">Jones</p>

                                            </div>
                                            <div class="col-sm-9">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor tincidunt sem a mollis. Praesent tempor lectus a odio hendrerit gravida. Curabitur nec velit ...</p>
                                                <p class="date">November 2015</p>
                                                <a href="" class="btn btn-default"><i class="fa fa-thumbs-up"></i> Helpful</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img class="revw-image" src="images/author.jpg" alt>
                                                <p class="text-center">Jones</p>

                                            </div>
                                            <div class="col-sm-9">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor tincidunt sem a mollis. Praesent tempor lectus a odio hendrerit gravida. Curabitur nec velit ...</p>
                                                <p class="date">November 2015</p>
                                                <a href="" class="btn btn-default"><i class="fa fa-thumbs-up"></i> Helpful</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h4>Location</h4>
                        <!--<iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>-->
                        <div id="map_canvas" style="height: 500px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </section>




        <?php include 'includes/footer.php'; ?>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

        <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

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





        <script type="text/javascript">
            $(document).ready(function () {
                $(".fancybox").fancybox();
            });
        </script>

        <script>
            $(function () {
                $("#sdate,#edate").datepicker({dateFormat: 'yy-mm-dd'});
            });</script>


<!--<script>
$(document).ready(function () {
$('.bxslider3 li img').click(function () {
    $('.main_img img').attr('src', $(this).attr('src'));
});
});
</script>-->


<script type="text/javascript">
     function wishlist(propid,userid)

	{
		if(userid=='')
		{
			$('#wish').html('Please login');
		}
		else
		{
            $.ajax({

                type: "post",

                url: "ajax_want.php",

                data: {propid:propid,userid:userid},

                success: function(msg) { 

		       $('#wish').html(msg.trim());

                }

            });
	     }
	}

</script>

    </body>
</html>