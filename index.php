<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';
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



    </head>

    <body>



        <?php include 'includes/header.php'; ?>



        <div class="slider_search">

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->

                <!--<ol class="carousel-indicators">

                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>

                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>

                </ol>-->



                <!-- Wrapper for slides -->

                <div class="carousel-inner" role="listbox">

                    <?php
                    $banner_query = mysql_query("SELECT * FROM `estejmam_banner`");

                    $banner_cnt = false;

                    while ($row_banner = mysql_fetch_object($banner_query)) {
                        ?>

                        <div class="item <?php
                        if ($banner_cnt == false) {
                            echo 'active';
                            $banner_cnt = true;
                        }
                        ?>">

                            <img src="upload/sitebanner/<?php echo $row_banner->image; ?>" alt="" />

                            <div class="carousel-caption">

                                <h1>Where you find your comfort</h1>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>

                            </div>

                        </div>

                        <?php
                    }
                    ?>

                    <!--<div class="item">

                        <img src="images/banner2.jpg" alt="" />

                        <div class="carousel-caption">

                            <h1>Where you find your comfort</h1>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>

                        </div>

                    </div>

                    <div class="item">

                         <img src="images/banner3.jpg" alt="" />

                         <div class="carousel-caption">

                            <h1>Where you find your comfort</h1>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>

                        </div>

                    </div>-->



                </div>



                <!-- Controls -->

                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">

                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>

                    <span class="sr-only">Previous</span>

                </a>

                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">

                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

                    <span class="sr-only">Next</span>

                </a>

            </div>

            <div class="search_box-area">
                <form action="property_list.php" method="GET">
                    <div class="search_box">

                        <ul>

                            <li><input type="text" name="place" placeholder="Keyword.."/></li>

                            <li>

                                <div class="custome_select">
                                    <select name="prop_type">
                                        <option value="">Property type</option>
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

                            </li>

                            <li><input type="text" placeholder="Check In"/></li>

                            <li><input type="text" placeholder="Check Out"/></li>

                            <li><button class="btn btn-primary" type="submit">Search</button></li>

                        </ul>

                    </div>
                </form>

                <p class="text-center"><a href="" class="btn btn-default">How It Works</a></p>

            </div>



        </div>



        <section class="just-for">

            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <h2 class="text-center">Just for the weekend</h2>

                        <p class="text-center">Discover new, inspiring places close to home.</p>

                    </div>



                    <!--<div class="col-md-6">

                        <div class="just-small-image-hold">

                            <img src="images/just-1.jpg" alt="">

                            <h3>Burj al-Arab</h3>

                        </div>

                        <div class="just-small-image-hold">

                            <img src="images/just-2.jpg" alt="">

                            <h3>Burj al-Arab</h3>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="just-big-image-hold">

                            <img src="images/just-3.jpg" alt="">

                            <h3>Burj al-Arab</h3>

                        </div>

                    </div>-->



                    <div class="col-md-6">
                        <?php
                        $property_cnt = 1;
                        $property_query = mysql_query("SELECT * FROM `estejmam_main_property` ORDER BY `id` LIMIT 3");
                        while ($row = mysql_fetch_object($property_query)) {
                            $image_details = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='$row->id' LIMIT 1"));
                            $image = $image_details->image;
                            if ($property_cnt < 3) {
                                ?>
                                <div class="just-small-image-hold">
                                    <img src="upload/property/<?php echo $image; ?>" alt="" onclick="location.href = 'property_details.php?id=<?php echo $row->id; ?>'" style="cursor:pointer;">
                                    <h3><?php echo $row->name; ?></h3>
                                </div>
                                <?php
                            } else {
                                ?>
                            </div>

                            <div class="col-md-6">
                                <div class="just-big-image-hold">
                                    <img src="upload/property/<?php echo $image; ?>" alt="" onclick="location.href = 'property_details.php?id=<?php echo $row->id; ?>'" style="cursor:pointer;">
                                    <h3><?php echo $row->name; ?></h3>
                                </div>
                                <?php
                            }
                            $property_cnt++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 middle-div">
                        <h1>Testimonials</h1>
                        <div class="testi-slider">
                            <ul class="bxslider">
                                <li>
                                    <div class="testi-content">
                                        <p class="my-quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea comsunt in culpa qui officia deserunt mollit anim id est laborum</p>
                                    </div>

                                    <div class="author-image"><img src="images/author.jpg" alt=""></div>
                                    <h4>John Doe</h4>
                                    <p class="desc">consectetur adipiscing elit</p>
                                </li>

                                <li>
                                    <div class="testi-content">
                                        <p class="my-quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea comsunt in culpa qui officia deserunt mollit anim id est laborum</p>
                                    </div>
                                    <div class="author-image"><img src="images/author.jpg" alt=""></div>
                                    <h4>John Doe</h4>
                                    <p class="desc">consectetur adipiscing elit</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="explore">

            <div class="container">

                <div class="row">
                    <div class="col-lg-12"><h2>Explore  the best destination</h2></div>

                    <?php
                    $property_query = mysql_query("SELECT * FROM `estejmam_main_property` ORDER BY `id` LIMIT 6");
                    while ($row = mysql_fetch_object($property_query)) {
                        $image_details = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='$row->id' LIMIT 1"));
                        $image = $image_details->image;
                        ?>
                        <div class="col-md-4 col-sm-4">
                            <div class="explore-holder">
                                <img src="upload/property/<?php echo $image; ?>" alt="" onclick="location.href = 'property_details.php?id=<?php echo $row->id; ?>'" style="cursor:pointer;">
                                <h4><?php echo $row->name; ?></h4>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </section>

        <section class="our-app">
            <div class="container">
                <div class="row">
                    <div class="col-lg-11 middle-div">
                        <div class="row">
                            <div class="col-sm-5">
                                <img src="images/video.jpg" alt="" class="mobile">
                            </div>
                            <div class="col-sm-7">
                                <h1>Our App</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                <span>
                                    <a href=""><img src="images/apple-btn-1.png" alt=""></a>
                                    <a href=""><img src="images/apple-btn-2.png" alt=""></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'includes/footer.php'; ?>

        <script src="js/jquery.bxslider.js"></script>
        <script type='text/javascript'>
                                $(function () {
                                    //Keep track of last scroll
                                    var lastScroll = 100;
                                    $(window).scroll(function (event) {
                                        var s1 = $(this).scrollTop();
                                        if (s1 > 100) {
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

        <?php if (!is_user_logged_in()) { ?>
            <!-----------------------signup modal------------------------------->

            <div class="custome_modal">
                <input type="hidden" name="userid" value="" />
                <div class="section_body" id="signup1">
                    <span class="cls_modal" style="width:28px;display: block;height:28px;border-radius: 100%;padding:0;margin:10px"><b class="fa fa-times" style="line-height: 28px;display: block;text-align: center;"></b></span>
                    <div class="section1">
                        <p>Sign up using <a href="">Instagram</a> or <a href="">twitter</a>.</p>
                        <span class="or_class">---------------------------- Or ----------------------------</span>
                        <form id="estejmam_signup">
                            <p class="msg" style="color:red;"></p>
                            <div class="form-group">
                                <input type="text" class="form-control" id="" name="fname" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="" name="lname" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="" name="pass" placeholder="Password" required>
                            </div>

                            <!--                            <div class="form-group">
                                                            <select name="type" class="form-control" required>
                                                                <option value="">Select Your Type</option>
                                                                <option value="1">Landlord</option>
                                                                <option value="0">Tenant</option>
                                                            </select>
                                                        </div>-->

                            <div class="form-group">
                                <label>Birthday</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="bday" class="form-control" required>
                                            <option value="">Day</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="bmonth" class="form-control" required>
                                            <option value="">Month</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="byear" class="form-control" required>
                                            <option value="">Year</option>
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                            <option value="2003">2003</option>
                                            <option value="2004">2004</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="coupon" value="1">I’d like to receive coupons and inspiration 
                                </label>
                            </div>
                            <p class="help-block">By signing up, I agree to Estegmam <a href="">Terms of Service</a>, <a href="">Privacy Policy</a>, <a href="">Guest Refund Policy</a>, and <a href="">Host Guarantee Terms</a>. </p>
                            <button class="btn btn-default" type="submit">Submit</button>

                        </form>

                        <div class="mymodal-footer">
                            <p>Already a member? <a href="">Log in </a></p>
                        </div>
                    </div>
                </div>
                <div class="section2" id="signup2">
                    <div class="get_started">
                        <img class="img-responsive" title="Estejmam" alt="Estejmam" src="upload/site_logo/logo2.png">
                        <b>Welcome to Estejmam</b>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        </p>
                        <button class="grn_btn" type="button" id="get_started">Get Started</button>
                    </div>
                </div>
                <div class="section_body" id="signup3">
                    <div class="section3">
                        <ul class="dots">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                        </ul>

                        <h1>Add Your Photo</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                        <div class="img_sec upload">
                            <i class="fa fa-user"></i>
                        </div>

                        <button class="fab_btn">Use Facebook Photo</button>
                        <input type="file" class="form-control" name="avatar" id="avatar" />

                        <a href="" class="skip" id="photo_skip">Skip for Now</a>
                    </div>
                </div>
                <div class="section_body" id="signup4">
                    <div class="section3">
                        <ul class="dots">
                            <li></li>
                            <li class="active"></li>
                            <li></li>
                        </ul>

                        <h1>Confirm Your Phone number</h1>
                        <p class="msg" style="color:#f00;"></p>
                        <div class="img_sec">
                            <i class="fa fa-mobile"></i>
                        </div>

                        <div class="form-group">
                            <div class="input-group" id="phone_div">
                                <div class="input-group-addon">+91</div>
                                <input type="phone" class="form-control" id="" name="phone_number" placeholder="Enter phone number">
                            </div>
                            <input type="text" class="form-control" id="otp_code" name="otp_code" placeholder="Enter OTP">
                        </div>
                        <div class="form-group" id="send_otp_div">
                            <p>Not in United State? <a href=""> Change Country</a></p>
                            <button type="button" class="grn_btn" id="send_otp">Send OTP</button>
                        </div>
                        <div class="form-group" id="conf_otp_div">
                            <button type="button" class="grn_btn" id="conf_otp">Confirm Phone Number</button>
                        </div>

                        <a href="" class="skip" id="phone_skip">Skip for Now</a>
                    </div>
                </div>
                <div class="section_body" id="signup5">
                    <div class="section3">
                        <ul class="dots">
                            <li></li>
                            <li></li>
                            <li class="active"></li>
                        </ul>

                        <h1>Check your email</h1>

                        <p class="msg" style="color:#f00;"></p>

                        <div class="img_sec">
                            <i class="fa fa-envelope-o"></i>
                        </div>

                        <div class="form-group">
                            <input type="text" name="email_confirm" class="form-control" id="email_confirm" placeholder="Confirmation Code" />
                            <input type="email" name="change_email" class="form-control" id="change_email" placeholder="Your email" />
                        </div>
                        <button type="button" class="grn_btn" id="email_confirm_btn">Confirm email address</button>

                        <p>
                            <a href="" id="change_email_link">Change email address</a>
                            <a href="" id="email_confirm_link">Confirm your email</a>
                        </p>

                        <a href="#" class="skip" id="email_skip">Skip for Now</a>
                    </div>
                </div>
                <div class="section2" id="signup6">
                    <div class="get_started">
                        <img class="img-responsive" title="Estejmam" alt="Estejmam" src="images/circle.png">
                        <b>You are all set</b>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        </p>
                        <button type="button" class="grn_btn" id="explore">Start Exploring</button>
                    </div>
                </div>

            </div>

            <style>
                .custome_modal{
                    display: none;
                }
                #signup2,#signup3,#signup4,#signup5,.section2{
                    display: none;
                }
                #change_email,#change_email_btn,#email_confirm_link{
                    display: none;
                }
                #otp_code,#conf_otp_div{
                    display: none;
                }
                #signup1{
                    position: relative;
                }
                .cls_modal{
                    background: #34b159 none repeat scroll 0 0;
                    border-radius: 10px;
                    color: #fff;
                    cursor: pointer;
                    display: block;
                    padding: 6px;
                    position: absolute;
                    right: 2px;
                    top: 2px;
                }

            </style>

            <script>
                $(function () {
                    $('#estejmam_signup').submit(function () {
                        if ($('input[name="coupon"]').is(':checked')) {
                            var coupon = $('input[name="coupon"]').val();
                        } else {
                            coupon = '';
                        }
                        $.ajax({
                            type: 'POST',
                            url: 'functions/ajax.php?action=signup',
                            data: {
                                fname: $('input[name="fname"]').val(),
                                lname: $('input[name="lname"]').val(),
                                email: $('input[name="email"]').val(),
                                pass: $('input[name="pass"]').val(),
                                type: $('select[name="type"]').val(),
                                bday: $('select[name="bday"]').val(),
                                bmonth: $('select[name="bmonth"]').val(),
                                byear: $('select[name="byear"]').val(),
                                coupon: coupon
                            },
                            success: function (res) {
                                var data = $.parseJSON(res);
                                if (data.ack == 1) {
                                    $('#signup1').hide();
                                    $('#signup2').show();
                                } else {
                                    $('#estejmam_signup p.msg').text(data.msg);
                                }
                            }
                        });
                        return false;
                    });

                    $('#get_started').click(function () {
                        $('#signup2').hide();
                        $('#signup3').show();
                    });

                    $('#avatar').change(function () {
                        var file_data = $("#avatar").prop("files")[0];

                        var form_data = new FormData();
                        form_data.append("file", file_data);
                        $.ajax({
                            url: "functions/ajax.php?action=avatar",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post',
                            success: function (res) {
                                data = $.parseJSON(res);
                                if (data.ack == 1) {
                                    $('div.img_sec.upload i').remove();
                                    $('div.img_sec.upload').append('<img src="' + data.src + '" />');
                                    $("#avatar").val('');
                                    setTimeout(function () {
                                        $('#signup3').hide();
                                        $('#signup4').show();
                                    }, 2000);

                                }
                            }
                        });
                    });

                    $('#photo_skip').click(function (e) {
                        e.preventDefault();
                        $('#signup3').hide();
                        $('#signup4').show();
                    });

                    $('#send_otp').click(function () {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: 'sms.php',
                            data: {
                                phone: $('input[name="phone_number"]').val()
                            },
                            success: function (res) {
                                if (res.ack == '1') {
                                    $('#phone_div,#send_otp_div').hide();
                                    $('#otp_code,#conf_otp_div').show();
                                } else {
                                    $('#signup4 p.msg').text('Message not sent');
                                }
                            }
                        });

                    });

                    $('#conf_otp').click(function () {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: 'sms_verify.php',
                            data: {
                                otp_code: $('input[name="otp_code"]').val()
                            },
                            success: function (res) {
                                if (res.ack == '1') {
                                    $('#signup4 p.msg').text('Phone number verified');
                                    setTimeout(function () {
                                        $('#signup4').hide();
                                        $('#signup5').show();
                                    }, 2000);
                                } else {
                                    $('#signup4 p.msg').text('Invalid OTP');
                                }
                            }
                        });
                    });

                    $('#phone_skip').click(function (e) {
                        e.preventDefault();
                        $('#signup4').hide();
                        $('#signup5').show();
                    });

                    $('#email_confirm_btn').click(function () {
                        if ($('input[name="email_confirm"]').val() != '' || $('input[name="change_email"]').val() != '') {
                            $.ajax({
                                type: 'POST',
                                url: 'functions/ajax.php?action=email_confirm',
                                data: {
                                    email_confirm: $('input[name="email_confirm"]').val(),
                                    change_email: $('input[name="change_email"]').val(),
                                },
                                success: function (res) {
                                    var data = $.parseJSON(res);
                                    if (data.ack == 1) {
                                        $('#signup5 p.msg').text(data.msg);
                                        $('#signup5').hide();
                                        $('#signup6').show();
                                        $('#email_confirm').val('');
                                        $('#change_email').val('');
                                    } else if (data.ack == 2) {
                                        $('#signup5 p.msg').text(data.msg);
                                        $('#change_email,#email_confirm_link').hide();
                                        $('#email_confirm,#change_email_link').show();
                                        $('#email_confirm_btn').text('Confirm email address');
                                        $('#email_confirm').val('');
                                        $('#change_email').val('');
                                    } else {
                                        $('#signup5 p.msg').text(data.msg);
                                    }
                                }
                            });
                        }

                    });

                    $('#change_email_link').click(function (e) {
                        e.preventDefault();
                        $('#email_confirm').val('');
                        $('#email_confirm,#change_email_link').hide();
                        $('#change_email,#email_confirm_link').show();
                        $('#email_confirm_btn').text('Resend confirmation code');
                    });

                    $('#email_confirm_link').click(function (e) {
                        e.preventDefault();
                        $('#change_email').val('');
                        $('#change_email,#email_confirm_link').hide();
                        $('#email_confirm,#change_email_link').show();
                        $('#email_confirm_btn').text('Confirm email address');
                    });

                    $('#email_skip').click(function (e) {
                        e.preventDefault();
                        $('#signup5').hide();
                        $('#signup6').show();
                    });



                    $('#explore').click(function (e) {
                        e.preventDefault();
                        $('.custome_modal').hide();
                        window.location.href = 'my_account.php';
                    });

                    $('.custome_modal_close').click(function (e) {
                        e.preventDefault();
                        $('.custome_modal').hide();
                    });

                    $('a.custom_modal_signup').click(function () {
                        $('.custome_modal').show();
                    });

                    /*$('#signup1,#signup2,#signup3,#signup4,#signup5,#signup6').click(function (e) {
                     e.stopPropagation();
                     });
                     
                     $('.custome_modal').click(function () {
                     $('.custome_modal').hide();
                     });*/
                    $('.cls_modal').click(function () {
                        $('.custome_modal').hide();
                    });
                });
            </script>

        <?php } ?>
    </body>
</html>