<?php
    if(isset($_POST['addbook'])){
        if($_POST['title']!=""){
        include 'conn.php';
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $edition=$_POST['edition'];
        $stmt ='insert into book_info(title,author,edition,publication) values(?,?,?,?)';
        $query=$mysqli->prepare($stmt);
        $query->bind_param('ssss',$title,$author,$edition,$publisher);
        if($query->execute())
            alert('executed','index.php');
        else
            die("Unable too save record");
        
    }
    else
    echo "Please fill all fields";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>library</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title">
        <label for="authors">Author:</label>
        <input type="text" name="author" id="author">
        <label for="edition">Edition:</label>
        <input type="text" name="edition" id="edition">
        <label for="publisher">Publisher:</label>
        <input type="text" name="publisher" id="publisher">
        <button type="submit" name="addbook">Add Book</button>
    </form>
</body>
</html>