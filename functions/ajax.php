<?php
session_start();
include '../administrator/includes/config.php';
$action = $_GET['action'];
require_once 'Mobile_Detect.php';

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getOS() { 
global $user_agent;
$os_platform    =   "Unknown OS Platform";
$os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

function getBrowser() {

    global $user_agent;

    $browser        =   "Unknown Browser";

    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
           $browser    =   $value;
        }

    }

    return $browser;

}



switch ($action){
    
    case "signin":
        _signin();
        break;
    
    case "signup":
        _signup();
        break;
    
    case "email_confirm":
        _email_confirm();
        break;
    
    case "avatar":
        _avatar();
        break;
    
    /*case "user_signup":
        _user_signup();
        break;
    
    case "landlord_signup":
        _landlord_signup();
        break;
    
    
    default:
        echo "";*/
        
}

function _signin(){
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $userpass = isset($_POST['userpass']) ? $_POST['userpass'] : '';
    
    $data = array();

	$user_os        =   getOS();
	$user_browser   =   getBrowser();
	$ip = $_SERVER['REMOTE_ADDR'];
	$last_login = date("Y-m-d H:i:s");
    
    $check_email = mysql_num_rows(mysql_query("SELECT * FROM `estejmam_user` WHERE `email`='$username'"));
    
    if( $check_email > 0 ){
        
        $login_query = mysql_query("SELECT * FROM `estejmam_user` WHERE `email`='$username' AND `password`=md5($userpass)");
        $check_login = mysql_num_rows($login_query);
        
        if($check_login > 0){
            
            $user = mysql_fetch_object($login_query);

			mysql_query("update `estejmam_user` set `last_login`='".$last_login."',`ip`='".$ip."',`which_browser`='".$user_browser."',`which_os`='".$user_os."' where `id`='".$user->id."'");
            
            $_SESSION['userid'] = $user->id;
            $_SESSION['usertype'] = $user->type;
            
            $data['ack'] = 1;
            $data['msg'] = 'Login Success';
            $data['redirect_url'] = 'my_account.php';
        } else {
            $data['ack'] = 0;
            $data['msg'] = 'Invalid Password';
        }
        
    } else {
        $data['ack'] = 0;
        $data['msg'] = 'Email not exist';
    }
    
    echo json_encode($data);
    exit();
}

function _signup(){
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $bday = isset($_POST['bday']) ? $_POST['bday'] : '';
    $bmonth = isset($_POST['bmonth']) ? $_POST['bmonth'] : '';
    $byear = isset($_POST['byear']) ? $_POST['byear'] : '';
    $coupon = isset($_POST['coupon']) ? $_POST['coupon'] : '';
    
    $fields = array(
        'fname' => mysql_real_escape_string($fname),
        'lname' => mysql_real_escape_string($lname),
        'email' => mysql_real_escape_string($email),
        'password' => mysql_real_escape_string(md5($pass)),
        'type' => $type,
        'dob' => $byear . '-' . $bmonth . '-' . $bday,
        'add_date' => date("Y-m-d h:i:s")
    );
    
    $email_exist = mysql_num_rows(mysql_query("SELECT * FROM `estejmam_user` WHERE `email`='$email'"));
    
    if ($fname == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert first name..';
    } elseif($lname == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert last name..';
    } elseif($email == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert Email..';
    } elseif($pass == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert password..';
    } elseif ($email_exist > 0){
        $data['ack'] = 0;
        $data['msg'] = 'Email already exist..';
    } else {
        $addQuery = "INSERT INTO `estejmam_user` (`" . implode('`,`', array_keys($fields)) . "`)"
                    . " VALUES ('" . implode("','", array_values($fields)) . "')";
        mysql_query($addQuery);
        $last_id = mysql_insert_id();
        
        $user = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='$last_id'"));
        
        $_SESSION['userid'] = $user->id;
        $_SESSION['usertype'] = $user->type;
        
        $random_hash = md5(uniqid(rand(), true));
        
        mysql_query("UPDATE `estejmam_user` SET `email_confirm_code`='$random_hash' WHERE `id`='$last_id'");
        
        $to = $user->email;
        $subject = "Email Varification";
        $message = "Welcome to Estejmam.";
        $message .= "Email confirmation code :- $random_hash";
        
        mail($to, $subject, $message);
        
        $data['ack'] = 1;
        $data['msg'] = 'Registration Success';
        //$data['redirect_url'] = 'index.php';
    }
    echo json_encode($data);
    exit();
    
}

function _email_confirm(){
    $email_confirm = isset($_POST['email_confirm']) ? $_POST['email_confirm'] : '';
    $change_email = isset($_POST['change_email']) ? $_POST['change_email'] : '';
    
    $userid = $_SESSION['userid'];
    $data = array();
    
    $user_details = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='$userid'"));
    
    if($change_email != ''){
        
        if($change_email == $user_details->email){
            $to = $user->email;
            $subject = "Email Varification";
            $message = "Welcome to Estejmam.";
            $message .= "Email confirmation code :- $random_hash";
            mail($to, $subject, $message);

            $data['ack'] = 2;
            $data['msg'] = 'Confirmation code sent to your email. Insert confirmation code below.';
        } else {
            
            $email_exist = mysql_num_rows(mysql_query("SELECT * FROM `estejmam_user` WHERE `email`='$change_email'"));
        
            if($email_exist > 0){
                $data['ack'] = 0;
                $data['msg'] = 'Email already exist.';
            } else {
                $random_hash = md5(uniqid(rand(), true));
                mysql_query("UPDATE `estejmam_user` SET `email`='$change_email',`email_confirm_code`='$random_hash' WHERE `id`='$userid'");

                $user = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='$userid'"));

                $to = $user->email;
                $subject = "Email Varification";
                $message = "Welcome to Estejmam.";
                $message .= "Email confirmation code :- $random_hash";
                mail($to, $subject, $message);

                $data['ack'] = 2;
                $data['msg'] = 'Confirmation code sent to your email. Insert confirmation code below.';
            }
            
        }
    } else {
        $user = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='$userid'"));
    
        if($user->email_confirm_code == $email_confirm){

            mysql_query("UPDATE `estejmam_user` SET `email_confirmed`=1 WHERE `id`='$userid'");

            $data['ack'] = 1;
            $data['msg'] = 'Code confirmed.';
        } else {
            $data['ack'] = 0;
            $data['msg'] = 'Invalid confirmation code.';
        }
    }
    
    echo json_encode($data);
    exit();
}

function _avatar(){
    $data = array();
    $userid = $_SESSION['userid'];
    
    $target_path="../upload/userimages/";
    $userfile_name = $_FILES['file']['name'];
    $userfile_tmp = $_FILES['file']['tmp_name'];
    $img_name = time().'__'.$userfile_name;
    $img = $target_path.$img_name;
    move_uploaded_file($userfile_tmp, $img);

    $image =mysql_query("UPDATE `estejmam_user` SET `image`='".$img_name."' WHERE `id` = '" . $userid . "'");
    
    $data['ack'] = 1;
    $data['src'] = 'upload/userimages/'.$img_name;
    
    echo json_encode($data);
    exit();
}
/*
function _user_signup(){
    $data = array();
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
    $cpass = isset($_POST['cpass']) ? $_POST['cpass'] : '';
    
    $fields = array(
        'fname' => mysql_real_escape_string($fname),
        'lname' => mysql_real_escape_string($lname),
        'email' => mysql_real_escape_string($email),
        'password' => mysql_real_escape_string(md5($pass)),
        'type' => 0,
        'add_date' => date("Y-m-d h:i:s")
    );
    
    $email_exist = mysql_num_rows(mysql_query("SELECT * FROM `estejmam_user` WHERE `email`='$email'"));
    
    if ($fname == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert first name..';
    } elseif($lname == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert last name..';
    } elseif($email == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert Email..';
    } elseif($pass == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert password..';
    }  elseif($cpass == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert confirm password..';
    } elseif ($email_exist > 0){
        $data['ack'] = 0;
        $data['msg'] = 'Email already exist..';
    } elseif ($pass <> $cpass) {
        $data['ack'] = 0;
        $data['msg'] = 'Password mismatched..';
    } else {
        $addQuery = "INSERT INTO `estejmam_user` (`" . implode('`,`', array_keys($fields)) . "`)"
                    . " VALUES ('" . implode("','", array_values($fields)) . "')";
        mysql_query($addQuery);
        $last_id = mysql_insert_id();
        
        $user = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='$last_id'"));
        
        $_SESSION['userid'] = $user->id;
        $_SESSION['usertype'] = $user->type;
        
        $data['ack'] = 1;
        $data['msg'] = 'Registration Success';
        $data['redirect_url'] = 'index.php';
    }
    echo json_encode($data);
    exit();
}

function _landlord_signup(){
    $data = array();
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
    $cpass = isset($_POST['cpass']) ? $_POST['cpass'] : '';
    
    $fields = array(
        'fname' => mysql_real_escape_string($fname),
        'lname' => mysql_real_escape_string($lname),
        'email' => mysql_real_escape_string($email),
        'password' => mysql_real_escape_string(md5($pass)),
        'type' => 1,
        'add_date' => date("Y-m-d h:i:s")
    );
    
    $email_exist = mysql_num_rows(mysql_query("SELECT * FROM `estejmam_user` WHERE `email`='$email'"));
    
    if ($fname == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert first name..';
    } elseif($lname == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert last name..';
    } elseif($email == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert Email..';
    } elseif($pass == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert password..';
    }  elseif($cpass == ''){
        $data['ack'] = 0;
        $data['msg'] = 'Please insert confirm password..';
    } elseif ($email_exist > 0){
        $data['ack'] = 0;
        $data['msg'] = 'Email already exist..';
    } elseif ($pass <> $cpass) {
        $data['ack'] = 0;
        $data['msg'] = 'Password mismatched..';
    } else {
        $addQuery = "INSERT INTO `estejmam_user` (`" . implode('`,`', array_keys($fields)) . "`)"
                    . " VALUES ('" . implode("','", array_values($fields)) . "')";
        mysql_query($addQuery);
        $last_id = mysql_insert_id();
        
        $user = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='$last_id'"));
        
        $_SESSION['userid'] = $user->id;
        $_SESSION['usertype'] = $user->type;
        
        $data['ack'] = 1;
        $data['msg'] = 'Registration Success';
        $data['redirect_url'] = 'index.php';
    }
    echo json_encode($data);
    exit();
}*/