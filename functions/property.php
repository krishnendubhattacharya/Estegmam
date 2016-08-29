<?php
ob_start();
session_start();
include('../administrator/includes/config.php');
include('../class.phpmailer.php');


 if($_REQUEST['action']=='addtoFav')
{
	$property_id = isset($_POST['property_id']) ? $_POST['property_id'] : '';
	$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
	$date=date('Y-m-d H:i:s');

	$fields = array(
		'prop_id' => mysql_real_escape_string($property_id),
		'date' => mysql_real_escape_string($date),
		'user_id' => mysql_real_escape_string($user_id));


		$fieldsList = array();
		foreach ($fields as $field => $value) {
		$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
		}



$count = mysql_num_rows(mysql_query("SELECT * FROM `vacation_favourite_property` WHERE `user_id`='".$user_id."' AND `prop_id`='".$product_id."'"));
if($count==0){
echo $Query = "INSERT INTO `vacation_favourite_property` (`" . implode('`,`', array_keys($fields)) . "`)"
			. " VALUES ('" . implode("','", array_values($fields)) . "')";
	mysql_query($Query);	
	echo '1';	

}
else{
echo '2';	
		
}
	
		
}


 if($_REQUEST['action']=='saveReview')
{

	$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
	$prop_id = isset($_POST['prop_id']) ? $_POST['prop_id'] : '';
	$review_title = isset($_POST['review_title']) ? $_POST['review_title'] : '';
	$review_desc = isset($_POST['review_desc']) ? $_POST['review_desc'] : '';
	$email_address = isset($_POST['email_address']) ? $_POST['email_address'] : '';
	$arrival_date = isset($_POST['arrival_date']) ? $_POST['arrival_date'] : '';
	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$living_ciy = isset($_POST['living_ciy']) ? $_POST['living_ciy'] : '';
	$recomend = isset($_POST['recomend']) ? $_POST['recomend'] : '';
	
	$recomemded=implode(',',$recomend);
	
	$date=date('Y-m-d H:i:s');


	

	$fields = array(
		'user_id' => mysql_real_escape_string($user_id),
		'prop_id' => mysql_real_escape_string($prop_id),
		'review_title' => mysql_real_escape_string($review_title),
		'review_desc' => mysql_real_escape_string($review_desc),
		'email_address' => mysql_real_escape_string($email_address),
		'arrival_date' => mysql_real_escape_string($arrival_date),
		'name' => mysql_real_escape_string($name),
		'living_ciy' => mysql_real_escape_string($living_ciy),
		'recomemded' => mysql_real_escape_string($recomemded),
		'date' => mysql_real_escape_string($date));


		$fieldsList = array();
		foreach ($fields as $field => $value) {
			$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
		}


	 $addQuery = "INSERT INTO `vacation_property_review` (`" . implode('`,`', array_keys($fields)) . "`)"
			. " VALUES ('" . implode("','", array_values($fields)) . "')";

		mysql_query($addQuery);
        echo 'suc';

}




if($_REQUEST['action']=='deleteProperty')
{
$id = isset($_POST['id']) ? $_POST['id'] : '';

mysql_query("DELETE FROM `vacation_property` WHERE `id`='".$id."'");
echo 'suc';
}


if($_REQUEST['action']=='checkDateRange')
{
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';

        $date_for_book=array();

		$diff=(strtotime($end_date)-strtotime($start_date))/ (60 * 60 * 24);		
		$datefunction=explode('-',$_REQUEST['start_date']);
		
        for($i=0;$i<=$diff;$i++){
		$date_for_book[]="'".date('Y-m-d', mktime(0, 0, 0, $datefunction[1], $datefunction[2] + $i, $datefunction[0]))."'";
		}
		
		$totalDates=implode(',',$date_for_book);
	//	echo "SELECT * FROM bookings WHERE the_date IN ( ".$totalDates.")";
		
$exists=mysql_num_rows(mysql_query("SELECT * FROM bookings WHERE the_date IN ( ".$totalDates.") AND `id_item`='".$id."'"));
if($exists==0){
echo 'notexists';
}
else{
echo 'exists';
}

}



 if($_REQUEST['action']=='rateProperty')
{
	$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
	$prop_id = isset($_POST['prop_id']) ? $_POST['prop_id'] : '';
	$ip = isset($_POST['ip']) ? $_POST['ip'] : '';
	$score = isset($_POST['score']) ? $_POST['score'] : '';
	$date=date('Y-m-d H:i:s');


	$fields = array(
		'user_id' => mysql_real_escape_string($user_id),
		'prop_id' => mysql_real_escape_string($prop_id),
		'ip' => mysql_real_escape_string($ip),
		'score' => mysql_real_escape_string($score),
		'date' => mysql_real_escape_string($date));


		$fieldsList = array();
		foreach ($fields as $field => $value) {
			$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
		}


	 $addQuery = "INSERT INTO `vacation_property_rate` (`" . implode('`,`', array_keys($fields)) . "`)"
			. " VALUES ('" . implode("','", array_values($fields)) . "')";

		mysql_query($addQuery);
		
        //echo 'suc';


 $getRatingNum=mysql_num_rows(mysql_query("SELECT * FROM `vacation_property_rate` WHERE `prop_id`='".$_REQUEST['prop_id']."'"));
 $score=mysql_fetch_array(mysql_query("SELECT SUM(`score`) as total from `vacation_property_rate` WHERE `prop_id`='".$_REQUEST['prop_id']."'"));
 
 if($getRatingNum==0){
 $avgrating=0;
 }else{
/* echo $score['total'];
 echo '<br>';
 echo $getRatingNum; */
 
 echo $avgrating=floor($score['total']/$getRatingNum);

 }
 
 
 
}



?>















