<?php
ob_start();
session_start();
include('administrator/includes/config.php');
if($_REQUEST['action']=='checkemail')
{
$sql=mysql_query("select * from vacation_user where email='".$_REQUEST['email']."' ");
if(mysql_num_rows($sql)>0){
echo "0";
}else{
echo "1";	
}
}
?>
