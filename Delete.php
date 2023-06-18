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

// Check if the delete button is clicked
if (isset($_POST["delete"])) {
    // Get the ID of the record to be deleted
    $id = $_POST["id"];

    // Delete the record from the "udetail" table
    $sql = "DELETE FROM udetail WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the connection
$conn->close();

// Redirect to the main display page after deletion
header("Location: Main_Display.php");
exit();
?>
