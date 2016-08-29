<?php
ob_start();
session_start();
include('administrator/includes/config.php');
?>
<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Home Vacation</title>



<link href="css/style.css" type="text/css" rel="stylesheet" media="all">

<link href="css/font-awesome.css" type="text/css" rel="stylesheet" media="all">

<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="css/carosel_bootstrap.css">



<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">

<script src="js/jquery.bxslider.js"></script>

<script src="js/jquery.js"></script>

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

    
	<section class="banner">

  <div style="min-height: 50px;">

      <div id="slider1_container" style="display: none; position: relative; margin: 0 auto;

      top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">

          <div u="loading" style="position: absolute; top: 0px; left: 0px;">

              <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;

              top: 0px; left: 0px; width: 100%; height: 100%;">

              </div>

              <div style="position: absolute; display: block; 

              background: url(../img/loading.gif) no-repeat center center;

              top: 0px; left: 0px; width: 100%; height: 100%;">

              </div>

          </div>

          <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1300px; height: 500px; overflow: hidden;">
		   <?php
			$sql_banner=mysql_query("SELECT * FROM `vacation_banner` WHERE 1") or die(mysql_error());
			while($row_banner=mysql_fetch_assoc($sql_banner)){
			?>
              <div>

                  <img u="image" src2="upload/sitebanner/<?php echo $row_banner['image'];?>" style="max-height:555px" />

              </div>
             <?php }?>
              
              </div>

           <div u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">

              <div u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align:center; line-height:19px; color:White; font-size:12px;"></div>

          </div>

          <span u="arrowleft" class="jssora21l">

          </span>

          <span u="arrowright" class="jssora21r" >

          </span>

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
		  $content=mysql_fetch_assoc(mysql_query("select * from `vacation_cms` where id='15'"));
		  echo stripslashes($content['pagedetail']);
		  ?>    
            <div class="homegallery_boxes location">
            <?php include('includes/slider_product.php');?>                  
            <div class="clearfix"></div>

          </div>

          </div>

          <div class="clearfix"></div>

          </div>

           </section>

    <?php include('includes/footer.php');?>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jssor.slider.mini.js"></script>
<script type="text/javascript" src="js/jssor.js"></script>

</body>

</html>

