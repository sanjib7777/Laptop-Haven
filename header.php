<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" href="product.css">
	<title>Electro - HTML Ecommerce Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	
	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<style>
		/* Custom CSS for hover effect and responsiveness */
		body{
			scroll-behavior: smooth;
		}
		.btn-login,
		.btn-signup {
			transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
			/* Add color transition */
			color: #ffffff;
			/* Set initial text color */
		}

		.btn-login:hover,
		.btn-signup:hover {
			background-color: #12432a;
			/* Change the background color for hover effect */
			color: #ffffff;
			/* Change the text color on hover */
		}

		@media (max-width: 767px) {

			/* Adjust styles for mobile devices */
			.btn-login,
			.btn-signup {
				width: 100%;
				margin-bottom: 10px;
			}
		}
		#top-header .menu-toggle {
   		 display: none; /* Hide the toggle icon by default on larger screens */
		}

/* Media query for mobile screens */
@media (max-width: 767px) {
   

    #top-header .menu-toggle {
        display: block; /* Show the toggle icon on mobile screens */
    }
	.contact{
		display: flex;
            align-items: center;
            justify-content: center;
	}
}
.navbar-brand {
            font-size: 24px;
        }

        .navbar-toggler-icon {
            background-color: #D10024;
        }

        .nav-link {
            color: white;
        }

        .nav-item.dropdown:hover .nav-link {
            color: #D10024;
        }

        .dropdown-menu {
            background-color: #D10024;
        }

		.dropdown-item.profile:hover {
        color: #007BFF;
    }

    .dropdown-item.logout:hover {
        color: #007BFF;
    }
	.btn-contact-us:hover{
		
            border-color: #93111d;
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
       
	</style>

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
		<!-- Menu Toogle -->
		<div class="menu-toggle pull-right"> <!-- Move the menu-toggle div to the right -->
			<a href="#" style="color: #ffffff;"> <!-- Set the color to white -->
				<i class="fa fa-bars"></i>
			</a>
		</div>
		<!-- /Menu Toogle -->
        <ul class="header-links pull-left">
            <li><a href="#"><i class="fa fa-phone"></i> +977-9765566872</a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
            <li><a href="#"><i class="fa fa-map-marker"></i> Balkumari,Lalitpur</a></li>
        </ul>
        <ul class="header-links pull-right">
							<?php
							
							if (isset($_SESSION['status']) && $_SESSION['status'] === 'logged_in') {
								echo '<li ><span style="color:white;">Welcome ' . $_SESSION['user'] . ' !</span></li>';
								echo '<li class="nav-item dropdown">';
								echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>';
								echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
								echo '<a class="dropdown-item profile"  href="profile.php">Profile</a>';
								echo '<div class="dropdown-divider"></div>';
								echo '<a class="dropdown-item logout" href="logout.php">Logout</a>';
								echo '</div>';
								echo '</li>';
							}
			?>
        </ul>
    </div>
</div>

		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="#" class="logo">
								<img src="./img/logo.png" alt=""style="width:80px">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form>
								<select class="input-select">
									<option value="0">All Categories</option>
									<option value="1">Laptop</option>
									<option value="1">Apple Products</option>
									<option value="1">Desktop</option>
									<option value="1">Monitors</option>
								</select>
								<input class="input" placeholder="Search here">
								<button class="search-btn">Search</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->
							<?php
							

							// Check if the user is logged in
							if (isset($_SESSION['status']) && $_SESSION['status'] === 'logged_in') {
								// User is logged in, display Wishlist link
								// $wishlistQty = isset($_SESSION['wishlist_qty']) ? $_SESSION['wishlist_qty'] : 0;
								echo '<div>
								<form action="contact_us.php">
							<button type="submit" class="btn btn-contact-us btn-lg btn-con" style="background-color: #D10024; color: #fff;">
								Contact Us
							</button>
           							 </form>
         						 </div>';
							} else {
								// User is not logged in, display Login and Signup buttons with Bootstrap classes
								echo '<div class="contact">
          						  <a href="login.php" class="btn btn-primary btn-login" style="background-color: #D10024;">Login</a>
          							</div>
         							 <div>
         							   <a href="signup.php" class="btn btn-primary btn-signup" style="background-color: #D10024;">Signup</a>
         							 </div>';
							}
							?>

							<!-- /Wishlist -->
							
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->