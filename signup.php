<?php
  include 'connect.php';
  if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['uname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $fullname= $fname." ".$lname;
    $sql="INSERT INTO `signup` (FullName,Username,Email,Password)
    VALUES ('$fullname','$username','$email','$password')";
    $result=mysqli_query($conn,$sql);
    if($result){
      header("location:verification.php");
    }
    else{
      die (mysqli_error($conn));
    }
  }
  
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>signup page</title>
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Font Awesome CSS for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- Add your custom stylesheets here if needed -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Allura&family=Josefin+Sans&family=Lato:ital,wght@1,300&family=Roboto+Serif:opsz@8..144&family=Ysabeau+SC&display=swap" rel="stylesheet">
</head>
<body>

  <!-- Section: Design Block -->
<section class="text-center text-lg-start">
    <style>
      .cascading-right {
        margin-right: -50px;
      }
  
      @media (max-width: 991.98px) {
        .cascading-right {
          margin-right: 0;
        }
      }
    </style>
  
    <!-- Jumbotron -->
    <div class="container py-4">
      <div class="row g-0 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card cascading-right" style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);
              ">
            <div class="card-body card shadow p-5 shadow-5 text-center">
              <h2 class="fw-bold mb-5">Sign up now</h2>
              <form method="post">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                    <div class="col-md-6  ">
                        <div class="form-group">
                          <input type="text" name="fname" id="form3Example1" class="form-control" placeholder=" " />
                          <label class="form-label" for="form3Example1">First name</label>
                        </div>
                      </div>
                      <div class="col-md-6  ">
                        <div class="form-group">
                          <input type="text" name="lname" id="form3Example1" class="form-control" placeholder=" " />
                          <label class="form-label" for="form3Example1">Last name</label>
                        </div>
                      </div>
                </div>

                <div class="col-md-20 mb-4 ">
                    <div class="form-group">
                      <input type="text" name="uname" id="form3Example1" class="form-control" placeholder=" " />
                      <label class="form-label" for="form3Example1">Username</label>
                    </div>
                  </div>
                <!-- Email input -->
                <div class="col-md-20 mb-4 ">
                    <div class="form-group">
                      <input type="text" name="email" id="form3Example1" class="form-control" placeholder=" " />
                      <label class="form-label" for="form3Example1">Email</label>
                    </div>
                  </div>

  
                <!-- Password input -->
                <div class="col-md-20 mb-4 ">
                    <div class="form-group">
                      <input type="text" name="password" id="form3Example1" class="form-control" placeholder=" " />
                      <label class="form-label" for="form3Example1">Password</label>
                    </div>
                  </div>
  
                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                  <label class="form-check-label" for="form2Example33">
                    Subscribe to our newsletter
                  </label>
                </div>
  
                <!-- Submit button -->

                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 px-5 py-2">
                  Sign up
                </button>
  
                <!-- Register buttons -->
                <div class="text-center">
                  <p>or sign up with:</p>
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                  </button>
  
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                  </button>
  
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                  </button>
  
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
  
        <div class="col-lg-6 mb-5 mb-lg-0">
          <img src="signup_img.jpg" class="w-100  img-fluid rounded-4 shadow-4" style="height: 800px; width: auto;"
            alt="" />
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- Section: Design Block -->
  <!-- Bootstrap JS, Popper.js, and jQuery (required for Bootstrap) -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --> -->

  <!-- Add your custom scripts here if needed -->

</body>
</html>
