<div class="homegallery_boxes_ul">
 <ul>
 <li>
    <img src="images/100percent.png" style="width:100%;">
 </li>
 <?php
 $sql=  mysql_query("SELECT * FROM `vacation_category` WHERE 1");
 while($row_cat= mysql_fetch_assoc($sql))
 {        
 ?>
 <li onclick="location.href='search_by_cat.php?cat_id=<?php echo $row_cat['id'];?>'" style=" cursor: pointer;">
     <div class="popularbx" style="background: url(upload/category/<?php echo $row_cat['image'];?>) repeat scroll 0 0 / 100% 100% rgba(0, 0, 0, 0)">
       <div class="popular_txt"><p></p></div>
    </div>
 </li>
 <?php }  ?>


 </ul>
 <div class="clearfix"></div>
 <div class="footer_topbx">  

            <ul>

              <li>

                <p>Latest Property</p>
                <div class="top_pri top_pti_list">
                	<ul>
                         <?php
                         $sql_latest_prop=mysql_query("select * from `vacation_property` where  status='1'");
                         while($row_latest=mysql_fetch_assoc($sql_latest_prop))
                         {        
                         ?>
                    	<li><a href="details.php?id=<?php echo $row_latest['id'];?>"><img src="images/arrow_yellow.png"> &nbsp; <?php echo $row_latest['title'];?></a></li>
                         <?php }?>
                    	
                    </ul>
                </div>

              </li>             

            </ul>        

          </div>
 </div>
<style>
.homegallery_boxes_ul{ min-height:501px !important; }    
.bx-controls-direction a { top:23% !important;}
</style>