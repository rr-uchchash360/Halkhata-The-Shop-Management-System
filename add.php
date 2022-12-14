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
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="add.css">
    <link rel="icon" href="icons/add.png" type="image/icon type">
</head>

<body>
<?php 
        if(isset($_POST['product_id'])){
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_quantity = $_POST['product_quantity'];
            $product_price = $_POST['product_price'];    
            $queryCheck = "SELECT product_id FROM products WHERE product_id = '$product_id'";
            $data = $conn->query($queryCheck);
            if(mysqli_num_rows($data) == 0){
                $sql = "INSERT INTO products (product_name, product_quantity, product_id, product_price) 
                        VALUES ('$product_name', '$product_quantity', '$product_id', '$product_price')";
                $query = $conn->query($sql);
                if($query){
                    header('location:product.php');
                }            
            }
            else if(mysqli_num_rows($data) > 0){
              $check = "SELECT product_quantity FROM products WHERE product_id = $product_id";
              $data = $conn->query($check);
              $Quantity = mysqli_fetch_array($data); 
              $productQuantity = $Quantity['product_quantity'] + intval($product_quantity);
              $update = "UPDATE products 
                         SET product_quantity = '$productQuantity'
                         WHERE product_id = '$product_id'";
                if($conn->query($update) == TRUE){
                    header('location:product.php');
                }
            }
        }
    ?>
    <div class="navbar">

    <div class="navbar-shop-logo">
            <a href="dashboard.php"><img src="icons/shop.png" style="width: 90px; height: 90px;">
        </div>

        <div class="navbar-dashboard-button">
            <a href='dashboard.php'><button>Dashboard</button></a>
        </div>

        <!-- <div class="navbar-search-product-button">
            <a href='search.php'><button>Search</button></a>
        </div> -->

        <div class="navbar-product-button">
            <a href='product.php'><button>Products</button></a>
        </div>
        <div class="navbar-sell-product-button">
            <a href='sell.php'><button>Sell</button></a>
        </div>
        <div class="navbar-return-product-button">
            <a href='return.php'><button>Return</button></a>
        </div>

        <div class="navbar-logout-button">
            <a href='logout.php'><button>Logout</button></a>
        </div>

    </div>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="wrapper">
    
        <div class="wrapper-add-product-label">
            <img src="icons/add.png" style="width: 22px;height: 22px;">
            <label>Add Product</label>
        </div>

        <div>
            <input type="text" onkeyup="return event.charCode >= 48" name="product_id" min="1" class="wrapper-product-id-input" placeholder="Enter Product ID">
        </div>
        
        <div>
            <input type="text" class="wrapper-product-name-input" name="product_name" placeholder="Enter Product Name">
        </div>
        
        <div>
            <input type="number" onkeyup="return event.charCode >= 48" name="product_quantity" min="1" class="wrapper-product-quantity-input" placeholder="Enter Product Quantity">
        </div>

        <div>
            <input type="number" onkeyup="return event.charCode >= 48" min="1" name="product_price" class="wrapper-product-price-input" placeholder="Enter Product Price">
        </div>

        <div>
            <button type="submit" class="wrapper-add-product-button" required>Add Product</button>
        </div>
        
    </form>

    <!-- <div class="recent-add">
        
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

            Backend Code
          
            </tbody>
        </table>

    </div> -->

    <div class="footer">
        <label>??</label>
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