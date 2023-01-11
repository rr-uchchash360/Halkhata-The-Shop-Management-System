<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'users';
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
?>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="design/login.css">
    <link rel="icon" href="icons/shop.png" type="image/icon type">
</head>
<body>
<?php 
        if(isset($_POST['user_id'])){
            $user_id = $_POST['user_id'];
            $user_password = $_POST['user_password'];
            $sql = "SELECT * FROM users WHERE user_id = '$user_id' AND user_password = '$user_password'";
            $query = $conn->query($sql);

            if(mysqli_num_rows($query) > 0){
                $data = mysqli_fetch_array($query);
                $userID = $data['user_id'];
                $_SESSION['$userID'] = $userID;
                header('location:dashboard.php');
            }
            else{
                echo '<script>alert("Wrond ID or Password")</script>';
            }
        }
    ?>
    <div class="page">

        <div class="side-frame">

            <div class="logo">
                <img src="icons/shop.png" style="width: 280px; height: 280px;">                
            </div>
    
            <div class="system-name">
                <label>Halkhata<br>Shop Management System</label>
            </div>
    
            <div class="motto">
                <label>Less Hassle, More Profit!</label>
            </div>
    
        </div>

        <div class="wrapper">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="welcome-label">
                    <label>Welcome to Halkhata!</label>
                </div>
                <div class="login-label">
                    <label>Please Login!</label>
                </div>
                                   
                <div>
                    <input type="text" onkeyup="return event.charCode >= 48" min="1" class="shop-id-input" name="user_id" placeholder="Enter the Shop ID">
                </div>

                <div>
                    <input type="password" placeholder="Enter Your Password" name ="user_password" class="password-input">
                </div>

                <div>
                    <button type="submit" class="login-button" required>Login</button>
                </div>
            </form>
        </div>

    </div> 
</body>
</html>
