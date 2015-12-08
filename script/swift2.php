    <?php
    error_reporting(0);
    $link = mysql_connect('localhost', 'root', '');
    if (!$link) {
        die('Not connected : ' . mysql_error());
    }
    // make foo the current db
    $db_selected = mysql_select_db('moveon', $link);
    if (!$db_selected) {
        die ('Can\'t use foo : ' . mysql_error());
    }
    $datastring = explode('//',$_POST['title']);
    print_r($datastring);
    
    $title = mysql_real_escape_string($datastring[2]);
    
    if($title !=''){ 
    $csql = "SELECT ID FROM `county` WHERE `name` = '$title' ";
    $cresult = mysql_query($csql);
    $crow = mysql_fetch_array($cresult);
    if($crow['ID']){
    $city_id =  $crow['ID'];
   
    }else{
    $slug= createurl($title);
    $catesql ="INSERT INTO `county` (name, slug ) VALUES ('$title', '$slug' )";
    $cresult2 = mysql_query($catesql);
    $city_id = mysql_insert_id();
   
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