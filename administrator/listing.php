<!DOCTYPE html>
<html>
    
    <head>
        <title>Tables</title>
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
                                <div class="muted pull-left">Bordered Table</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table table-bordered">
						              <thead>
						                <tr>
						                  <th>#</th>
						                  <th>First Name</th>
						                  <th>Last Name</th>
						                  <th>Username</th>
						                </tr>
						              </thead>
						              <tbody>
						                <tr>
						                  <td>1</td>
						                  <td>Mark</td>
						                  <td>Otto</td>
						                  <td>@mdo</td>
						                </tr>
						                <tr>
						                  <td>2</td>
						                  <td>Jacob</td>
						                  <td>Thornton</td>
						                  <td>@fat</td>
						                </tr>
						                <tr>
						                  <td>3</td>
						                  <td>Larry</td>
						                  <td>the Bird</td>
						                  <td>@twitter</td>
						                </tr>
						              </tbody>
						            </table>
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