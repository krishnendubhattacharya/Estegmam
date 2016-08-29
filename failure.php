<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");

if (!is_user_logged_in()) {
    header("location:index.php");
}

?>



<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Estejmam</title>

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href='css/jquery.bxslider.css' rel='stylesheet' type='text/css'>
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/style5.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
        <link rel="stylesheet" type="text/css" href="css/style8.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

    </head>

    <body>
        
        
        <?php include 'includes/inner-header.php'; ?>

        <section class="my-account-section">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12">
                        

                        
                        <div class="common_hold">
                            <h4 class="grey_bac">Payment Failed</h4>
                            <div class="common_hold-content-area">
                                <ul class="default-listing">
                                    <li>
                                        <p>Sorry. You Payment is Failed.</p>
										
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </section>


        <?php include("includes/footer.php"); ?>
        
        

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>
<?php
unset($_SESSION['price']);
unset($_SESSION['S_DATE']);
unset($_SESSION['E_DATE']);
unset($_SESSION['price']);
unset($_SESSION['id']);
unset($_SESSION['user_id']);
unset($_SESSION['uploder_user_id']);
unset($_SESSION['total_days']);
?>

    </body>
</html>
