<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "header.php";?>
<form action="search" method="get">
    <label for="search">Search Book:</label>
    <input type="text" name="search" id="search" oninput="userSuggestion(this.value);">
    <div id="suggestion"></div>
    <br><br>
</form>
    <table>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Author</td>
            <td>Edition</td>
            <td>Publication</td>
            <td>EDIT</td>
            <td>DELETE</td>
        </tr>
        <?php
        
        include 'conn.php';
        $query = $mysqli->prepare('select * from book_info');
        $query->execute();
        $result = $query->get_result();
        while ($row = $result->fetch_assoc()) {
            extract($row); //converts array into variables key as name and value as value //notused
            echo '<tr>';
            echo '<td>' . $row['accno'] . '</td>';
            echo '<td>' . $row['title'] . '</td>';
            echo '<td>' . $row['author'] . '</td>';
            echo '<td>' . $row['edition'] . '</td>';
            echo '<td>' . $row['publication'] . '</td>';
            echo "<td><button type='button' onclick=\"window.location.href='edit.php?accno=".$row['accno']. "'\">Edit</button></td>";
            echo "<td><button type='button' onclick=\"ondelete('delete.php?accno=" . $row['accno'] . "')\">Delete</button></td>";
            echo '</tr>';
        }
        //session_destroy();
        ?>

    </table>
    <button type="button" onclick="window.location.href='add.php'">Add Book</button>

    <script>
        function userSuggestion(text) {
            var xhr;
            if (window.XMLHttpRequest) { // Mozilla, Safari, ...
                xhr = new XMLHttpRequest();
            } else if (window.ActiveXObject) { // IE 8 and older
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
            var data = "title=" + text;
            xhr.open("POST", "search.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send(data);
            xhr.onreadystatechange = display_data;
            function display_data() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        //alert(xhr.responseText);	   
                        document.getElementById("suggestion").innerHTML = xhr.responseText;
                    } else {
                        alert('There was a problem with the request.');
                    }
                }
            }
        }
        function ondelete(redirectUrl) {
            // Show a confirm box
            var result = confirm("Are you sure you want to delete?");

            // If user clicks "OK," redirect to delete page
            if (result) {
                window.location.href = redirectUrl;
            } else {
                // If user clicks "Cancel," do nothing or provide feedback
                alert("Deletion canceled");
            }
        }
    </script>
</body>

</html>