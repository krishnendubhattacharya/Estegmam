<?php
$prof = mysql_fetch_array(mysql_query("select * from `estejmam_user` where `id`='" . $_SESSION['userid'] . "'"));
if ($prof['image'] != '') {
    $img = "upload/userimages/" . $prof['image'];
} else {
    $img = "upload/nouser.jpg";
}
?> 
<div class="profile_left">
    <div class="profile_picture">
        <img src="<?php echo $img ?>" class="img-responsive" alt="">
        <h4><?php echo $prof['fname'] . ' ' . $prof['lname'] ?></h4>
    </div>      
    <ul class="left-panel-menu">
        <li><a href="my_account.php">Edit Profile</a></li>
        <li><a href="change_password.php">Change Password</a></li>
        
        <?php if($prof['type'] == '1'){ ?>
        <li><a href="prop-step1.php">Add Property</a></li>
        <li><a href="prop-list.php">My Property</a></li>
        <?php } ?>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>