<<?php
session_start();
include 'connect.php';

if (isset($_POST['btn-delete'])) {
    $id = $_POST['add-id'];
            $sql = "DELETE FROM  `user_info` WHERE SN=$id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['message_delete']='Deleted Successfully';
                header('location:adminpanel.php');
                exit;
            } else {
                die(mysqli_error($conn));
            }
}
?>