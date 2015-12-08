<?php
    echo $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","Qaladza1974");
    $db=mysql_select_db("moveon",$con);
    $query=mysql_query("select * from services where title LIKE '%{$key}%'");
    $resultHtml = '';
    while($row=mysql_fetch_assoc($query))
    {
      
    $resultHtml ="<tr>";
    
    $resultHtml .="<td> ".$row['title']"</td>"; 
    $resultHtml .="<td> ".$row['title']"</td>";                                                        
    
    $resultHtml .="<td> ".$row['title']"</td>";  
    
    
    $resultHtml .="</tr>";
      
      
    }
    echo $resultHtml;
?>
