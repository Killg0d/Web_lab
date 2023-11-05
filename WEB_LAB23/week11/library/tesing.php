<?php
$mysqli = new mysqli("localhost", "root", "", "dummy");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// multiline insert query with placeholders
$query = "INSERT INTO timepass (value) VALUES (?)";

// Prepare the query
$stmt = $mysqli->prepare($query);

// Check if the statement was prepared successfully
if (!$stmt) {
    die("Error in query preparation: " . $mysqli->error);
}

// Sample data for multiple records
$data = array(
    array( "value1_1"),
    array( "value2_2"),
    // Add more records as needed
);

// Bind parameters and execute the query in a loop
foreach ($data as $row) {
    $stmt->bind_param("s", $row[0]); // Adjust "ss" based on your data types
    $stmt->execute();
}
echo "executed";
// Close the statement and connection
$stmt->close();
?>