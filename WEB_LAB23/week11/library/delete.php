<?php
if($_GET){
    include "conn.php";
    $query=$mysqli->prepare("delete from book_info where accno=?");
    if(!$query){
        echo "Erro in query preparation";
        exit;
    }
    $query->bind_param('i',$_GET['accno']);
    if($query->execute()){
        alert("Deletion successful","index.php");
    }
}
?>