<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'users';
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
?>
<?php 
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $quantity = $_POST['product_quantity'];
    $query = "UPDATE products 
              SET product_name = '$name', product_price = '$price', product_quantity='$quantity'
              WHERE product_id = '$id';";
    if(mysqli_query($conn, $query)){
        header('location:product.php');
    }

?>