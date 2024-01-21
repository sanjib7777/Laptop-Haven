<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Contact Page</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .contact-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        h2 {
            color: #D10024;
        }

        label {
            font-weight: bold;
            color: #343a40;
        }

        .btn-primary {
            background-color: #D10024;
            border-color: #D10024;
        }

        .btn-primary:hover {
            background-color: #93111d;
            border-color: #93111d;
        }
    </style>
</head>
<body>

<div class="container contact-container">
    <h2>Contact Us</h2>
    <form action="https://api.web3forms.com/submit" method="POST">
    <input type="hidden" name="access_key" value="4866145f-361b-46e2-8e62-ed86ca422d46">
        <div class="form-group">
            <label for="yourName">Your Name:</label>
            <input type="text" class="form-control" id="yourName"  name="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="yourEmail">Your Email:</label>
            <input type="email" class="form-control" id="yourEmail" value="<?php session_start(); echo $_SESSION['email'] ?>" name="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" rows="4" name="message" placeholder="Enter your message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
