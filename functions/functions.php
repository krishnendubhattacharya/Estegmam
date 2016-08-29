<?php
function is_user_logged_in(){
    if(isset($_SESSION['userid']) && $_SESSION['userid'] != '' && isset($_SESSION['usertype']) && $_SESSION['usertype'] != ''){
        return true;
    } else {
        return false;
    }
}

function getlatlang($address) {
    $data = array();
    $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false&key=AIzaSyDZ31GYS9TcL00rjdGmQiSMZMR0ywh06lA');
   $output= json_decode($geocode);
    $lat = $output->results[0]->geometry->location->lat;
    $long = $output->results[0]->geometry->location->lng;
    $data['lat'] = $lat;
    $data['long'] = $long;
    return $data;
}