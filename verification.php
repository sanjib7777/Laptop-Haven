<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userCode = $_POST["code"];
    
    // Check if the entered code matches the stored code
    if ($userCode == $_SESSION["verification_code"]) {
        // Code is correct, perform further actions (e.g., register the user)
        // echo "Verification successful!";
        header("location:login.php");
        $_SESSION['message_add']='Added Successfully';
        // Clear session variables
        unset($_SESSION["verification_code"]);
        unset($_SESSION["email"]);
    } else {
        header("location:index.php");
        $_SESSION['message_add']='verification failed ';
        // echo "Verification failed. Please enter the correct code.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <!-- alertify  -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center; /* Center form elements */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <h2>Enter the 6-digit verification code sent to your email</h2>
        <input type="text" name="code" maxlength="6" required>
        <button type="submit">Verify</button>
    </form>
</body>
</html>
