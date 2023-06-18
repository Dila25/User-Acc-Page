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

// Initialize variables
$username = "";
$firstname = "";
$lastname = "";
$phonenumber = "";
$email = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phonenumber = $_POST["phonenumber"];
    $email = $_POST["email"];

    // Update the user details in the database
    $sql = "UPDATE udetail SET username='$username', firstname='$firstname', lastname='$lastname', phonenumber='$phonenumber', email='$email' WHERE id=(SELECT MAX(id) FROM udetail)";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('User account updated successfully.');
                window.location.href = 'Main_Display.php';
              </script>";
    } else {
        echo "Error updating user account: " . $conn->error;
    }
} else {
    // Retrieve data from the "udetail" table
    $result = $conn->query("SELECT * FROM udetail ORDER BY id DESC LIMIT 1");

    // Check if any data is available
    if ($result && $result->num_rows > 0) {
        // Fetch the data row
        $row = $result->fetch_assoc();
        $username = $row["username"];
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $phonenumber = $row["phonenumber"];
        $email = $row["email"];
    } else {
        // No data available or an error occurred
        $username = "";
        $firstname = "";
        $lastname = "";
        $phonenumber = "";
        $email = "";
    }
}

// Close the connection
$conn->close();
?>
