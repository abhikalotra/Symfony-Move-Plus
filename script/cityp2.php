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
    $id =  $_POST['cityid'];
    
    
    $postal = mysql_real_escape_string($datastring[2]);
    
   
   $csql = "SELECT postal_code FROM `city` WHERE id='$id'"; 
          $cresult = mysql_query($csql);
          $crow = mysql_fetch_array($cresult);
     $postalcode =  $crow['postal_code'];  
     if($crow['postal_code'] !=''){
     $postal = $postalcode.', '.$postal;
     }    
      
   echo $catesql ="UPDATE city set postal_code = '".$postal."' WHERE `id` = '$id' ";
   $cresult2 = mysql_query($catesql);
   echo "<br />";      
    
    

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