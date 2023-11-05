<?php
if($_POST){
    include "conn.php";
    $query=$mysqli->prepare("update book_info set title=?,author=?,edition=?,publication=? where accno=?");
    if(!$query){
        echo "error in query preparation";
        exit;
    }
    $query->bind_param("ssssi",$_POST['title'],$_POST['author'],$_POST['edition'],$_POST['publication'],$_GET['accno']);
    if($query->execute()){
        alert("Updation Successful","index.php");
    }
    else{
        echo "Error in updating data to database";
    }

}
$accno=$_GET['accno'];
include "conn.php";
$query=$mysqli->prepare("select title,author,edition,publication FROM book_info where accno=".$accno." ");
if(!$query){
    echo "error in prepare";
    exit;
}
$query->execute();
$result=$query->get_result();
$row=$result->fetch_assoc();
extract($row);
$result->free();
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action="edit.php?accno=<?php echo $accno;?>" method="post">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?php echo $title; ?>">
    <label for="author">Author:</label>
    <input type="text" name="author" id="author" value="<?php echo $author; ?>">
    <label for="edition">Edition:</label>
    <input type="number" name="edition" id="edition" value="<?php echo $edition;?>">
    <label for="publication">Publicattion:</label>
    <input type="text" name="publication" id="publication" value="<?php echo $publication;?>">
    <input type="submit" value="submit">
</form>    
</body>
</html>