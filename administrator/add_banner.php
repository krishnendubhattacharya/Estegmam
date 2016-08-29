<?php 

include_once('includes/session.php');

include_once("includes/config.php");

include_once("includes/functions.php");





if(isset($_REQUEST['submit']))

{

			 if(!empty($_FILES['image']['name'])) 	

			 {

			   $ext = explode('.',$_FILES['image']['name']);

				if($ext){

					$uploadFolder = "../upload/sitebanner/";

					$uploadPath =$uploadFolder;

					$extensionValid = array('jpg','jpeg','png','gif');

					if(in_array(strtolower($ext[1]),$extensionValid)){

						$imageName = rand().'_banner.'.$ext[1];

						$full_image_path = $uploadPath . '/' . $imageName;

						move_uploaded_file($_FILES['image']['tmp_name'],$full_image_path);

					} else{

						$_SESSION['msg'] = 'Please uploade image of .jpg, .jpeg, .png or .gif format.';

					}

				}	 

			 }

			 else{

			  $imageName=$_REQUEST['file'];	 

			 }

	$fields = array(

		'image' => mysql_real_escape_string($imageName),

		'status' => mysql_real_escape_string($status),
		'name'=>mysql_real_escape_string($_REQUEST['name'])

		);



		$fieldsList = array();

		foreach ($fields as $field => $value) {

			$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";

		}

					 

	 if($_REQUEST['action']=='edit')

	  {		  

	  $editQuery = "UPDATE `estejmam_banner` SET " . implode(', ', $fieldsList)

			. " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";



		if (mysql_query($editQuery)) {

		

		$_SESSION['msg'] = "Banner Updated Successfully";

		}

		else {

			$_SESSION['msg'] = "Error occuried while updating Banner";

		}

		header('Location:list_banner.php');

		exit();

	

	 }

	 else

	 {

	 

	  $addQuery = "INSERT INTO `estejmam_banner` (`" . implode('`,`', array_keys($fields)) . "`)"

			. " VALUES ('" . implode("','", array_values($fields)) . "')";

			

			//exit;

		mysql_query($addQuery);

		$last_id=mysql_insert_id();

		header('Location:list_banner.php');

		exit();

	

	 }

				

				

}



if($_REQUEST['action']=='edit')

{

$bannerRowset = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_banner` WHERE `id`='".mysql_real_escape_string($_REQUEST['id'])."'"));



}

?>

<!DOCTYPE html>

<html>

    

    <head>

        <title>Add Banner</title>

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

                                <div class="muted pull-left"><?php echo $_REQUEST['action']=='edit'?"Edit":"Add";?> Banner</div>

                            </div>

                            <div class="block-content collapse in">

                                <div class="span12">

                                     <form class="form-horizontal" method="post" action="add_banner.php" enctype="multipart/form-data">

                                     <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />

                                     <input type="hidden" name="action" value="<?php echo $_REQUEST['action'];?>" />

                                      <fieldset>

                                        <legend><?php echo $_REQUEST['action']=='edit'?"Edit":"Add";?> Banner</legend>

                                        <div class="control-group">

                                        <label class="control-label" for="focusedInput">Text</label>

                                        <div class="controls">
										<textarea name="name"><?php echo $bannerRowset['name'];?></textarea>
                                        </div>

                                        </div>

                                         

                                        

                                        <div class="control-group">

                                        <label class="control-label" for="focusedInput">Image</label>

                                        <div class="controls">

                                       	<input type="file" name="image">

                                        </div>

                                        </div>

                                        <div class="control-group" style="display:none;">

                                        <label class="control-label" for="focusedInput">Status</label>

                                        <div class="controls" >

                                       		<select name="status">

                                            	<option value="1" <?php echo ($bannerRowset[status]==1)?'selected':''?>>Active</option>

                                            	<option value="0" <?php echo ($bannerRowset[status]==0)?'selected':''?>>Inactive</option>

                                            </select>

                                        </div>

                                        </div>                              

                                        <div class="form-actions">

                                          <button type="submit" class="btn btn-primary"  name="submit">Save changes</button>

                                          <button type="reset" class="btn" onClick="location.href='list_country.php'">Cancel</button>

                                        </div>

                                      </fieldset>

                                      <input type="hidden" name="file" value="<?php echo $bannerRowset['image']?>">

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

       <?php /*?> <script src="bootstrap/js/bootstrap.min.js"></script>

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

        <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script><?php */?>





        <script src="assets/scripts.js"></script>

        <script>

        $(function() {<?php /*?>

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

        <?php */?>});

        </script>

        <script src="//code.jquery.com/jquery-1.10.2.js"></script>

  		<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

   		<link rel="stylesheet" href="/resources/demos/style.css">

	   <script>

            $(function() {

            $( "#start" ).datepicker();

            });

        </script>

        <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" />

    	<link rel="stylesheet" href="css/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />

		<script type="text/javascript" src="js/jquery.ui.core.min.js"></script>

        <script type="text/javascript" src="js/jquery.ui.widget.min.js"></script>

        <script type="text/javascript" src="js/jquery.ui.tabs.min.js"></script>

        <script type="text/javascript" src="js/jquery.ui.position.min.js"></script>

        <script type="text/javascript" src="js/jquery.ui.timepicker.js?v=0.3.3"></script>

        <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

        <script type="text/javascript">

		$(document).ready(function() {

		$('#timepicker').timepicker({

		showPeriod: true,

		showLeadingZero: true

		});

		});

	</script>

    </body>



</html>