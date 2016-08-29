<?php
ob_start();
session_start();
include('administrator/includes/config.php');
if($_SESSION['user_id']=='')
{
header("Location:login.php");	
}
if(isset($_REQUEST['price']) and $_REQUEST['price']!='')
{
$bedrooms=isset($_REQUEST['bedrooms'])?$_REQUEST['bedrooms']:'';
$bathrooms=isset($_REQUEST['bathrooms'])?$_REQUEST['bathrooms']:'';
$balconies=isset($_REQUEST['balconies'])?$_REQUEST['balconies']:'';
$transaction_type=isset($_REQUEST['transaction_type'])?$_REQUEST['transaction_type']:'';
$possession_status=isset($_REQUEST['possession_status'])?$_REQUEST['possession_status']:'';
$available_form=isset($_REQUEST['available_form'])?$_REQUEST['available_form']:'';
$description=isset($_REQUEST['description'])?$_REQUEST['description']:'';
$landmark=isset($_REQUEST['landmark'])?$_REQUEST['landmark']:'';
$price=isset($_REQUEST['price'])?$_REQUEST['price']:'';
$accomodation_type=  isset($_REQUEST['accomodation_type'])?$_REQUEST['accomodation_type']:'';
$is_corner=isset($_REQUEST['is_corner'])?$_REQUEST['is_corner']:'';
$is_featured=isset($_REQUEST['is_featured'])?$_REQUEST['is_featured']:'';
$is_toprated=isset($_REQUEST['is_toprated'])?$_REQUEST['is_toprated']:'';
$is_newest=isset($_REQUEST['is_newest'])?$_REQUEST['is_newest']:'';
$owner_info=  isset($_REQUEST['owner_info'])?$_REQUEST['owner_info']:'';
$fields = array(

		'bedrooms' => mysql_real_escape_string($bedrooms),
		'bathrooms' => mysql_real_escape_string($bathrooms),
		'balconies' => mysql_real_escape_string($balconies),
		'transaction_type' => mysql_real_escape_string($transaction_type),
		'possession_status' => mysql_real_escape_string($possession_status),
		'available_form' => mysql_real_escape_string($available_form),
		'description' => mysql_real_escape_string($description),
		'landmark' => mysql_real_escape_string($landmark),
		'price' => mysql_real_escape_string($price),
		'is_corner' => mysql_real_escape_string($is_corner),
		'is_featured' => mysql_real_escape_string($is_featured),
		'is_toprated' => mysql_real_escape_string($is_toprated),
		'is_newest' => mysql_real_escape_string($is_newest),
		'accomodation_type' => mysql_real_escape_string($accomodation_type),
                'owner_info'=>mysql_real_escape_string($owner_info)

		);

$fieldsList = array();
foreach ($fields as $field => $value) {
$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
}
	   $editQuery = "UPDATE vacation_property SET " . implode(', ', $fieldsList)

			. " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";
          
	  mysql_query($editQuery);
	  mysql_query("delete from `vacation_image` where `adv_id`='".$_REQUEST['id']."'");
	   foreach($_REQUEST['images'] as $inv_video)

		{
			$adv_id=$_REQUEST['id'];
			$video_link=$inv_video;
			$date_added=date('y-m-d h:i:s');
			mysql_query("INSERT INTO `vacation_image` 
			(user_id,adv_id,title,description,image,date_added)  
			VALUES ('0','$adv_id','','','$video_link','$date_added')"); 



		}

header("Location:dashboard.php");
}
$row=mysql_fetch_assoc(mysql_query("select * from vacation_property where id='".$_REQUEST['id']."'"));
?>
<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Home Vacation</title>



<link href="css/style.css" type="text/css" rel="stylesheet" media="all">

<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
<link href="css/font-awesome.css" type="text/css" rel="stylesheet" media="all">

<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="css/carosel_bootstrap.css">



<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
<script src="js/jquery-1.11.1.js"></script>
<script src="js/jquery.bxslider.js"></script>
<script src="js/jquery_002.js"></script>

<script type="text/javascript">
$(document).ready(function(){ 
	$('.bxslider').bxSlider({
	  minSlides: 1,
	  maxSlides: 1,
	  slideWidth: 360,
	  slideMargin: 10
	});
});
</script>
<script type="text/javascript">
$(document).ready(function(){ 
	$('.bxslider_location').bxSlider({
	  minSlides: 1,
	  maxSlides: 1,
	  slideWidth: 360,
	  slideMargin: 10
	});
});
</script>

</head>
<body>
<?php include('includes/header.php');?>
    <section class="adproperty_sec">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                    <div class="top-steps">
                        <div class="steps ">
                        	<div class="round-number"><img src="images/one.png" alt=""></div>
                                 <?php
                                if($_REQUEST['id']!='')
                                {    
                                ?>
                                <a href="add_property.php?id=<?php echo $_REQUEST['id'];?>">Step One</a>
                                <?php }else{?>
                                Step One
                                <?php }?>
                                
                                <br><span>Basic Details</span>
                        	<div class="right-act-ar"><img src="images/right-act-ar.png" alt=""></div>
                        </div>
                        <div class="steps act">
                         	<div class="round-number"><img src="images/two.png" alt=""></div>
                                <?php
                                if($_REQUEST['id']!='')
                                {    
                                ?>
                                <a href="step2.php?id=<?php echo $_REQUEST['id'];?>">Step Two</a>
                         	
                                <?php }else{ ?>
                                Step Two
                                <?php }?>
                                <br>
                           <span>Additional Details</span></div>
                       </div>
                </div>
            </div>
            <div class="row">
            	<div class="col-sm-8">
                	<div class="left-section ad-search">
                        <div class="heading">
                    <h1>Basic Property Details <span>Start Posting Your Property and add Property Features</span></h1>
                  </div>
                        <form method="post">
                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
                        <div class="col-md-12"><h3>Property Features</h3></div>
                        <div class="col-md-12">
                         <div class="col-md-3">
                        <div class="form-group"><label>Bedrooms</label>
                       <input class="form-control" id="inputEmail3" placeholder="Bedrooms" type="text" required name="bedrooms" value="<?php echo $row['bedrooms'];?>">
   
                            
                          </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group"><label>Bathrooms</label>
                       <input class="form-control" id="inputEmail3" placeholder="Balconies" type="text" required name="bathrooms" value="<?php echo $row['bathrooms'];?>">

                            
                          </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group"><label>Balconies</label>
                      <input class="form-control" id="inputEmail3" placeholder="Balconies" type="text" required name="balconies" value="<?php echo $row['balconies'];?>">
   
                            
                          </div>
                        </div>
                        </div>
                        <div class="divider"></div>
                        <div class="col-md-12"><h3>Transaction Type, Property Availability</h3></div>
                        <div class="col-md-12">
                        <div class="col-md-12">
                        <div class="form-group">
                        <label>Transaction Type</label><br>
                        
                        <label class="radio-inline">
                       
              <input name="transaction_type" id="inlineRadio1" value="New" type="radio" <?php echo $row['transaction_type']=='New'?'checked':'';?>> New Property
            </label>
                        <label class="radio-inline">
              <input name="transaction_type" id="inlineRadio2" value="Resale" type="radio" <?php echo $row['transaction_type']=='Resale'?'checked':'';?>> Resale
            </label>      
                        
                        </div>
                        </div>
                        
                        <div class="col-md-12">
                        <div class="form-group">
                        <label>Possession Status</label><br>
                        
                        <label class="radio-inline">
                       
              <input name="possession_status" id="inlineRadio1" value="U" type="radio" <?php echo $row['possession_status']=='U'?'checked':'';?>> Under Construction
            </label>
                        <label class="radio-inline">
              <input name="possession_status" id="inlineRadio2" value="R" type="radio" <?php echo $row['possession_status']=='R'?'checked':'';?>>Ready To Move
            </label>      
                        
                        </div>
                        </div>
                        
                        <div class="col-md-3">
                        <div class="form-group"><label>Available From</label>          
                        <select class="form-control" name="available_form" required>
                              <option selected="">Select</option>
                              <option value="Month" <?php echo $row['available_form']=='Month'?'selected':''?>>Month</option>
                              <option value="Year" <?php echo $row['available_form']=='Year'?'selected':''?>>Year</option>
                             
                            </select>
                            
                          </div>
                        </div>
                         </div> 
                        <div class="divider"></div>
                        <div class="col-md-12"><h3>Description &amp; Landmarks</h3></div>
                        <div class="col-md-12">
                      <div class="col-md-8">
                       <div class="form-group">
                       <label>Interesting Property details</label>
                       <textarea class="form-control" rows="5" name="description" required><?php echo $row['description'];?></textarea>
                       <p class="small">Write an interesting and detailed property description of min 100 characters. <a href="#">See Example</a></p>
                       </div>
                       </div>
                      <div class="col-md-8">
                       <div class="form-group">
                       <label>Modation Type</label>
                       <textarea class="form-control" rows="5" name="accomodation_type" required><?php echo $row['accomodation_type'];?></textarea>
                       </div>
                       </div>
                       <div class="col-md-8">
                       <div class="form-group">
                       <label>Owner Info</label>
                       <textarea class="form-control" rows="5" name="owner_info" required><?php echo $row['owner_info'];?></textarea>
                       </div>
                       </div>
                       <div class="col-md-6">
                       <div class="form-group">
                       <label>Landmarks &amp;&nbsp;Neighbourhood</label>
                       <input class="form-control" placeholder="Landmarks &amp;&nbsp;Neighbourhood" type="text" name="landmark" value="<?php echo $row['landmark'];?>" required>
                       </div>
                       </div>
                      <div class="col-md-6">
                       <div class="form-group">
                       <label>Price</label>
                       <input class="form-control" placeholder="Price" type="text" name="price" value="<?php echo $row['price'];?>" required>
                       </div>
                       </div>
                       </div>   
                        <div class="divider"></div>
                        <div class="col-md-12">
                       <div class="form-group">
                       <label class="checkbox-inline">
              <input id="inlineCheckbox1" value="1" type="checkbox" name="is_corner" <?php echo $row['is_corner']==1?'checked':'';?>>Is your property a corner property
            </label>
                       </div>
                       </div>
                       <div class="col-md-12">
                       <div class="form-group">
                       <label class="checkbox-inline">
              <input id="inlineCheckbox1" value="1" type="checkbox" name="is_featured" <?php echo $row['is_featured']==1?'checked':'';?>>Is Featured homes
            </label>
                       </div>
                       </div>
                       <div class="col-md-12">
                       <div class="form-group">
                       <label class="checkbox-inline">
              <input id="inlineCheckbox1" value="1" type="checkbox" name="is_toprated" <?php echo $row['is_toprated']==1?'checked':'';?>>Is Best Rated Homes
            </label>
                       </div>
                       </div>
                       <div class="col-md-12">
                       <div class="form-group">
                       <label class="checkbox-inline">
              <input id="inlineCheckbox1" value="1" type="checkbox" name="is_newest" <?php echo $row['is_newest']==1?'checked':'';?>>Is Newest Homes
            </label>
                       </div>
                       </div>
                       <div class="col-md-6">
                       <div class="form-group">
                       <label>Image</label>
                       <input type="file" id="file_upload">
                       </div>
                       </div>
                       <?php
        				
					   ?>
                       
                       <div class="col-md-12">
                       <div class="form-group">
                       <label class="checkbox-inline">
                       <ul id="content1">
                       	<?php
						$id=1;
						$res22=mysql_query("SELECT * FROM `vacation_image` WHERE `adv_id`='".$_REQUEST['id']."'");
						if(mysql_num_rows($res22)>0)
						{
						while($row=mysql_fetch_assoc($res22))
						{
						?>
                        <li class="div_div">
                        <div class="thumb_image">
                        <img border="0" src="upload/property/<?php echo $row['image'];?>" style="height:50px;width:50px;">

                        </div>
                        <div class="erase">
                        <a class="del_this" id="erase_<?php echo $row['id'];?>" href="javascript: void(0)">
                        <img border="0" src="administrator/images/erase.png"></a></div>
                        <input type="hidden" value="<?php echo $row['image'];?>" class="video_hid" name="images[]">
	
                        </li>
                        <?php }} ?>
                       </ul>
            		   </label>
                       </div>
                       </div>
                        <div class="col-md-12">
                       <input class="btn btn-primary" value="Submit" type="submit">
                       </div>
          			</form> 
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="left-section">
                      <div class="right-ad">
                      <img src="images/5.jpg" alt="">
                      </div>
                      <div class="right-ad">
                      <img src="images/ad6.jpg" alt="">
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
	
    <section class="secondbg">
          <div class="container secondbg_box">
          <div class="home_gal_lft home_gal_lft_location">
         <?php include('includes/category_listing.php');?>  
          </div> 
           <div class="home_gal_rht home_gal_rht_locaton">
          <?php
          $content=mysql_fetch_assoc(mysql_query("select * from `vacation_cms` where id='14'"));
          echo stripslashes($content['pagedetail']);
          ?>
           <div class="homegallery_boxes location">
            <?php include('includes/slider_product.php');?>                  
            <div class="clearfix"></div>
           

          </div>    


          <div class="clearfix"></div>

          </div>
    

          <div class="clearfix"></div>

          </div>

           </section>
    <?php include('includes/footer.php');?>

<link rel="stylesheet" type="text/css" href="uploadify.css">
<script src="jquery.uploadify.min.js" type="text/javascript"></script>

<script type="text/javascript">
		<?php $timestamp = time();?>

		$(function() {


			$('#file_upload').uploadify({
				'swf'         : 'uploadify.swf',				
				'uploader'    : 'uploadify.php',
				'fileTypeExts' : '*.jpg; *.png; *.jpeg; *.JPG; *.PNG; *.JPEG', 
				'checkScript' : 'check-exists.php',
				'cancelImg'   : 'uploadify-cancel.png',
				'buttonText'  : 'Add Images',
				'displayData' : 'percentage',
				'formData'    : {'id':<?php echo $_REQUEST['id']; ?>},
				'onUploadSuccess' : function(file, data, response) {
				$('#content1').append('<li class="div_div"><div class="thumb_image"><img border="0" src="upload/property/'+data+'" style="height:50px;width:50px;"></div><div class="erase"><a class="del_this" id="" href="javascript: void(0)"><img border="0" src="administrator/images/erase.png"></a></div><input type="hidden" value="'+data+'" class="video_hid" name="images[]"></li>');
					$('.del_this').click(function(event){
					$(this).closest('.div_div').remove();  

					});

				},

				'onUploadError' : function(file, errorCode, errorMsg, errorString) {

				alert('The file ' + file.name + ' could not be uploaded: ' + errorString);



				}

			});


$('.del_this').click(function(event){
					$(this).closest('.div_div').remove();  


					});

		});


	</script>


<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jssor.slider.mini.js"></script>
<script type="text/javascript" src="js/jssor.js"></script>

</body>

</html>

