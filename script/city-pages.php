<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title>SWIFT</title>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
   
  </head>
  <body>
<?php
//error_reporting(0);
    $link = mysql_connect('localhost', 'root', 'Qaladza1974');
    if (!$link) {
        die('Not connected : ' . mysql_error());
    }
    // make foo the current db
    $db_selected = mysql_select_db('moveon', $link);
    if (!$db_selected) {
        die ('Can\'t use foo : ' . mysql_error());
    }
    
$pageN = $_GET['pg'];
$newPage = $pageN+1;
$cityID = $_GET['cityID'];
$newcityID = $cityID+1;

$samplepagesQ = "SELECT * FROM `sampleservices` WHERE `id` = ".$pageN;
$samplepages = mysql_query($samplepagesQ);
$samplepagesR = mysql_fetch_array($samplepages);

if($samplepagesR['county_name']){
$csql = "SELECT city.city_name as CITY,county.county_name as COUNTY FROM `city` ,county WHERE county.id = city.county_id and county.county_name ='".$samplepagesR['county_name']."'";
$result = mysql_query($csql);
//$crow = mysql_fetch_array($cresult);
//print_r($crow);
//die;
$i =0;
while($row =  mysql_fetch_assoc($result)) {
$i++;
echo '<br />'.$i.'<br />';
$Location = $row['CITY'];
$city = $row['CITY'];
$county = $row['COUNTY'];


//$Location = $samplepagesR['city_name'];

$title = str_replace("{LOCATION}",$Location,$samplepagesR['title']);
$service_slug = createurl(str_replace("{LOCATION}",'',$samplepagesR['service_name']));
$county_slug = createurl($county);
$city_slug = createurl($city);
$meta_title = str_replace("{LOCATION}",$Location,$samplepagesR['meta_title']);
$meta_keywords = str_replace("{LOCATION}",$Location,$samplepagesR['meta_keywords']);
$meta_description = str_replace("{LOCATION}",$Location,$samplepagesR['meta_description']);
$short_description = str_replace("{LOCATION}",$Location,$samplepagesR['short_description']);
$description = str_replace("{LOCATION}",$Location,$samplepagesR['description']);
$service_name = $samplepagesR['service_name'];
$banner_text = str_replace("{LOCATION}",$Location,$samplepagesR['banner_text']);
$banner_sub_text = str_replace("{LOCATION}",$Location,$samplepagesR['banner_sub_text']);
 $catagory = $samplepagesR['catagory'];
 $banner_img = $samplepagesR['banner_img'];


$title = str_replace("'","&#8217;",$title);
$title = str_replace("_"," ",$title);
$meta_title = str_replace("'","&#8217;",$meta_title);
$meta_keywords = str_replace("'","&#8217;",$meta_keywords);
$meta_description = str_replace("'","&#8217;",$meta_description);
$short_description = str_replace("'","&#8217;",$short_description);
$description = str_replace("'","&#8217;",$description);
$banner_text = str_replace("'","&#8217;",$banner_text);
$banner_sub_text = str_replace("'","&#8217;",$banner_sub_text);


$previous = "SELECT * FROM `moveon`.`city_pages` WHERE `service_slug` = '".$service_slug."' and `county_slug` = '".$county_slug."' and `city_slug` = '".$city_slug."'";
$previouspage = mysql_query($previous);
$previouspageR = mysql_fetch_array($previouspage);
if($previouspageR['id']){
$deloldsql = "DELETE FROM `moveon`.`city_pages` WHERE id=".$previouspageR['id'];
$delcresult = mysql_query($deloldsql);
echo "del already exist: ".$previouspageR['title'].'<br />';
}
echo "create/update: ".$title;
 $inserQuery = "INSERT INTO `moveon`.`city_pages` 
(`id`, `title`,`banner_text`,`banner_sub_text`, `service_slug`,`county_slug`,`city_slug`, `meta_title`, `meta_keywords`, `meta_description`,`banner_img`, `short_description`, `description`, `status`, `county`,`city`,`service_name`,`catagory`) 
VALUES 
(NULL, '$title','$banner_text','$banner_sub_text', '$service_slug','$county_slug','$city_slug', '$meta_title', '$meta_keywords', '$meta_description','$banner_img', '".$short_description."', '".$description."', '1', '$county','$city','$service_name','$catagory')";

$cresult = mysql_query($inserQuery);
}
 }
 echo "all done";
  ?> 
<script>
setTimeout(function(){window.location='http://moveplus.co.uk/script/city-pages.php?pg=<?php echo $newPage;?>'},100);
</script>
<?php

function createurl($url){
$url =  rtrim($url,'-');
$url = str_replace("&","",trim($url));
$url = str_replace("(","-",trim($url));
$url = str_replace(")","",trim($url));
$url = str_replace(",","",trim($url));
$url = str_replace(".","",trim($url));
$url = str_replace(" ","-",trim($url));
$url = str_replace("'","",trim($url));
$url = str_replace("--","-",trim($url));
$url = str_replace("/","-",trim($url));

    
return strtolower(trim($url));
}

 echo "All Pages done up to ".$newPage; ?>


  </body>
 
</html>
