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
    <title>Search</title>
    <link rel="stylesheet" href="search.css">
    <link rel="icon" href="icons/search.png" type="image/icon type">
</head>
  
<body>

    <div class="navbar">

        <div class="navbar-shop-logo">
            <a href="add.html"><img src="icons/shop.png" style="width: 90px; height: 90px;">
        </div>

        <div class="navbar-add-product-button">
            <a href="add.html">Add</a>
        </div>
        <div class="navbar-sell-product-button">
            <a href="sell.html">Sell</a>
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

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="wrapper">

        <div class="wrapper-search-product-label">
            <img src="icons/search.png" style="width: 22px;height: 22px;">
            <label>Search Product</label>
        </div>
        

        <div>
            <input type="text" class="wrapper-product-name-input" name="searched_product_id" placeholder="Enter Product ID">
        </div>

        <div>
            <button type="submit" class="wrapper-search-button" required>Search</button>
        </div>
       <?php 
        if(isset($_GET['searched_product_id'])){
        $searchedID = isset($_GET['searched_product_id']);
        $sql = "SELECT * FROM products WHERE product_id LIKE '$searchedID'";
        $query = $conn->query($sql);
        if(mysql_num_rows($query) > 0){
            $data = mysql_fetch_array($query);
            $product_id = $data['product_id'];
            $product_name = $data['product_name'];
            echo $product_id.' '.$product_name;
        }
        }
       ?>

    </form>

    <div class="footer">
        <label>©</label>
        <a href = https://github.com/rr-uchchash360>Md. Rafiur Rahman</a>
        <a href = https://github.com/zubayertahmid>Zubayer Tahmid</a>
        <a href = https://github.com/sadman89>Sadman Sadiq</a>
    </div>

</body>
  
</html>
