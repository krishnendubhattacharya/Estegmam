<?php $pagename = end(explode('/', $_SERVER['REQUEST_URI'])); ?>
<div class="span3" id="sidebar">

    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">

        <li <?php if ($pagename == 'dashboard.php') { ?>  class="active" <?php } ?>>
            <a href="dashboard.php"><i class="icon-chevron-right"></i> Dashboard</a>
        </li>

        <li <?php if ($pagename == 'site_logo.php') { ?>  class="active" <?php } ?>>
            <a href="site_logo.php"><i class="icon-chevron-right"></i> Manage Logo</a>
        </li>

        <li <?php if ($pagename == 'add_banner.php') { ?>  class="active" <?php } ?>>
            <a href="add_banner.php"><i class="icon-chevron-right"></i> Add Banner</a>
        </li>

        <li <?php if ($pagename == 'list_banner.php') { ?>  class="active" <?php } ?>>
            <a href="list_banner.php"><i class="icon-chevron-right"></i> List Banner</a>
        </li>

        <li <?php if ($pagename == 'social.php') { ?>  class="active" <?php } ?>>
            <a href="social.php"><i class="icon-chevron-right"></i> Manage Social Media</a>
        </li>

        <?php /* ?>  <li <?php if($pagename=='home_elements.php'){?>  class="active" <?php }?>>
          <a href="home_elements.php"><i class="icon-chevron-right"></i> Manage Home Elements</a>
          </li>
          <?php */ ?>

        <li <?php if ($pagename == 'cms.php') { ?>  class="active" <?php } ?>>
            <a href="cms.php"><i class="icon-chevron-right"></i> Manage CMS</a>
        </li>

        <li <?php if ($pagename == 'list_user_landlord.php') { ?>  class="active" <?php } ?>>
            <a href="list_user_landlord.php"><i class="icon-chevron-right"></i> Landlords</a>
        </li>
        
        <li <?php if ($pagename == 'list_user.php') { ?>  class="active" <?php } ?>>
            <a href="list_user.php"><i class="icon-chevron-right"></i> Tenants</a>
        </li>
        
        <li <?php if ($pagename == 'add_amenities.php') { ?>  class="active" <?php } ?>>
            <a href="add_amenities.php"><i class="icon-chevron-right"></i> Add amenities</a>
        </li>

        <li <?php if ($pagename == 'list_amenities.php') { ?>  class="active" <?php } ?>>
            <a href="list_amenities.php"><i class="icon-chevron-right"></i> Amenities List</a>
        </li>
        
        <!--<li <?php if ($pagename == 'add_category.php') { ?>  class="active" <?php } ?>>
            <a href="add_category.php"><i class="icon-chevron-right"></i> Add Category</a>
        </li>

        <li <?php if ($pagename == 'list_category.php') { ?>  class="active" <?php } ?>>
            <a href="list_category.php"><i class="icon-chevron-right"></i> Category List</a>
        </li>-->

        <?php /* ?><li <?php if($pagename=='list_order.php'){?>  class="active" <?php }?>>
          <a href="list_order.php"><i class="icon-chevron-right"></i> Lisr Order</a>

          </li>
          <?php */ ?>



        <!--<li <?php if ($pagename == 'add_property.php') { ?>  class="active" <?php } ?>>
            <a href="add_property.php"><i class="icon-chevron-right"></i> Add Property</a>
        </li>-->

        <li <?php if ($pagename == 'list_property.php') { ?>  class="active" <?php } ?>>
            <a href="list_property.php"><i class="icon-chevron-right"></i> List Property</a>
        </li>


        <?php /* <li <?php if ($pagename == 'manage_percentage.php') { ?>  class="active" <?php } ?>>

          <a href="manage_percentage.php"><i class="icon-chevron-right"></i>Manage Registration Amount</a>

          </li>

          <li <?php if ($pagename == 'manage_featured_percentage.php') { ?>  class="active" <?php } ?>>
          <a href="manage_featured_percentage.php"><i class="icon-chevron-right"></i>Manage Featured Amount</a>
          </li>

          <li <?php if ($pagename == 'manage_bestrated_percentage.php') { ?>  class="active" <?php } ?>>
          <a href="manage_bestrated_percentage.php"><i class="icon-chevron-right"></i>Manage Best Rated Amount</a>
          </li>
          <li <?php if ($pagename == 'manage_toppriority_percentage.php') { ?>  class="active" <?php } ?>>
          <a href="manage_toppriority_percentage.php"><i class="icon-chevron-right"></i>Manage Top Priority Amount</a>
          </li>
          <li <?php if ($pagename == 'manage_newest_percentage.php') { ?>  class="active" <?php } ?>>
          <a href="manage_newest_percentage.php"><i class="icon-chevron-right"></i>Manage Newest Amount</a>
          </li> */ ?>

        <li <?php if ($pagename == 'changepaypal_email.php') { ?>  class="active" <?php } ?>>
            <a href="changepaypal_email.php"><i class="icon-chevron-right"></i> Admin Paypal Access</a>
        </li>

        <li <?php if ($pagename == 'changeaccess.php') { ?>  class="active" <?php } ?>>
            <a href="changeaccess.php"><i class="icon-chevron-right"></i> Admin Payment Access</a>
        </li>

        <?php /* ?><li <?php if($pagename=='adventure-upload.php'){?>  class="active" <?php }?>>

          <a href="adventure-upload.php"><i class="icon-chevron-right"></i>Bulk Adventure Upload</a>

          </li><?php


          <li <?php if ($pagename == 'membership_payments.php') { ?>  class="active" <?php } ?>>
          <a href="membership_payments.php"><i class="icon-chevron-right"></i>Membership Payments</a>
          </li>

          <li <?php if ($pagename == 'booking_payments.php') { ?>  class="active" <?php } ?>>
          <a href="booking_payments.php"><i class="icon-chevron-right"></i>Booking Payments</a>
          </li>

          <li <?php if ($pagename == 'extra_payments.php') { ?>  class="active" <?php } ?>>
          <a href="extra_payments.php"><i class="icon-chevron-right"></i>Extra Payments</a>
          </li> */ ?>

        <!--  <li>
           <a href="interface.html"><i class="icon-chevron-right"></i> UI & Interface</a>
       </li>

       <li>
           <a href="#"><span class="badge badge-success pull-right">731</span> Orders</a>
       </li>

       <li>
           <a href="#"><span class="badge badge-success pull-right">812</span> Invoices</a>
       </li>

       <li>
           <a href="#"><span class="badge badge-info pull-right">27</span> Clients</a>
       </li>

       <li>
           <a href="#"><span class="badge badge-info pull-right">1,234</span> Users</a>
       </li>

       <li>
           <a href="#"><span class="badge badge-info pull-right">2,221</span> Messages</a>
       </li>

       <li>
           <a href="#"><span class="badge badge-info pull-right">11</span> Reports</a>
       </li>

       <li>
           <a href="#"><span class="badge badge-important pull-right">83</span> Errors</a>
       </li>-->

        <li>
            <a href="logout.php">Logout</a>
        </li>

    </ul>

</div>