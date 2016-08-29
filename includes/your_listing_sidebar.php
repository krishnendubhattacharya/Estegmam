<?php
$pagename = end(explode('/', $_SERVER['REQUEST_URI']));
if ($_REQUEST['action'] == 'edit') {
    $id = $_REQUEST['id'];
    $action = $_REQUEST['action'];

    $is_comp = 10;

    $ck = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_main_property` WHERE `id`='" . mysql_real_escape_string($_REQUEST['id']) . "'"));

    $pk = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='" . mysql_real_escape_string($ck['id']) . "'"));

    $userpf = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . mysql_real_escape_string($_SESSION['userid']) . "'"));


    if ($userpf['phone'] == '') {
        $is_comp = 10;
    } else {
        $is_comp = $is_comp - 1;
    }


    if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '') {

        $is_val = 1;
        $is_comp = $is_comp - 1;
    }
    if ($ck['name'] != '' && $ck['description'] != '') {

        $is_val1 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '') {
        $is_comp = $is_comp - 1;
        //}
    }
    if ($ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] != '' && $ck['city'] && $ck['zipcode'] != '') {

        $is_val2 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '') {
        $is_comp = $is_comp - 1;
        //}
    }
    if ($ck['amenities'] != '') {

        $is_val3 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] != '') {
        $is_comp = $is_comp - 1;
        //}
    }
    if ($pk['image'] != '') {

        $is_val4 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] != '' && $ck['amenities'] != '') {
        $is_comp = $is_comp - 1;
        //}
    }
    if ($ck['home_safety'] != '') {

        $is_val8 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] && $ck['amenities'] != '' && $pk['image'] != '') {
        $is_comp = $is_comp - 1;
        //}
    }
    if ($ck['price'] != '' && $ck['currency'] != '') {

        $is_val5 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] && $ck['amenities'] != '' && $pk['image'] != '' && $ck['home_safety'] != '') {
        $is_comp = $is_comp - 1;
        //}
    }
    if ($ck['review_each_request'] != 0 || $ck['guest_book_instant'] != 0) {

        $is_val6 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] && $ck['amenities'] != '' && $pk['image'] != '' && $ck['home_safety'] != '' && $ck['price'] != '' && $ck['currency'] != '') {
        $is_comp = $is_comp - 1;
        //}
    }

    if ($ck['availability'] != 0 || $ck['availability'] != '') {

        $is_val7 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] && $ck['amenities'] != '' && $pk['image'] != '' && $ck['home_safety'] != '' && $ck['price'] != '' && $ck['currency'] != '' && ($ck['review_each_request'] != 0 || $ck['guest_book_instant'] != 0)) {
        $is_comp = $is_comp - 1;
        //}
    }

    if ($userpf['phone'] != '') {

        $is_val9 = 1;
        if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] && $ck['amenities'] != '' && $pk['image'] != '' && $ck['home_safety'] != '' && $ck['price'] != '' && $ck['currency'] != '' && ($ck['review_each_request'] != 0 || $ck['guest_book_instant'] != 0) && ($ck['availability'] != 0 || $ck['availability'] != '')) {
            $is_comp = 'Final';
        }
    }
    ?>
    <div class="col-md-2">
        <div class="step-left-panel">
            <h4>Listing</h4>
            <ul class="step-menu">
                <li><a href="your_listing-1.php<?php echo '?id=' . $id . '&action=' . $action; ?>">Basics <span <?php if ($is_val == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li><a href="your_listing-2.php<?php echo '?id=' . $id . '&action=' . $action; ?>">Description <span <?php if ($is_val1 == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li><a href="your_listing-3.php<?php echo '?id=' . $id . '&action=' . $action; ?>">Location <span <?php if ($is_val2 == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li><a href="your_listing-4.php<?php echo '?id=' . $id . '&action=' . $action; ?>">Amenities<span <?php if ($is_val3 == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li><a href="your_listing-5.php<?php echo '?id=' . $id . '&action=' . $action; ?>" >Photos <span <?php if ($is_val4 == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li><a href="your_listing-6.php<?php echo '?id=' . $id . '&action=' . $action; ?>">Home Safety<span <?php if ($is_val8 == 1) { ?> class="right" <?php } ?>></span></a></li>
            </ul>
            <h4>Hosting</h4>
            <ul class="step-menu">
                <li><a href="your_listing-7.php<?php echo '?id=' . $id . '&action=' . $action; ?>">Pricing <span <?php if ($is_val5 == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li><a href="your_listing-8.php<?php echo '?id=' . $id . '&action=' . $action; ?>">Booking <span <?php if ($is_val6 == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li><a href="your_listing-9.php<?php echo '?id=' . $id . '&action=' . $action; ?>">Calendar <span <?php if ($is_val7 == 1) { ?> class="right" id="rightshow" <?php } ?>></span></a></li>
                <li><a href="your_listing-prof.php<?php echo '?id=' . $id . '&action=' . $action; ?>">Profile <span <?php if ($is_val9 == 1) { ?> class="right" <?php } ?>></span></a></li>
            </ul>
        </div>


        <hr>

        <p>
            Complete <a href='lavascript:void(0);'><?php echo $is_comp; ?> steps</a> to list your space.    
        </p>

    </div>
    <?php
} else {

    $is_comp = 10;

    $ck = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_main_property` WHERE `id`='" . mysql_real_escape_string($_SESSION['prop_id']) . "'"));

    $pk = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='" . mysql_real_escape_string($ck['id']) . "'"));

    $userpf = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . mysql_real_escape_string($_SESSION['userid']) . "'"));


    if ($userpf['phone'] == '') {
        $is_comp = 10;
    } else {
        $is_comp = $is_comp - 1;
		$is_val9 = 1;
    }




    if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '') {

        $is_val = 1;
        $is_comp = $is_comp - 1;
    }
    if ($ck['name'] != '' && $ck['description'] != '') {

        $is_val1 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '') {
            $is_comp = $is_comp - 1;
        //}
    }
    if ($ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] != '' && $ck['city'] && $ck['zipcode'] != '') {

        $is_val2 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '') {
            $is_comp = $is_comp - 1;
        //}
    }
    if ($ck['amenities'] != '') {

        $is_val3 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] != '') {
            $is_comp = $is_comp - 1;
        //}
    }
    if ($pk['image'] != '') {

        $is_val4 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] != '' && $ck['amenities'] != '') {
            $is_comp = $is_comp - 1;
        //}
    }
    if ($ck['home_safety'] != '') {

        $is_val8 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] && $ck['amenities'] != '' && $pk['image'] != '') {
            $is_comp = $is_comp - 1;
        //}
    }
    if ($ck['price'] != '' && $ck['currency'] != '') {

        $is_val5 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] && $ck['amenities'] != '' && $pk['image'] != '' && $ck['home_safety'] != '') {
            $is_comp = $is_comp - 1;
        //}
    }
    if ($ck['review_each_request'] != 0 || $ck['guest_book_instant'] != 0) {

        $is_val6 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] && $ck['amenities'] != '' && $pk['image'] != '' && $ck['home_safety'] != '' && $ck['price'] != '' && $ck['currency'] != '') {
            $is_comp = $is_comp - 1;
        //}
    }

    if ($ck['availability'] != 0 || $ck['availability'] != '') {

        $is_val7 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] && $ck['amenities'] != '' && $pk['image'] != '' && $ck['home_safety'] != '' && $ck['price'] != '' && $ck['currency'] != '' && ($ck['review_each_request'] != 0 || $ck['guest_book_instant'] != 0)) {
            $is_comp = $is_comp - 1;
        //}
    }

    //if ($userpf['phone'] != '') {

        //$is_val9 = 1;
        //if ($ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['bedrooms'] != '' && $ck['beds'] != '' && $ck['bathrooms'] !== '' && $ck['prop_type'] != '' && $ck['country'] != '' && $ck['street_addr'] != '' && $ck['state'] && $ck['city'] && $ck['zipcode'] && $ck['amenities'] != '' && $pk['image'] != '' && $ck['home_safety'] != '' && $ck['price'] != '' && $ck['currency'] != '' && ($ck['review_each_request'] != 0 || $ck['guest_book_instant'] != 0) && ($ck['availability'] != 0 || $ck['availability'] != '')) {
            //$is_comp = 'Final';
        //}
    //}
    ?>
    <div class="col-md-2">
        <div class="step-left-panel">
            <h4>Listing</h4>
            <ul class="step-menu">
                <li <?php if ($pagename == 'your_listing-1.php') { ?> class="active" <?php } ?>><a href="your_listing-1.php">Basics <span <?php if ($is_val == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li <?php if ($pagename == 'your_listing-2.php') { ?> class="active" <?php } ?>><a href="your_listing-2.php">Description <span <?php if ($is_val1 == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li <?php if ($pagename == 'your_listing-3.php') { ?> class="active" <?php } ?>><a href="your_listing-3.php">Location <span <?php if ($is_val2 == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li <?php if ($pagename == 'your_listing-4.php') { ?> class="active" <?php } ?>><a href="your_listing-4.php">Amenities<span <?php if ($is_val3 == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li <?php if ($pagename == 'your_listing-5.php') { ?> class="active" <?php } ?>><a href="your_listing-5.php">Photos <span <?php if ($is_val4 == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li <?php if ($pagename == 'your_listing-6.php') { ?> class="active" <?php } ?>><a href="your_listing-6.php">Home Safety<span <?php if ($is_val8 == 1) { ?> class="right" <?php } ?>></span></a></li>
            </ul>
            <h4>Hosting</h4>
            <ul class="step-menu">
                <li <?php if ($pagename == 'your_listing-7.php') { ?> class="active" <?php } ?>><a href="your_listing-7.php">Pricing <span <?php if ($is_val5 == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li <?php if ($pagename == 'your_listing-8.php') { ?> class="active" <?php } ?>><a href="your_listing-8.php">Booking <span <?php if ($is_val6 == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li <?php if ($pagename == 'your_listing-9.php') { ?> class="active" <?php } ?>><a href="your_listing-9.php">Calendar <span id="rightshow" <?php if ($is_val7 == 1) { ?> class="right" <?php } ?>></span></a></li>
                <li <?php if ($pagename == 'your_listing-prof.php') { ?> class="active" <?php } ?>><a href="your_listing-prof.php">Profile <span <?php if ($is_val9 == 1) { ?> class="right" <?php } ?>></span></a></li>
            </ul>
        </div>

        <hr>

        <p>
            Complete <a href='lavascript:void(0);'><?php echo $is_comp; ?> steps</a> to list your space.    
        </p>

    </div>
    <?php
}
?>
