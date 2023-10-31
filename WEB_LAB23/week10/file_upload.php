<?php
if (isset($_FILES['resume'])) {
    $file_name = $_FILES['resume']['name'];
    $file_size = $_FILES['resume']['size'];
    $file_tmp = $_FILES['resume']['tmp_name'];
    $file_type = $_FILES['resume']['type'];
    $temp = explode('.', $_FILES['resume']['name']);
    $file_ext = end($temp);
    $expensions = array("pdf", "txt", "doc");

    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "extension not allowed, please choose a txt or pdf or doc file.";
    }
    if ($file_size > 2097152) {
        $errors[] = 'File size must be less than 2 MB';
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "resume/" . $file_name);
        echo "Success";
        echo "<ul> <li>Sent file: " . $file_name . "
         <li>File size: " . $file_size . "
         <li>File type:" . $file_type . "
         </ul>";
    } else {
        print_r($errors);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="resume">
        <input type="submit" value="Submit">
    </form>
</body>

</html>