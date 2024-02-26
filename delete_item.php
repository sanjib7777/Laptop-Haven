<?php
include 'connect.php';
session_start();

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $laptop_id = $_POST['Laptop_id'];

    // Retrieve the current cart from the database
    $query = "SELECT cart FROM user_info WHERE Username = '$user_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $cart = $row['cart'];

        // Remove the laptop_id from the cart
        $new_cart = implode(',', array_diff(explode(',', $cart), [$laptop_id]));

        // Update the cart in the database
        $update_query = "UPDATE user_info SET cart = ";

        if ($new_cart === "") {
            // If new_cart is empty, store NULL
            $update_query .= "NULL";
        } else {
            $update_query .= "'$new_cart'";
        }

        $update_query .= " WHERE Username = '$user_id'";

        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            // Check if the cart is now empty
            if ($new_cart === "") {
                header("location: your_cart.php?empty=true");
            } else {
                header("location: your_cart.php");
            }
        } else {
            echo 'error updating cart';
        }
    } else {
        echo 'error fetching cart';
    }
}
?>
