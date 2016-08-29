<div class="home_gal_rht home_gal_rht_locaton">
          
          	          
          
          	<?php
		  $content=mysql_fetch_assoc(mysql_query("select * from `vacation_cms` where id='14'"));
		  echo stripslashes($content['pagedetail']);
		  ?>
          
            <div class="homegallery_boxes location">
            <div class="small_bx">
              <div class="footer_top_location"> 
                <ul class="bxslider_location">
                  <?php
 					$sql=mysql_query("SELECT * FROM `vacation_property` WHERE status='1' and is_featured='1' order by id desc");
					if(mysql_num_rows($sql)>1)
					{
					while($row=mysql_fetch_assoc($sql)){
 					$res22=mysql_fetch_array(mysql_query("SELECT * FROM `vacation_image` WHERE `adv_id`='".$row['id']."' limit 1"));
					 if(!empty($res22))
					 {
					  $img="upload/property/".$res22['image'];	 
					 }
					 else{
					   $img="upload/property/noimage.jpg";	 
						 
					 }
				  ?>
                  <li style="max-width: 235px;">
                  <h3>Featured homes</h3>
                  <img src="resize.php?pic=<?php echo $img;?>&h=320&w=300">
                  <div class="location_sli_desc">
                  	<p style=" height:71px;"><?php echo strip_tags(substr(stripslashes($row['description']),0,140));?></p>
                    <p class="location_address"><i class="fa fa-map-marker"></i><b>Location: </b><?php echo $row['city'].' '.$row['state'];?>.</p>
                    <p class="location_address"><b>Price: $ <?php echo $row['price'];?></b>.</p>
                    <p class="location_address"><b>ID Number: </b><?php echo $row['id'];?></p>
                    <p class="detailsbtn"><a class="btn_details" href="details.php?id=<?php echo $row['id']; ?>">Details</a></p>
                  </div>
                  
                  </li> 
                  <?php }} ?>
                </ul> 
              </div> 
              <div class="footer_top_location"> 
                <ul class="bxslider_location">
                 <?php
 					$sql=mysql_query("SELECT * FROM `vacation_property` WHERE status='1' and is_toprated='1' order by id desc");
					if(mysql_num_rows($sql)>1)
					{
					while($row=mysql_fetch_assoc($sql)){
 					$res22=mysql_fetch_array(mysql_query("SELECT * FROM `vacation_image` WHERE `adv_id`='".$row['id']."' limit 1"));
					 if(!empty($res22))
					 {
					  $img="upload/property/".$res22['image'];	 
					 }
					 else{
					   $img="upload/property/noimage.jpg";	 
						 
					 }
				  ?>
                  <li style="max-width: 235px;">
                  <h3>Best Rated Homes</h3>
                  <img src="resize.php?pic=<?php echo $img;?>&h=320&w=300">
                  <div class="location_sli_desc">
                  	<p style="height:71px;"><?php echo strip_tags(substr(stripslashes($row['description']),0,140));?></p>
                    <p class="location_address"><i class="fa fa-map-marker"></i><b>Location: </b><?php echo $row['city'].' '.$row['state'];?>.</p>
                    <p class="location_address"><b>Price: $ <?php echo $row['price'];?></b>.</p>
                    <p class="location_address"><b>ID Number: </b><?php echo $row['id'];?></p>
                    <p class="detailsbtn"><a class="btn_details" href="details.php?id=<?php echo $row['id']; ?>">Details</a></p>
                  </div>
                  
                  </li> 
                  <?php }} ?>  
                  
                </ul> 
              </div>
              <div class="footer_top_location"> 
                <ul class="bxslider_location">
                  <?php
 					$sql=mysql_query("SELECT * FROM `vacation_property` WHERE status='1' and is_newest='1' order by id desc");
					if(mysql_num_rows($sql)>1)
					{
					while($row=mysql_fetch_assoc($sql)){
 					$res22=mysql_fetch_array(mysql_query("SELECT * FROM `vacation_image` WHERE `adv_id`='".$row['id']."' limit 1"));
					 if(!empty($res22))
					 {
					  $img="upload/property/".$res22['image'];	 
					 }
					 else{
					   $img="upload/property/noimage.jpg";	 
						 
					 }
				  ?>

                  <li style="max-width: 235px;">
                  <h3>Newest Homes</h3>
                  <img src="resize.php?pic=<?php echo $img;?>&h=320&w=300">
                  <div class="location_sli_desc">
                  	<p style="height:71px;"><?php echo strip_tags(substr(stripslashes($row['description']),0,140));?></p>
                    <p class="location_address"><i class="fa fa-map-marker"></i><b>Location: </b><?php echo $row['city'].' '.$row['state'];?></p>
                    <p class="location_address"><b>Price: $ <?php echo $row['price'];?></b>.</p>
                    <p class="location_address"><b>ID Number: </b><?php echo $row['id'];?></p>
                    <p class="detailsbtn"><a class="btn_details" href="details.php?id=<?php echo $row['id']; ?>">Details</a></p>
                  </div>
                  
                  </li> 
                  <?php }} ?>  
                  
                </ul> 
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

          </div>

          </div>