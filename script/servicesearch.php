<?php

    $con=mysql_connect("localhost","root","Qaladza1974");
    $db=mysql_select_db("moveon",$con);
    
    if(isset($_GET['key'])){
    
    $key=$_GET['key'];
    
    $searchquery ="select * from services2 where title LIKE '%$key%' ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id";
    }else{
     $searchquery ="SELECT * from services2 ORDER BY COALESCE(parent_id, id), parent_id IS NOT NULL, id";
    }
    $query = mysql_query($searchquery);
    $resultHtml = '';
    $i=1;
    while($row=mysql_fetch_assoc($query))
    {
      
    $resultHtml .="<tr>";
    
    $resultHtml .="<td> ".$i."</td>"; 
    $resultHtml .="<td> ".$row['title']."</td>";                                                        
    $resultHtml .="<td>
    <a href='/admin/edit-page/".$row['id']."' title='Edit'> Edit </a> |
    <a href='/admin/delete-page/".$row['id']."' title='Delete' class='deleterow'> Delete </a> 
    </td>
    </td>";  
    
    
    $resultHtml .="</tr>";
      
    $i++;  
    }
    echo $resultHtml;
?>
