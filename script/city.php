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
    
$pageN = $_GET['pg'];
$newPage = $pageN+1;

$csql = "SELECT * FROM `county` WHERE `id` = '$pageN' ";
   
          $cresult = mysql_query($csql);
          $crow = mysql_fetch_array($cresult);
          if($crow['slug']){
         $slug =  $crow['slug'];
          $county =  $crow['id'];
          
          
echo  $url ="https://www.townscountiespostcodes.co.uk/towns-in-england/".$slug."/";
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
 },5000); 
});  
  function getTableData() {
    var data = [];
    $('.padding').find('tr').each(function (rowIndex, r) {
        var cols = '';
        $(this).find('td').each(function (colIndex, c) {
            //cols.push(c.textContent);
            cols = cols+'//'+c.textContent;
           
        });
      
        //updatecity(cols); // for bankingDB
        updatecity(cols);// for in.....
      
       
        //data.push(cols);
    });
    
} 


function updatecity(title)
  {    
  
  $('#dcontent').hide();
    $.ajax({
    url: 'http://moveplus.co.uk/script/city2.php',
    type: 'POST',
    data:({
        title:title,
        county:<?php echo $county;?>
    }),
    success:function(results) {
        $("#result").append(results);
    }
});

}
</script> 
 <?php if ($newPage <=50) { ?> 
<script>
setTimeout(function(){window.location='http://moveplus.co.uk/script/city.php?pg=<?php echo $newPage;?>'},200000);
</script>
<?php }else{ echo "All Pages done up to ".$newPage; } ?>

<?php } ?>
  </body>
 
</html>
