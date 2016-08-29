<?php
ob_start();
session_start();
include('administrator/includes/config.php');
include('class.phpmailer.php');
//$price=$_SESSION['grand'];
//$orderid=$_SESSION['id1'];



// read the post from PayPal system and add 'cmd'



$req = 'cmd=_notify-validate';

foreach ($_POST as $key => $value) 

	{

		$value = urlencode(stripslashes($value));

		$req .= "&$key=$value";

	}



// post back to PayPal system to validate



$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";

$header .= "Content-Type: application/x-www-form-urlencoded\r\n";

$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);





// assign posted variables to local variables



$item_name = $_POST['item_name'];

$business = $_POST['business'];

$item_number = $_POST['item_number'];

$payment_status = $_POST['payment_status'];

$mc_gross = $_POST['mc_gross'];

$payment_currency = $_POST['mc_currency'];

$txn_id = $_POST['txn_id'];

$receiver_email = $_POST['receiver_email'];

$receiver_id = $_POST['receiver_id'];

$quantity = $_POST['quantity'];

$num_cart_items = $_POST['num_cart_items'];

$payment_date = $_POST['payment_date'];

$first_name = $_POST['first_name'];

$last_name = $_POST['last_name'];

$payment_type = $_POST['payment_type'];

$payment_status = $_POST['payment_status'];

$payment_gross = $_POST['payment_gross'];

$payment_fee = $_POST['payment_fee'];

$settle_amount = $_POST['settle_amount'];

$memo = $_POST['memo'];

$payer_email = $_POST['payer_email'];

$txn_type = $_POST['txn_type'];

$payer_status = $_POST['payer_status'];

$address_street = $_POST['address_street'];

$address_city = $_POST['address_city'];

$address_state = $_POST['address_state'];

$address_zip = $_POST['address_zip'];

$address_country = $_POST['address_country'];

$address_status = $_POST['address_status'];

$item_number = $_POST['item_number'];

$tax = $_POST['tax'];

$option_name1 = $_POST['option_name1'];

$option_selection1 = $_POST['option_selection1'];

$option_name2 = $_POST['option_name2'];

$option_selection2 = $_POST['option_selection2'];

$for_auction = $_POST['for_auction'];

$invoice = $_POST['invoice'];

$custom = $_POST['custom'];

$notify_version = $_POST['notify_version'];

$verify_sign = $_POST['verify_sign'];

$payer_business_name = $_POST['payer_business_name'];

$payer_id =$_POST['payer_id'];

$mc_currency = $_POST['mc_currency'];

$mc_fee = $_POST['mc_fee'];

$exchange_rate = $_POST['exchange_rate'];

$settle_currency  = $_POST['settle_currency'];

$parent_txn_id  = $_POST['parent_txn_id'];

$payment_type=$_POST['payment_type'];

$pay_dt=date("Y-m-d");

$item=$_GET['item'];

//$custom=explode('|',$_REQUEST['custom']);





	if (!$fp) 

	 {

		// HTTP ERROR

	 } 

	else
	 {
		fputs ($fp, $header . $req);
		$res = fgets ($fp, 1024);
		if($_POST['payment_status']=="Completed")
                 {
			
                        $someWords=$_REQUEST['custom'];
                  
                   $Custom = explode("|", $someWords); 
                   
                  $pack_id=$Custom[0]; 
                  $prop_id=$Custom[1];
                  
       $check=mysql_fetch_array(mysql_query("select * from `vacation_packages` where `id`='".$pack_id."'"));
       
       if($check['is_featured']==1)
       {
           $is_featured=1;
       }
 else  {
           $is_featured=0;
       }
			
	 $date=date("Y-m-d");
 $propupdate=mysql_query("update `vacation_property` set `status`='0',`paid_on`='".$date."',`pack_id`='".$pack_id."',txn_id='".$_POST['txn_id']."',`is_featured`='".$is_featured."' where `id`='".$prop_id."'"); 
        
         
        $curdate=date("Y-m-d");
        $nxdate=365;
        $nxtdate=strtotime($curdate);
        $date = date('Y-m-d',strtotime("+".$nxdate." day", $nxtdate));

        $propupdate=mysql_query("update `vacation_property` set `status`='0',`start_date`='".$curdate."',`end_date`='".$date."',`is_featured`='".$is_featured."' where `id`='".$prop_id."'");  
    
//
//			$user_id=$custom[7];
//			$price=$custom[6];
//			$prop_id=$custom[5];
//			$customer_name=$custom[0];
//			$email_address=$custom[1];
//			$living_ciy=$custom[2];
//			$start_date=$custom[3];
//			$end_date=$custom[4];
//		
//		mysql_query("INSERT INTO `vacation_property_booking` (`user_id`, `prop_id`, `name`, `email`, `lived`, `start_date`, `end_date`, `amount_paid`, `booked_date`,`owner_id`) VALUES ('".$user_id."', '".$prop_id."', '".$customer_name."', '".$email_address."', '".$living_ciy."', '".$start_date."', '".$end_date."', '".$price."', '".$current_date."','".end($custom)."');");
//		
//	
//		$date1=strtotime($start_date);
//		$date2=strtotime($end_date);
//		$diff=($date2-$date1)/ (60 * 60 * 24);
//		
//		$datefunction=explode('-',$start_date);
//        for($i=0;$i<=$diff;$i++){
//		$date_for_book=date('Y-m-d', mktime(0, 0, 0, $datefunction[1], $datefunction[2] + $i, $datefunction[0]));
//		//echo '<br><br>';
//		
//		mysql_query("INSERT INTO `bookings` (`id_item`, `the_date`, `id_state`, `id_booking`) VALUES ('".$prop_id."', '".$date_for_book."', '1', '0')");
//		
//		}
//		
//		$Subject1 ="Booking Successful";
//		
//		$TemplateMessage.='<table width="20%" border="0" cellspacing="0" cellpadding="0">
//
//		<tr>
//
//		<td>
//
//		<img src="http://www.nationalitsolution.in/team5/vacation/images/logo.png" alt="" border="0" />
//
//		</td>
//
//		</tr>
//
//		</table>';
//
//
//
//
 $Subject1 ="Booking Successful";

	$TemplateMessage.="<br/><br />Hi ".$customer_name.",";

	$TemplateMessage.="<br>";

	$TemplateMessage.="<br>You have successfully booked the property ";

	$TemplateMessage.="<br>You have paid amount of $".$price;
	
	$TemplateMessage.="<br>your booking is from ".$start_date. ' To '.$end_date;

   $TemplateMessage.="<br><br>";

		$TemplateMessage.="<br><br><br/>Thanks & Regards<br/>";

		$TemplateMessage.="Vacation Team";

		$TemplateMessage.="<br><br><br>Your property waiting for approval , Publish shortly..";

		$mail1 = new PHPMailer;

		$mail1->FromName = "Vacation Team";

		$mail1->From    = "info@vacation.com";

		$mail1->Subject = $Subject1;



		$mail1->Body    = stripslashes($TemplateMessage);

		$mail1->AltBody = stripslashes($TemplateMessage);

		$mail1->IsHTML(true);

		$mail1->AddAddress($email_address,"vacation.com");//info@salaryleak.com

		$mail1->Send();




			}

	   else 

			{

				// send an email

				//mail("paypal@gatwickmeetandgreet.net", "VERIFIED DUPLICATED TRANSACTION", "Transaction Failed");

			}  

	 }

if (strcmp($res, "INVALID") == 0) 

	{

		// log for manual investigation

		//mail("paypal@gatwickmeetandgreet.net", "INVALID IPN", "Transaction Failed");

	}

fclose ($fp);



?>



