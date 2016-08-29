<?php
$row = mysql_fetch_assoc(mysql_query("select * from vacation_user where id='" . $_SESSION['user_id'] . "'"));
?>
<div class="profile_left">
    <div class="profile_picture">
        <?php
        if ($row['image'] == '') {
            ?>
            <img src="upload/nouser.jpg" class="img-responsive" alt="">
        <?php } else { ?>
            <img src="upload/userphoto/<?php echo $row['image']; ?>" class="img-responsive" alt="">

        <?php } ?>
        <div class="profile_name">
            <h4><?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?></h4>
        </div>
    </div>      
    <div class="leftmenu">
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>                                    
            <li><a href="my_account.php">My Account</a></li>
            <li><a href="add_property.php">Add Property</a></li>
            <li><a href="logout.php">Log Out</a></li>

        </ul>
    </div>
</div>