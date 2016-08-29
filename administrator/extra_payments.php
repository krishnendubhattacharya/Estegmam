<?php 
include_once("includes/session.php");
include_once("includes/config.php");
$url=basename(__FILE__)."?".(isset($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:'cc=cc');if(isset($_GET['action']) && $_GET['action']=='delete')
{

	$item_id=$_GET['cid'];
	mysql_query("delete from  estejmam_extra_amount where id='".$item_id."'");
	$_SESSION['msg']=message('deleted successfully',1);
	header('Location: '.basename(__FILE__));
	exit();

}if(isset($_GET['action']) && $_GET['action']=='inactive')
{
	 $item_id=$_GET['cid'];
	 mysql_query("update estejmam_extra_amount set is_active ='0' where id='".$item_id."'");
	$_SESSION['msg']=message('updated successfully',1);
	header('Location: '.basename(__FILE__));
	exit();
}
if(isset($_GET['action']) && $_GET['action']=='active')
{

	$item_id=$_GET['cid'];
	mysql_query("update estejmam_extra_amount set is_active='1' where id='".$item_id."'");
	$_SESSION['msg']=message('updated successfully',1);
	header('Location: '.basename(__FILE__));
	exit();
} //-----------------------------Data Manage----------------------------

if(isset($_GET['search']))
{
	$keyword=$_GET['in_keyword'];	
	$recperpage=$_GET['in_recperpage'];
}
else
{
	$keyword="";	
	$recperpage=30;
}
$start_key=isset($_GET['in_start_key'])?$_GET['in_start_key']:"";

//-----------------------------/Data Manage----------------------------
$sql="select * from estejmam_extra_amount  where id<>''";

if(isset($_GET['id'])&& $_GET['id']!=""){
$sql .=" AND `user_id`='".$_REQUEST['id']."'";
}

if(isset($_GET['in_page'])&& $_GET['in_page']!="")
	$page=$_GET['in_page'];
else
	$page=1;
$total_count=mysql_num_rows(mysql_query($sql));
$sql=$sql." limit ".(($page-1)*$recperpage).", $recperpage";

	if($page>1)
	{

		$url_prev=stristr($url,"&in_page=".$page)==FALSE?$url."&page=".($page-1):str_replace("&in_page=".$page,"&in_page=".($page-1),$url);
		$prev="<a href='$url_prev' class='small_link'>Prev</a>";

	}
	else
		$prev="Prev";
	if((($page)*$recperpage)<$total_count)
	{

		$url_next=stristr($url,"&in_page=".$page)==FALSE?$url."&in_page=".($page+1):str_replace("&in_page=".$page,"&in_page=".($page+1),$url);

		$next="<a href='$url_next' class='small_link'>Next</a>";

	}
	else
		$next="Next";

	$page_temp=(($page)*$recperpage);

	$page_temp=$page_temp<$total_count?$page_temp:$total_count;

	$showing=" Showing ".(($page-1)*$recperpage+1)." - ".$page_temp." of ".$total_count." | ";

?><!DOCTYPE html>
<html>

    <head>
        <title>List Property</title>

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <script language="javascript">

   function del(aa,bb)
   {
      var a=confirm("Are you sure, you want to delete this?")
      if (a)
      {
        location.href="extra_payments.php?cid="+ aa +"&action=delete"

      }  

   } function inactive(aa)
   { 
 location.href="list_adventure.php?cid="+ aa +"&action=inactive"

   } 
   function active(aa)
   {
location.href="list_adventure.php?cid="+aa+"&action=active";
   } 

   </script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
             <?php include('includes/header.php');?>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php include('includes/left_panel.php');?>
                <!--/span-->
                <div class="span9" id="content">
                  
                  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">List Extra Payments</div>
                            </div>
                            <div class="block-content collapse in">

      

                                <div class="span12">
  									<table class="table table-bordered">
						              <thead>
                                        <tr>
                                        <th>#</th>
                                        <th> Property Name</th>
                                        <th> Paid By</th>
                                        <th> Amount</th>
                                        <th> Date</th>
                                        <th>Action</th>
                                        </tr>
						              </thead>
						              <tbody>
                                      
                                      <?php
 
$record=mysql_query($sql);
if(mysql_num_rows($record)==0)
{?>
                  <tr>
                  <td colspan="6" style="text-align:center">Sorry, no record found.</td>
                  </tr>
                  <?php 
}
else
{
$count=1;
	while($row=mysql_fetch_object($record))
	{
	$userDetails=mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='".$row->user_id."'"));
	$propertyDeatils=mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_property` WHERE `id`='".$row->prop_id."'"));
	

?>						                <tr>
						                  <td><?php echo $count;?></td>
                                           <td><?php echo stripslashes($propertyDeatils['title']);?></td>
						                  <td><?php echo stripslashes($userDetails['fname']);?>&nbsp;<?php echo stripslashes($userDetails['lname']);?></td>
                                          <td>$<?php echo stripslashes($row->amount_paid);?></td>
                                          <td><?php echo stripslashes($row->date);?></td>
                                          <td><button class="btn btn-mini"  onClick="javascript:del('<?php echo $row->id; ?>')">Delete</button>&nbsp;<?php /*?><button class="btn btn-mini" onClick="window.location.href='property_details.php?id=<?php echo $row->id ?>&action=details'">Details</button><?php */?></td>
						                </tr>

						            <?php 
									$count++;

									}
}?>   
						              </tbody>
						            </table>
                                </div>
                            </div>
                            <?php  //---------------------Displaying jump menu and prev next---------------------------------			
              if ($total_count>0) {?>
          <table width="100%" height="20" border="0" cellpadding="0" cellspacing="0">

            <tr>
              <td width="48%" align="left" valign="bottom" class="light_text_bold"><?php /*?>&nbsp;Jump to page

                <select name="in_page" style="width:45px;" onChange="javascript:location.href='<?php echo str_replace("&in_page=".$page,"",$url);?>&in_page='+this.value;">
                  <?php for($m=1; $m<=ceil($total_count/$recperpage); $m++) {?>
                  <option value="<?php echo $m;?>" <?php echo $page==$m?'selected':''; ?>><?php echo $m;?></option>
                  <?php }?>
                </select>
                of <?php echo ceil($total_count/$recperpage)?> <?php */?></td>
              <td width="52%" align="right" valign="bottom" class="light_text_bold"><?php echo " ".$showing." ".$prev." ".$next." &nbsp;";?> </td>
            </tr>
          </table>
          <?php }
               //---------------------/Displaying jump menu and prev next---------------------------------
          ?>
                        </div>

                    </div>
                </div>

            </div>

            <hr>

            <?php include('includes/footer.php');?>
        </div>

        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/scripts.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
        <script>
        $(function() {        });

       </script>
    </body>
</html>