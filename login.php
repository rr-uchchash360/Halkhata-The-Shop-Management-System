<?php
    session_start();
    include('config.php');
    
        $shopID = $_POST['shopID'];
        $password = $_POST['password'];
        $query = mysqli_query("SELECT * FROM users WHERE shopID = '$shopID' AND password = '$password' ");
        $row = mysqli_fetch_array($query);
        if($row['shopID'] == $shopID && $row['password'] == $password){
            echo "Log In Successful....";
        }
        else{
            echo "Log In Denied...";
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="icons/shop.png" type="image/icon type">
</head>
<body>

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
            <form action='' method="get">
                <div class="welcome-label">
                    <label>Welcome to Halkhata!</label>
                </div>
                <div class="login-label">
                    <label>Please Login!</label>
                </div>
                                   
                <div>
                    <input type="number" onkeyup="return event.charCode >= 48" min="1" class="shop-id-input" placeholder="Enter the Shop ID">
                </div>

                <div>
                    <input type="password" placeholder="Enter Your Password"  class="password-input">
                </div>

                <div>
                    <button type="submit" class="login-button" required>Login</button>
                </div>
            </form>
        </div>

    </div> 
</body>
</html>
