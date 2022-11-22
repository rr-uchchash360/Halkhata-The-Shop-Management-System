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
    <title>Search</title>
    <link rel="stylesheet" href="search.css">
    <link rel="icon" href="icons/search.png" type="image/icon type">
    <style>
        table, th, td {
           border: 1px solid black;
        }
     </style>
</head>
  
<body>

    <div class="navbar">

        <div class="navbar-shop-logo">
            <a href="add.html"><img src="icons/shop.png" style="width: 90px; height: 90px;">
        </div>

        <div class="navbar-add-product-button">
            <a href="add.php">Add</a>
        </div>
        <div class="navbar-sell-product-button">
            <a href="sell.php">Sell</a>
        </div>
        <div class="navbar-return-product-button">
            <a href="return.php">Return</a>
        </div>

        <div class="navbar-dashboard-button">
            <a href = 'dashboard.php'>Dashboard</a>
        </div>

        <div class="navbar-logout-button">
            <a href = 'logout.php'>Log Out</a>
        </div>

    </div>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="wrapper">

        <div class="wrapper-search-product-label">
            <img src="icons/search.png" style="width: 22px;height: 22px;">
            <label>Search Product</label>
        </div>

        <div>
            <input type="text" class="wrapper-product-name-input" placeholder="Enter Product ID">
        </div>

        <div>
            <button type="submit" class="wrapper-search-button" required>Search</button>
        </div>


        <table class="table-for-show">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Price</th>
                    <td class="wrapper-product-id-output"></td>
                </tr>
                </thead>
                
                  <?php 
        if(isset($_GET['productID'])){
            $product_id = $_GET['productID'];
            $sql = "SELECT * FROM products WHERE product_id = '$product_id'";
            $query = $conn->query($sql);
            while($data = mysqli_fetch_assoc($query)){
                $productID = $data['product_id'];
                $productName = $data['product_name'];
                $productQuantity = $data['product_quantity'];
                $productPrice = $data['product_price'];
                echo "<tr>
                        <td>$productID</td>
                        <td>$productName</td>
                        <td>$productQuantity</td>
                        <td>$productPrice</td>
                    </tr>";
        
            }
        }
        ?>
  
        </table>
         

    </form>
    
    
    
    <div class="footer">
        <label>©</label>
        <a href = https://github.com/rr-uchchash360>Md. Rafiur Rahman</a>
        <a href = https://github.com/zubayertahmid>Zubayer Tahmid</a>
        <a href = https://github.com/sadman89>Sadman Sadiq</a>
    </div>

</body>
  
</html>
<?php 
  }
  else{
    header('location:login.php');
  }
?>