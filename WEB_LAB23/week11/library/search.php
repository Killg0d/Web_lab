<?php
include "conn.php";
$title=$_POST['title'];
$query=$mysqli->prepare("select title from book_info where title like '$title%'");
$query->execute();
$result = $query->get_result();
$count=0;
if($result->num_rows){
    while ($row=mysqli_fetch_assoc($result)){
        echo "<p>{$row['title']}</p>";
        $count++;
        if($count>=2)
        break;
        }
}
else{echo 'Records not available';}
?>