<?php
  $databaseServer = "localhost";
  $databaseUsername = "root";
  $databasePassword = "Qaladza1974";
  $databaseName = "moveon";
  $databaseTable = "county_pages";
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
  
  mysql_select_db($databaseName,$link);
 


 $result = mysql_unbuffered_query($sql,$link);
  
  $urlPath ="http://moveplus.co.uk/";
  while($row = mysql_fetch_array($result,MYSQL_ASSOC))
  {
    // create the loc (URL) value based on the $row array, for example:
	 	 
		 /*$slug = $row["slug"];		
		 $sql1 = "SELECT * FROM `county_pages` where county_slug = '$slug' ";
		mysql_select_db($sql1,$link);
		$result1 = mysql_unbuffered_query($sql1,$link);
		$row1 = mysql_fetch_array($result1,MYSQL_ASSOC); */
		$county_slug = $row["county_slug"];
		$service_slug = $row["service_slug"];
		
		
	print "<url>";
    print "<loc>".$urlPath.xmlentities($county_slug)."/".$service_slug."</loc>";
    print "</url>"; 
  }
  print "</urlset>";
?>