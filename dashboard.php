<?php
ob_start();
session_start();
include('administrator/includes/config.php');
include('pagination.php');
if($_SESSION['user_id']=='')
{
header("Location:login.php");	
}    
if($_REQUEST['id']!='' and $_REQUEST['action']=='delete')
{
    mysql_query("delete from vacation_property where id='".$_REQUEST['id']."'");
    $_SESSION['del_succ']=1;
} 
$sql="SELECT * FROM `vacation_property` WHERE user_id='".$_SESSION['user_id']."' order by id desc";
$total_row=mysql_num_rows(mysql_query($sql));
$pager = new PS_Pagination($sql,5,5);
$rs = $pager->paginate();  
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
<script src="js/jquery.jscroll.js"></script>
<script src="js/jquery.bxslider.js"></script>


<script type="text/javascript">
$(document).ready(function(){ 
$('#container_dashboard').jscroll({
    loadingHtml: '<img src="imagesspinner.gif" alt="Loading" />',
    padding: 20,
    nextSelector: 'a.style2',
    contentSelector: '#container_dashboard'
    
});	
});
</script>
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
<script>
function del(id)
{
 t=confirm("Are you wnat to remove this?");    
 if(t){
 location.href="dashboard.php?id="+id+"&action=delete"    
     
 }
     
}
</script>

</head>



<body>
<?php
include('includes/header.php');
?>
    <section class="signup_sec login_sec">
    	<div class="container">
        	<div class="row">
            	<div class="profile_page">
                    <div class="col-sm-3">
                    <?php
                    include('includes/user_left.php');
                    ?>  
                    </div>
                    <div class="col-md-9" > 
                  	<div class="panel"id="container_dashboard">  
                        <div role="alert" class="alert alert-danger" style="display:<?php echo $_SESSION['del_succ']==1?'block':'none'; ?>">
                          Property Delete Successfully
                        </div>    
                        <div class="profile_photoview panel" > 
                            
                        <?php
                        while($row=mysql_fetch_assoc($rs))
                        {
                        $image=mysql_fetch_assoc(mysql_query("SELECT * FROM `vacation_image` WHERE adv_id='".$row['id']."' order by id asc limit 1"));
                        
                        ?>
                            <div class="photo-view">
                                    <div class="left-photo-view">
                                      <div class="product-image">
                                      <?php
                                      if($image['image']=='')
                                      {   
                                      ?>
                                     <img src="upload/noImageFound.jpg" alt="">
                                      <?php }else{?>     
                                          <img src="upload/property/<?php echo $image['image'];?>" alt="">
                                      <?php }?>
                                      
                                      </div>
                                    </div>
                                    <div class="right-photo-view">
                                      <div class="list-width-map photo-view-list">
                                        <div class="profile_agent">
                                            <input class="btn btn-default btn-sm" value="Edit" type="button" 
                                              onclick="location.href='add_property.php?id=<?php echo $row['id']?>'">
                                            <input class="btn btn-default btn-sm" value="Delete" type="button" onclick="del('<?php echo $row['id'];?>')">
                                        </div>
                                        <div>
                                            <h3><?php echo $row['title'];?></h3>
                                            <div class="stars">
                                                <img src="images/stars.png">
                                            </div>
                                            <p><?php echo strip_tags(substr($row['description'],0,100)); ?></p>
                                        </div>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="listrating">
                                          <p>Avg Rating :<span> 9.2/10</span></p>
                                          <h6><a href="details.php?id=<?php echo $row['id'];?>"> View this Spot</a></h6>
                                          <div class="clearfix"></div>
                                    </div> 
                                  </div>
                                    <div class="clearfix"></div>           
                                </div>
                        <?php }?>
                        <div class="clearfix"></div>           
                    </div>
                    	
                    	<?php echo $pager->renderNext('');?>
                    
                    </div>
                    
<!--                    <div class="page_enation">
                    
                         
                    </div>-->
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
            <?php //include('includes/slider_product.php');?>                  
            <div class="clearfix"></div>
           

          </div>    


          <div class="clearfix"></div>

          </div>    
          <div class="clearfix"></div>

          </div>

           </section>
         <?php include('includes/footer.php'); ?>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jssor.slider.mini.js"></script>
<script type="text/javascript" src="js/jssor.js"></script>


</body>

</html>

