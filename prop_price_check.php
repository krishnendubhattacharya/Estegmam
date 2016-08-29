<?php

ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';
?>

<?php

if ($_REQUEST['id'] != '') {
    $sql = mysql_fetch_array(mysql_query("select * from `estejmam_property_price` where `prop_id`='" . $_REQUEST['id'] . "'"));

    $price = $sql['price'];

    if ($_REQUEST['wid'] != '') {
        $price_fi = $sql['price'] * $_REQUEST['wid'];
    } else {
        $price_fi = $price;
    }

    echo '$' . $price_fi;
}
?>