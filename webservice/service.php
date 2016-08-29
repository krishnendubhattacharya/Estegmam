<?php 
/*
 * Estagemum
 * 
 * Copyright 2013 Avik Ghosh
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * Author      :  Avik Ghosh
 * E-mail      :  nits.avik@gmail.com
 * Created on  :  13th August 2013
 * Version     :  1.0
 * Project     :  WebService
 * Page        :  GetResults
 * Company     :  NITS  
 * Modified on :   
 * Modified by :   
 */
 
 
// Includes the class which have the all functions
ini_set('display_errors', '1');
include_once("database.class.php");
include_once("functions.class.php");

if(!isset($_REQUEST['action'])){
echo 'Function Is Missing.....';
exit;
}
else{
$function=$_REQUEST['action'];
// CALLING FUNCTION FROM HERE==========================
_call($function);

}
?>