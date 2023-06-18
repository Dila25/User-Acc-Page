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
        echo 'done';
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
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AURA Photography - User Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="User.css">
    <script>
    // Function to display an alert box with the success message
    function showSuccessMessage() {
      alert("Record updated successfully");
      window.location.href = "Main_Display.php";
    }
  </script>
</head>
<body>
    <center>
        <!-- Logo and title -->
        <div class="aura">AURA</div>
        <div class="photography">Photography</div>
    </center>
    
    <!-- Navigation bar -->
    <ul>
        <li><img src="./images - U_A/PicsArt_05-26-03.27.28.jpg" width="110px" class="logo"></li>
        <li><img src="./images - U_A/1727578.webp" width="50px" class="userimage"></li>
        <li><font class="username">Hello!</font><br><font class="username"><?php echo $username; ?></font></li>
        <li><a class="active_Home" href="home_page.html">Home</a></li>
        <li><a href="#album">Album</a></li>
        <li><a href="#aboutus">About us</a></li>
        <li><a href="#contactus">Contact us</a></li>
        <li><a href="#reservation">Reservation</a></li>
        <li><a href="#help">Help</a></li>
    </ul>
    <br><br><br>
    
    <!-- User account update form -->
    <div class="boxs">
        <div>
            <div id="userforms">
            <form action="update.php" method="POST">
                <h3 class="ach_i">Account Information</h3>
                <br>
                <table>
                    <tr>
                        <td><label for="fname" class="inputlabels">Username</label></td>
                        <td><input type="text" name="username" class="userinputs" value="<?php echo $username; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="lname" class="inputlabels">First Name</label></td>
                        <td><input type="text" name="firstname" class="userinputs" value="<?php echo $firstname; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="lastname" class="inputlabels">Last Name</label></td>
                        <td><input type="text" name="lastname" class="userinputs" value="<?php echo $lastname; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="phonenumber" class="inputlabels">Phone Number</label></td>
                        <td><input type="text" class="userinputs" name="phonenumber" value="<?php echo $phonenumber; ?>" pattern="[0-9]{10}" required></td>
                    </tr>
                    <tr>
                        <td><label for="Email" class="inputlabels">Email</label></td>
                        <td><input type="email" class="userinputs" name="email" value="<?php echo $email; ?>" required></td>
                    </tr>
                </table>
                <div class="btncr">
                    <button id="bottone" type="submit">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <br><br><br>

    <!-- Footer section -->
    <footer>
        <!-- Social media icons -->
        <div class="button-row">
            <div class="social-media">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-google"></i></a>
            </div>
            <!-- Newsletter subscription form -->
            <div class="newsletter">
                <form class="subscriber-form">
                    <input type="email" name="email" placeholder="Enter Your Email">
                    <button type="submit">Subscribe to Email</button>
                </form>
            </div>
        </div>
        <!-- Footer links -->
        <div class="links-row">
            <a href="#">Contact Us</a>
            <a href="#">Terms &amp; Condition</a>
            <a href="#">Privacy</a>
            <a href="#">FAQ</a>
        </div>
    </footer>

</body>
</html>
