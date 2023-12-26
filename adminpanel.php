<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $lname=$_POST['lname'];
  $spec=$_POST['specification'];
  $price=$_POST['price'];
  $image=$_POST['image'];
  $sql="insert into `ldetails` (Laptop_name,Specification,Price,Image)
  values ('$lname','$spec','$price','$image')";
  $result=mysqli_query($conn,$sql);
  if($result){
    echo  "data inserted successfully";
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">  
</head>
<body>
    <h1>Laptop Details</h1><br>
    <button type="button" class="btn btn-primary btn-lg add-btn">Add Laptop</button>
    <?php
    $query="Select * from ldetails";
    $result=mysqli_query($conn,$query);
    ?>
    <table class="table my-5">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Laptop Name</th>
            <th scope="col">Specification</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>

          </tr>
        </thead>
        <tbody>
          <?php
          if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){

              ?>
              <tr>
              <td><?php echo $row['SN']; ?></td>
              <th scope="row"><?php echo $row['Laptop_name']; ?></th>
              <td><?php echo $row['Specification']; ?></td>
              <td><?php echo "Rs ".$row['Price'];?></td>
              <td><?php echo $row['Image']; ?></td>
              <td>
                <form action="edit.php" method="post">
                  <input type="hidden" name="edit-id" value="<?php echo $row['SN'];?>">
                  <button type="submit" name="btn-edit"  class="btn btn-success btn-edit mx-2" >Edit</button>
                </form></td>
               <td>  
               <form action="delete.php" method="post">
               <input type="hidden" name="edit-id" value="<?php echo $row['SN'];?>">
                <button class="btn btn-danger" name="btn-delete" onclick="return confirm('Do you want to delete the records?')">Delete</button>
               </form>
              </td>
            </tr> 
            <?php  
            }
          }
          else{
            echo "No records found";
          }
          ?>
            
        </tbody>
      </table>
      <div class="give_detail px-5 pt-5 ">
        <form  method="post" action="adminpanel.php">
          <i class="fa-regular fa-circle-xmark " style="font-size: 35px;position: absolute; right: 10px; top:10px; cursor: pointer;"></i>
          <h3>Laptop Name</h3>
          <input type="text" name="lname" class="form-control" id="lname" aria-describedby="emailHelp">
          <h3>Specification</h3>
          <textarea name="specification" id="specs"cols="80" rows="5"  class="form-control"></textarea>
          <h3>Price</h3>
          <div class="input-group mb-3">
            <span class="input-group-text">Rs</span>
            <input type="text"id="price" name="price" class="form-control" aria-label="Amount (to the nearest dollar)">
            <span class="input-group-text">.00</span>
          </div>
          <h3>Image</h3>
          <input type="file" name="image"><br>
          <div class="text-center">
            <input type="submit" id="edit_save" name="submit" class="btn btn-primary btn-lg my-3">
          </div>
        
        </form>
      </div>
      <script src="script.js"></script>
</body>
</html>