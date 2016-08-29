<?php 
include_once('includes/session.php');
$target_path="../news_image/";
//include_once("includes/session.php");
include_once("includes/config.php");
include_once("includes/functions.php");

if(isset($_REQUEST['id']))
	{
		$pid=$_REQUEST['id'];
		$sql2="SELECT * FROM `estejmam_cms` where id='$pid'"; 
		$res=mysql_query($sql2);
		$row=mysql_fetch_array($res);
	}
	
if(isset($_REQUEST['submit']))
{

	//$title=$_REQUEST['cat_name'];
	$pagedetail = isset($_POST['elm1']) ? $_POST['elm1'] : '';
	
	
	$fields = array('pagedetail' => mysql_real_escape_string($pagedetail));

		$fieldsList = array();
		foreach ($fields as $field => $value) {
			$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";

	}	   
	 $editQuery = "UPDATE `estejmam_cms` SET " . implode(', ', $fieldsList)
			. " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['pid']) . "'";
		//	exit;

		if (mysql_query($editQuery)) {
			$_SESSION['msg'] = "CMS Updated Successfully";
		}
		else {
			$_SESSION['msg'] = "Error occuried while updating CMS";
		}

		header('Location: cms.php?id='.$_REQUEST['pid']);
		exit();
	

				
}

?><!DOCTYPE html>
<html>
    
    <head>
        <title>Manage CMS</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder_v1.js"></script>
	<script language="javascript">
 function submitdata(val)
  {
  //alert("hh");
  document.location.href="cms.php?id="+val;
  }
</script>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
         <?php include('includes/header.php');?>
        <div class="container-fluid">
            <div class="row-fluid">
                 <?php include('includes/left_panel.php');?>
                <!--/span-->
                <div class="span9" id="content">
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Manage CMS</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" method="post" action="<?php echo basename(__FILE__);?>" enctype="multipart/form-data">              <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
              <input type="hidden" name="menu_id" value="<?php echo $menu_id;?>" />

                                      <fieldset>
                                        <legend>Manage CMS</legend>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="selectError">Page Names</label>
                                          <div class="controls">
                                            <select id="selectError" name="pid" onChange="submitdata(this.value);">
											<option value="">Select One</option>
											<?php 
                                            $SQL ="SELECT * FROM `estejmam_cms`";
                                            $result = mysql_query($SQL);
                                            
                                            while($row1=mysql_fetch_array($result))
                                            { 
                                            ?>
                                            <option value="<?php echo $row1['id']; ?>" <?php if($pid==$row1['id']) { echo "selected";}?> > <?php echo $row1['pagename']; ?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                          
                                          </div>
                                        </div>
                                        
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Focused input</label>
                                          <div class="controls">
                                             <textarea id="editor1" name="elm1" cols="79" rows="15"><?php echo stripslashes($row['pagedetail']); ?></textarea>
                                          </div>
                                        </div>
                                        
                                      
                                        <div class="form-actions">
                                          <button name="submit" type="submit" class="btn btn-primary">Save changes</button>
                                         
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


        <script src="assets/scripts.js"></script>
        <script>
        $(function() {
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
    </body>

</html>