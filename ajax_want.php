<?php 
ob_start();
session_start();
include("administrator/includes/config.php");

$date=date("Y-m-d");
$want = mysql_num_rows(mysql_query("select * from `estejmam_wishlist` where `prop_id`='".$_REQUEST['propid']."' and `user_id`='".$_REQUEST['userid']."'"));
if($want==0)
{
$sql=mysql_query("insert into `estejmam_wishlist`(`id`,`user_id`,`prop_id`,`date`,`status`) values('','".$_REQUEST['userid']."','".$_REQUEST['propid']."','".$date."','1')");
echo "Added to Wishlist.";
}
else
{
echo "Allready in Wishlist.";
}
?>
