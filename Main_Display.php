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
</head>
<body>
    
    <br><br><br>
    <div class="boxs">
        <div>
            <div id="userforms">
            <form action="Display.php" method="POST">
                <h3 class="ach_i">Account Information</h3>
                <br>
                <table>
                    <tr>
                        <td><label for="fname" class="inputlabels">Username</label></td>
                        <td><input type="text" name="username" class="userinputs" value="<?php echo $username; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="lname" class="inputlabels">First Name</label></td>
                        <td><input type="text" name="firstname" class="userinputs" value="<?php echo $firstname; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="lastname" class="inputlabels">Last Name</label></td>
                        <td><input type="text" name="lastname" class="userinputs" value="<?php echo $lastname; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="phonenumber" class="inputlabels">Phone Number</label></td>
                        <td><input type="text" class="userinputs" name="phonenumber" value="<?php echo $phonenumber; ?>"  readonly></td>
                    </tr>
                    <tr>
                        <td><label for="Email" class="inputlabels">Email</label></td>
                        <td><input type="email" class="userinputs" name="email" value="<?php echo $email; ?>" readonly></td>
                    </tr>
                </table>
            </form>
                <table>
                    <tr>
                        <div class="btnc">
                           <td><button id="bottone" type="submit" onclick="location.href='MainUpdate.php'">Update</button></td>
                        </div>
                        <form action="Delete.php" method="POST" onsubmit="return confirmDelete();">
                            <!-- ... existing form fields ... -->
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="btnc">
                                <td><button id="bottonede" type="submit" name="delete">Delete</button></td>
                            </div>
                        </form>
                    </tr>
                </table>
                <br>
            </div>
        </div>
    </div>

    <br><br><br>


   
  
    <!-- Link JS file -->
    <script src="Delete.js"></script>
</body>
</html>
