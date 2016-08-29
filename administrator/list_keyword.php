<?php 
include_once("includes/session.php");
include_once("includes/config.php");
$url=basename(__FILE__)."?".(isset($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:'cc=cc');

if(isset($_GET['action']) && $_GET['action']=='delete')
{
	$item_id=$_GET['cid'];
	mysql_query("delete from  adventure_circle_keyword where id='".$item_id."'");
	$_SESSION['msg']=message('deleted successfully',1);
	header('Location: '.basename(__FILE__));
	exit();
}

if(isset($_GET['action']) && $_GET['action']=='inactive')
{
	 $item_id=$_GET['cid'];
	 mysql_query("update adventure_circle_keyword set status='0' where id='".$item_id."'");
	$_SESSION['msg']=message('updated successfully',1);
	header('Location: '.basename(__FILE__));
	exit();
}
if(isset($_GET['action']) && $_GET['action']=='active')
{
	$item_id=$_GET['cid'];
	mysql_query("update adventure_circle_keyword set status='1' where id='".$item_id."'");
	$_SESSION['msg']=message('updated successfully',1);
	header('Location: '.basename(__FILE__));
	exit();
}

//-----------------------------Data Manage----------------------------

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

//-----------------------------------Generate Sql----------------------

$sql="select * from adventure_circle_keyword  where id<>''";


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

//-----------------------------------/Pagination------------------------------

?><!DOCTYPE html>
<html>
    
    <head>
        <title>List Category</title>
        <!-- Bootstrap -->
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
        location.href="list_keyword.php?cid="+ aa +"&action=delete"
      }  
   } 
   
function inactive(aa)
   { 
       location.href="list_keyword.php?cid="+ aa +"&action=inactive"

   } 
   function active(aa)
   {
     location.href="list_keyword.php?cid="+aa+"&action=active";
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
                                <div class="muted pull-left">List Keyword</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table table-bordered">
						              <thead>
						                <tr>
						                  <th>#</th>
						                  <th>Keyword</th>
                                          <th>Action</th>
						                </tr>
						              </thead>
						              <tbody>
                                      
                                      <?php
 
$record=mysql_query($sql);
if(mysql_num_rows($record)==0)
{?>
                  <tr>
                    <td colspan="3">Sorry, no record found.</td>
                  </tr>
                  <?php 
}
else
{
$count=1;
	while($row=mysql_fetch_object($record))
	{
?>


						                <tr>
						                  <td><?php echo $count;?></td>
						                  <td><?php echo stripslashes($row->name);?></td>
                                          
                                          <td>
                                           <?php if($row->status=='0'){?>
<button class="btn btn-mini"  onClick="javascript:active('<?php echo $row->id;?>');">Activate</button>
<?php } else {?>
<button class="btn btn-mini"  onClick="javascript:inactive('<?php echo $row->id;?>');">Deactivate</button>
		  <?php }?>&nbsp;<button class="btn btn-mini"  onClick="javascript:del('<?php echo $row->id; ?>')">Delete</button>&nbsp;<button class="btn btn-mini" onClick="window.location.href='add_keyword.php?id=<?php echo $row->id ?>&action=edit'">Edit</button></td>
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
                        <!-- /block -->
                        
                        
                    </div>

                    

                    

                    

                     


                </div>
            </div>
            <hr>
            <?php include('includes/footer.php');?>
        </div>
        <!--/.fluid-container-->

        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>


        <script src="assets/scripts.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
        <script>
        $(function() {
            
        });
        </script>
    </body>

</html>