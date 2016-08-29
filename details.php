<?php
ob_start();
session_start();
include('administrator/includes/config.php');
$row=  mysql_fetch_assoc(mysql_query("SELECT * FROM `vacation_property` WHERE id='".$_REQUEST['id']."'"));
$cover_image=mysql_fetch_assoc(mysql_query("SELECT * FROM `vacation_image` WHERE adv_id='".$row['id']."' order by id asc limit 1"));
//echo '<pre>';
//print_r($row);exit;
//echo '</pre>';
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
</head>

<body>

  <?php include('includes/header.php');?>
      
    <section class="profiledetails_sec">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-9">
                	<h3 class="details_title"><?php echo $row['title'];?></h3>
                	<div class="pro_detail_slider" style="width:100%">
                    	<ul class="bxslider_pdetail">
                        <?php
                        $res22=mysql_query("SELECT * FROM `vacation_image` WHERE `adv_id`='".$_REQUEST['id']."'");
			  if(mysql_num_rows($res22)>0)
		          {
			  while($row1=mysql_fetch_assoc($res22))
			  {
                          ?>
                        
                        <li><img src="upload/property/<?php echo $row1['image'];?>"  height="327" /></li>
                          <?php }}?>  
                        </ul>                        
                        <div id="bx-pager">
                          <?php
                          $i=0;
                          $res22=mysql_query("SELECT * FROM `vacation_image` WHERE `adv_id`='".$_REQUEST['id']."'");
			  if(mysql_num_rows($res22)>0)
		          {
			  while($row1=mysql_fetch_assoc($res22))
			  {
                          ?>
                          <a data-slide-index="<?php echo $i;?>" href=""><img src="upload/property/<?php echo $row1['image'];?>" style="width:100px; height:100px;"/></a>
                          <?php $i++;}}?>
                        </div>
                    </div>
                    <hr>
                    <div class="desc_box">
                    	<h3>see description</h3>
                        <p><?php echo strip_tags($row['description']);?></p>
                    </div>
                    <div class="desc_box">
                    	<h3>Vacation Type </h3>                        
                        <p><?php echo strip_tags($row['property_type']);?></p>
                    </div>
                     <div class="desc_box">
                    	<h3>Modation Type</h3>
                        <p><?php echo strip_tags($row['accomodation_type']);?></p>
                        
                    </div>
                    <div class="desc_box">
                    	<h3>Owner Info</h3>
                        <p><?php echo strip_tags($row['owner_info']);?></p>
                        
                    </div>   
                   
                   
                    	
                    <div class="details_map desc_box">
                    	<h3>Map </h3>
                        <div id="right-map" style=" width:1169px;; height: 450px;"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <h3 class="details_title"><i class="fa fa-heart-o"></i> Save to my favorites</h3>                    
                	<div class="details_price">
                        <h1><?php echo number_format((float)$row['price'], 2, '.', '');?></h1>
                    	<p>Per Night USD</p>
                        <form>
                          <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Start Date">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="End Date">
                          </div>
                          <button type="submit" class="btn list_btn btn-block">Book It</button>
                        </form>
                    </div>
                    <div class="details_owner">
                        <h1>Owner</h1>
                        <h6><a href="" class="btn btn-success btn-block">Email owner</a></h6>
                        <h6><a href="" class="btn btn-danger btn-block">Show phone number</a></h6>                       
                    </div>
                </div>
            </div>
        </div>
    </section>  
	
<?php include('includes/footer.php');?> 
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script src="js/jquery.bxslider.js"></script>

 <script>
function showmap()
{
zip='<?php echo $row['zip'];?>';

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
<script>
	$(document).ready(function(){
		$('.bxslider_pdetail').bxSlider({
		  pagerCustom: '#bx-pager'
		});
                showmap();
	});
</script>



</body>
</html>

