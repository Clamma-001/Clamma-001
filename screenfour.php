<?php
error_reporting(0);
session_start();

if (isset($_SESSION['userid'])) {
    header('Location: screenfive.php');
    exit();
}

$msg = null;
include 'dbconfig.php'; // Ensure this file sets up the $conn variable correctly.

if (isset($_POST['Login'])) {  // The name attribute in the form is 'Login'
    // Submitted user data
    $userName = $_POST['Username'];  // Ensure these match the form field names
    $userPassword = $_POST['Password'];

    if (empty($userName) || empty($userPassword)) {
        $msg = "All fields are required";
    } else {
        // Prepare SQL statement with placeholders
        $sql = "SELECT * FROM tbluser WHERE username = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            $msg = "SQL prepare failed: " . htmlspecialchars($conn->error);
        } else {
            // Bind parameters
            $stmt->bind_param('s', $userName);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows < 1) {
                $msg = "No records found";
            } else {
                // Fetch user data
                $userData = $result->fetch_assoc();

                // Verify the password
                if (password_verify($userPassword, $userData['password'])) {
                    $_SESSION['username'] = $userData['fullname'];
                    $_SESSION['userid'] = $userData['id'];
                    $_SESSION['userpassword'] = $userData['password'];
                    $msg = "Login failed. Please try again...";
                } else {
                    header('Location:screenfive.php');
                    exit();
                }
            }

           
        }
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
<a href="screentwo.php"><img src="images/back.png" id="one"></a>    
<img src="images/log.png" id="logo">
<form action="" method="POST">
    <input type="text" name="Username" placeholder="Username">
    <br><br>
    <input type="password" name="Password" placeholder="Password">
    <br><br>
    <input type="submit" name="Login" value="Login" id="btn">
    <br><br><br>
</form>

<?php
if ($msg) {
    echo "<p style='color: green;'>$msg</p>"; // Change 'red' to your desired color
}
?>
</body>
</html>


</body>
<style type="text/css">
    #imag{
        width: 12%;
        height: 50px;
        border-radius: 50px;
        background-color: #FEB11D;
        font-size: 20px;
        margin-left: 70%;
        margin-top: 10%;
    }
    input{
        margin-top: 3%;
        width: 20%;
        height: 55px;
        border-radius: 16px;
        font-size: 15px;
        margin-left: 3%;
        background-color: #FEB11D;
        text-align: center;
    }
    #btn{
        width: 10%;
        height: 35px;
        border-radius: 100px;
        text-align: center;
        margin-left: 10px;
    }
    #eight{
        background-color: #FEB11D;
        border-radius: 16px;
        width: 10%;
        height: 32px;
        font-size: 15px;
        margin-left: 60%;
    }
    #three{
        margin-top: 3%;
        width: 20%;
        height: 55px;
        border-radius: 16px;
        font-size: 15px;
        margin-left: 3%;
        background-color: #FEB11D;
        text-align: center;
    }
    body{
        background-color: #362C66;
        text-align: center;
        margin-bottom: 10%;
    }
    #one{
        margin-bottom: 40%;
        margin-right: 10%;
    }
    #two{
        color: #2E9DEF;
    }
</style>
</html>
