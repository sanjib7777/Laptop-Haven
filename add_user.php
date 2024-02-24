<?php
session_start();
include 'connect.php';
if(isset($_POST['submit'])){
  $uname=$_POST['Username'];
  $mail=$_POST['Email'];
  $pass=$_POST['PASSWORD'];
  $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
  $sql="insert into `user_info` (Username,Email,PASSWORD)
  values ('$uname','$mail','$hashed_password')";
  $result=mysqli_query($conn,$sql);
  if($result){
    $_SESSION['message_add']='Added Successfully';
    header("location:adminpanel.php"); 
    exit;
  }
  else{
    die(mysqli_error($conn));
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Maintainance</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .container {
            max-width: 600px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .custom-file-label::after {
            content: "Browse";
        }

        
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4">User Maintainance</h2>
    <form id="laptopForm" method="post" novalidate>
        <!-- Laptop Name -->
        <div class="form-group">
            <label for="laptopName">User Name:</label>
            <input type="text" class="form-control" name="Username" id="Username" placeholder="Enter user name" required>
            <div class="invalid-feedback">Please enter valid User Name.</div>
        </div>
        <div class="form-group">
            <label for="laptopName">Email</label>
            <input type="text" class="form-control" name="Email" id="Email" placeholder="Enter user email" required>
            <div class="invalid-feedback">Please enter the valid Email.</div>
        </div>
        <div class="form-group">
            <label for="laptopName">Password</label>
            <input type="text" class="form-control" name="PASSWORD" id="PASSWORD" placeholder="Enter use password" required>
            <div class="invalid-feedback">Please enter the password</div>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

<!-- Form Validation Script -->
<script>
    (function () {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.from(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });

        // Display the chosen file name for the image input
        document.getElementById('image').addEventListener('change', function (event) {
            var fileName = event.target.files[0].name;
            var label = document.querySelector('.custom-file-label');
            label.textContent = fileName;
        });
    })();
</script>

</body>
</html>
