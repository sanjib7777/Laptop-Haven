<?php
include 'connect.php';
session_start();

$Laptop_id = $_POST['Lid'];

if ((isset($_POST['addtocart']) || isset($_POST['addtocart1']) ) && $_SESSION['status'] === 'logged_in' ) {
    $user_id = $_SESSION['user'];
    
    // Fetch the existing cart value
    $query = "SELECT cart FROM user_info WHERE Username = '$user_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $existing_cart = $row['cart'];

        // Check if the new item is not already in the cart
        if (!in_array($Laptop_id, explode(',', $existing_cart))) {
            // Add the new item to the cart
            $new_item = $Laptop_id;
            $updated_cart = ($existing_cart) ? $existing_cart . "," . $new_item : $new_item;

            // Update the user_info table with the new cart value
            $update_query = "UPDATE user_info SET cart = '$updated_cart' WHERE Username = '$user_id'";
            $update_result = mysqli_query($conn, $update_query);

            if ($update_result) {
                $_SESSION['cart_status'] = "added to cart";
            } else {
                $_SESSION['cart_status'] = "error on adding";
            }
        } else {
            $_SESSION['cart_status'] = "item already in cart";
        }
    } else {
        $_SESSION['cart_status'] = "Error fetching existing cart: " . mysqli_error($conn);
    }
   
   
}
else{
    $_SESSION['login_status'] = "Please Login";
    
    header("location:index.php");
   
}
if (isset($_POST['addtocart'])){
    header("location:index.php");
}
else{
    header("location:product.php?Laptop_id=$Laptop_id");
}

?>