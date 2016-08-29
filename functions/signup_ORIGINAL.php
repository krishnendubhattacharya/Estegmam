<?php
ob_start();
session_start();
include('../administrator/includes/config.php');
include('../class.phpmailer.php');

 if($_REQUEST['action']=='signup')

{

	$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
	$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$dob = $_POST['yy'].'-'.$_POST['mm'].'-'.$_POST['dd'];
	$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
	$address = isset($_POST['address']) ? $_POST['address'] : '';
	$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
	$payment = isset($_POST['payment']) ? $_POST['payment'] : '';
	$price = isset($_POST['price']) ? $_POST['price'] : '';
	$ip=$_SERVER['REMOTE_ADDR'];
	$status = 0;
	$span_startdate=date('Y-m-d');
	//$span_enddate=date('Y-m-d', strtotime("+60 days"));
	if($payment=='paid'){
	$span_enddate=date('Y-m-d', strtotime($span_startdate."+365 days"));
	}
	else{
	$span_enddate=date('Y-m-d', strtotime($span_startdate."+60 days"));
	}
	
	$_SESSION['fname']=$fname;
	$_SESSION['email']=$email;
	$_SESSION['password']=$password;
	$_SESSION['price']=$price;


	$fields = array(
		'fname' => mysql_real_escape_string($fname),
		'lname' => mysql_real_escape_string($lname),
		'email' => mysql_real_escape_string($email),
		'password' => mysql_real_escape_string(md5($password)),
		'dob' => mysql_real_escape_string($dob),
		'gender' => mysql_real_escape_string($gender),
		'add_date' => mysql_real_escape_string(date('Y-m-d')),
		'ip' => mysql_real_escape_string($ip),
		'address' => mysql_real_escape_string($address),
		'phone' => mysql_real_escape_string($phone),
		'span_startdate' => mysql_real_escape_string($span_startdate),
		'span_enddate' => mysql_real_escape_string($span_enddate),
		'status' => mysql_real_escape_string($status));





		$fieldsList = array();
		foreach ($fields as $field => $value) {
			$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
		}







	 $addQuery = "INSERT INTO `vacation_user` (`" . implode('`,`', array_keys($fields)) . "`)"
			. " VALUES ('" . implode("','", array_values($fields)) . "')";


if($payment=='paid'){

$_SESSION['REGISTER_QUERY']=$addQuery;
}
else{


		mysql_query($addQuery);
		$last_id=mysql_insert_id();

/*	    $_SESSION['user_email']=$email;

		$_SESSION['user_name']=$fname;

		$_SESSION['full_name']=$fname.' '.$lname;

		$_SESSION['User_id']=$last_id;

		$_SESSION['user_type']=0;

		$_SESSION['user_image']='';*/



		mysql_query("Update `vacation_user` set `last_login`='".date('Y-m-d H:i:s')."', `is_loggedin`='1' Where `id`='".$row->id."'");
		$Subject1 ="Registration Successful";

		$TemplateMessage.='<table width="20%" border="0" cellspacing="0" cellpadding="0">

		<tr>

		<td>

		<img src="http://www.nationalitsolution.in/team5/vacation/images/logo.png" alt="" border="0" />

		</td>

		</tr>

		</table>';



	$TemplateMessage.="<br/><br />Hi ".$fname.",";

	$TemplateMessage.="<br>";

	$TemplateMessage.="<br>Welcome to Our Site";

	$TemplateMessage.="<br>Your Account is created successfully.";

   $TemplateMessage.="<br><br>";

   $TemplateMessage.="Your Email Address : ".$email;

$TemplateMessage.="<br>";

		$TemplateMessage.="Your Password : ".$password;

		$TemplateMessage.="<br><br>";

		$TemplateMessage.="Please <a href='http://www.nationalitsolution.in/team5/vacation/activate.php?id=".base64_encode($email)."'>Click Here</a> to activate your account";

		$TemplateMessage.="<br><br><br/>Thanks & Regards<br/>";

		$TemplateMessage.="Vacation Team";

		$TemplateMessage.="<br><br><br>This is a post-only mailing.  Replies to this message are not monitored

		or answered.";

		$mail1 = new PHPMailer;

		$mail1->FromName = "Vacation Team";

		$mail1->From    = "info@vacation.com";

		$mail1->Subject = $Subject1;



		$mail1->Body    = stripslashes($TemplateMessage);

		$mail1->AltBody = stripslashes($TemplateMessage);

		$mail1->IsHTML(true);

		$mail1->AddAddress($email,"vacation.com");//info@salaryleak.com

		$mail1->Send();
		
		}

        echo 'suc';

}





 if($_REQUEST['action']=='checkEmail')
{
$email = isset($_POST['email']) ? $_POST['email'] : '';
$count = mysql_num_rows(mysql_query("SELECT * FROM `vacation_user` WHERE `email`='".$email."'"));
echo $count;

}



 if($_REQUEST['action']=='saveAccessInfo')
{
	$api_id = isset($_POST['api_id']) ? $_POST['api_id'] : '';
	$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
	$transactiok_key = isset($_POST['transactiok_key']) ? $_POST['transactiok_key'] : '';
	$date=date('Y-m-d H:i:s');

	$fields = array(
		'api_id' => mysql_real_escape_string($api_id),
		'transactiok_key' => mysql_real_escape_string($transactiok_key));


		$fieldsList = array();
		foreach ($fields as $field => $value) {
		$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
		}

	 $editQuery = "UPDATE `vacation_user` SET " . implode(', ', $fieldsList)
          . " WHERE `id` = '" . mysql_real_escape_string($user_id) . "'";


	mysql_query($editQuery);	
	echo 'suc';	


	
		
}



 if($_REQUEST['action']=='saveBillingInfo')
{
	$creditcard_holder_fname = isset($_POST['creditcard_holder_fname']) ? $_POST['creditcard_holder_fname'] : '';
	$creditcard_holder_lname = isset($_POST['creditcard_holder_lname']) ? $_POST['creditcard_holder_lname'] : '';
	$creditcard_number = isset($_POST['creditcard_number']) ? $_POST['creditcard_number'] : '';
	$creditcard_exp = isset($_POST['creditcard_exp']) ? $_POST['creditcard_exp'] : '';
	$creditcard_cvv = isset($_POST['creditcard_cvv']) ? $_POST['creditcard_cvv'] : '';
	$creditcard_city = isset($_POST['creditcard_city']) ? $_POST['creditcard_city'] : '';
	$creditcard_state = isset($_POST['creditcard_state']) ? $_POST['creditcard_state'] : '';
	$creditcard_zip = isset($_POST['creditcard_zip']) ? $_POST['creditcard_zip'] : '';
	$creditcard_country = isset($_POST['creditcard_country']) ? $_POST['creditcard_country'] : '';
	$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
	$date=date('Y-m-d H:i:s');


	$fields = array(
		'creditcard_holder_fname' => mysql_real_escape_string($creditcard_holder_fname),
		'creditcard_holder_lname' => mysql_real_escape_string($creditcard_holder_lname),
		'creditcard_number' => mysql_real_escape_string($creditcard_number),
		'creditcard_exp' => mysql_real_escape_string($creditcard_exp),
		'creditcard_cvv' => mysql_real_escape_string($creditcard_cvv),
		'creditcard_city' => mysql_real_escape_string($creditcard_city),
		'creditcard_state' => mysql_real_escape_string($creditcard_state),
		'creditcard_zip' => mysql_real_escape_string($creditcard_zip),
		'creditcard_country' => mysql_real_escape_string($creditcard_country),
		'user_id' => mysql_real_escape_string($user_id));


		$fieldsList = array();
		foreach ($fields as $field => $value) {
		$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
		}
		
		
		$count = mysql_num_rows(mysql_query("SELECT * FROM `vacation_user_billinginfo` WHERE `user_id`='".$user_id."'"));
if($count==0){
 $Query = "INSERT INTO `vacation_user_billinginfo` (`" . implode('`,`', array_keys($fields)) . "`)"
			. " VALUES ('" . implode("','", array_values($fields)) . "')";
	mysql_query($Query);		
echo 'suc';
}
else{


	 $editQuery = "UPDATE `vacation_user_billinginfo` SET " . implode(', ', $fieldsList)
          . " WHERE `user_id` = '" . mysql_real_escape_string($user_id) . "'";


	mysql_query($editQuery);	
	echo 'suc';	
	
		
}



	
		
}




 if($_REQUEST['action']=='accountUpdate')
{
	$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
	$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$address = isset($_POST['address']) ? $_POST['address'] : '';
	$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
	$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
	$date=date('Y-m-d H:i:s');


	$fields = array(
		'fname' => mysql_real_escape_string($fname),
		'lname' => mysql_real_escape_string($lname),
		'email' => mysql_real_escape_string($email),
		'address' => mysql_real_escape_string($address),
		'phone' => mysql_real_escape_string($phone));


		$fieldsList = array();
		foreach ($fields as $field => $value) {
		$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
		}
		


	 $editQuery = "UPDATE `vacation_user` SET " . implode(', ', $fieldsList)
          . " WHERE `id` = '" . mysql_real_escape_string($user_id) . "'";

	mysql_query($editQuery);	
	echo 'suc';	



	
		
}

?>















