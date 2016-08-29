<?php
$hostname="localhost";
$dbname="team3nit_estejmam";
$username="team3nit_team3";
$password="Host123";

$link=mysql_connect($hostname,$username,$password) or die("Error in Connection. Check Server Configuration.");
mysql_select_db($dbname,$link) or die("Database not Found. Please Create the Database.");

define('AUTH_KEY','fcea920f7412b5da7be0cf42b8c93759');
define('SITE_URL','http://team3.nationalitsolution.co.in/estejmam/webservice');
define('SITE_URL1','http://team3.nationalitsolution.co.in/estejmam/');
?>
