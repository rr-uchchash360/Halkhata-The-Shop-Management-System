<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'users';
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
                    echo '<script>alert("Data ISERTED Successfully!")</script>';
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
                    echo '<script>alert("Data UPDATED Successfully!")</script>';
                }
            }
        }
    ?>
    <div class="navbar">

    <div class="navbar-shop-logo">
            <a href="add.html"><img src="icons/shop.png" style="width: 90px; height: 90px;">
        </div>

        <div class="navbar-dashboard-button">
            <a href='login.html'><button>Dashboard</button></a>
        </div>

        <div class="navbar-search-product-button">
            <a href='search.html'><button>Search</button></a>
        </div>
        <div class="navbar-sell-product-button">
            <a href='sell.html'><button>Sell</button></a>
        </div>
        <div class="navbar-return-product-button">
            <a href='return.html'><button>Return</button></a>
        </div>

        <div class="navbar-logout-button">
            <a href='login.html'><button>Logout</button></a>
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
            <input type="text" class="wrapper-product-name-intput" name="product_name" placeholder="Enter Product Name">
        </div>
        
        <div>
            <input type="number" onkeyup="return event.charCode >= 48" name="product_quantity" min="1" class="wrapper-product-quantity-intput" placeholder="Enter Product Quantity">
        </div>

        <div>
            <input type="number" onkeyup="return event.charCode >= 48" min="1" name="product_price" class="wrapper-product-price-intput" placeholder="Enter Product Price">
        </div>

        <div>
            <button type="submit" class="wrapper-add-product-button" required>Add Product</button>
        </div>
        
    </form>

    <div class="footer">
        <label>©</label>
        <a href = https://github.com/rr-uchchash360>Md. Rafiur Rahman</a>
        <a href = https://github.com/zubayertahmid>Zubayer Tahmid</a>
        <a href = https://github.com/sadman89>Sadman Sadiq</a>
    </div>

</body>
  
</html>