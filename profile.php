<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-details {
            text-align: center;
        }

        .profile-details h2 {
            margin-bottom: 10px;
        }

        .profile-details p {
            color: #555;
        }

        .btn-edit-profile {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-edit-profile:hover {
            background-color: #0056b3;
        }
    </style>
    <title>User Profile</title>
</head>
<body>

<div class="container profile-container">
    
    <div class="profile-details">
        <h2>Hi <?php
        session_start();
         echo $_SESSION['user']?> !</h2>
        <p>Email: <?php  echo $_SESSION['email']?> </p>
        <p>Username: <?php echo $_SESSION['user']?></p>
        <p>Joined: <?php echo $_SESSION['join']?></p>
        <button class="btn btn-danger"><a href="index.php" class="text-light" style="text-decoration: none;"> GO BACK</a></button>
    </div>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
