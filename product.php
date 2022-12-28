<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'users';
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
?>
<?php 
  session_start();
  $userID = $_SESSION['$userID'];
  if(!empty($userID)){

?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="return.css">
    <link rel="icon" href="icons/return.png" type="image/icon type">
</head>

<body>

    <div class="navbar">

        <div class="navbar-shop-logo">
            <a href="dashboard.php"><img src="icons/shop.png" style="width: 90px; height: 90px;">
        </div>

        <div class="navbar-add-product-button">
            <a href="add.php">Add</a>
        </div>
        <div class="navbar-update-product-button">
            <a href='update.php'><button>Update</button></a>
        </div>
        <div class="navbar-sell-product-button">
            <a href="sell.php">Sell</a>
        </div>

        <div class="navbar-dashboard-button">
            <a href ='dashboard.php'>Dashboard</a>
        </div>

        <div class="navbar-logout-button">
            <a href ='logout.php'>Log Out</a>
        </div>

    </div>
    <div class="container">
        <button class="btn btn-primary my-5"><a href ="add.php" class="text-light">Add Product</a></button>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product ID</th>
              <th scope="col">Product Name</th>
              <th scope="col">Price</th>
              <th scope="col">Availability</th>
              <th scope="col">Operations</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM products";
              $result = mysqli_query($conn, $sql);
              
              while($row = mysqli_fetch_array($result)){
                  $id = $row['product_id'];
                  $name = $row['product_name'];
                  $price = $row['product_price'];
                  $quantity = $row['product_quantity'];
                  echo '<tr scope="row">
                  <td>'.$id.'</td>
                  <td>'.$name.'</td>
                  <td>'.$price.'</td>
                  <td>'.$quantity.'</td>
                  <td>
                  <button class="btn btn-primary"><a href = "update.php?id='.$id.'" class="text-light">Update</a></button>
                  <button class="btn btn-danger"><a href = "delete.php?deleteid='.$id.'" class="text-light">Delete</a></button> 
                  </td>
                </tr>';
              }
            ?>
          
          </tbody>
        </table>

    </div>
    

    <div class="footer">
        <label>©</label>
        <a href = https://github.com/rr-uchchash360>Md. Rafiur Rahman</a>
        <a href = https://github.com/zubayertahmid>Zubayer Tahmid</a>
    </div>

</body>
  
</html>
<?php 
  }
  else{
    header('location:login.php');
  }
?>
