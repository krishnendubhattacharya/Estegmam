<?php
ob_start();
session_start();
include('administrator/includes/config.php');
if(isset($_REQUEST['email']) and $_REQUEST['email']!='')
{
$fname=isset($_REQUEST['fname'])?$_REQUEST['fname']:'';
$lname=isset($_REQUEST['lname'])?$_REQUEST['lname']:'';
$email=isset($_REQUEST['email'])?$_REQUEST['email']:'';
$dob=isset($_REQUEST['dob'])?$_REQUEST['dob']:'';
$phone=isset($_REQUEST['phone'])?$_REQUEST['phone']:'';
$password=isset($_REQUEST['password'])?$_REQUEST['password']:'';
$address=isset($_REQUEST['address'])?$_REQUEST['address']:'';
$fields = array(

		'fname' => mysql_real_escape_string($fname),
		'lname' => mysql_real_escape_string($lname),
		'email' => mysql_real_escape_string($email),
		'dob' => mysql_real_escape_string($dob),
		'phone' => mysql_real_escape_string($phone),
		'password' => mysql_real_escape_string(md5($password)),
		'address' => mysql_real_escape_string($address)
		);

$fieldsList = array();
foreach ($fields as $field => $value) {
$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
}
$addQuery = "INSERT INTO `vacation_user` (`" . implode('`,`', array_keys($fields)) . "`)"

			. " VALUES ('" . implode("','", array_values($fields)) . "')";
mysql_query($addQuery);
$last_id=mysql_insert_id();
header('Location:login.php');
}
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
$("#exampleInputPassword2").blur(function(){
password1=$("#exampleInputPassword1").val();
password2=$(this).val();
if(password1!=password2){
$("#passworderror").fadeIn();
$("#pwdinputerror").val(1);
}
else{
$("#pwdinputerror").val(0);	
$("#passworderror").fadeOut();
}
});    
$("#email").blur(function(){
email=$(this).val();
$.post("ajax.php?action=checkemail",{email:email},function(data){
if(data.trim()==0){
$("#emailerror").fadeIn();
$("#emailinputerror").val(1);
}
else{
$("#emailerror").fadeOut();
$("#emailinputerror").val(0);
}
});	
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
function validate()
{
pwdinputerror=$("#pwdinputerror").val();
emailinputerror=$("#emailinputerror").val();
if(pwdinputerror==1 || emailinputerror==1 ){
return false;	
}
else{
return true;	
}
}
</script>
</head>
<body>
<?php include('includes/header.php');?>
      
    <section class="signup_sec">
    	<div class="container">
        	<div class="signup_box login_box">
            	<h1>Sign in to Home Vacation Club</h1>
                <p>Returning Customers ?  <a href="login.php">Login</a> </p>
            	<form method="post" onSubmit="return validate();">
                <input type="hidden" id="emailinputerror" value="0">
                <input type="hidden" id="pwdinputerror" value="0">
                  <div class="form-group">
                    <input class="form-control" id="exampleInputEmail1" placeholder="First Name" type="text" required name="fname">
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="exampleInputEmail1" placeholder="Last Name" type="text" required name="lname">
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" placeholder="Enter email address" type="email" required name="email" id="email">
                    <div class="clearfix"></div>
                    <span class="error" id="emailerror">Email already exists</span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                    <input class="form-control" id="exampleInputEmail1" placeholder="date of birth" type="text" required name="dob">
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="exampleInputEmail1" placeholder="Enter phone number" type="text" required name="phone">
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password" required name="password" >
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" type="password" required name="confirm" >
                    <div class="clearfix"></div>
                    <span class="error" id="passworderror">Password Don't Match</span>
                  </div>
                  <div class="clearfix"></div>

                  <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter your address"  name="address" required></textarea>
                  </div>
                  <div class="form-group">
                  <button type="submit" class="btn btn-default btn-block btn_blue">Sign Up</button>                                    
                  </div>
                </form>
                <div class="signup_social">
                	<a href=""><img src="images/signup_face.png" class="signup_img"></a>
                    <a href=""><img src="images/signup_twitter.png"></a>
                </div>
            </div>
        </div>
    </section>  
	
    <section class="secondbg">
          <div class="container secondbg_box">
          <div class="home_gal_lft home_gal_lft_location">
             <div class="homegallery_boxes_ul">
            <ul>
              <li> 
                <img src="images/100percent.png" style="width:100%;"> 
                <div class="popularbx">
                  <div class="popular_txt"><p></p></div>
                </div>
                <div class="popularbx_btm">
                  <div class="popular_txt"><p></p></div>
                </div>
              </li>
            </ul>
            <div class="clearfix"></div>
            <ul class="secondul">
              <li>
                <div class="popularbx2">
                  <div class="popular_txt"><p></p></div>
                </div>
                <div class="popularbx_btm2">
                  <div class="popular_txt"><p></p></div>
                </div>
              </li>
            </ul>
            <div class="clearfix"></div>

            <?php include('includes/sidebar.php')?>      

          </div>

          </div> 
          <div class="home_gal_rht home_gal_rht_locaton">
          
          	<div class="location">
            	          
          
          	<div class="reservation_bx margin_zero">
          
            <div class="homegallery_boxes location">
            <div class="small_bx">
              <div class="footer_top_location margin_zero"> 
                <ul class="bxslider_location">
                  <?php
 					$sql=mysql_query("SELECT * FROM `vacation_property` WHERE status='1' and is_featured='1' order by id desc");
					if(mysql_num_rows($sql)>1)
					{
					while($row=mysql_fetch_assoc($sql)){
 					$res22=mysql_fetch_array(mysql_query("SELECT * FROM `vacation_image` WHERE `adv_id`='".$row['id']."' limit 1"));
					 if(!empty($res22))
					 {
					  $img="upload/property/".$res22['image'];	 
					 }
					 else{
					   $img="upload/property/noimage.jpg";	 
						 
					 }
				  ?>
                  <li style="max-width: 235px;">
                  <h3>Featured homes</h3>
                  <img src="resize.php?pic=<?php echo $img;?>&h=320&w=300">
                  <div class="location_sli_desc">
                  	<p style=" height:71px;"><?php echo strip_tags(substr(stripslashes($row['description']),0,140));?></p>
                    <p class="location_address"><i class="fa fa-map-marker"></i><b>Location: </b><?php echo $row['city'].' '.$row['state'];?>.</p>
                    <p class="location_address"><b>Price: $ <?php echo $row['price'];?></b>.</p>
                    <p class="location_address"><b>ID Number: </b><?php echo $row['id'];?></p>
                    <p class="detailsbtn"><a class="btn_details"  href="drtails.php?id=<?php echo $row['id'];?>">Details</a></p>
                  </div>
                  
                  </li> 
                  <?php }} ?>
                </ul> 
              </div> 
              <div class="footer_top_location margin_zero"> 
                <ul class="bxslider_location">
                 <?php
 					$sql=mysql_query("SELECT * FROM `vacation_property` WHERE status='1' and is_toprated='1' order by id desc");
					if(mysql_num_rows($sql)>1)
					{
					while($row=mysql_fetch_assoc($sql)){
 					$res22=mysql_fetch_array(mysql_query("SELECT * FROM `vacation_image` WHERE `adv_id`='".$row['id']."' limit 1"));
					 if(!empty($res22))
					 {
					  $img="upload/property/".$res22['image'];	 
					 }
					 else{
					   $img="upload/property/noimage.jpg";	 
						 
					 }
				  ?>
                  <li style="max-width: 235px;">
                  <h3>Best Rated Homes</h3>
                  <img src="resize.php?pic=<?php echo $img;?>&h=320&w=300">
                  <div class="location_sli_desc">
                  	<p style="height:71px;"><?php echo strip_tags(substr(stripslashes($row['description']),0,140));?></p>
                    <p class="location_address"><i class="fa fa-map-marker"></i><b>Location: </b><?php echo $row['city'].' '.$row['state'];?>.</p>
                    <p class="location_address"><b>Price: $ <?php echo $row['price'];?></b>.</p>
                    <p class="location_address"><b>ID Number: </b><?php echo $row['id'];?></p>
                    <p class="detailsbtn"><a class="btn_details" href="details.php?id=<?php echo $row['id'];?>">Details</a></p>
                  </div>
                  
                  </li> 
                  <?php }} ?>  
                  
                </ul> 
              </div>
              <div class="footer_top_location margin_zero"> 
                <ul class="bxslider_location">
                  <?php
 					$sql=mysql_query("SELECT * FROM `vacation_property` WHERE status='1' and is_newest='1' order by id desc");
					if(mysql_num_rows($sql)>1)
					{
					while($row=mysql_fetch_assoc($sql)){
 					$res22=mysql_fetch_array(mysql_query("SELECT * FROM `vacation_image` WHERE `adv_id`='".$row['id']."' limit 1"));
					 if(!empty($res22))
					 {
					  $img="upload/property/".$res22['image'];	 
					 }
					 else{
					   $img="upload/property/noimage.jpg";	 
						 
					 }
				  ?>
                  <li style="max-width: 235px;">
                  <h3>Newest Homes</h3>
                  <img src="resize.php?pic=<?php echo $img;?>&h=320&w=300">
                  <div class="location_sli_desc">
                  	<p style="height:71px;"><?php echo strip_tags(substr(stripslashes($row['description']),0,140));?></p>
                    <p class="location_address"><i class="fa fa-map-marker"></i><b>Location: </b><?php echo $row['city'].' '.$row['state'];?></p>
                    <p class="location_address"><b>Price: $ <?php echo $row['price'];?></b>.</p>
                    <p class="location_address"><b>ID Number: </b><?php echo $row['id'];?></p>
                    <p class="detailsbtn"><a class="btn_details" href="drtails.php?id=<?php echo $row['id'];?>">Details</a></p>
                  </div>
                  
                  </li> 
                  <?php }} ?>  
                  
                </ul> 
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

          </div>

          </div>

          <div class="clearfix"></div>

          </div>
		  </div>
          </div>
     </section>
    <?php include('includes/footer.php');?>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jssor.slider.mini.js"></script>
<script type="text/javascript" src="js/jssor.js"></script>
<script>
$(document).ready(function(e) {
});
</script>
</body>

</html>

