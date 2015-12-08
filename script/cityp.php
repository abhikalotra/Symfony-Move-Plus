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
$epg = $_GET['epg'];
//echo $csql = "SELECT city.slug AS CITY, county.slug as COUNTY FROM `city` ,`county` WHERE county.id = city.county_id and `city.id` = '$pageN'";
     $csql = "SELECT city.county_id AS county_id ,city.id as id,city.city_name as cityname,city.postal_code as postalcode , county.slug as ctname FROM `city` ,`county` WHERE county.id = city.county_id and city.id='$pageN'"; 
          $cresult = mysql_query($csql);
          $crow = mysql_fetch_array($cresult);
         // echo $crow['cityname'];
          if($crow['cityname']){
        // print_r($crow);
          $slug =  createurl($crow['cityname']);
          $county =  $crow['ctname'];
          $cityid =  $crow['id'];
         
          
          
 echo $url ="https://www.townscountiespostcodes.co.uk/postcodes-in-england/".$county."/".$slug."/";
 echo '<div id="dcontent">';
 echo $content = file_get_contents($url);
 echo '</div>';
// printf("ID: %s  Name: %s", $row[0], $row[1]);  



?>


 <div id="result">
</div>
<script type="text/javascript">  
$(document).ready(function()  
  
{  
setTimeout(function()
   {  
var rawdata = getTableData();
 },4000); 
});  
  function getTableData() {
    var data = [];
    $('.padding').find('table:first').find('tr:nth-child(2)').each(function (rowIndex, r) {
        var cols = '';
        $(this).find('td').each(function (colIndex, c) {
            //cols.push(c.textContent);
            cols = cols+'//'+c.textContent;
           
        });
       updatecity(cols); // for bankingDB
        //updatecity(cols);// for in.....
      
       
        //data.push(cols);
    });
    
    $('.padding').find('table:first').find('tr:nth-child(3)').each(function (rowIndex, r) {
        var cols = '';
        $(this).find('td').each(function (colIndex, c) {
            //cols.push(c.textContent);
            cols = cols+'//'+c.textContent;
           
        });
       updatecity(cols); // for bankingDB
        //updatecity(cols);// for in.....
      
       
        //data.push(cols);
    });
    
     $('.padding').find('table:first').find('tr:nth-child(4)').each(function (rowIndex, r) {
        var cols = '';
        $(this).find('td').each(function (colIndex, c) {
            //cols.push(c.textContent);
            cols = cols+'//'+c.textContent;
           
        });
       updatecity(cols); // for bankingDB
        //updatecity(cols);// for in.....
      
       
        //data.push(cols);
    });
    
} 


function updatecity(title)
  {    
  
  $('#dcontent').hide();
    $.ajax({
    url: 'http://moveplus.co.uk/script/cityp2.php',
    type: 'POST',
    data:({
        title:title,
        cityid:'<?php echo $cityid;?>'
       
    }),
    success:function(results) {
        $("#result").append(results);
    }
});

}
</script> 
 <?php if ($newPage < $epg) { ?> 
<script>
 setTimeout(function(){window.location='http://moveplus.co.uk/script/cityp.php?pg=<?php echo $newPage;?>&epg=<?php echo $epg;?>'},9000);
</script>
<?php }else{ echo "All Pages done up to ".$newPage; } ?>

<?php } 

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
?>
  </body>
 
</html>
