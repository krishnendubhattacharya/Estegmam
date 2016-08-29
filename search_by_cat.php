<?php
ob_start();
session_start();
include('administrator/includes/config.php');
include('pagination.php');
$category=  mysql_fetch_assoc(mysql_query("select * from vacation_category where id='".$_REQUEST['cat_id']."'"));
$condition="";
if(isset($_REQUEST['cat_id']) and $_REQUEST['cat_id']){
$condition.=" and cat_id='".$_REQUEST['cat_id']."'";    
}
if($_REQUEST['country']!='')
{
if($_REQUEST['country']==1){
$field='city';
}
if($_REQUEST['country']==2){
$field='airport';
}
if($_REQUEST['country']==3){
$field='attraction';
}
if($_REQUEST['country']==4){
$field='home_ID';				}    
}
if($_REQUEST['key']!='')
{
 $condition .=" And ".$field." like '%".$_REQUEST['key']."%'";
}
$sql="select * from `vacation_property` where status='1' ".$condition."  order by id desc";
$total_row=mysql_num_rows(mysql_query($sql));
$pager = new PS_Pagination($sql,6,5);
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
<script src="js/jquery_002.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
$('#listing').jscroll({
    loadingHtml: '<img src="imagesspinner.gif" alt="Loading" />',
    padding: 20,
    nextSelector: 'a.style2',
    contentSelector: '#listing'
    
});	
});
</script>

</head>
<body>
<?php
include('includes/header.php');
?>
    <section class="list_baner">
    	<div class="container">
            <div class="listbaner_title">
                <h2><?php echo $category['name'];?></h2>
            </div>
        </div>
    </section>
    
    
    <section class="listdata_bx">
    	<div class="container" id="listing">
         <?php
         if(mysql_num_rows($rs)>0)
         { 
          while($rec=  mysql_fetch_assoc($rs)) 
          {  
         $image=mysql_fetch_assoc(mysql_query("SELECT * FROM `vacation_image` WHERE adv_id='".$rec['id']."' order by id asc limit 1"));
    
         ?>
            
            
        	<div class="list_box">
        	<div class="row">
            	<div class="col-sm-4">
                	<div class="list_img">
                         <?php
                         if($image['image']=='')
                        {   
                        ?>
                        <img src="upload/noImageFound.jpg" alt="">
                        <?php } else{?>
                    	<img src="upload/property/<?php echo $image['image'];?>" class="img-responsive img-thumbnail">
                        <?php }?>
                        <div class="hot_deals"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                	<div class="list_desc">
                    	<h3><?php echo $rec['title'];?></h3>
                        <h4>
                        <a href="">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </a>
                        </h4>
                        <p>
                          <?php echo strip_tags(substr($rec['description'],0,100));?>  
                         </p>
                         <p><span>Location : </span> <?php echo $rec['street_address']; ?> </p>
                    </div>
                </div>
                <div class="col-sm-2">
                	<div class="list_price">
                    	<p>From USD</p>
                        <h1>$<?php echo number_format((float)$rec['price'], 2, '.', '');?></h1>
                        <h3><a href="details.php?id=<?php echo $rec['id'];?>" class="btn  list_btn">See Details <i class="fa fa-share"></i></a> </h3>
                    </div>
                </div>
            </div>
            </div>
          <?php }?>
        <?php echo $pager->renderNext(''); ?>  
          <?php
                        }else{?>
            <span style=" color:red; font-size:23px;">No Properties Found</span>  
          <?php }?>
        </div>
    </section>
     
      
	
<!--    <section class="secondbg">
          <div class="container secondbg_box">
          <div class="home_gal_lft home_gal_lft_location">
          <?php include('includes/category_listing.php');?>  
          </div> 
      <div class="home_gal_rht home_gal_rht_locaton">
          <?php
          //$content=mysql_fetch_assoc(mysql_query("select * from `vacation_cms` where id='14'"));
          //echo stripslashes($content['pagedetail']);
          ?>
           <div class="homegallery_boxes location">
            <?php //include('includes/slider_product.php');?>                  
            <div class="clearfix"></div>
           

          </div>    


          <div class="clearfix"></div>

          </div>

          <div class="clearfix"></div>

          </div>

           </section>-->
    <?php include('includes/footer.php');?>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jssor.slider.mini.js"></script>
<script type="text/javascript" src="js/jssor.js"></script>

</body>

</html>

