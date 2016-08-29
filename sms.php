<?php
session_start();
include 'administrator/includes/config.php';

$data = array();

$random = rand(1000, 9999);

$userid = $_SESSION['userid'];
$number = $_REQUEST['phone'];


$sms_transfer_url = "http://sms.malath.net.sa/httpSmsProvider.aspx?username=Yousefalrzny&password=Yousef1234567&mobile=" . $number . "&unicode=E&message=" . $random . "&sender=Estegmam";


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $sms_transfer_url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // For HTTPS
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // For HTTPS
curl_exec($ch);
$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Returns 200 if everything went well
if ($statusCode == 200) {

    $upd = "update `estejmam_user` set `opt` = '" . $random . "',`mobile_verifyed`='0', `phone`='".$number."' where `id`='" . $userid . "'";
    mysql_query($upd);
    $data['ack'] = 1;
} else {
    $data['ack'] = 0;
}

curl_close($ch);

echo json_encode($data);
exit();
?>