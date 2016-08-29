<div class="homegallery_boxes_ul">
 <ul>
 <li>
    <img src="images/100percent.png" style="width:100%;">
 </li>
 <?php
 $sql=  mysql_query("SELECT * FROM `vacation_category` WHERE 1");
 while($row= mysql_fetch_assoc($sql))
 {        
 ?>
 <li onclick="location">
     <div class="popularbx" style="background: url(upload/category/<?php echo $row['image'];?>) repeat scroll 0 0 / 100% 100% rgba(0, 0, 0, 0)">
       <div class="popular_txt"><p></p></div>
    </div>
 </li>
 <?php }  ?>


 </ul>
 <div class="clearfix"></div>
 <div class="footer_topbx">
 </div>
 </div>