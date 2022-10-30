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
    <title>Sell Product</title>
    <link rel="stylesheet" href="sell.css">
    <link rel="icon" href="icons/sell.png" type="image/icon type">
</head>

<body>

    <div class="navbar">

        <div class="navbar-shop-logo">
            <a href="add.html"><img src="icons/shop.png" style="width: 90px; height: 90px;">
        </div>

        <div class="navbar-add-product-button">
            <a href="add.html">Add</a>
        </div>

        <div class="navbar-search-product-button">
            <a href="search.html">Search</a>
        </div>

        <div class="navbar-return-product-button">
            <a href="return.html">Return</a>
        </div>

        <div class="navbar-dashboard-button">
            <a href = login.html>Dashboard</a>
        </div>

        <div class="navbar-logout-button">
            <a href = login.html>Log Out</a>
        </div>

    </div>
    <?php 
        if(isset($_POST['customer_contact'])){
            $customer_name = $_POST['customer_name'];
            $customer_contact = $_POST['customer_contact'];
            $sql = "INSERT INTO customers (customer_name, customer_contact) 
                    VALUES ('$customer_name', '$customer_contact')";
            if($conn->query($sql) == "TRUE"){
                echo '<script>alert("New customer added Successfully!")</script>';
            }
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="wrapper">

        <div class="wrapper-sell-product-label">
            <img src="icons/sell.png" style="width: 22px;height: 22px;">
            <label>Sell Product</label>
        </div>

        
        <div>
            <input type="text" class="wrapper-customer-name-input" name="customer_name" placeholder="Enter Customer Name">
        </div>

        
        <div>
            <input type="text" class="wrapper-contact-number-intput" name="customer_contact" placeholder="Enter Customer Contact Number">
        </div>

        
        
        <div>
            <input type="number" onkeyup="return event.charCode >= 48" min="1" class="wrapper-product-id-intput" placeholder="Enter Product ID">
        </div>
        
        <div>
            <input type="number" onkeyup="return event.charCode >= 48" min="1" class="wrapper-quantity-intput" placeholder="Enter Product Quantity">
        </div>

        
        <div>
            <input type="text" class="wrapper-promo-code-intput" placeholder="Enter Promo Code">
        </div>
        
        <div class="wrapper-bill-label">
            <label>Total Bill</label>
        </div>
        
        <div>
            <output type="text" class="wrapper-bill-output">
        </div>

        <div>
            <button type="submit" class="wrapper-add-to-cart-button" required>Add to Cart</button>
        </div>

        <div>
            <button type="submit" class="wrapper-sell-button" required>Sell Product</button>
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