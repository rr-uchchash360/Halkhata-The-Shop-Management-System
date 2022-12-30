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
    <title>Return Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="return.css">
    <link rel="icon" href="icons/return.png" type="image/icon type">
</head>

<body>

    <div class="navbar">

        <div class="navbar-shop-logo">
            <a href="dashboard.php"><img src="icons/shop.png" style="width: 90px; height: 90px;">
        </div>

        <div class="navbar-product-button">
            <a href='product.php'><button>Products</button></a>
        </div>
        <div class="navbar-add-product-button">
            <a href="add.php">Add</a>
        </div>
        <!-- <div class="navbar-update-product-button">
            <a href='update.php'><button>Update</button></a>
        </div> -->
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
    <?php 
        if(isset($_POST['order_id'])){
            $orderID = $_POST['order_id'];
            $query = "SELECT * FROM orders WHERE order_id = '$orderID'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            $productID = $row['product_id'];
           // $returnQuantity = $row['product_quantity'];
            if($result){
                $check = "SELECT product_quantity FROM products WHERE product_id = '$productID'";
                $data = mysqli_query($conn, $check);
                $Quantity = mysqli_fetch_array($data); 

                $productQuantity = $Quantity['product_quantity'] + $row['product_quantity'];
                $update = "UPDATE products 
                         SET product_quantity = '$productQuantity'
                         WHERE product_id = '$productID'";
                $deleteQuery = "DELETE FROM orders WHERE order_id = '$orderID'";
                $delete = $conn->query($deleteQuery);
            }
        }

        ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="wrapper">

        <div class="wrapper-return-product-label">
            <img src="icons/return.png" style="width: 22px;height: 22px;">
            <label>Return Product</label>
        </div>
        
        <div>
            <input type="text" name="order_id" class="wrapper-order-id-input" placeholder="Enter Order ID" required>
        </div>
        
        <!-- <div>
            <input type="text" class="wrapper-contact-number-intput" placeholder="Enter Customer Contact Number">
        </div>
        
        <div>
            <input type="text" class="wrapper-product-id-intput" name="order-id" placeholder="Enter Order ID">
        </div>
        
        <div>
            <input type="text" class="wrapper-quantity-intput" name="product-quantity" placeholder="Enter Product Quantity">
        </div>
            -->
        <div>
            <button type="submit" name="return" class="wrapper-restock-button" required>Return</button>
        </div> 
        
    </form>

    <!-- <div class="recent-return">
        
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product ID</th>
              <th scope="col">Product Name</th>
              <th scope="col">Price</th>
              <th scope="col">Availability</th>
            </tr>
          </thead>
          <tbody>

            Backend Code -->
          
            </tbody>
        </table>

    </div> -->

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