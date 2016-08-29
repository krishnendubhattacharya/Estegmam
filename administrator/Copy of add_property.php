<?php 
error_reporting(1);
include_once('includes/session.php');
include_once("includes/config.php");
include_once("includes/functions.php");
if(isset($_REQUEST['id']))
{
 $pid=$_REQUEST['id'];
}
else
{
 $pid=0;
}

if(isset($_REQUEST['submit']))
{
    $money_scale = isset($_POST['money_scale']) ? $_POST['money_scale'] : '';
	$price = isset($_POST['price']) ? $_POST['price'] : '';
	$cat_id = isset($_POST['cat_id']) ? $_POST['cat_id'] : '';
	$title = isset($_POST['title']) ? $_POST['title'] : '';
	$description = isset($_POST['description']) ? $_POST['description'] : '';
	$adv_date = isset($_POST['adv_date']) ? $_POST['adv_date'] : '';
	$location = isset($_POST['location']) ? $_POST['location'] : '';
	$city = isset($_POST['city']) ? $_POST['city'] : '';
	$state = isset($_POST['state']) ? $_POST['state'] : '';
	$zip = isset($_POST['zip']) ? $_POST['zip'] : '';
	$country = isset($_POST['country']) ? $_POST['country'] : '';
	$is_active = isset($_POST['is_active']) ? $_POST['is_active'] : '';
	$groupon = isset($_POST['groupon']) ? $_POST['groupon'] : '';
	$langlat=get_lat_log($location,$zip);
	$latitude=$langlat['latitude'];
	$longitude=$langlat['longitude'];



$cat_id_others=$_REQUEST['cat_id_others'];
   if(count($cat_id_others)>1){
   $cat_id_optional=implode(',',$_REQUEST['cat_id_others']);
   }
   else{
   $cat_id_optional=$_REQUEST['cat_id_others'];
   }



	$fields = array(

		'cat_id' => mysql_real_escape_string($cat_id),
		'title' => mysql_real_escape_string($title),
		'description' => mysql_real_escape_string($description),
		'adv_date' => mysql_real_escape_string($adv_date),
		'money_scale' => mysql_real_escape_string($money_scale),
        'price' => mysql_real_escape_string($price),
		'location' => mysql_real_escape_string($location),
		'city' => mysql_real_escape_string($city),
		'state' => mysql_real_escape_string($state),
		'zip' => mysql_real_escape_string($zip),
		'country' => mysql_real_escape_string($country),
		'groupon' => mysql_real_escape_string($groupon),
		'latitude' => mysql_real_escape_string($latitude),
		'longitude' => mysql_real_escape_string($longitude),
        'cat_id_optional' => mysql_real_escape_string($cat_id_optional),
		'is_active' => mysql_real_escape_string($is_active)
		);

		$fieldsList = array();

		foreach ($fields as $field => $value) {
			$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
		}



	 if($_REQUEST['action']=='edit')

	  {		  

	   $editQuery = "UPDATE `adventure_circle_adventure` SET " . implode(', ', $fieldsList)
			. " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

		$sql1="DELETE from `adventure_circle_adventurevideo` where adv_id=".$_REQUEST['id'];
		mysql_query($sql1);

		$sql="DELETE from `adventure_circle_adventureimage` where adv_id=".$_REQUEST['id'];
		mysql_query($sql); 


		

           foreach($_REQUEST['images'] as $inv_video)

		{
			$adv_id=$_REQUEST['id'];
			$video_link=basename($inv_video);

			$date_added=date('y-m-d h:i:s');
			mysql_query("INSERT INTO `adventure_circle_adventureimage` 
			(user_id,adv_id,title,description,image,date_added)  
			VALUES ('0','$adv_id','','','$video_link','$date_added')"); 



		}

		


		if (mysql_query($editQuery)) {
			$_SESSION['msg'] = "Category Updated Successfully";
		}
		else {
			$_SESSION['msg'] = "Error occuried while updating Category";

		}
		header('Location:list_adventure.php');
		exit();
	 }

	 else

	 {

	$addQuery = "INSERT INTO `adventure_circle_adventure` (`" . implode('`,`', array_keys($fields)) . "`)"

			. " VALUES ('" . implode("','", array_values($fields)) . "')";



	$record=mysql_query("SELECT MAX(id) as MaximumID FROM `adventure_circle_adventure`");

	$max_id=mysql_fetch_row($record);

	$max_id=$max_id[0]+1;		

    mysql_query("DELETE `adventure_circle_adventurevideo` where adv_id=".$max_id); 


		foreach($_REQUEST['images'] as $inv_video)
		{

			$adv_id=$max_id;
			$video_link=basename($inv_video);
			$date_added=date('y-m-d h:i:s');
			mysql_query("INSERT INTO `adventure_circle_adventureimage` 
			(user_id,adv_id,title,description,image,date_added)  
			VALUES ('0','$adv_id','','','$video_link','$date_added')"); 
		}



		if (mysql_query($addQuery)) {

			$_SESSION['msg'] = "Category Added Successfully";

		}

		else {

			$_SESSION['msg'] = "Error occuried while adding Category";

		}
		header('Location:list_adventure.php');
		exit();
	 }

}


if($_REQUEST['action']=='edit')
{
$categoryRowset = mysql_fetch_array(mysql_query("SELECT * FROM `adventure_circle_adventure` WHERE `id`='".mysql_real_escape_string($_REQUEST['id'])."'"));
}



/*print_r($categoryRowset_video);*/



?>
<!DOCTYPE html>
<html>
<head>
<title>Add Adventure</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
<link href="assets/styles.css" rel="stylesheet" media="screen">
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>







            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>







        <![endif]-->
<script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder_v1.js"></script>
<link rel="stylesheet" type="text/css" href="css/uploadify.css">
</head>
<body>
<?php include('includes/header.php');?>
<div class="container-fluid">
<div class="row-fluid">
<?php include('includes/left_panel.php');?>
<div class="span9" id="content">
<div class="row-fluid">
<div class="block">
<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><?php echo $_REQUEST['action']=='edit'?"Edit":"Add";?> Adventure</div>
</div>
<div class="block-content collapse in">
<div class="span12">
<form class="form-horizontal" method="post" action="add_adventure.php">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
<input type="hidden" name="action" value="<?php echo $_REQUEST['action'];?>" />
<fieldset>
<legend><?php echo $_REQUEST['action']=='edit'?"Edit":"Add";?> Adventure</legend>
<div class="control-group">
<label class="control-label" for="focusedInput">Adventure Title</label>
<div class="controls">
<input name="title" class="input-xlarge focused" required  id="focusedInput" type="text" value="<?php echo stripslashes($categoryRowset['title']);?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput">Add Category</label>
<div class="controls">
<select id="cat_id" name="cat_id" required>
<option value="">Select One</option>
<?php 

                                            $SQL ="SELECT * FROM `adventure_circle_category`";

                                            $result = mysql_query($SQL);                                         

                                            while($row1=mysql_fetch_array($result))

                                            { 

                                            ?>
<option value="<?php echo $row1['id']; ?>" <?php if($categoryRowset['cat_id']==$row1['id']) { echo "selected";}?> > <?php echo $row1['name']; ?></option>
<?php

                                            }

                                            ?>
</select>
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput">Tagged Category</label>
<div class="controls">
<select id="cat_id_others" name="cat_id_others[]" multiple size="5">
<option value="">Select One</option>
<?php 

											 $cat_id_optional=explode(',',$categoryRowset['cat_id_optional']);

                                            $SQL ="SELECT * FROM `adventure_circle_category` WHERE `id`<>'".$categoryRowset['cat_id']."'"; 

                                            $result = mysql_query($SQL);                                         

                                            while($row1=mysql_fetch_array($result))

                                            { 

                                            ?>
<option value="<?php echo $row1['id']; ?>"  <?php if(in_array($row1['id'], $cat_id_optional)) { echo "selected";}?>> <?php echo $row1['name']; ?></option>
<?php

                                            }

                                            ?>
</select>
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput">Description</label>
<div class="controls">
<textarea id="editor1" name="description" cols="79" rows="15"><?php echo stripslashes($categoryRowset['description']); ?></textarea>
</div>
</div>
<div class="control-group" style="display:none;">
<label class="control-label" for="focusedInput">Tour Date</label>
<div class="controls">
<input name="adv_date" class="input-xlarge focused datepicker" required  id="focusedInput" type="text" value="<?php echo $categoryRowset['adv_date'];?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput">Money Scale</label>
<div class="controls">
<select id="money_scale" name="money_scale">
<option value="">Select One</option>
<option value="$" <?php if($categoryRowset['money_scale']=='$') { echo "selected";}?>>$</option>
<option value="$$" <?php if($categoryRowset['money_scale']=='$$') { echo "selected";}?>>$$</option>
<option value="$$$" <?php if($categoryRowset['money_scale']=='$$$') { echo "selected";}?>>$$$</option>
<option value="$$$$" <?php if($categoryRowset['money_scale']=='$$$$') { echo "selected";}?>>$$$$</option>
<option value="$$$$$" <?php if($categoryRowset['money_scale']=='$$$$$') { echo "selected";}?>>$$$$$</option>
</select>
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput">Adventure Cost($)</label>
<div class="controls">
<input name="price" class="input-xlarge focused" required  id="focusedInput" type="text" value="<?php echo $categoryRowset['price'];?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput">Address</label>
<div class="controls">
<input name="location" class="input-xlarge focused" required  id="focusedInput" type="text" value="<?php echo $categoryRowset['location'];?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput">City</label>
<div class="controls">
<input name="city" class="input-xlarge focused" required  id="focusedInput" type="text" value="<?php echo $categoryRowset['city'];?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput">State</label>
<div class="controls">
<input name="state" class="input-xlarge focused" required  id="focusedInput" type="text" value="<?php echo $categoryRowset['state'];?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput">Zip</label>
<div class="controls">
<input name="zip" class="input-xlarge focused" required  id="focusedInput" type="text" value="<?php echo $categoryRowset['zip'];?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput">Country</label>
<div class="controls">
<select name="country" id="country">
<option value="">Select One</option>
<?php 

                                        $SQL ="SELECT * FROM `adventure_circle_countries`";                                     

                                        $result = mysql_query($SQL);

                                        while($row1=mysql_fetch_array($result))

                                        { 

                                        ?>
<option value="<?php echo $row1['id']; ?>" <?php if($categoryRowset['country']==$row1['id']) { echo "selected";}?> > <?php echo $row1['name']; ?></option>
<?php

                                        }

                                        ?>
</select>
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput">Groupon or Coupon</label>
<div class="controls">
<input name="groupon" class="input-xlarge focused"  id="focusedInput" type="text" value="<?php echo $categoryRowset['groupon'];?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput">Video Link</label>
<div id="tab1">
<?php if(isset($_GET['id'])) 



                                    {



                                    $c=0;



									$Exe_qry=mysql_query("SELECT * FROM `adventure_circle_adventurevideo` WHERE `adv_id`='".mysql_real_escape_string($_REQUEST['id'])."'");



									while($row_vid=mysql_fetch_object($Exe_qry))



                                    {



                                    if($c==0)



									{



									?>
<div class="controls" >
<input name="video[]" class="input-xlarge focused"  id="focusedInput" type="text" value="<?=$row_vid->video_link?>">
<a href="javascript:void(0)" id="new_lang1">+Add More</a> </div>
<?php } else { ?>
<div id="new">
<div class="controls" style="float: left;margin-top: 5px;width: 292px;">
<input name="video[]" class="input-xlarge focused"  id="focusedInput" type="text" value="<?=$row_vid->video_link?>">
</div>
<image src="images/erase.png" alt="erase" class="erase" style="float: left;margin-top: 14px; vertical-align: middle;">
</div>
<?php } ?>
<?php $c++;



									}



									} else { ?>
<div class="controls">
<input name="video[]" class="input-xlarge focused"  id="focusedInput" type="text" value="">
<a href="javascript:void(0)" id="new_lang1">+Add More</a> </div>
<?php } ?>
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput">Image</label>
<div class="controls">
<input id="file_upload" name="file_upload" type="file" multiple="true">
</div>
<div id="content1">
<?php







                        $res22=mysql_query("SELECT * FROM `adventure_circle_adventureimage` WHERE `adv_id`='".$_REQUEST['id']."'");







                        $tot=mysql_num_rows($res22);

						

						







						if($tot>0){







                        while($row22=mysql_fetch_array($res22)){



                          ?>
<div style="float:left;width:70px;border:0px solid red;position:relative;" class="div_div">
<input type="hidden" value="<?php echo $row22['image'];?>" class="video_hid" name="images[]">
<img border="0" src="../adv_img/<?php echo $row22['image'];?>" style="height:50px;width:50px;"><a class="del_this" id="<?php echo $row22['id'];?>" href="javascript: void(0)"><img border="0" src="images/erase.png"></a></div>
<?php 



						  



						  } 



						  }



                        ?>
</div>
</div>
<div class="form-actions">
<button type="submit" class="btn btn-primary"  name="submit">Save changes</button>
<button type="reset" class="btn">Cancel</button>
</div>
</fieldset>
</form>
</div>
</div>
</div>
<!-- /block -->
</div>
</div>
</div>
<hr>
<?php include('includes/footer.php');?>
</div>
<!--/.fluid-container-->
<link href="vendors/datepicker.css" rel="stylesheet" media="screen">
<link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
<link href="vendors/chosen.min.css" rel="stylesheet" media="screen">
<link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">
<script src="vendors/jquery-1.9.1.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/jquery.uniform.min.js"></script>
<script src="vendors/chosen.jquery.min.js"></script>
<script src="vendors/bootstrap-datepicker.js"></script>
<script src="vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="vendors/wysiwyg/bootstrap-wysihtml5.js"></script>
<script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
<script src="assets/scripts.js"></script>
<script>







        $(function() {







		$('#new_lang1').click(function(event){







				var newRow1 ='<div id="new"><div class="controls" style="float: left;margin-top: 5px;width: 292px;"><input name="video[]" class="input-xlarge focused"  id="focusedInput" type="text" value=""></div><image src="images/erase.png" alt="erase" class="erase" style="float: left;margin-top: 14px; vertical-align: middle;"></div>';







				$(newRow1).appendTo('#tab1');







           







			$('.erase').click(function(event){







			 $(this).closest('#new').remove();  







			});







			







			







			});







			







			







		    $('.erase').click(function(event){







			 $(this).closest('#new').remove();  







			});







            $(".datepicker").datepicker();







            $(".uniform_on").uniform();







            $(".chzn-select").chosen();







            $('.textarea').wysihtml5();















            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {







                var $total = navigation.find('li').length;







                var $current = index+1;







                var $percent = ($current/$total) * 100;







                $('#rootwizard').find('.bar').css({width:$percent+'%'});







                // If it's the last tab then hide the last button and show the finish instead







                if($current >= $total) {







                    $('#rootwizard').find('.pager .next').hide();







                    $('#rootwizard').find('.pager .finish').show();







                    $('#rootwizard').find('.pager .finish').removeClass('disabled');







                } else {







                    $('#rootwizard').find('.pager .next').show();







                    $('#rootwizard').find('.pager .finish').hide();








                }







            }});







            $('#rootwizard .finish').click(function() {







                alert('Finished!, Starting over!');







                $('#rootwizard').find("a[href*='tab1']").trigger('click');







            });







        });







        </script>
<script type="text/javascript">







/* var editor = CKEDITOR.replace( 'editor1' );







 CKFinder.setupCKEditor( editor, 'ckfinder/' );*/







 







  CKEDITOR.replace( 'editor1',







 {







 	//filebrowserBrowseUrl : './ckfinder/ckfinder.html',







 	//filebrowserImageBrowseUrl : './ckfinder/ckfinder.html?type=Images',







 	filebrowserFlashBrowseUrl : './ckfinder/ckfinder.html?type=Flash',







 	filebrowserUploadUrl : './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',







 	filebrowserImageUploadUrl : './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',







 	filebrowserFlashUploadUrl : './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'







 } 







 );







 







</script>
<script type="text/javascript">







		<?php $timestamp = time();?>







		$(function() {



   



  $('#cat_id').change(function(event){

			 var str = $(this).val();



            $.ajax({

                type: "post",

                url: "../functions/customcategory.php?action=getOther",

                data: 'cur_id='+str,

                success: function(msg) { 

				$('#cat_id_others').html(msg);

				

                }

            });



			});			



			



			$('#file_upload').uploadify({



				'swf'         : 'uploadify.swf',



				'uploader'    : 'uploadify.php',



				'fileTypeExts' : '*.jpg; *.png; *.jpeg; *.JPG; *.PNG; *.JPEG', 



				'checkScript' : 'check-exists.php',



				'cancelImg'   : 'uploadify-cancel.png',



				'buttonText'  : 'Add Images',



				'displayData' : 'percentage',



				'formData'    : {'id':<?php echo $pid; ?>},



				'onUploadSuccess' : function(file, data, response) {



				//alert('The file ' + file.name + ' was successfully uploaded');



				 //$('#content').html('<img src="uploads/thumbs/'+file.name+'">');



				



				$('#content1').append('<div class="div_div" style="float:left;width:70px;border:0px solid red;position:relative;"><input type="hidden" name="images[]" class="video_hid" value="'+ data +'"><img border="0" style="height:50px;width:50px;" src=" ' +data+ '" /><a href="javascript: void(0)" id="" class="del_this"><img border="0" src="images/erase.png"  border="0"/></a></div>');



				



					$('.del_this').click(function(event){



					



					$(this).closest('.div_div').remove();  



					



					});



				



				//$('#imageData').val(file.name);



				//getFileLists(file.name,file.size);



				//viewFirst();



				},



				'onUploadError' : function(file, errorCode, errorMsg, errorString) {



				alert('The file ' + file.name + ' could not be uploaded: ' + errorString);



				}



				



				// Put your options here



			});



			



			



			$('#file_upload1').uploadify({



				'swf'         : 'uploadify.swf',



				'uploader'    : 'uploadify1.php',



				'fileTypeExts' : '*.mp4; *.flv; *.avi;', 



				'checkScript' : 'check-exists.php',



				'cancelImg'   : 'uploadify-cancel.png',



				'buttonText'  : 'Upload Video',
				'displayData' : 'percentage',
				'formData'    : {'id':<?php echo $pid; ?>},

				'onUploadSuccess' : function(file, data, response) {
				},
				'onUploadError' : function(file, errorCode, errorMsg, errorString) {

				alert('The file ' + file.name + ' could not be uploaded: ' + errorString);

				}

				// Put your options here



			});

		});


	</script>
</body>
</html>
