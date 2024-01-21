<?php

include 'connect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Function to generate a random 6-digit code
    function generateVerificationCode()
    {
        return rand(100000, 999999);
    }

    // Function to send an email with the verification code
    function sendVerificationEmail($email, $code)
    {
        // require 'vendor/autoload.php';

        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/Exception.php';

        require 'PHPMailer/SMTP.php';

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sanjibshah777@gmail.com'; // Your Gmail email address
            $mail->Password = 'umbgmrrzprddjjfo'; // Your Gmail password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('sanjibshah777@gmail.com', 'Sanjib Shah');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Email Verification Code from laptop store';
            $mail->Body = 'Your verification code is: ' . $code;

            $mail->send();
            echo "message sent";
            return true;
        } catch (Exception $e) {
           
            return false;
        }
    }

    // Generate a 6-digit verification code
    $verificationCode = generateVerificationCode();

    // Send the verification code via email
    if (sendVerificationEmail($email, $verificationCode)) {
        // Store the verification code and email in a database or session
        // For example, you can use a session to store the data temporarily
        session_start();
        $_SESSION["verification_code"] = $verificationCode;
        $_SESSION["email"] = $email;
        $stmt = $conn->prepare("INSERT INTO user_info (Username,Email,PASSWORD) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username,$email,$password);
    $stmt->execute();
    $stmt->close();
        // Redirect to the verification page
        // header("Location: verification.php");
        // exit();
    } else {
        echo "Failed to send verification email.";
        exit(); // Add exit() to stop further execution if email sending fails
    }

    // Prepare and execute the SQL query to insert data into the table
    

    $conn->close();

    // You can redirect the user to a thank-you page or do other processing here
    header("Location: verification.php");
    exit();
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
      <form  method="post">
                                <!-- <i class="fa-sharp fa-solid fa-circle-xmark "></i> -->
                                <h1 style="color:white;">Sign Up</h1>
                                <div class="inp">
                                    <i class="fa-solid fa-user" style="color: #D10024;"></i>
                                    <input type="text " placeholder="Username" style="font-size: 20px;" name="username" required>
                                </div>
                                <div class="inp mail">
                                    <i class="fa-solid fa-envelope" style="color: #D10024;"></i>
                                    <input type="email" style="font-size: 20px;"placeholder="Email" name="email" required>
                                </div>
                                <div class="inp">
                                    <i class="fa-solid fa-lock" style="color: #D10024;"></i>
                                    <input type="password" placeholder="Password" style="font-size: 20px;" name="password" required>
                                </div>
                                <div class="check">
                                    <input type="checkbox" required>
                                    <label for="">I agree to the terms & condition </label>
                                </div>
                                <button type="submit" id="btn">Sign Up</button>
                                <div class="sign_up_link">
                                    <p>Already have an account?
                                        <span class="in_link"><a href="login.php" style="text-decoration: none; color:#D10024;">Sign In</a></span>
                                    </p>
                                </div>
                            </form>
</body>
</html>