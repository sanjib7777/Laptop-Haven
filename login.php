<?php
include 'connect.php';
// Start the session
session_start();

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Your authentication logic goes here
    $username = $_POST['name'];
    $password = $_POST['pass'];
    if($username=="admin" && $password=="admin123@"){
        header("location:adminpanel.php");
        exit();
    }
    // Replace the following condition with your actual authentication logic
   $stmt = $conn->prepare("SELECT PASSWORD,Email FROM user_info WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password,$email);
    $stmt->fetch();
    $stmt->close();
    
    if ( password_verify($password, $hashed_password)) {
        
        // Authentication successful, set session status
        $_SESSION['email']=$email;
        $_SESSION['status'] = "logged_in";
        $_SESSION['user'] = $username;
        $_SESSION['join'] = date("Y-m-d H:i:s");
        // Redirect to a logged-in page or any other desired action
        header("Location: index.php");
        exit();
    } else {
        // Authentication failed, you may display an error message
        $_SESSION['notlogin'] = "Invalid password or username";
        // header("Location: index.php");

    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup_login.css">
    <title>Document</title>
    <!-- Alertify js -->
	 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

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
        <!-- <div class="check">
            <input type="checkbox" >
            <label for="">Remember me</label>
        </div> -->
        <button type="submit" id="btn" name="submit">Login</button>
        <div class="sign_up_link">
            <p>Don't have an account?
                <span class="up_link" > <a href="signup.php" style="text-decoration: none; color:#D10024;"> Sign Up</a></span>
            </p>
        </div>
    </form>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
<?php if (isset($_SESSION['notlogin'])){ ?>
          alertify.set('notifier','delay', 2);
        alertify.set('notifier','position', 'top-right');
        alertify.error('<?php echo $_SESSION['notlogin'] ?>');
        <?php 
        unset($_SESSION['notlogin']);
        } 
        ?>
</script>

</body>
</html>