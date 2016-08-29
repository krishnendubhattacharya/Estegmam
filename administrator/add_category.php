<?php 
include_once('includes/session.php');
include_once("includes/config.php");
include_once("includes/functions.php");


if(isset($_REQUEST['submit']))
{

	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$description = isset($_POST['description']) ? $_POST['description'] : '';
	

	$fields = array(
		'name' => mysql_real_escape_string($name),
		'description' => mysql_real_escape_string($description),
		);

		$fieldsList = array();
		foreach ($fields as $field => $value) {
			$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
		}
					 
	 if($_REQUEST['action']=='edit')
	  {		  
	  $editQuery = "UPDATE `estejmam_category` SET " . implode(', ', $fieldsList)
			. " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

		if (mysql_query($editQuery)) {
		
		if($_FILES['image']['tmp_name']!='')
		{
		$target_path="../upload/category/";
		$userfile_name = $_FILES['image']['name'];
		$userfile_tmp = $_FILES['image']['tmp_name'];
		$img_name =$userfile_name;
		$img=$target_path.$img_name;
		move_uploaded_file($userfile_tmp, $img);
		
		$image =mysql_query("UPDATE `estejmam_category` SET `image`='".$img_name."' WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'");
		}
		
		
			$_SESSION['msg'] = "Category Updated Successfully";
		}
		else {
			$_SESSION['msg'] = "Error occuried while updating Category";
		}

		header('Location:list_category.php');
		exit();
	
	 }
	 else
	 {
	 
	 $addQuery = "INSERT INTO `estejmam_category` (`" . implode('`,`', array_keys($fields)) . "`)"
			. " VALUES ('" . implode("','", array_values($fields)) . "')";
			
			//exit;
		mysql_query($addQuery);
		$last_id=mysql_insert_id();
		if($_FILES['image']['tmp_name']!='')
		{
		$target_path="../upload/category/";
		$userfile_name = $_FILES['image']['name'];
		$userfile_tmp = $_FILES['image']['tmp_name'];
		$img_name =$userfile_name;
		$img=$target_path.$img_name;
		move_uploaded_file($userfile_tmp, $img);
		
		$image =mysql_query("UPDATE `estejmam_category` SET `image`='".$img_name."' WHERE `id` = '" . $last_id . "'");
		}
		 
/*		if (mysql_query($addQuery)) {
		
			$_SESSION['msg'] = "Category Added Successfully";
		}
		else {
			$_SESSION['msg'] = "Error occuried while adding Category";
		}
		*/
		header('Location:list_category.php');
		exit();
	
	 }
				
				
}

if($_REQUEST['action']=='edit')
{
$categoryRowset = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_category` WHERE `id`='".mysql_real_escape_string($_REQUEST['id'])."'"));

}
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Add Category</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
       
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
                                <div class="muted pull-left"><?php echo $_REQUEST['action']=='edit'?"Edit":"Add";?> Category</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" method="post" action="add_category.php" enctype="multipart/form-data">
                                     <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
                                     <input type="hidden" name="action" value="<?php echo $_REQUEST['action'];?>" />
                                      <fieldset>
                                        <legend><?php echo $_REQUEST['action']=='edit'?"Edit":"Add";?> Category</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Category Name</label>
                                          <div class="controls">
                      <input name="name" class="input-xlarge focused" required  id="focusedInput" type="text" value="<?php echo $categoryRowset['name'];?>">
                                          </div>
                                        </div>
                                         
                                        <div class="control-group">
                                        <label class="control-label" for="focusedInput">Short Description</label>
                                        <div class="controls">
                                        <input name="description" class="input-xlarge focused" type="text" value="<?php echo $categoryRowset['description'];?>">
                                        </div>
                                        </div>
                                        
                                        
                                        <div class="control-group">
                                        <label class="control-label" for="focusedInput">Image</label>
                                        <div class="controls">
                                        <input type="file" name="image" > <?php if($categoryRowset['image']!=''){?><br><a href="../upload/category/<?php echo $categoryRowset['image'];?>" target="_blank">View</a><?php }?>
                                        </div>
                                        </div>



                                        
                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary"  name="submit">Save changes</button>
                                          <button type="reset" class="btn" onClick="location.href='list_category.php'">Cancel</button>
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
        <link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
        
        <script type="text/javascript" src="js/colorpicker.js"></script>
        <script type="text/javascript" src="js/eye.js"></script>
        <script type="text/javascript" src="js/utils.js"></script>
        <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>


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
    </body>

</html>