<?php
session_start();
include 'connect.php';
if(isset($_POST['submit'])){
  $lname=$_POST['lname'];
  $proc=$_POST['processor'];
  $graphics=$_POST['graphics'];
  $ram=$_POST['ram'];
  $display=$_POST['display'];
  $os=$_POST['os'];
  $storage=$_POST['storage'];
  $other=$_POST['others'];
  $top = isset($_POST["top"]) ? "top" : "-";
  $price=$_POST['price'];
  $image=$_POST['image'];
  $sql="insert into `ldetails` (Laptop_Name,Processor,Graphics,RAM,Storage,Display,OS,Other_Features,Price,Image,Top)
  values ('$lname','$proc','$graphics','$ram','$storage','$display','$os','$other','$price','$image','$top')";
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
    <title>Laptop Specification Form</title>
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
    <h2 class="mb-4">Laptop Specification Form</h2>
    <form id="laptopForm" method="post" novalidate>
        <!-- Laptop Name -->
        <div class="form-group">
            <label for="laptopName">Laptop Name:</label>
            <input type="text" class="form-control" name="lname" id="laptopName" placeholder="Enter laptop name" required>
            <div class="invalid-feedback">Please enter the laptop name.</div>
        </div>

        <!-- Specifications in a Two-Column Layout -->
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="processor">Processor:</label>
                    <input type="text" class="form-control" name="processor" id="processor" placeholder="Enter processor details" required>
                    <div class="invalid-feedback">Please enter the processor details.</div>
                </div>

                <div class="form-group">
                    <label for="ram">RAM:</label>
                    <input type="text" class="form-control" name="ram" id="ram" placeholder="Enter RAM details" required>
                    <div class="invalid-feedback">Please enter the RAM details.</div>
                </div>

                <div class="form-group">
                    <label for="display">Display:</label>
                    <input type="text" class="form-control" name="display" id="display" placeholder="Enter display details" required>
                    <div class="invalid-feedback">Please enter the display details.</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="graphics">Graphics:</label>
                    <input type="text" class="form-control" name="graphics" id="graphics" placeholder="Enter graphics details" required>
                    <div class="invalid-feedback">Please enter the graphics details.</div>
                </div>

                <div class="form-group">
                    <label for="storage">Storage:</label>
                    <input type="text" class="form-control" name="storage" id="storage" placeholder="Enter storage details" required>
                    <div class="invalid-feedback">Please enter the storage details.</div>
                </div>

                <div class="form-group">
                    <label for="os">OS:</label>
                    <input type="text" class="form-control" name="os" id="os" placeholder="Enter OS details" required>
                    <div class="invalid-feedback">Please enter the OS details.</div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="laptopName">Other Features:</label>
            <input type="text" class="form-control" name="others" id="laptopName" placeholder="Enter additional features" required>
            <div class="invalid-feedback">Please enter the laptop name.</div>
        </div>
        <!-- Price -->
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="Enter price" required>
            <div class="invalid-feedback">Please enter a valid price.</div>
        </div>

        <!-- Image Input File -->
        <div class="form-group">
            <label for="image">Choose Image:</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image" accept="image/*" required>
                <label class="custom-file-label" for="image">Select file...</label>
                <div class="invalid-feedback">Please choose an image file.</div>
            </div>
        </div>

        <!-- Top Selling Checkbox -->
        <div class="form-group form-check">
            <input type="checkbox"name="top" class="form-check-input" id="topSelling">
            <label class="form-check-label top-selling-label" for="topSelling">Top Selling</label>
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
