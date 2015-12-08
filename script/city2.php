    <?php
    error_reporting(0);
    $link = mysql_connect('localhost', 'root', 'Qaladza1974');
    if (!$link) {
        die('Not connected : ' . mysql_error());
    }
    // make foo the current db
    $db_selected = mysql_select_db('moveon', $link);
    if (!$db_selected) {
        die ('Can\'t use foo : ' . mysql_error());
    }
    $datastring = explode('//',$_POST['title']);
    //print_r($datastring);
    $county_id =  $_POST['county'];
    
    $title = mysql_real_escape_string($datastring[2]);
    
    if($title !=''){ 
    $csql = "SELECT ID FROM `city` WHERE county_id =$county_id and `city_name` = '$title' ";
    $cresult = mysql_query($csql);
    $crow = mysql_fetch_array($cresult);
    if($crow['ID']){
    $city_id =  $crow['ID'];
    echo "already exust  <br />"; 
    }else{
    $slug= createurl($title);
    echo $catesql ="INSERT INTO `city` (county_id,city_name )
                 VALUES
                 ('$county_id','$title' )";
    $cresult2 = mysql_query($catesql);
    $city_id = mysql_insert_id();
   echo "new created ".$city_id."<br />";
    }
          
    
    
}
function createurl($url){
$url =  rtrim($url,'-');
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