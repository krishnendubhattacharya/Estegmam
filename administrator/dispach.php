<?php
ob_start();
include('includes/session.php');
include("class.phpmailer.php");

$orderid=isset($_REQUEST['orderid'])?$_REQUEST['orderid']:'';	
$_SESSION['orderid']=$orderid;
$sqlu=mysql_query("select * from shoppingcart_gun_tblorders where orderid='".$orderid."'");
$res=mysql_fetch_array($sqlu);

$dis="UPDATE `shoppingcart_gun_tblorders` SET `dispatch` = '1' WHERE `orderid` ='$orderid'";
$resdis=mysql_query($dis);

 $user_id=$res['order_user_id'];

$user=mysql_query("SELECT * FROM `shoppingcart_gun_billing` where billing_id='".$user_id."'");
$resuser=mysql_fetch_array($user);

$user_email=$resuser['email'];
$user_name=$resuser['billing_fname']." ".$resuser['billing_lname'];

$order=mysql_fetch_object(mysql_query("select * from shoppingcart_gun_tblorders where orderid='".$orderid."'"));
date_time_format($res['orderdate']);

 $Subject1 ="From www.endemicagenda.com : Your Order has been Dispatched  ";
					
$TemplateMessage="<br><br>Order Date :-<b>".date_time_format($res['orderdate'])."</b><br><br>";
$TemplateMessage.="Dear,".$user_name;
$TemplateMessage.="<br>";
$TemplateMessage.="<br>Your order placed with Endemicagenda has been shipped. 
Please contact us with any questions.<br><br>

Wishing you wellness, <br><br>

Admin<br>
Endemic Agenda Admin<br>";

			   		$mail1 = new PHPMailer;

					$mail1->FromName = $email;

					$mail1->From    = "info@floridagun.com";

					$mail1->Subject = $Subject1;

					$mail1->Body    = stripslashes($TemplateMessage);

					$mail1->AltBody = stripslashes($TemplateMessage);

					$mail1->IsHTML(true);

					$mail1->AddAddress($user_email,"info@floridagun.com");

				    $mail1->Send();
					 
				 header('Location: list_orderdetails1.php');

	
	?>