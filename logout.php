<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['status']) && $_SESSION['status'] === 'logged_in') {
    // Destroy all session variables
    session_unset();
    session_destroy();

    // Redirect to the login page or any other page after logout
    header("Location: index.php");
    exit();
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: index.php");
    exit();
}
?>