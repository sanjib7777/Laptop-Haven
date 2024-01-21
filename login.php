<?php
include 'connect.php';
// Start the session
session_start();

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Your authentication logic goes here
    $username = $_POST['name'];
    $password = $_POST['pass'];

    // Replace the following condition with your actual authentication logic
    $sql = "SELECT * FROM user_info WHERE Username = '$username' AND PASSWORD = '$password' LIMIT 1";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
        $_SESSION['email']=$row['Email'];
    }
  if ($result) {
    
        // Authentication successful, set session status
        $_SESSION['status'] = "logged_in";
        $_SESSION['user'] = $username;
        $_SESSION['join'] = date("Y-m-d H:i:s");
        // Redirect to a logged-in page or any other desired action
        header("Location: index.php");
        exit();
    } else {
        // Authentication failed, you may display an error message
        echo "Invalid username or password";
        // header("Location: index.php");

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup_login.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Add your existing styles here */
        
        .inp {
            position: relative;
            margin-bottom: 20px;
        }

        .inp i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
        }

        .inp input {
        padding-left: 30px; /* Adjust the value to leave space for the icon */
        width: 250px; /* Adjust the width as needed */
    }
</style>
</head>
<body>
    <form  method="POST">
        <!-- <i class="fa-sharp fa-solid fa-circle-xmark b"></i> -->
        <h1 style="color:white;">Login</h1>
        <div class="inp">
            <i class="fa-solid fa-user" style="color: #D10024;"></i>
            <input type="text " placeholder="Username" name="name"  required>
        </div>
        <div class="inp">
            <i class="fa-solid fa-lock" style="color:#D10024"></i>
            <input type="password" placeholder="Password" name="pass"  required>
        </div>
        <div class="check">
            <input type="checkbox" >
            <label for="">Remember me</label>
        </div>
        <button type="submit" id="btn" name="submit">Login</button>
        <div class="sign_up_link">
            <p>Don't have an account?
                <span class="up_link" > <a href="signup.php" style="text-decoration: none; color:#D10024;"> Sign Up</a></span>
            </p>
        </div>
    </form>

</body>
</html>