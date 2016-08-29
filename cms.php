<?php
ob_start();
session_start();
include('administrator/includes/config.php');
$row=  mysql_fetch_assoc(mysql_query("SELECT * FROM `estejmam_cms` WHERE id='".$_REQUEST['id']."'"));
//echo '<pre>';
//print_r($row);exit;
//echo '</pre>';
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

  <?php include('includes/header.php');?>
      
     <section class="my-account-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                    	<h3><?php echo $row['title'];?></h3>
                        <p><?php echo ($row['pagedetail']);?></p>
                    </div>
                 
                </div>
             
            </div>
        
    </section>  
	
<?php include('includes/footer.php');?> 
        
		<script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>
</body>
</html>

