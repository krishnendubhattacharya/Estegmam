<?php
session_start();
include 'administrator/includes/config.php';

$data = array();
$userid = $_SESSION['userid'];
$otp_code = $_REQUEST['otp_code'];
$opt_obj = mysql_fetch_object(mysql_query("SELECT `opt` FROM `estejmam_user` WHERE `id`='$userid'"));

if($opt_obj->opt == $otp_code){
    $upd = "update `estejmam_user` set `mobile_verifyed`='1' where `id`='" . $userid . "'";
    mysql_query($upd);
    $data['ack'] = 1;
} else {
    $data['ack'] = 0;
}

echo json_encode($data);
exit();