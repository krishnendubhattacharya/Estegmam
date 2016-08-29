<?php 
error_reporting(0);
$link=mysql_connect("localhost","root","Host@123456") or die("Error in Connection. Check Server Configuration.");
mysql_select_db("estajmam",$link) or die("Database not Found. Please Create the Database.");

//$domain="http://homevacationclub.com/";
$settings = mysql_fetch_assoc(mysql_query("SELECT * FROM `estejmam_sitesettings` WHERE 1"));

//define('SITE_URL','http://homevacationclub.com/');
?>
