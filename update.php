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
    <title>Update Product</title>
    <link rel="stylesheet" href="add.css">
    <link rel="icon" href="icons/add.png" type="image/icon type">
</head>

<body>

    <div class="navbar">

    <div class="navbar-shop-logo">
            <a href="add.php"><img src="icons/shop.png" style="width: 90px; height: 90px;">
        </div>

        <div class="navbar-dashboard-button">
            <a href='login.php'><button>Dashboard</button></a>
        </div>

        <div class="navbar-search-product-button">
            <a href='search.php'><button>Search</button></a>
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
    <?php 
           if(isset($_GET['id'])){
            $id = $_GET['id'];
        // if(isset($_POST['submit'])){
                $queryCheck = "SELECT * FROM products WHERE product_id = '$id'";
                $result = mysqli_query($conn, $queryCheck);
                $row = mysqli_fetch_array($result);
                if(mysqli_num_rows($result)>0){
                    ?>  
                    <form action="updateData.php" method="POST" class="wrapper">
    
                    <div class="wrapper-add-product-label">
                        <img src="icons/add.png" style="width: 22px;height: 22px;">
                        <label>Update Product</label>
                    </div>
            
                    <div>
                        <input type="text" onkeyup="return event.charCode >= 48" name="product_id" min="1" class="wrapper-product-id-input" value="<?php echo $row['product_id']; ?>"/>
                    </div>
                    
                    <div>
                        <input type="text" class="wrapper-product-name-input" name="product_name" value="<?php echo $row['product_name']; ?>"/>
                    </div>
                    
                    <div>
                        <input type="number" onkeyup="return event.charCode >= 48" name="product_quantity" min="1" class="wrapper-product-quantity-input" value="<?php echo $row['product_quantity']; ?>"/>
                    </div>
            
                    <div>
                        <input type="number" onkeyup="return event.charCode >= 48" min="1" name="product_price" class="wrapper-product-price-input" value="<?php echo $row['product_price']; ?>"/>
                    </div>
            
                    <div>
                        <button type="submit" class="wrapper-add-product-button" name="submit" required>Update Product</button>
                    </div>
                    
                </form>
                <?php 
                }}
                ?>
            
    
   

    <div class="footer">
        <label>©</label>
        <a href = https://github.com/rr-uchchash360>Md. Rafiur Rahman</a>
        <a href = https://github.com/zubayertahmid>Zubayer Tahmid</a>
        <a href = https://github.com/sadman89>Sadman Sadiq</a>
    </div>

</body>
  
</html>
