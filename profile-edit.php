<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");

if (!is_user_logged_in()) {
    header("location:index.php");
}
?>

<?php
if (isset($_REQUEST['submit'])) {

    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    $bday = isset($_POST['bday']) ? $_POST['bday'] : '';
    $bmonth = isset($_POST['bmonth']) ? $_POST['bmonth'] : '';
    $byear = isset($_POST['byear']) ? $_POST['byear'] : '';


    $dob = $bday . '-' . $bmonth . '-' . $byear;
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $zip = isset($_POST['zip']) ? $_POST['zip'] : '';
    $about_me = isset($_POST['about_me']) ? $_POST['about_me'] : '';
    $school = isset($_POST['school']) ? $_POST['school'] : '';
    $work = isset($_POST['work']) ? $_POST['work'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $language = isset($_POST['language']) ? $_POST['language'] : '';





    $fields = array(
        'fname' => mysql_real_escape_string($fname),
        'lname' => mysql_real_escape_string($lname),
        'gender' => mysql_real_escape_string($gender),
        'dob' => mysql_real_escape_string($dob),
        'email' => mysql_real_escape_string($email),
        'phone' => mysql_real_escape_string($phone),
        'address' => mysql_real_escape_string($address),
        'zip' => mysql_real_escape_string($zip),
        'about_me' => mysql_real_escape_string($about_me),
        'school' => mysql_real_escape_string($school),
        'work' => mysql_real_escape_string($work),
        'country' => mysql_real_escape_string($country),
        'language' => mysql_real_escape_string($language),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    $editQuery = "UPDATE `estejmam_user` SET " . implode(', ', $fieldsList)
            . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['id']) . "'";

    if (mysql_query($editQuery)) {

        header('Location:profile-edit.php');
        exit();
    }
}



$userprofile = mysql_fetch_array(mysql_query("select * from `estejmam_user` where `id`='" . $_SESSION['userid'] . "'"));

$dobb = $userprofile['dob'];
$expdval = explode('-', $dobb);
$day = $expdval[0];
$month = $expdval[1];
$year = $expdval[2];
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
                    <div class="col-md-3 col-sm-4">
                        <ul class="account-menu">
                            <li <?php echo ($pagename == 'profile-edit.php') ? 'class="selected"' : ''; ?>><a href="profile-edit.php">Edit Profile</a></li>
                            <li <?php echo ($pagename == 'profile-photo.php') ? 'class="selected"' : ''; ?>><a href="profile-photo.php">Photos, Symbol & Video</a></li>
                            <li <?php echo ($pagename == 'profile-verification.php') ? 'class="selected"' : ''; ?>><a href="profile-verification.php">Trust & Verification</a></li>
                            <li <?php echo ($pagename == 'profile-reviews.php') ? 'class="selected"' : ''; ?>><a href="profile-reviews.php">Reviews</a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <p><a href="my_account.php" class="invite-friend btn-block">View Profile</a></p>
                    </div>
                    <div class="col-md-9 col-sm-8 profile-right-sec">
                        <form class="form-horizontal" action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['userid'] ?>">
                            <div class="common_hold">
                                <h4 class="grey_bac">Required</h4>
                                <div class="common_hold-content-area">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fname" required value="<?php echo $userprofile['fname'] ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="lname" required value="<?php echo $userprofile['lname'] ?>"/>
                                            <small>This is only shared once you have a confirm booking with another user</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">I am <i class="fa fa-lock lock-icon"></i></label>
                                        <div class="col-sm-9">
                                            <div class="month-box">
                                                <select class="form-control" name="gender" required>
                                                    <option value="m" <?php if ($userprofile['gender'] == 'm') { ?> selected <?php } ?>>Male</option>
                                                    <option value="f" <?php if ($userprofile['gender'] == 'f') { ?> selected <?php } ?>>Female</option>
                                                </select>
                                            </div>
                                            <div class="clearfix"></div>
                                            <small>We use this date for analysis and never share it with other users</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Birth Date <i class="fa fa-lock lock-icon"></i></label>
                                        <div class="col-sm-9">
                                            <div class="day-box">
                                                <select name="bday" class="form-control" required>
                                                    <option value="">Day</option>
                                                    <?php
                                                    for ($i = 1; $i <= 31; $i++) {
                                                        ?>
                                                        <option value="<?php echo $i ?>" <?php if ($day == $i) { ?> selected <?php } ?>><?php echo $i ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="month-box">
                                                <select name="bmonth" class="form-control" required>
                                                    <option value="">Month</option>
                                                    <?php
                                                    for ($i = 1; $i <= 12; $i++) {
                                                        ?>
                                                        <option value="<?php echo $i ?>" <?php if ($month == $i) { ?> selected <?php } ?>><?php echo $i ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="year-box">
                                                <select name="byear" class="form-control" required>
                                                    <option value="">Year</option>
                                                    <?php
                                                    $curyear = date("Y");
                                                    $prevyear = $year - 50;
                                                    for ($i = $prevyear; $i <= $curyear; $i++) {
                                                        ?>
                                                        <option value="<?php echo $i ?>" <?php if ($year == $i) { ?> selected <?php } ?>><?php echo $i ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="clearfix"></div>
                                            <small>The magical day you were dropped from the sky by a stork</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Email Address <i class="fa fa-lock lock-icon"></i></label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" required value="<?php echo $userprofile['email'] ?>"/>
                                            <small>We won't show your email address with other Estejmam users.</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Phone No. <i class="fa fa-lock lock-icon"></i></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="phone" required value="<?php echo $userprofile['phone'] ?>"/>
                                            <small>This is only shared once you have a confirem booking with another Estejmam user. <br> This is how we can all get in touch</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Where you Live</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="e.g. Paris. France/Brooklyn" name="address" required value="<?php echo $userprofile['address'] ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Zip Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="e.g. Paris. France/Brooklyn" name="zip" required value="<?php echo $userprofile['zip'] ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Describe Yourself</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="4" name="about_me" required><?php echo $userprofile['about_me'] ?></textarea>
                                            <small>Estejmam is built on relationship. Help Othet people get to know you.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="common_hold">
                                <h4 class="grey_bac">Optional</h4>
                                <div class="common_hold-content-area">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">School</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="school" required value="<?php echo $userprofile['school'] ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Work</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="e.g. Estejmam / Apple" name="work" required value="<?php echo $userprofile['work'] ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Time Zone</label>
                                        <div class="col-sm-6">
                                            <select name="country" class="form-control" required>
                                                <option value="" disabled selected>Select</option>
                                                <?php
                                                $coun = mysql_query("select * from `estejmam_countries`");
                                                while ($allcountry = mysql_fetch_array($coun)) {
                                                    ?>
                                                    <option value="<?php echo $allcountry['id'] ?>" <?php if ($userprofile['country'] == $allcountry['id']) { ?> selected <?php } ?>><?php echo $allcountry['name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <small>Your home time zone</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Languages</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="language" required value="<?php echo $userprofile['language'] ?>"/>
<!--                                            <p><a href=""><i class="fa fa-plus"></i></a> Add More</p>-->
                                            <small>Add languages you speak.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary pull-left" value="Save" />
                        </form>
                    </div>
                </div>
            </div>

        </section>


        <?php include 'includes/footer.php'; ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>


    </body>
</html>
