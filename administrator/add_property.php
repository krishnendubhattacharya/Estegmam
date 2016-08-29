<?php
error_reporting(1);
include_once('includes/session.php');
include_once("includes/config.php");
include_once("includes/functions.php");
if (isset($_REQUEST['id'])) {
    $pid = $_REQUEST['id'];
} else {
    $pid = 0;
}

if (isset($_REQUEST['submit'])) {

    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $zip = isset($_POST['zip']) ? $_POST['zip'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $owner_info = isset($_POST['owner_info']) ? $_POST['owner_info'] : '';





    $fields = array(
        'title' => mysql_real_escape_string($title),
        'description' => mysql_real_escape_string($description),
        'price' => mysql_real_escape_string($price),
        'address' => mysql_real_escape_string($address),
        'city' => mysql_real_escape_string($city),
        'state' => mysql_real_escape_string($state),
        'zip' => mysql_real_escape_string($zip),
        'owner_info' => mysql_real_escape_string($owner_info),
        'country' => mysql_real_escape_string($country));

    $fieldsList = array();

    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }



    if ($_REQUEST['action'] == 'edit') {

        $editQuery = "UPDATE `estejmam_property` SET " . implode(', ', $fieldsList)
                . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";


        $sql = "DELETE from `estejmam_image` where adv_id=" . $_REQUEST['id'];
        mysql_query($sql);




        foreach ($_REQUEST['images'] as $inv_video) {
            $adv_id = $_REQUEST['id'];
            $video_link = basename($inv_video);

            $date_added = date('y-m-d h:i:s');
            mysql_query("INSERT INTO `estejmam_image` 
			(user_id,adv_id,title,description,image,date_added)  
			VALUES ('0','$adv_id','','','$video_link','$date_added')");
        }




        if (mysql_query($editQuery)) {
            $_SESSION['msg'] = "Category Updated Successfully";
        } else {
            $_SESSION['msg'] = "Error occuried while updating Category";
        }
        header('Location:list_property.php');
        exit();
    } else {

        $addQuery = "INSERT INTO `estejmam_property` (`" . implode('`,`', array_keys($fields)) . "`)"
                . " VALUES ('" . implode("','", array_values($fields)) . "')";



        $record = mysql_query("SELECT MAX(id) as MaximumID FROM `estejmam_property`");

        $max_id = mysql_fetch_row($record);

        $max_id = $max_id[0] + 1;

        mysql_query("DELETE `estejmam_image` where adv_id=" . $max_id);


        foreach ($_REQUEST['images'] as $inv_video) {

            $adv_id = $max_id;
            $video_link = basename($inv_video);
            $date_added = date('y-m-d h:i:s');
            mysql_query("INSERT INTO `estejmam_image` 
			(user_id,adv_id,title,description,image,date_added)  
			VALUES ('0','$adv_id','','','$video_link','$date_added')");
        }



        if (mysql_query($addQuery)) {

            $_SESSION['msg'] = "Category Added Successfully";
        } else {

            $_SESSION['msg'] = "Error occuried while adding Category";
        }
        header('Location:list_property.php');
        exit();
    }
}


if ($_REQUEST['action'] == 'edit') {
    $categoryRowset = mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_property` WHERE `id`='" . mysql_real_escape_string($_REQUEST['id']) . "'"));
}



/* print_r($categoryRowset_video); */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Property</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        
                    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        
                <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="ckfinder/ckfinder_v1.js"></script>
        <link rel="stylesheet" type="text/css" href="css/uploadify.css">
    </head>
    <body>
        <?php include('includes/header.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php include('includes/left_panel.php'); ?>
                <div class="span9" id="content">
                    <div class="row-fluid">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><?php echo $_REQUEST['action'] == 'edit' ? "Edit" : "Add"; ?> Adventure</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" method="post" action="add_property.php">
                                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
                                        <input type="hidden" name="action" value="<?php echo $_REQUEST['action']; ?>" />
                                        <fieldset>
                                            <legend><?php echo $_REQUEST['action'] == 'edit' ? "Edit" : "Add"; ?> Property</legend>
                                            <div class="control-group">
                                                <label class="control-label" for="focusedInput">Title</label>
                                                <div class="controls">
                                                    <input name="title" class="input-xlarge focused" required  id="focusedInput" type="text" value="<?php echo stripslashes($categoryRowset['title']); ?>">
                                                </div>
                                            </div>



                                            <div class="control-group">
                                                <label class="control-label" for="focusedInput">Description</label>
                                                <div class="controls">
                                                    <textarea id="editor1" name="description" cols="79" rows="15"><?php echo stripslashes($categoryRowset['description']); ?></textarea>
                                                </div>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label" for="focusedInput">Cost($)</label>
                                                <div class="controls">
                                                    <input name="price" class="input-xlarge focused" required  id="focusedInput" type="text" value="<?php echo $categoryRowset['price']; ?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="focusedInput">Address</label>
                                                <div class="controls">
                                                    <input name="address" class="input-xlarge focused" required  id="focusedInput" type="text" value="<?php echo $categoryRowset['address']; ?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="focusedInput">City</label>
                                                <div class="controls">
                                                    <input name="city" class="input-xlarge focused" required  id="focusedInput" type="text" value="<?php echo $categoryRowset['city']; ?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="focusedInput">State</label>
                                                <div class="controls">
                                                    <input name="state" class="input-xlarge focused" required  id="focusedInput" type="text" value="<?php echo $categoryRowset['state']; ?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="focusedInput">Zip</label>
                                                <div class="controls">
                                                    <input name="zip" class="input-xlarge focused" required  id="focusedInput" type="text" value="<?php echo $categoryRowset['zip']; ?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="focusedInput">Country</label>
                                                <div class="controls">
                                                    <select name="country" id="country">
                                                        <option value="">Select One</option>
                                                        <?php
                                                        $SQL = "SELECT * FROM `estejmam_countries`";

                                                        $result = mysql_query($SQL);

                                                        while ($row1 = mysql_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?php echo $row1['iso']; ?>" <?php
                                                            if ($categoryRowset['country'] == $row1['iso']) {
                                                                echo "selected";
                                                            }
                                                            ?> > <?php echo $row1['name']; ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label" for="focusedInput">Owner Info</label>
                                                <div class="controls">
                                                    <textarea id="editor2" name="owner_info" cols="79" rows="15"><?php echo stripslashes($categoryRowset['owner_info']); ?></textarea>
                                                </div>
                                            </div>




                                            <div class="control-group">
                                                <label class="control-label" for="focusedInput">Image</label>
                                                <div class="controls">
                                                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                                                </div>
                                                <div id="content1">
                                                    <?php
                                                    $res22 = mysql_query("SELECT * FROM `estejmam_image` WHERE `adv_id`='" . $_REQUEST['id'] . "'");
                                                    $tot = mysql_num_rows($res22);
                                                    if ($tot > 0) {
                                                        while ($row22 = mysql_fetch_array($res22)) {
                                                            ?>
                                                            <div style="float:left;width:70px;border:0px solid red;position:relative;" class="div_div">
                                                                <input type="hidden" value="<?php echo $row22['image']; ?>" class="video_hid" name="images[]">
                                                                <img border="0" src="../upload/property/<?php echo $row22['image']; ?>" style="height:50px;width:50px;"><a class="del_this" id="<?php echo $row22['id']; ?>" href="javascript: void(0)"><img border="0" src="images/erase.png"></a></div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
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
            <?php include('includes/footer.php'); ?>
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
        <script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
        <script src="assets/scripts.js"></script>
        <script>


            $(function () {
                $('#new_lang1').click(function (event) {

                    var newRow1 = '<div id="new"><div class="controls" style="float: left;margin-top: 5px;width: 292px;"><input name="video[]" class="input-xlarge focused"  id="focusedInput" type="text" value=""></div><image src="images/erase.png" alt="erase" class="erase" style="float: left;margin-top: 14px; vertical-align: middle;"></div>';
                    $(newRow1).appendTo('#tab1');
                    $('.erase').click(function (event) {
                        $(this).closest('#new').remove();
                    });
                });

                $('.erase').click(function (event) {
                    $(this).closest('#new').remove();
                });

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
        <script type="text/javascript">
            CKEDITOR.replace('editor1',
                    {
                        filebrowserFlashBrowseUrl: './ckfinder/ckfinder.html?type=Flash',
                        filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                        filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                    }
            );

            CKEDITOR.replace('editor2',
                    {
                        filebrowserFlashBrowseUrl: './ckfinder/ckfinder.html?type=Flash',
                        filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                        filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                    }
            );

        </script>
        <script type="text/javascript">
            <?php $timestamp = time(); ?>
    
            $(function () {

                $('#file_upload').uploadify({
                    'swf': 'uploadify.swf', 'uploader': 'uploadify.php',
                    'fileTypeExts': '*.jpg; *.png; *.jpeg; *.JPG; *.PNG; *.JPEG',
                    'checkScript': 'check-exists.php',
                    'cancelImg': 'uploadify-cancel.png',
                    'buttonText': 'Add Images',
                    'displayData': 'percentage',
                    'formData': {'id':<?php echo $pid; ?>},
                    'onUploadSuccess': function (file, data, response) {

                        $('#content1').append('<div class="div_div" style="float:left;width:70px;border:0px solid red;position:relative;"><input type="hidden" name="images[]" class="video_hid" value="' + data + '"><img border="0" style="height:50px;width:50px;" src=" ' + data + '" /><a href="javascript: void(0)" id="" class="del_this"><img border="0" src="images/erase.png"  border="0"/></a></div>');

                        $('.del_this').click(function (event) {
                            $(this).closest('.div_div').remove();
                        });

                        //$('#imageData').val(file.name);
                        //getFileLists(file.name,file.size);
                        //viewFirst();
                    },
                    'onUploadError': function (file, errorCode, errorMsg, errorString) {
                        alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
                    }

                    // Put your options here

                });


                $('.del_this').click(function (event) {
                    $(this).closest('.div_div').remove();


                });

            });


        </script>
    </body>
</html>
