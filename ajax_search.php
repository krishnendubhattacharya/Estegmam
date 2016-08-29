<?php
ob_start();
session_start();
include 'administrator/includes/config.php';
include 'functions/functions.php';
//$item_per_page 		= 5; //item to display per page
//Get page number from Ajax POST
/* if(isset($_POST["page"])){
  $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
  if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
  }else{
  $page_number = 1; //if there's no page number, set it to 1
  }

  //get total number of records from database for pagination
  $results = $mysqli->query("SELECT COUNT(*) FROM estejmam_main_property");
  $get_total_rows = $results->fetch_row(); //hold total records in variable
  //break records into pages
  $total_pages = ceil($get_total_rows[0]/$item_per_page);

  //get starting position to fetch the records
  $page_position = (($page_number-1) * $item_per_page); */
?>

<div class="row" id="myList">

    <?php
    $start_date = $_REQUEST['check_in'];
    $end_date = $_REQUEST['check_out'];
    $bathrooms = $_REQUEST['bathrooms'];

    $bedrooms = $_REQUEST['bedrooms'];
    $beds = $_REQUEST['beds'];
    $guest = $_REQUEST['guest'];

    $max_price = $_REQUEST['max_price'];
    $min_price = $_REQUEST['min_price'];
    $room_type = $_REQUEST['room_type'];

    $proptype = $_REQUEST['proptype'];
    $ameniteis = $_REQUEST['ameniteis'];
    $language = $_REQUEST['language'];


    $allroomtype = implode("','", $room_type);

    $allproptype = implode("','", $proptype);

    $allameniteis = implode(',', $ameniteis);


//echo "SELECT * FROM `estejmam_booking` WHERE '" . $start_date . "'  between `start_date` and `end_date` UNION SELECT * FROM `estejmam_booking` WHERE '" . $end_date . "'  between `start_date` and `end_date`";
//$chechbooking = mysql_query("select * from `estejmam_booking` where ('" . $start_date . "' between `start_date` and `end_date`) or ('" . $end_date . "' between `start_date` and `end_date`)");


    $chechbooking = mysql_query("select * from `estejmam_booking` where `start_date`>='" . $start_date . "' and `end_date`<='" . $end_date . "'");

//echo "select * from `estejmam_booking` where `start_date`>='" . $start_date . "' and `end_date`<='" . $end_date . "'";

    while ($fetch = mysql_fetch_array($chechbooking)) {
        $prop_id[] = $fetch['prop_id'];
    }

    $final_id = implode(',', array_unique($prop_id));


    $sql = "select * from `estejmam_main_property` where 1";
    if ($start_date != '' && $end_date != '') {
        $sql.= " AND `id` NOT IN($final_id)";
    }
    if ($max_price != '' && $min_price != '') {
        $sql.= " AND `price` between '" . $min_price . "' and '" . $max_price . "'";
    }
    if ($room_type != '') {
        $sql.= " AND `room_type` IN('$allroomtype')";
    }
    if ($guest != '') {
        $sql.= " AND `accommodates` = '" . $guest . "'";
    }
    if ($proptype != '') {
        $sql.= " AND `prop_type` IN('$allproptype')";
    }
    if ($bathrooms != '') {
        $sql.= " AND `bathrooms` = '" . $bathrooms . "'";
    }
    if ($bedrooms != '') {
        $sql.= " AND `bedrooms` = '" . $bedrooms . "'";
    }
    if ($beds != '') {
        $sql.= " AND `beds` = '" . $beds . "'";
    }
    if ($ameniteis != '') {
        $sql.= " AND `amenities` IN('$allameniteis')";
        //$sql.= " AND FIND_IN_SET (amenities,'$allameniteis')";
    }
    $sql.=" And `status`='1'";
//echo $sql;
    $property_list = mysql_query($sql);
    $num = mysql_num_rows($property_list);
    if ($num > 0) {
        while ($row = mysql_fetch_object($property_list)) {
            $user_details = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_user` WHERE `id` = '$row->user_id'"));
            $image_details = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id` = '$row->id' LIMIT 1"));
            $image = $image_details->image;
            ?>
            <?php echo $mainlist = "<li>
                <div class='col-md-6'>
                    <div class='listing-content-hold'>
                        <div class='list-content-top'>
           <img src='upload/property/" . $image . "' alt='' class='item-image' onclick='window.location.href = 'property_details.php?id=$row->id''>
            <div class='heart'><img src='images/heart.png' alt=''></div>
        </div>
        <div class='list-content-bottom'>
            <div class='list-content-bottom-left'>
                <img src='images/author.jpg' alt=''>
            </div>
            <div class='list-content-bottom-right'>
                <p>$row->name</p>
                <p>" . substr($row->description, 0, 30) . "</p>
                <p class='rate'> <i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i> (5)</p>
            </div>
        </div>
        </div>
        </div>
        </li>" ?>
            <?php
        }
    } else {
        echo "Sorry, No Property Found....";
    }
    ?>

</div><script>
    $(document).ready(function () {

        size_li = $("#myList li").size();
        x = 4;
        $('#myList li:lt(' + x + ')').show();
        $('#loadMore').click(function () {
            x = (x + 4 <= size_li) ? x + 4 : size_li;
            $('#myList li:lt(' + x + ')').show();
        });
        $('#showLess').click(function () {
            x = (x - 4 < 1) ? 4 : x - 4;
            $('#myList li').not(':lt(' + x + ')').hide();
        });


    });
</script>!!!***



<?php /*?><?php
$i = 0;
$property_list = mysql_query($sql);
while ($result = mysql_fetch_object($property_list)) {
    $image_details = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id` = '$result->id' LIMIT 1"));
    $image = $image_details->image;
    ?>
    <?php if ($i < $num) { ?>
        {
        lat: <?php echo $result->lat; ?>,
        lng: <?php echo $result->lng; ?>,
        name: "<?php echo $result->name; ?>",
        image: "<?php echo $image; ?>",
        id: "<?php echo $result->id; ?>"
        },
    <?php } else { ?>
        {
        lat: <?php echo $result->lat; ?>,
        lng: <?php echo $result->lng; ?>,
        name: <?php echo $result->name; ?>,
        image: "<?php echo $image; ?>",
        id: "<?php echo $result->id; ?>"
        }
        <?php
    }
    $i++;
}<?php */?>
<?php 
 $marker = array();
  mysql_data_seek($property_list, 0);
  while ($result = mysql_fetch_object($property_list)) {
  $image_details = mysql_fetch_object(mysql_query("SELECT * FROM `estejmam_image` WHERE `prop_id` = '$result->id' LIMIT 1"));
  $image = $image_details->image;

  $marker[]=array('lat'=>$result->lat,
  'lng'=>$result->lng,
  'name'=>$result->name,
  'image'=> $image,
  'id'=> $result->id);
  }
 echo json_encode($marker); 


//echo $all_data = $mainlist . '_' . $send_marker;
?>




