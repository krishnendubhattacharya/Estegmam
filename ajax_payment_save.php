<?php
ob_start();
session_start();
include('administrator/includes/config.php');
?>

<?php
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
	$cardnumber = isset($_POST['cardnumber']) ? $_POST['cardnumber'] : '';
        
	$exp_month = isset($_POST['exp_month']) ? $_POST['exp_month'] : '';
	$exp_year = isset($_POST['exp_year']) ? $_POST['exp_year'] : '';
	
	$cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';
	$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
        
	$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
	$post_code = isset($_POST['post_code']) ? $_POST['post_code'] : '';

	$country = isset($_POST['country']) ? $_POST['country'] : '';




	$fields = array(
		'user_id' => mysql_real_escape_string($user_id),
		'cardnumber' => mysql_real_escape_string($cardnumber),
        'exp_month' => mysql_real_escape_string($exp_month),
        'exp_year' => mysql_real_escape_string($exp_year),
		'cvv' => mysql_real_escape_string($cvv),
        'fname' => mysql_real_escape_string($fname),
		'lname' => mysql_real_escape_string($lname),
		'post_code' => mysql_real_escape_string($post_code),
		'country' => mysql_real_escape_string($country),
        );


		$fieldsList = array();
		foreach ($fields as $field => $value) {
		$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
        }

		$check=mysql_num_rows(mysql_query("select * from `estejmam_card_details` where `user_id`='".$user_id."'"));

		if($check==0)
	    {
			$addQuery = "INSERT INTO `estejmam_card_details` (`" . implode('`,`', array_keys($fields)) . "`)"
			. " VALUES ('" . implode("','", array_values($fields)) . "')";

                
		mysql_query($addQuery);

		$last_id=mysql_insert_id();
                
        echo "suc";
	    }
		else
	{

	 
	$editQuery = "UPDATE `estejmam_card_details` SET " . implode(', ', $fieldsList)
            . " WHERE `user_id` = '" . mysql_real_escape_string($_REQUEST['user_id']) . "'";

    mysql_query($editQuery);

	echo "suc";
    	
}
	
 
?>