<?php

ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';

mysql_query("SET SESSION character_set_results = 'UTF8'");
header('Content-Type: text/html; charset=UTF-8');
?>

<?php

if ($_REQUEST['id'] != '') {
    $sql = mysql_fetch_array(mysql_query("select * from `estejmam_currency` where `id`='" . $_REQUEST['id'] . "'"));

    $price = $sql['code'];

    echo $price;
}
?>