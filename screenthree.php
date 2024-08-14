<?php
if (isset($_POST['submit'])) {
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    // start database connection
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'apartaudia';

    //check connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
//check connection
    if (!$conn) {
        die("connection failed:" . mysqli_connect_error());
    }else{
        echo "";
    }
    // end db connection
    if (empty($Username) && empty($Email) && empty($Password)) {
        echo "All filled are required";

    }else{
        $sql = "INSERT INTO `tbluser`(`Username`, `Email`, `Password`) VALUES ('$Username','$Email','$Password')";

        if (mysqli_query($conn,$sql) == true){
        header("location:screenfour.php");
        }else{
            echo "Something went wrong. Please try again...!";
        }
    }

    }else{
        echo "Please submit your form";
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apartaudia</title>
    <style type="text/css">
        #do, #tat, #dad, #b, input {
            background-color: #FEB11D;
            border-radius: 16px;
            font-size: 20px;
            margin-left: 27%;
        }
        #do {
            width: 10%;
            height: 32px;
            margin-top: 20%;
        }
        #tat, #b, input {
            width: 20%;
            height: 55px;
            text-align: center;
        }
        #dad {
            width: 25%;
            height: 35px;
        }
        #c, #ras, #day {
            color: #2E9DEF;
            text-align: center;
            margin-right: 20%;
        }
        #c, #day {
            font-size: 50px;
        }
        #day {
            font-size: 30px;
        }
        #one {
            margin-bottom: 40%;
            margin-right: 10%;
        }
        body {
            background-color: #362C66;
            margin-left: 20%;
            margin-bottom: 10%;
        }
            #six{
        margin-top: 3%;
        width: 20%;
        height: 55px;
        border-radius: 16px;
        font-size: 15px;
        margin-left: 27%;
        background-color: #FEB11D;
    }
  #a{
        color: #2B9FF1;
        margin-left: 35%;
  }
    </style>
</head>
<body>
<a href="screentwo.php"><img src="images/back.png" id="one"></a>
<img src="images/log.png" id="logo">

<form method="post" action="">
    <input type="text" name="Username" placeholder="Enter your Username"><br><br>
    <input type="text" name="Email" placeholder="Enter your Email"><br><br>
    <input type="password" name="Password" placeholder="Enter your Password"><br><br>
    <a href="screenfour"><input type="submit" name="submit" value="Next"></a>
</form>
<br>
<h1 id="a">OR</h1>
<button id="six">
<a href="https://www.Facebook.com" target="_blank">
<svg id="seven" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="#1877f2" d="M256 128C256 57.308 198.692 0 128 0S0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445"/><path fill="#fff" d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A129 129 0 0 0 128 256a129 129 0 0 0 20-1.555V165z"/></svg>
Continue with Facebook  
</button></a><br>

</body>
</html>
