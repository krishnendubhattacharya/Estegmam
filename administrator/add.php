<!DOCTYPE html>
<html>
    
    <head>
        <title>Forms</title>
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
                                <div class="muted pull-left">Form Example</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal">
                                      <fieldset>
                                        <legend>Form Horizontal</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Focused input</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="text" value="This is focused...">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">Uneditable input</label>
                                          <div class="controls">
                                            <span class="input-xlarge uneditable-input">Some value here</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="disabledInput">Disabled input</label>
                                          <div class="controls">
                                            <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox2">Disabled checkbox</label>
                                          <div class="controls">
                                            <label>
                                              <input type="checkbox" id="optionsCheckbox2" value="option1" disabled="">
                                              This is a disabled checkbox
                                            </label>
                                          </div>
                                        </div>
                                        <div class="control-group warning">
                                          <label class="control-label" for="inputError">Input with warning</label>
                                          <div class="controls">
                                            <input type="text" id="inputError">
                                            <span class="help-inline">Something may have gone wrong</span>
                                          </div>
                                        </div>
                                        <div class="control-group error">
                                          <label class="control-label" for="inputError">Input with error</label>
                                          <div class="controls">
                                            <input type="text" id="inputError">
                                            <span class="help-inline">Please correct the error</span>
                                          </div>
                                        </div>
                                        <div class="control-group success">
                                          <label class="control-label" for="inputError">Input with success</label>
                                          <div class="controls">
                                            <input type="text" id="inputError">
                                            <span class="help-inline">Woohoo!</span>
                                          </div>
                                        </div>
                                        <div class="control-group success">
                                          <label class="control-label" for="selectError">Select with success</label>
                                          <div class="controls">
                                            <select id="selectError">
                                              <option>1</option>
                                              <option>2</option>
                                              <option>3</option>
                                              <option>4</option>
                                              <option>5</option>
                                            </select>
                                            <span class="help-inline">Woohoo!</span>
                                          </div>
                                        </div>
                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">Save changes</button>
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