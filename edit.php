
<?php
session_start();
   include('connect.php');
 if (isset($_POST['submit'])) {
    $id=$_POST['edit-id'];
    $lname = $_POST['edit_lname'];
     $spec = $_POST['edit_specification'];
    $price = $_POST['edit_price'];
     $image = $_POST['edit_image'];
     $sql = "UPDATE `ldetails` SET Laptop_name='$lname', Specification='$spec', Price='$price', Image='$image' WHERE SN=$id";
     $result = mysqli_query($conn, $sql);

     // Check if the update query was successful
     if ($result) {
      $_SESSION['message_update']='Updated Successfully';
         header('location:adminpanel.php');
     } else {
         die("Error updating record: " . mysqli_error($conn));
     }
 } 
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">  
</head>
<body>
<div class="give_detail1 px-5 pt-5 ">
          <?php
          include('connect.php');
          if(isset($_POST['btn-edit'])){
            $id=$_POST['edit-id'];
            $sql="SELECT * FROM ldetails WHERE SN=$id";
            $query=mysqli_query($conn,$sql);
            foreach($query as $row)
            {
              ?>

              
        
        <form  method="POST" action="">
          <h3>Laptop Name</h3>
          <input type="hidden" value="<?php echo $id ?>" name="edit-id">
          <input type="text" name="edit_lname" value="<?php echo $row['Laptop_name'];?>" class="form-control" id="lname" aria-describedby="emailHelp">
          <h3>Specification</h3>
          <textarea name="edit_specification" cols="80" rows="5"   class="form-control"><?php echo $row['Specification'];?></textarea>
          <h3>Price</h3>
          <div class="input-group mb-3">
            <span class="input-group-text">Rs</span>
            <input type="text"id="price" value="<?php echo $row['Price'];?>" name="edit_price" class="form-control" aria-label="Amount (to the nearest dollar)">
            <span class="input-group-text">.00</span>
          </div>
          <h3>Image</h3>
          <input type="file" value="<?php echo $row['Image'];?>" name="edit_image"><br>
          <div class="float-end">
              <button type="button" class="btn btn-secondary mx-2" ><a href="adminpanel.php" style="text-decoration:none ;"class="text-light ">Cancel</a></button>
            <button type="submit" class="btn btn-primary my-3" name="submit">Save</button>
          </div>
        </form>
        <?php
            }
          }
        ?>
      </div>
      <script src="script.js"></script>
      </body>
</html> 
