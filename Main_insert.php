<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="User.css">
</head>
<body>
    
    <br><br><br><br><br><br><br>
    <!-- User registration form -->
    <div class="boxs">
        <div>
            <div id="userforms">
                <form action="insert.php" method="POST">
                    <!-- Form title -->
                    <h3 class="ach_i">Account Information</h3>
                    <br>
                    <table>
                        <!-- Username field -->
                        <tr>
                            <td><label for="fname" class="inputlabels">Username</label></td>
                            <td><input type="text" name="username" class="userinputs" required></td>
                        </tr>
                        <!-- First name field -->
                        <tr>
                            <td><label for="lname" class="inputlabels">First Name</label></td>
                            <td><input type="text" name="firstname" class="userinputs" required></td>
                        </tr>
                        <!-- Last name field -->
                        <tr>
                            <td><label for="lastname" class="inputlabels">Last Name</label></td>
                            <td><input type="text" name="lastname" class="userinputs" required></td>
                        </tr>
                        <!-- Phone number field -->
                        <tr>
                            <td><label for="phonenumber" class="inputlabels">Phone Number</label></td>
                            <td><input type="text" class="userinputs" name="phonenumber" pattern="[0-9]{10}" required></td>
                        </tr>
                        <!-- Email field -->
                        <tr>
                            <td><label for="Email" class="inputlabels">Email</label></td>
                            <td><input type="email" class="userinputs" name="email" required></td>
                        </tr>
                    </table>
                    <!-- Submit button -->
                    <div class="btncr">
                        <button id="bottone" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br><br><br>

</body>
</html>
