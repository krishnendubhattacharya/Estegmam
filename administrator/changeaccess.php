<?php

include_once('includes/session.php');

include_once("includes/config.php");

include_once("includes/functions.php");





		 //$pid=$_REQUEST['id'];

		$sql2="SELECT * FROM `estejmam_tbladmin` where id='".$_SESSION['admin_id']."'"; 

		$res=mysql_query($sql2);

		$row=mysql_fetch_array($res);

//print_r($row);

if(isset($_REQUEST['submit']))

	{

	 //$email=$_REQUEST['email'];

	 

	 $secret_key = isset($_POST['secret_key']) ? $_POST['secret_key'] : '';

	 $publishable_key = isset($_POST['publishable_key']) ? $_POST['publishable_key'] : '';

	 

	 $fields = array('secret_key' => mysql_real_escape_string($secret_key),

	 'publishable_key' => mysql_real_escape_string($publishable_key)

	 );

	   $fieldsList = array();

		foreach ($fields as $field => $value) {

			$fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";

		}

		

	 $editQuery = "UPDATE `estejmam_tbladmin` SET " . implode(', ', $fieldsList)

			. " WHERE `id` = '" . mysql_real_escape_string($_SESSION['admin_id']) . "'";



		if (mysql_query($editQuery)) {

			$_SESSION['msg'] = "Updated Successfully";

		}

		else {

			$_SESSION['msg'] = "Error occuried while updating Email";

		}



		header('Location: changeaccess.php');

		exit();

		

	

	}

	

?>

<!DOCTYPE html>

<html>

    

    <head>

        <title>Change Paypal Address</title>

        <!-- Bootstrap -->

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">

        <link href="assets/styles.css" rel="stylesheet" media="screen">

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

                                <div class="muted pull-left">Payment Access</div>

                            </div>

                            <div class="block-content collapse in">

                                <div class="span12">

                                     <form class="form-horizontal" method="post" action="changeaccess.php">

                                      <fieldset>

                                        <legend>Payment Access</legend>

                                        <div class="control-group">

                                          <label class="control-label" for="focusedInput">Secret Key</label>

                                          <div class="controls">

                      <input name="secret_key" class="input-xlarge focused" required id="focusedInput" type="text" value="<?php echo $row['secret_key'];?>">

                                          </div>

                                        </div>

                                        

                                        

                                        <div class="control-group">

                                          <label class="control-label" for="focusedInput">Publishable Key</label>

                                          <div class="controls">

                      <input name="publishable_key" class="input-xlarge focused" required id="focusedInput" type="text" value="<?php echo $row['publishable_key'];?>">

                                          </div>

                                        </div>

                                        

                                        

                                         

                                        

                                        <div class="form-actions">

                                          <button type="submit" class="btn btn-primary"  name="submit">Save changes</button>

                                          <button type="reset" class="btn">Cancel</button>

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

    </body>



</html>