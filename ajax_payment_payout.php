<?php
ob_start();
session_start();
include('administrator/includes/config.php');
?>

<?php
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
	$address = isset($_POST['address']) ? $_POST['address'] : '';
        
	$zone = isset($_POST['zone']) ? $_POST['zone'] : '';
	$city = isset($_POST['city']) ? $_POST['city'] : '';
	
	$state = isset($_POST['state']) ? $_POST['state'] : '';
	$zipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : '';

	$country = isset($_POST['country']) ? $_POST['country'] : '';
        
	



	$fields = array(
		'user_id' => mysql_real_escape_string($user_id),
		'address' => mysql_real_escape_string($address),
        'zone' => mysql_real_escape_string($zone),
        'city' => mysql_real_escape_string($city),
		'state' => mysql_real_escape_string($state),
        'zipcode' => mysql_real_escape_string($zipcode),
		'country' => mysql_real_escape_string($country),
        );


		$fieldsList = array();
		foreach ($fields as $field => $value) {
		$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
        }

		$check=mysql_num_rows(mysql_query("select * from `estejmam_payout` where `user_id`='".$user_id."'"));

		if($check==0)
	    {
			$addQuery = "INSERT INTO `estejmam_payout` (`" . implode('`,`', array_keys($fields)) . "`)"
			. " VALUES ('" . implode("','", array_values($fields)) . "')";

                
		mysql_query($addQuery);

		$last_id=mysql_insert_id();
                
        echo "suc";
	    }
		else
	{

	 
	$editQuery = "UPDATE `estejmam_payout` SET " . implode(', ', $fieldsList)
            . " WHERE `user_id` = '" . mysql_real_escape_string($_REQUEST['user_id']) . "'";

    mysql_query($editQuery);

	echo "suc";
    	
}
	
 
?>