<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the "details" table
$result = $conn->query("SELECT * FROM udetail WHERE id = (SELECT MAX(id) FROM udetail)");

// Check if any data is available
if ($result->num_rows > 0) {
    // Fetch the data row by row
    $row = $result->fetch_assoc();
    $username = $row["username"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $phonenumber = $row["phonenumber"];
    $email = $row["email"];
} else {
    // No data available
    $username = "";
    $firstname = "";
    $lastname = "";
    $phonenumber = "";
    $email = "";
}

// Close the connection
$conn->close();
?>
