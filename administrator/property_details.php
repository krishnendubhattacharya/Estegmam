<?php
include_once('includes/session.php');
include_once("includes/config.php");
include_once("includes/functions.php");

if ($_REQUEST['action'] == 'details') {
    $categoryRowset = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_main_property` WHERE `id`='" . mysql_real_escape_string($_REQUEST['id']) . "'"));
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adventure Details</title>
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
        <?php include('includes/header.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php include('includes/left_panel.php'); ?>
                
                
                
                <!--/span-->
                <div class="span9" id="content">
                    <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->

                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Details</div>
                            </div>

                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <legend>Property Details</legend>
                                            
                                            <div class="control-group">
                                                <label class="control-label" for="focusedInput">Name</label>
                                                <div class="controls">
                                                    <?php echo $categoryRowset['name']; ?> 
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Description</label>
                                                <div class="controls">
                                                    <span class="input-xlarge"><?php echo $categoryRowset['description']; ?></span>
                                                </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                <label class="control-label">Posted By</label>
                                                <div class="controls">
                                                    <span class="input-xlarge">
                                                        <?php
                                                        $author = $categoryRowset['user_id'];
                                                        $userdetails = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_user` WHERE `id`='$author'"));
                                                        echo $userdetails->fname . ' ' . $userdetails->lname;
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Price</label>
                                                <div class="controls">
                                                    <span class="input-xlarge"><?php echo $categoryRowset['currency']; ?> <?php echo $categoryRowset['price']; ?></span>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="optionsCheckbox2">Address</label>
                                                <div class="controls">
                                                    <label>
                                                        <?php echo $categoryRowset['city']; ?>, <?php echo $categoryRowset['state']; ?>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="inputError">Country</label>
                                                <div class="controls">
                                                    <?php
                                                    $country_name = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_countries` WHERE `id`='" . $categoryRowset['country'] . "'"));
                                                    echo $country_name['name'];
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="inputError">State</label>
                                                <div class="controls">
                                                    <?php echo $categoryRowset['state']; ?>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="inputError">Zip</label>
                                                <div class="controls">
                                                    <?php echo $categoryRowset['zipcode']; ?>
                                                </div>
                                            </div>

                                            <h3>Uploaded Images</h3>

                                            <div class="control-group">
                                                <?php
                                                $res22 = mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id`='" . $categoryRowset['id'] . "'");
                                                $tot = mysql_num_rows($res22);
                                                if ($tot > 0) {
                                                    while ($row22 = mysql_fetch_array($res22)) {
                                                        ?>
                                                        <img src="../upload/property/<?php echo $row22['image']; ?>" alt="" height="150" width="150" style="padding:5px; float:left;" /> 
                                                        <?php
                                                    }
                                                }
                                                ?>
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
            <?php include('includes/footer.php'); ?>

        </div>
        
        <!--/.fluid-container-->
        <link href="vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="vendors/chosen.min.css" rel="stylesheet" media="screen">
        <link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen" />
        
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
            $(function () {
                $(".datepicker").datepicker();
                $(".uniform_on").uniform();
                $(".chzn-select").chosen();
                $('.textarea').wysihtml5();

                $('#rootwizard').bootstrapWizard({onTabShow: function (tab, navigation, index) {
                        var $total = navigation.find('li').length;
                        var $current = index + 1;
                        var $percent = ($current / $total) * 100;

                        $('#rootwizard').find('.bar').css({width: $percent + '%'});

                        // If it's the last tab then hide the last button and show the finish instead
                        if ($current >= $total) {
                            $('#rootwizard').find('.pager .next').hide();
                            $('#rootwizard').find('.pager .finish').show();
                            $('#rootwizard').find('.pager .finish').removeClass('disabled');
                        } else {
                            $('#rootwizard').find('.pager .next').show();
                            $('#rootwizard').find('.pager .finish').hide();
                        }
                    }
                });

                $('#rootwizard .finish').click(function () {
                    alert('Finished!, Starting over!');
                    $('#rootwizard').find("a[href*='tab1']").trigger('click');
                });

            });
        </script>

    </body>
</html>