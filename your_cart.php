<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Add Font Awesome CSS link for delete icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <?php
    include 'connect.php';
    session_start();
    $user_id = $_SESSION['user'];
    $query = "SELECT cart FROM user_info WHERE Username = '$user_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $cart = $row['cart'];

        // Split the cart by commas
        $laptop_ids1 = explode(',', $cart);
        $laptop_ids = array_unique($laptop_ids1);
    ?>

    <div class="container mt-5">
        <h2>Your Cart</h2>
        <table class="table table-bordered" id="cartTable">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($laptop_ids as $laptop_id) {
                    $laptop_id = trim($laptop_id); // Remove any extra whitespaces
                    $laptop_query = "SELECT * FROM ldetails WHERE SN = '$laptop_id'";
                    $laptop_result = mysqli_query($conn, $laptop_query);

                    if ($laptop_result) {
                        $laptop_row = mysqli_fetch_assoc($laptop_result);
                ?>
                <!-- Sample row, you can repeat this for each item in the cart -->
                <tr>
                    <td><?php echo $laptop_row['Laptop_Name'] ?></td>
                    <td class="price">Rs.<?php echo $laptop_row['Price'] ?></td>
                    <td>
                        <input type="number" value="1" min="1" class="quantity"
                            data-price="<?php echo $laptop_row['Price'] ?>">
                    </td>
                    <td class="subtotal">Rs.<?php echo $laptop_row['Price'] ?></td>
                    <td>
                        <button class="btn btn-danger btn-sm delete-row">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
                <!-- Repeat rows for each item in the cart -->
            </tbody>
        </table>
    </div>

    <?php
    } // Close the if ($result) block
    ?>

    <!-- Add Bootstrap JS and Popper.js scripts -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Update subtotal on quantity change
            $('.quantity').on('input', function () {
                updateSubtotal($(this));
            });

            // Delete row on button click
            $('.delete-row').on('click', function () {
                $(this).closest('tr').remove();
            });

            // Function to update subtotal
            function updateSubtotal(input) {
                var quantity = parseFloat(input.val());
                var price = parseFloat(input.data('price'));
                var subtotal = quantity * price;
                input.closest('tr').find('.subtotal').text('Rs.' + subtotal.toFixed(2));
            }
        });
    </script>
</body>

</html>
