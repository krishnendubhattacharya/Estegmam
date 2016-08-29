<?php
session_start();
include_once("includes/config.php");

include_once("includes/functions.php");

function thumbnail($image_path,$thumb_path,$image_name,$thumb_width) 
{ 
    $exp = explode('.',$image_name);
	if($exp[1]=='jpeg'){
    $src_img = imagecreatefromjpeg($image_path.$image_name);
	} else if($exp[1]=='jpg'){
	$src_img = imagecreatefromjpeg($image_path.$image_name);
	}else if($exp[1]=='gif'){
	$src_img = imagecreatefromgif($image_path.$image_name);
	}else if($exp[1]=='png'){
	$src_img = imagecreatefrompng($image_path.$image_name);
	}
    $origw=imagesx($src_img); 
    $origh=imagesy($src_img); 
    $new_w = $thumb_width; 
    $diff=$origw/$new_w; 
    $new_h=$new_w; 
    $dst_img = imagecreate($new_w,$new_h); 
    imagecopyresized($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 
 
    imagejpeg($dst_img, $thumb_path.$image_name); 
    return true; 
} 	

if (!empty($_FILES)) { 
	
		
		$pid = $_POST['id'];
		$targetPath = 'adv_video';
		$img_name=time().$_FILES['Filedata']['name'];
		$targetFile = rtrim($targetPath,'/') . '/' .$img_name;
		$tempPath =   THUMBS_PATH;
		$tempFile = $_FILES['Filedata']['tmp_name'];
		move_uploaded_file($tempFile,$targetFile);
		if($pid ==0)
		{
			$record=mysql_query("SELECT MAX(id) as MaximumID FROM `adventure_circle_adventurevideo`");
			$max_id=mysql_fetch_row($record);
			$max_id=$max_id[0]+1;
			mysql_query("DELETE `adventure_circle_adventurevideo` where adv_id=".$max_id);
			$adv_id=$max_id;
			$video_link=$img_name;
			$date_added=date('y-m-d h:i:s');
			mysql_query("INSERT INTO `adventure_circle_adventurevideo` 
			(user_id,adv_id,title,description,video_link,date_added)  
			VALUES ('0','$adv_id','','','$video_link','$date_added')"); 
		}
		else
		{
		    $adv_id=$pid;
			$video_link=$img_name;
			$date_added=date('y-m-d h:i:s');
			mysql_query("INSERT INTO `adventure_circle_adventurevideo` 
			(user_id,adv_id,title,description,video_link,date_added)  
			VALUES ('0','$adv_id','','','$video_link','$date_added')");
		}
	
}
?>