<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'users';
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
?>
<?php
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $sql = "DELETE FROM products WHERE product_id =$id";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('location:product.php');
        }
    }
?>