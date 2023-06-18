<?php
$servername = "localhost";  // database server name
$username = "root";  // database username
$password = "";  // database password
$dbname = "user";  // database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];

    // Insert data into the table
    $sql = "INSERT INTO udetail (username, firstname, lastname, phonenumber, email) VALUES ('$username', '$firstname', '$lastname', '$phonenumber', '$email')";

    if ($conn->query($sql) === true) {
        echo "Data inserted successfully.";
        header("Location: Main_Display.php"); // Redirect to the desplay page
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
