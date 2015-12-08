<?php
  $databaseServer = "localhost";
  $databaseUsername = "root";
  $databasePassword = "Qaladza1974";
  $databaseName = "moveon";
  $databaseTable = "services";
  header("Content-Type: text/xml");
  function xmlentities($text)
  {
    $search = array('&','<','>','"','\'');
    $replace = array('&amp;','&lt;','&gt;','&quot;','&apos;');
    return str_replace($search,$replace,$text);   
  }
  print chr(60)."?xml version='1.0' encoding='UTF-8'?".chr(62);
  print chr(60)."urlset xmlns='http://www.google.com/schemas/sitemap/0.84' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xsi:schemaLocation='http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd'".chr(62);
  $sql = "SELECT * FROM `".$databaseTable."`";
  $link = mysql_connect($databaseServer,$databaseUsername,$databasePassword);
  if($link){
   echo "conn"; 
  }else{
  echo "not con";
  }
  mysql_select_db($databaseName,$link);
  $result = mysql_unbuffered_query($sql,$link);
  
  $urlPath ="http://moveplus.co.uk/";
  while($row = mysql_fetch_array($result,MYSQL_ASSOC))
  {
   
    $loc = $row["slug"];
    print "<url>";
    print "<loc>".$urlPath.xmlentities($loc)."</loc>";
    print "</url>";
  }
  print "</urlset>";
?>