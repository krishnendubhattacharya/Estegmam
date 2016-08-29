<?php
ob_start();
session_start();
include('administrator/includes/config.php');
if($_SESSION['user_id']=='')
{
header("Location:login.php");	
}
if(isset($_REQUEST['want_to']) and $_REQUEST['want_to']!='')
{
$want_to=isset($_REQUEST['want_to'])?$_REQUEST['want_to']:'';
$property_booking=isset($_REQUEST['property_booking'])?$_REQUEST['property_booking']:'';
$property_type=isset($_REQUEST['property_type'])?$_REQUEST['property_type']:'';
$is_pg=isset($_REQUEST['is_pg'])?$_REQUEST['is_pg']:'';
$country=isset($_REQUEST['country'])?$_REQUEST['country']:'';
$state=isset($_REQUEST['state'])?$_REQUEST['state']:'';
$city=isset($_REQUEST['city'])?$_REQUEST['city']:'';
$street_address=isset($_REQUEST['street_address'])?$_REQUEST['street_address']:'';
$title=isset($_REQUEST['title'])?$_REQUEST['title']:'';
$zip=isset($_REQUEST['zip'])?$_REQUEST['zip']:'';
$address=isset($_REQUEST['address'])?$_REQUEST['address']:'';
$cat_id=  isset($_REQUEST['cat_id'])?$_REQUEST['cat_id']:'';

$fields = array(

		'want_to' => mysql_real_escape_string($want_to),
		'property_booking' => mysql_real_escape_string($property_booking),
		'property_type' => mysql_real_escape_string($property_type),
		'is_pg' => mysql_real_escape_string($is_pg),
		'country' => mysql_real_escape_string($country),
		'state' => mysql_real_escape_string($state),
		'city' => mysql_real_escape_string($city),
		'street_address' => mysql_real_escape_string($street_address),
		'title' => mysql_real_escape_string($title),
		'zip' => mysql_real_escape_string($zip),
		'address' => mysql_real_escape_string($address),
                'cat_id'=>  mysql_real_escape_string($cat_id)
		);

$fieldsList = array();
foreach ($fields as $field => $value) {
$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
}
if($_REQUEST['id']!='')

	  {		  

	  $editQuery = "UPDATE vacation_property SET " . implode(', ', $fieldsList)

			. " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";
	  mysql_query($editQuery);
	  $id=$_REQUEST['id'];
	  header("Location:step2.php?id=".$id);	  
	  }else{
	   echo $addQuery = "INSERT INTO vacation_property (`" . implode('`,`', array_keys($fields)) . "`)"

			. " VALUES ('" . implode("','", array_values($fields)) . "')";

			

			//exit;
		
		mysql_query($addQuery); 
		$id=mysql_insert_id();
		header("Location:step2.php?id=".$id);	  
	  
	  }
	  
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
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
showmap();	
});

function showmap()
{
zip='<?php echo $row['zip'];?>';
if(zip==''){
zip=$("#zip").val();

}
   var geocoder = new google.maps.Geocoder();
   var address=zip
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
					
					 var myLatlng = new google.maps.LatLng(latitude,longitude);
  var mapOptions = {
    zoom: 10,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('right-map'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });
                   
                } else {
                    //alert("Request failed.")
                }
            });
			
  
}

</script>
</head>
<body>
 <?php include('includes/header.php');?>     
    <section class="adproperty_sec">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                    <div class="top-steps">
                        <div class="steps act">
                        	<div class="round-number"><img src="images/one.png" alt=""></div>
                        	<?php
                                if($_REQUEST['id']!='')
                                {    
                                ?>
                                <a href="add_property.php?id=<?php echo $_REQUEST['id'];?>">Step One</a>
                                <?php }else{?>
                                Step One
                                <?php }?><br><span>Basic Details</span>
                        	<div class="right-act-ar"><img src="images/right-act-ar.png" alt=""></div>
                        </div>
                        <div class="steps ">
                         	<div class="round-number"><img src="images/two.png" alt=""></div>
                         	 <?php
                                if($_REQUEST['id']!='')
                                {    
                                ?>
                                <a href="step2.php?id=<?php echo $_REQUEST['id'];?>">Step Two</a>
                         	
                                <?php }else{ ?>
                                Step Two
                                <?php }?><br>
                           <span>Additional Details</span></div>
                       </div>
                </div>
            </div>            
            <div class="row">
            	<div class="left-section ad-search">
          <div class="heading">
            <h1>Basic Property Details <span>Start Posting Your Property and add Property Features</span></h1>
          </div>
          <form method="post">
            <div class="col-md-12">
              <div class="form-group"><label>* I want to</label><br>
                <label class="radio-inline">
                  <input name="want_to" id="inlineRadio1" value="Book" type="radio" <?php echo $row['want_to']=='Book'?'checked':'';?>>
                  Book </label>
                <label class="radio-inline">
                  <input name="want_to" id="inlineRadio2" value="Rent" type="radio" <?php echo $row['want_to']=='Rent'?'checked':'';?>>
                  Rent/Lease Out </label>
              </div>
            </div>
              <div class="col-md-12">
              <div class="form-group"><label>*Category</label><br>
                  <select name="cat_id" required="" class="form-control" style=" width:32%">
                      <option value="">Category</option> 
                      <?php
                      $sql_cat=mysql_query("select * from `vacation_category` where status='1'");
                      while($row_cat=  mysql_fetch_assoc($sql_cat))
                      {        
                      ?>
                      <option value="<?php echo $row_cat['id']?>" <?php echo $row['cat_id']==$row_cat['id']?'selected':''; ?>><?php echo $row_cat['name'];?></option>
                      <?php }?>
                      
                  </select>
  
              </div>
            </div>
              
            <div class="col-md-4">
              <div class="form-group"><label> * Type of Property</label>
<!--                                <input type="text" class="form-control" name="property_type" value="<?php echo $row['property_type'];?>" class="form-control">-->
<textarea class="form-control" rows="5" name="property_type" required><?php echo $row['property_type'];?></textarea>
                                
                                
                                
                <label class="checkbox-inline">
  <input id="inlineCheckbox1" value="1" type="checkbox" name="is_pg" <?php echo $row['is_pg']==1?'checked':'';?>>PG accommodation available
</label>
              </div>
            </div>
            
            <div class="col-md-8" style="min-height:95px;">
           <label> *  Property Booking:</label><br>
                <label class="radio-inline">
                  <input name="property_booking" id="inlineRadio1" value="Single" type="radio"<?php echo $row['property_booking']=='Single'?'checked':'';?> >
                   Single </label>
                
                <label class="radio-inline">
                  <input name="property_booking" id="inlineRadio2" value="Couple" type="radio" <?php echo $row['property_booking']=='Couple'?'checked':'';?> >
                   Couple</label>
                   <label class="radio-inline">
                  <input name="property_booking" id="inlineRadio2" value="Group" type="radio" <?php echo $row['property_booking']=='Group'?'checked':'';?>>
                   Group</label>
                <label class="radio-inline">
                  <input name="inlineRadioOptions" id="inlineRadio2" value="Power" type="radio" <?php echo $row['property_booking']=='Power'?'checked':'';?>>
                  Power of lorem ipsum</label>
            </div>
            
            <div class="clearfix"></div>
            <hr>
          
            
            <div class="col-md-4">
            <div class="form-group">
            <label>*Country</label>
            <input class="form-control" id="inputEmail3" placeholder="Country" type="text" required name="country" value="<?php echo $row['country'];?>">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group"><label> * State</label>
            <input class="form-control" id="inputEmail3" placeholder="State" type="text" required name="state" value="<?php echo $row['state'];?>">
                
              </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>* City</label>
            <input class="form-control" id="inputEmail3" placeholder="City" type="text" required name="city" value="<?php echo $row['city'];?>">
            </div>
            </div>
            
            <div class="col-md-4">
            <!--<div class="form-group"><label> * City</label>
                <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
                
              </div>-->
            <div class="form-group"><label> * Locality</label>
                <input class="form-control" id="inputEmail3" placeholder="Enter your address" type="text" name="street_address" value="<?php echo $row['street_address'];?>">
                
              </div>
            <div class="form-group"><label> * Society or Project Name:</label>
                <input class="form-control" id="inputEmail3" placeholder="Search your socity project" type="text" required name="title" value="<?php echo $row['title'];?>">                
              </div>
            <div class="form-group"><label>* ZIPcode:</label>
                <input class="form-control" id="zip" placeholder="Enter your zipcode" type="text" name="zip" required value="<?php echo $row['zip'];?>">
                
              </div>
            <div class="form-group"><label> Additional Address:</label>
            <textarea name="address" required class="form-control"><?php echo $row['address'];?></textarea>
                <p>Please provide complete address information
Providing complete &amp; accurate property address increases the visibility &amp; clicks during search</p>
                <a href="#">Learn More...</a>
                
                <div class="form-group">
                <button class="btn btn-success" type="button" onClick="showmap()">Make Property on Map</button>
                </div>
                
                
              </div>
            
             </div>
             
            <div class="col-md-8">
            <div class="right-map" id="right-map" style=" height:480px; width:100%">
            
            </div>
            </div>
            
           <div class="col-md-12">
           <div class="captcha">
           <button class="btn btn-success" type="submit" >Post Property</button>
           </div>
           </div>
            
          </form>
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
    

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jssor.slider.mini.js"></script>
<script type="text/javascript" src="js/jssor.js"></script>

</body>

</html>

