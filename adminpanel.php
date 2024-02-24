<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">  
    <!-- Alertify js -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

  
  </head>
<body>
    <h1>Laptop Details</h1><br> 
    <form action="add_laptop.php">
      <button type="submit"  class="btn btn-primary btn-lg add-btn">Add Laptop</button>
    </form>
    <?php
    include 'connect.php';
    $query="Select * from ldetails";
    $result=mysqli_query($conn,$query);
    ?>
    <table class="table table-responsive my-5 table-bordered table-hover ">
        <thead class="thead-dark">
          <tr class="table-dark text-center">
            <th scope="col">No.</th>
            <th scope="col" class="text-nowrap" >Laptop Name</th>
            <th scope="col">Processor</th>
            <th scope="col">Graphics</th>
            <th scope="col">RAM</th>
            <th scope="col">Storage</th>
            <th scope="col">OS</th>
            <th scope="col">Display</th>
            <th scope="col">Other Features</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Top</th>
            <th scope="col" colspan="2">Operation</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if(mysqli_num_rows($result)>0){
            $i=1;
            while($row=mysqli_fetch_assoc($result)){
              ?>
              <tr class="text-center">
              <td><?php echo $i; ?></td>
              <th scope="row"><?php echo $row['Laptop_Name']; ?></th>
              <td><?php echo $row['Processor']; ?></td>
              <td><?php echo $row['Graphics']; ?></td>
              <td><?php echo $row['RAM']; ?></td>
              <td><?php echo $row['Storage']; ?></td>
              <td><?php echo $row['OS']; ?></td>
              <td><?php echo $row['Display']; ?></td>
              <td><?php echo $row['Other_Features']; ?></td>
              <td class="text-nowrap"><?php echo "Rs ".$row['Price'];?></td>
              <td><?php echo $row['Image']; ?></td>
              <td><?php echo $row['Top']; ?></td>

              <td>
                <form action="update.php" method="post">
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
            $i++;
            }
            }

          ?>
            
        </tbody>
        </table>
      
      <!-- alertify js -->
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
      <script>
    
        <?php  if (isset($_SESSION['message_update'])){ ?>
          alertify.set('notifier','delay', 2);
        alertify.set('notifier','position', 'top-right');
        alertify.notify('<?php echo $_SESSION['message_update'] ?>');
        <?php 
        unset($_SESSION['message_update']);
        } 
        ?>
        <?php if (isset($_SESSION['message_delete'])){ ?>
          alertify.set('notifier','delay', 2);
        alertify.set('notifier','position', 'top-right');
        alertify.error('<?php echo $_SESSION['message_delete'] ?>');
        <?php 
        unset($_SESSION['message_delete']);
        } 
        ?>
        <?php if (isset($_SESSION['message_add'])){ ?>
          alertify.set('notifier','delay', 2);
        alertify.set('notifier','position', 'top-right');
        alertify.success('<?php echo $_SESSION['message_add'] ?>');
        <?php 
        
        
        unset($_SESSION['message_add']);
        } 
        ?>
        
      </script>

<h1>User Details</h1><br> 
    <form action="add_user.php">
      <button type="submit"  class="btn btn-primary btn-lg add-btn">Add User</button>
    </form>
      <?php
      
      $query="Select * from user_info";

    $result=mysqli_query($conn,$query);
    ?>
    <table class="table table-responsive my-5 table-bordered table-hover ">
        <thead class="thead-dark">
          <tr class="table-dark text-center">
            <th scope="col">No.</th>
            <th scope="col" class="text-nowrap" >User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Cart ID</th>
            <th scope="col" colspan="2">Operation</th>
          </tr>
        </thead>
        <tbody>
        <?php
          if(mysqli_num_rows($result)>0){
            $i=1;
            while($row1=mysqli_fetch_assoc($result)){

              ?>
              <tr class="text-center">
              <td><?php echo $i; ?></td>
              <th scope="row1"><?php echo $row1['Username']; ?></th>
              <td><?php echo $row1['Email']; ?></td>
              
              
              <td><?php  echo $row1['cart'] ?></td>
               <td>  
               <form action="delete_user.php" method="post">
               <input type="hidden" name="add-id" value="<?php echo $row1['SN'];?>">
                <button class="btn btn-danger" name="btn-delete" onclick="return confirm('Do you want to delete the records?')">Delete</button>
               </form>
              </td>
            </tr> 
            <?php  
            $i++;
            }
            }

          
          ?>
            
        </tbody>
        </table>
</body>
</html>