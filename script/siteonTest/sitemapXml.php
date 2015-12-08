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
	$fileHandler = fopen("sitemap.xml", "w") or die("can't open file");
	
	$urlSet ='<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="xml-sitemap.xsl"?><urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">';
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
    
	$contents .= '<url>
				<loc>'.$urlPath.xmlentities($loc).'</loc>
				</url>';
  }
   // second start county
	 $sql1 = "SELECT * FROM `county_pages` ";
	mysql_select_db($sql1,$link);
	$result1 = mysql_unbuffered_query($sql1,$link);
	 while($row1 = mysql_fetch_array($result1,MYSQL_ASSOC))
	 {   
		$county_slug = $row1["county_slug"];
		$service_slug = $row1["service_slug"]; 
		$contents2 .= '<url>
				<loc>'.$urlPath.xmlentities($county_slug)."/".$service_slug.'</loc>
				</url>';
	  }
	// second end county
  // 3rd start city
	 $sql2 = "SELECT * FROM `city_pages` ";
	mysql_select_db($sql1,$link);
	$result2 = mysql_unbuffered_query($sql2,$link);
	 while($row2 = mysql_fetch_array($result2,MYSQL_ASSOC))
	 {   
		$service_slug = $row2["service_slug"];
		$county_slug = $row2["county_slug"];
		$city_slug = $row2["city_slug"];
		$contents3 .= '<url>
				<loc>'.$urlPath.xmlentities($service_slug)."/".$county_slug."/".$city_slug.'</loc>
				</url>';
	  }
	// 3rd end city
  
 $urlSetEnd = '</urlset>';
	  
	fwrite($fileHandler, $urlSet.$contents.$contents2.$contents3.$urlSetEnd);
	fclose($fileHandler);
	$data = file_get_contents("sitemap.xml");
	echo $data;



?>