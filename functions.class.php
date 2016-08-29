  <?php
error_reporting(0);
include_once("database.class.php");
include('class.phpmailer.php');
//include("paypal_pro.inc.php");
//include('functions_other.php');
ini_set('upload_max_filesize', '150M');
ini_set('max_execution_time', 600);

mysql_query("SET SESSION character_set_results = 'UTF8'");
header('Content-Type: text/html; charset=UTF-8');

function _call($action) {

    switch ($action) {

        case 'signup':
            _signup();
            break;

        case 'login':
            _login();
            break;

        case 'logout':
            _logout();
            break;

        case 'updatePassword':
            _updatePassword();
            break;


        case 'fbsignup':
            _fbsignup();
            break;



        case 'forgotPassword':
            _forgotPassword();
            break;


        case 'testpush':
            testpush();
            break;
        case 'notification':
            _notification();
            break;

        case 'notificationCount':
            _notificationCount();
            break;

        case 'notificationRead':
            _notificationRead();
            break;
 

        case 'twsignup':
            _twsignup();
            break;
 
  

        default:
        _basic();
    }
}


function _basic() {
    echo 'Function not defined....';
}


//http://team3.nationalitsolution.co.in/estejmam/webservice/service.php?auth=fcea920f7412b5da7be0cf42b8c93759&action=forgotPassword&email=nits.avik@gmail.com

	function _forgotPassword() {
	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
	$data=array();
	$user_exists = mysql_num_rows(mysql_query("SELECT * FROM `estejmam_user` WHERE `email`='" . $email . "'"));
	if ($user_exists > 0) {
	
	$userDetails = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `email`='" . $email . "'"));
	
	$password = strtotime(date('Y-m-d H:i:s'));
	
	mysql_query("SELECT * FROM `estejmam_user` set `password`='" . md5($password) . "' WHERE `email`='" . $email . "'");
	
	
	$Subject1 = "Request For Reset Password";
	$TemplateMessage.="<br/><br />Hi " . $userDetails['fname'] . ",";
	$TemplateMessage.="<br>";
	$TemplateMessage.="<br>Welcome to Estagemum";
	$TemplateMessage.="<br>Your password has retrived successfully.";
	$TemplateMessage.="<br><br>";
	$TemplateMessage.="Your Email Address :" . $email;
	$TemplateMessage.="<br>";
	$TemplateMessage.="Your Current Password :" . $password;
	// $TemplateMessage.="<br><br>";	    
	
	$TemplateMessage.="<br><br><br/>Thanks & Regards<br/>";
	$TemplateMessage.="Estagemum Team";
	$TemplateMessage.="<br><br><br>This is a post-only mailing.  Replies to this message are not monitored
	or answered.";
	
	$mail1 = new PHPMailer;
	$mail1->FromName = "Estagemum";
	$mail1->From = "info@estagemum.com";
	$mail1->Subject = $Subject1;
	$mail1->Body = stripslashes($TemplateMessage);
	$mail1->AltBody = stripslashes($TemplateMessage);
	$mail1->IsHTML(true);
	$mail1->AddAddress($email, "estagemum.com"); //info@salaryleak.com
	$mail1->Send();
	
	$data['Ack'] = 1;
	$data['msg'] = 'Successful';
	} else {
	
	$data['Ack'] = 0;
	$data['msg'] = 'Email Not Found In Database';
	}
	
	echo json_encode($data);
	return json_encode($data);
}

//http://team3.nationalitsolution.co.in/estejmam/webservice/service.php?auth=fcea920f7412b5da7be0cf42b8c93759&action=notificationCount&user_id=3

function _notificationCount() {
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
    $data = array();
    $notification = "SELECT * FROM `invision_notification` WHERE `to_id`='" . $user_id . "' AND `status`='0'";
    $getNotification = mysql_num_rows(mysql_query($notification));

    $data['notification'] = $getNotification;
    $data['Ack'] = 1;

    echo json_encode($data);
    return json_encode($data);
}

//http://team3.nationalitsolution.co.in/estejmam/webservice/service.php?auth=fcea920f7412b5da7be0cf42b8c93759&action=notificationRead&user_id=3
function _notificationRead() {
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
    $data = array();

    mysql_query("UPDATE `invision_notification` set `status`='1' WHERE `to_id`='" . $user_id . "'");

    $notification = "SELECT * FROM `invision_notification` WHERE `to_id`='" . $user_id . "' AND `status`='0'";
    $getNotification = mysql_num_rows(mysql_query($notification));

    $data['notification'] = $getNotification;
    $data['Ack'] = 1;

    echo json_encode($data);
    return json_encode($data);
}

//http://team3.nationalitsolution.co.in/estejmam/webservice/service.php?auth=fcea920f7412b5da7be0cf42b8c93759&action=updatePassword&userID=121&old_password=123456&new_password=1234567

function _updatePassword() {

    $data = array();
    $userID = isset($_REQUEST['userID']) ? $_REQUEST['userID'] : '';

    $old_password = isset($_REQUEST['old_password']) ? $_REQUEST['old_password'] : '';

    $new_password = isset($_REQUEST['new_password']) ? $_REQUEST['new_password'] : '';
//$otp = isset($_REQUEST['otp']) ? $_REQUEST['otp'] : '';
//$num_existing_device = 
//echo "SELECT * FROM `uber_user` WHERE `email`='" . $email . "' AND `password`='" . base64_encode($password) . "' AND `status` = '1'";
    $userDetails = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . $userID . "'"));

//if($otp==$userDetails['onetime_password']){

    $isexists = mysql_num_rows(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . $userID . "' AND `password`='" . md5($old_password) . "'"));
    if ($isexists == 0) {

        $data['Ack'] = 0;
        $data['msg'] = "Old Password Doesn't Match";
    } else {
        /* 	mysql_query("UPDATE `uber_user` SET `login_status` = '0' WHERE `id` = '".$fbuserid['id']."' AND `device_token_id` = '".$device_token_id."' AND `device_type` = '".$device_type."' AND `user_type` = 'Driver'") or die(mysql_error()); */
        mysql_query("UPDATE `estejmam_user` SET `password` = '" . md5($new_password) . "' WHERE `id` = '" . $userID . "'") or die(mysql_error());

        $data['Ack'] = 1;
        $data['msg'] = 'Password Chnaged Successfully';
    }
	
    if ($userDetails['image'] != "") {
        $photo = SITE_URL . "upload/userimages/" . $userDetails['image'];
    } else {
        $photo = "";
    }

    $data['UserDetails'] = array(
        "id" => $userDetails['id'],
        "fname" => stripslashes($userDetails['fname']),
		"lname" => stripslashes($userDetails['lname']),
        "email" => stripslashes($userDetails['email']),
        "phone" => stripslashes($userDetails['phone']),
        "photo" => $photo,
        "device_type" => stripslashes($userDetails['device_type']),
        "device_token_id" => stripslashes($userDetails['device_token_id'])
    );

    echo json_encode($data);
    return json_encode($data);
}




//http://team3.nationalitsolution.co.in/estejmam/webservice/service.php?auth=fcea920f7412b5da7be0cf42b8c93759&action=signup&fname=Avik&lname=Ghosh&email=nits.avik@gmail.com&dob=1985-05-05&password=123456&device_token_id=123123&device_type=ios

function _signup() {

    $fname = isset($_REQUEST['fname']) ? $_REQUEST['fname'] : '';
	$lname = isset($_REQUEST['lname']) ? $_REQUEST['lname'] : '';
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
	$dob = isset($_REQUEST['dob']) ? $_REQUEST['dob'] : '';
    $date = date('Y-m-d');
    $device_token_id = isset($_REQUEST['device_token_id']) ? $_REQUEST['device_token_id'] : '';
    $device_type = isset($_REQUEST['device_type']) ? $_REQUEST['device_type'] : '';

    $fields = array(
        'fname' => mysql_real_escape_string($fname),
		'lname' => mysql_real_escape_string($lname),
        'email' => mysql_real_escape_string($email),
        'dob' => mysql_real_escape_string($dob),
        'password' => md5($password),
        'add_date' => $date,
        'device_type' => mysql_real_escape_string($device_type),
        'device_token_id' => mysql_real_escape_string($device_token_id),
    );



    $fieldsList = array();

    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }


    $user_exists = mysql_num_rows(mysql_query("SELECT * FROM `estejmam_user` WHERE `email`='" . $email . "'"));

    if ($user_exists == 0) {

      echo  $addQuery = "INSERT INTO `estejmam_user` (`" . implode('`,`', array_keys($fields)) . "`)"
                . " VALUES ('" . implode("','", array_values($fields)) . "')";

        if (mysql_query($addQuery)) {

            $last_id = mysql_insert_id();

            $userDetails = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . $last_id . "'"));

            if ($userDetails['image'] != "") {

                $photo = SITE_URL . "upload/users/" . $userDetails['image'];
            } else {

// $photo = SITE_URL . "upload/no.png" ;
                $photo = "";
            }

            $data['UserDetails'] = array(
			    "id" => stripslashes($userDetails['id']),
                "fname" => stripslashes($userDetails['fname']),
                "lname" => stripslashes($userDetails['lname']),
                "email" => stripslashes($userDetails['email']),
                "phone" => stripslashes($userDetails['phone']),
                "photo" => "",
            );
			
		        $data['LastID'] = $last_id;
        $data['Ack'] = 1;
        $data['msg'] = 'Successful';	
        }



    } else {

        $data['LastID'] = '';
        $data['Ack'] = 0;
        $data['msg'] = 'Email Already Exists';
    }

    echo json_encode($data);
    return json_encode($data);
}


function _phoneVerification() {

    $data = array();

    $userID = isset($_REQUEST['userID']) ? $_REQUEST['userID'] : '';
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
    $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
    $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : '';
//  if($otp==$userDetails['onetime_password']){
    $fields = array(
        'fullname' => mysql_real_escape_string($name),
        'username' => mysql_real_escape_string($username),
        'phone' => mysql_real_escape_string($phone),
        'email' => mysql_real_escape_string($email),
        'gender' => mysql_real_escape_string($gender)
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    $editQuery = "UPDATE `invision_user` SET " . implode(', ', $fieldsList)
            . " WHERE `id` = '" . mysql_real_escape_string($userID) . "'";

    if (mysql_query($editQuery)) {


        if ($_FILES['image']['tmp_name'] != '') {
            $target_path = "../upload/userimage/";
            $userfile_name = $_FILES['image']['name'];
            $userfile_tmp = $_FILES['image']['tmp_name'];
            $img_name = time() . $userfile_name;
            $img = $target_path . $img_name;
            move_uploaded_file($userfile_tmp, $img);

            $image = mysql_query("UPDATE `invision_user` SET `image`='" . $img_name . "' WHERE `id` = '" . mysql_real_escape_string($userID) . "'");
        }
        if ($_FILES['image_header']['tmp_name'] != '') {
            $target_path = "../upload/headerimage/";
            $userfile_name = $_FILES['image_header']['name'];
            $userfile_tmp = $_FILES['image_header']['tmp_name'];
            $img_name = time() . $userfile_name;
            $img = $target_path . $img_name;
            move_uploaded_file($userfile_tmp, $img);

            $image = mysql_query("UPDATE `invision_user` SET `header_image`='" . $img_name . "' WHERE `id` = '" . mysql_real_escape_string($userID) . "'");
        }

        $userDetails = mysql_fetch_array(mysql_query("SELECT * FROM `invision_user` WHERE `id`='" . $userID . "'"));

        if ($userDetails['image'] != "") {
            $photo = SITE_URL1 . "upload/userimage/" . $userDetails['image'];
        } else {
            $photo = "";
        }

        if ($userDetails['header_image'] != "") {
            $photo_header = SITE_URL1 . "upload/headerimage/" . $userDetails['header_image'];
        } else {
            $photo_header = "";
        }
        $data['UserDetails'] = array(
            "id" => $userDetails['id'],
            "name" => stripslashes($userDetails['fullname']),
            "email" => stripslashes($userDetails['email']),
            "phone" => stripslashes($userDetails['phone']),
            "photo" => $photo,
            "photo_header" => $photo_header,
            "device_type" => stripslashes($userDetails['device_type']),
            "device_token_id" => stripslashes($userDetails['device_token_id'])
        );


        $data['Ack'] = 1;
        $data['msg'] = 'Profile Updated Successfully';

//}
        /*  else 
          {

          $data['Ack'] = 0;
          $data['msg'] = 'Profile updation fail';

          } */
    } else {
        $data['Ack'] = 2;
        $data['msg'] = "Profile updation fail. Your OPT doesn't match";
    }




    echo json_encode($data);
    return json_encode($data);
}


//http://team3.nationalitsolution.co.in/estejmam/webservice/service.php?auth=fcea920f7412b5da7be0cf42b8c93759&action=login&email=nitsindranil94@gmail.com&password=123456&device_token_id=APA91bFYLdUX2YPLIeCD39C1-lCjEex35L7FDx4IYLytaVXnyOn0DQR9nM3FPyxoRAmiQWbH18mO2LFiT1TXXwFuwwtH3b-RaukMeH0vNNS82KZv2sum9dM-bZ0XA36OEDlOYgQYJCqc14VMyh_VtdCVHcG70ECncg&device_type=ios

function _login() {
    $date = date("Y-m-d H:i:s");
    $data = array();
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
    $device_token_id = isset($_REQUEST['device_token_id']) ? $_REQUEST['device_token_id'] : '';
    $device_type = isset($_REQUEST['device_type']) ? $_REQUEST['device_type'] : '';

    $isexists = mysql_num_rows(mysql_query("SELECT * FROM `estejmam_user` WHERE `email`='" . $email . "' AND `password`='" . md5($password) . "' "));
    if ($isexists == 0) {

        $data['Ack'] = 0;

        $data['msg'] = 'Login error';
    } else {



        $userDetails = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `email`='" . $email . "' AND `password`='" . md5($password) . "' "));
		
 mysql_query("UPDATE `estejmam_user` SET `is_loggedin` = '1',`device_token_id` = '".$device_token_id."',`device_type` = '".$device_type."', `last_login`= '" . $date . "' WHERE `id` = '" . $userDetails['id'] . "'") or die(mysql_error());
 
 
        $userDetails = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `email`='" . $email . "' AND `password`='" . md5($password) . "' "));
        if ($userDetails['image'] != "") {

            $photo = SITE_URL1 . "upload/userimages/" . $userDetails['image'];
        } else {

            $photo = "";
        }


        $data['Ack'] = 1;

        $data['msg'] = 'Login Success';


		$data['UserDetails'] = array(
		"id" => $userDetails['id'],
		"fullname" => stripslashes($userDetails['fullname']),
		"email" => stripslashes($userDetails['email']),
		"phone" => stripslashes($userDetails['phone']),
		"username" => stripslashes($userDetails['username']),
		"gender" => stripslashes($userDetails['gender']),
		"photo" => $photo,
		"device_type" => stripslashes($userDetails['device_type']),
		"device_token_id" => stripslashes($userDetails['device_token_id'])
		);
    }




    echo json_encode($data);

    return json_encode($data);
}

//http://team3.nationalitsolution.co.in/estejmam/webservice/service.php?auth=fcea920f7412b5da7be0cf42b8c93759&action=logout&userid=101

function _logout() {

    $data = array();

    $userid = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE id='" . $_REQUEST['userid'] . "'"));

    if (!empty($userid)) {

        mysql_query("UPDATE `estejmam_user` SET `is_loggedin` = '0' WHERE `id` = '" . $_REQUEST['userid'] . "'") or die(mysql_error());

        $data['Ack'] = 1;

        $data['msg'] = 'You have successfully logged out';
    } else {

        $data['Ack'] = 0;

        $data['msg'] = 'Logout failure';
    }
    echo json_encode($data);

    return json_encode($data);
}

//http://team3.nationalitsolution.co.in/estejmam/webservice/service.php?auth=fcea920f7412b5da7be0cf42b8c93759&action=testpush
function testpush() {


//$registatoin_ids=array("APA91bHGkf_muTDItWfzNMmpKMVkUJbgn-hpyej7AHtJus70v5nrhs3n7NqyZv0i-EAeoWXAmLLU_qzBZh-SG_-4IzopEh5t55kAA6jfsdtNZ94P95keRYLjWeIjjTgmRzG84riNIhcm"); 

    $message = "This is Test Push";
	
	$totalmsgarray = array("message" => $message, "type" => 'testpush');					
	$device_token_id = '311eadfcedc544af39bf78132337da1a0ec61f8d4ac4bb4b5ebb25a24e8b4575';
	iphone_push($device_token_id,$message,json_encode($totalmsgarray));	


  //  android_push($registatoin_ids, $message);
}

//http://team3.nationalitsolution.co.in/estejmam/webservice/service.php?auth=fcea920f7412b5da7be0cf42b8c93759&action=fbsignup&fname=test&lname=test&email=nits.test@gmail.com&phone=1234567890&fbuserid=1567304580213463&device_token_id=123123&device_type=ios

function _fbsignup() {

    $fname = isset($_REQUEST['fname']) ? $_REQUEST['fname'] : '';
	$lname = isset($_REQUEST['lname']) ? $_REQUEST['lname'] : '';
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
    $fbuserid = isset($_REQUEST['fbuserid']) ? $_REQUEST['fbuserid'] : '';
   //$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '';
    $device_token_id = isset($_REQUEST['device_token_id']) ? $_REQUEST['device_token_id'] : '';
    $device_type = isset($_REQUEST['device_type']) ? $_REQUEST['device_type'] : '';
    $login_type = 'fb';
	
	$img_path = file_get_contents('https://graph.facebook.com/'.$fbuserid.'/picture?type=large');
	
	$des = "../upload/userimage/".$fbuserid.'.jpg';
	$updated_file_name = SITE_URL.'/upload/userimages/'.$fbuserid.'.jpg';
	file_put_contents($des, $img_path);

    $fields = array(
        'fname' => mysql_real_escape_string($fname),
		'lname' => mysql_real_escape_string($lname),
        'fb_user_id' => mysql_real_escape_string($fbuserid),
        'email' => mysql_real_escape_string($email),
        'phone' => mysql_real_escape_string($phone),
		'image' => mysql_real_escape_string($fbuserid.'.jpg'),
        'device_type' => mysql_real_escape_string($device_type),
        'device_token_id' => mysql_real_escape_string($device_token_id),
        'login_type' => mysql_real_escape_string($login_type)
    );



    $fieldsList = array();

    foreach ($fields as $field => $value) {

        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    $user_exists = mysql_num_rows(mysql_query("SELECT * FROM `estejmam_user` WHERE `fb_user_id`='" . $fbuserid . "'"));

    if ($user_exists == 0) {

        $addQuery = "INSERT INTO `estejmam_user` (`" . implode('`,`', array_keys($fields)) . "`)"
                . " VALUES ('" . implode("','", array_values($fields)) . "')";

        if (mysql_query($addQuery)) {

            $last_id = mysql_insert_id();
            $userDetails = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . $last_id . "'"));

			if ($userDetails['image'] != "") {
			
			$photo = SITE_URL1 . "upload/userimages/" . $userDetails['image'];
			} else {
			
			$photo = "";
			}
			

        $data['UserDetails'] = array(
			"fbuser_id" => $fbuserid,
			"id" => $userDetails['id'],
			"fname" => stripslashes($userDetails['fname']),
			"lname" => stripslashes($userDetails['lname']),
			"email" => stripslashes($userDetails['email']),
			"phone" => stripslashes($userDetails['phone']),
			"photo" => $photo,
			"login_type" => stripslashes($userDetails['login_type']),
			"device_type" => stripslashes($userDetails['device_type']),
			"device_token_id" => stripslashes($userDetails['device_token_id'])
        );
		

        }


        $data['LastID'] = $last_id;
        $data['Ack'] = 1;
        $data['msg'] = 'Successful';
    } else {



        $fbuserid = isset($_REQUEST['fbuserid']) ? $_REQUEST['fbuserid'] : '';

        $sql_insert = mysql_fetch_array(mysql_query("select * from `estejmam_user` where `fb_user_id`='" . $fbuserid . "'"));

        if ($sql_insert) {
			
			$img_path = file_get_contents('https://graph.facebook.com/'.$fbuserid.'/picture?type=large');
			
			$des = "../upload/userimage/".$fbuserid.'.jpg';
			$updated_file_name = SITE_URL.'/upload/userimages/'.$fbuserid.'.jpg';
			file_put_contents($des, $img_path);			
			
            mysql_query("UPDATE `estejmam_user` SET `is_loggedin` = 1,`image` = '".$fbuserid.".jpg'  WHERE `id` = '" . $sql_insert['id'] . "'") or die(mysql_error());

      $userDetails = mysql_fetch_array(mysql_query("select * from estejmam_user where `fb_user_id`='" . $fbuserid . "' "));
	  
	  if ($userDetails['image'] != "") {
			
			$photo = SITE_URL1 . "upload/userimages/" . $userDetails['image'];
			} else {
			
			$photo = "";
			}
			

			
        }
        $data['Ack'] = 1;
		$data['LastID'] = $userDetails['id'];
        $data['msg'] = 'Successfully Logged in';
		
        $data['UserDetails'] = array(
			"fbuser_id" => $fbuserid,
			"id" => $userDetails['id'],
			"fname" => stripslashes($userDetails['fname']),
			"lname" => stripslashes($userDetails['lname']),
			"email" => stripslashes($userDetails['email']),
			"phone" => stripslashes($userDetails['phone']),
			"photo" => $photo,
			"login_type" => stripslashes($userDetails['login_type']),
			"device_type" => stripslashes($userDetails['device_type']),
			"device_token_id" => stripslashes($userDetails['device_token_id'])
        );
		
		
    }

    echo json_encode($data);
    return json_encode($data);
}

//http://team3.nationalitsolution.co.in/estejmam/webservice/service.php?auth=fcea920f7412b5da7be0cf42b8c93759&action=twsignup&name=test&email=nits.test@gmail.com&phone=1234567890&password=123456&twuserid=1567304580213463&device_token_id=123123&device_type=ios

function _twsignup() {

    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
    $twuserid = isset($_REQUEST['twuserid']) ? $_REQUEST['twuserid'] : '';
   //$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '';

    $device_token_id = isset($_REQUEST['device_token_id']) ? $_REQUEST['device_token_id'] : '';

    $device_type = isset($_REQUEST['device_type']) ? $_REQUEST['device_type'] : '';
    $login_type = 'tw';

    $fields = array(
        'fullname' => mysql_real_escape_string($name),
        'twitter_user_id' => mysql_real_escape_string($twuserid),
        'email' => mysql_real_escape_string($email),
        'phone' => mysql_real_escape_string($phone),
        'password' => md5($password),
        'device_type' => mysql_real_escape_string($device_type),
        'device_token_id' => mysql_real_escape_string($device_token_id),
        'login_type' => mysql_real_escape_string($login_type)
    );

    $fieldsList = array();

    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    $user_exists = mysql_num_rows(mysql_query("SELECT * FROM `estejmam_user` WHERE `twitter_user_id`='" . $twuserid . "'"));

    if ($user_exists == 0) {

        $addQuery = "INSERT INTO `estejmam_user` (`" . implode('`,`', array_keys($fields)) . "`)"
                . " VALUES ('" . implode("','", array_values($fields)) . "')";

        if (mysql_query($addQuery)) {



            $last_id = mysql_insert_id();

            $userDetails = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='" . $last_id . "'"));

           
		   if ($userDetails['image'] != "") {
			
			$photo = SITE_URL1 . "upload/userimage/" . $userDetails['image'];
			} else {
			
			$photo = "";
			}
			
			if ($userDetails['header_image'] != "") {
			
			$photo_header = SITE_URL1 . "upload/headerimage/" . $userDetails['header_image'];
			} else {
			
			$photo_header = "";
			}



        $data['UserDetails'] = array(
			"twuserid" => $twuserid,
			"id" => $userDetails['id'],
			"name" => stripslashes($userDetails['fullname']),
			"email" => stripslashes($userDetails['email']),
			"phone" => stripslashes($userDetails['phone']),
			"photo" => $photo,
			"headerPhoto" => $photo_header,
			"login_type" => stripslashes($userDetails['login_type']),
			"device_type" => stripslashes($userDetails['device_type']),
			"device_token_id" => stripslashes($userDetails['device_token_id'])
        );
		   
		   
        }


        $data['LastID'] = $last_id;

        $data['Ack'] = 1;

        $data['msg'] = 'Successful';
    } else {



        $twuserid = isset($_REQUEST['twuserid']) ? $_REQUEST['twuserid'] : '';


        $sql_insert = mysql_fetch_array(mysql_query("select * from `estejmam_user` where `twitter_user_id`='" . $twuserid . "'"));

        if ($sql_insert) {
			
            mysql_query("UPDATE `estejmam_user` SET `is_loggedin` = 1  WHERE `id` = '" . $sql_insert['id'] . "'") or die(mysql_error());

            $userDetails = mysql_fetch_array(mysql_query("select * from estejmam_user where `twitter_user_id`='" . $twuserid . "' "));
        }
        $data['Ack'] = 1;
        $data['msg'] = 'Successfully Logged in';
         if ($userDetails['image'] != "") {
			 			
			$photo = SITE_URL1 . "upload/userimage/" . $userDetails['image'];
			} 
			else{
			
			$photo = "";
			}
			
			if ($userDetails['header_image'] != "") {
			$photo_header = SITE_URL1 . "upload/headerimage/" . $userDetails['header_image'];
			} else {
			$photo_header = "";
			}

        $data['LastID'] = $userDetails['id'];
		
        $data['UserDetails'] = array(
			"twuserid" => $twuserid,
			"id" => $userDetails['id'],
			"name" => stripslashes($userDetails['fullname']),
			"email" => stripslashes($userDetails['email']),
			"phone" => stripslashes($userDetails['phone']),
			"photo" => $photo,
			"headerPhoto" => $photo_header,
			"login_type" => stripslashes($userDetails['login_type']),
			"device_type" => stripslashes($userDetails['device_type']),
			"device_token_id" => stripslashes($userDetails['device_token_id'])
        );
		
    }

    echo json_encode($data);
    return json_encode($data);
}



function android_push($device_token_id, $message) {
    $url = 'https://android.googleapis.com/gcm/send';

    $fields = array(
        'registration_ids' => $device_token_id,
        'data' => $message,
    );

    $headers = array(
// 'Authorization: key=AIzaSyDAEWrziMSvxrwoGupxoQdYkmC0rOJTpSM',
        'Authorization: key=AIzaSyDqfe2WqHDO1hGT1gp8GH24e4i085Q4UKg',
        'Content-Type: application/json'
    );
// Open connection
    $ch = curl_init();

// Set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Disabling SSL Certificate support temporarly
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

// Execute post
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }

// Close connection
    curl_close($ch);

//echo $result;	
}

function iphone_push($device_token_id, $message, $totalarray,$badge) {
    $data = array();

    $firsttoken = $device_token_id;
// Put your device token here (without spaces):

    $deviceToken = $firsttoken;
// Put your private key's passphrase here:

    $passphrase = '1234567890';
// Put your alert message here:////////////////////////////////////////////////////////////////////////////////
    $ctx = stream_context_create();

stream_context_set_option($ctx, 'ssl', 'local_cert', 'EchoDev.pem'); //for Development
//stream_context_set_option($ctx, 'ssl', 'local_cert', 'MaplyDis.pem'); //for Distribution

    stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
// Open a connection to the APNS server

    $fp = stream_socket_client(
            'ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

    if (!$fp)
        exit("Failed to connect: $err $errstr" . PHP_EOL);
    'Connected to APNS' . PHP_EOL;
// Create the payload body

    $body['aps'] = array(
        'alert' => $message,
		'badge' => $badge,
        'sound' => 'default',
        'data' => $totalarray,
    );
// Encode the payload as JSON

    $payload = json_encode($body);

// Build the binary notification

    $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
    $result = fwrite($fp, $msg, strlen($msg));

    if (!$result)
        'Message not delivered' . PHP_EOL;
    else
        'Message successfully delivered' . PHP_EOL;

// Close the connection to the server
    fclose($fp);
}


?>
