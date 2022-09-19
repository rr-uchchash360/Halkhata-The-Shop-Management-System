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
    <link rel="stylesheet" href="Login.css">
</head>
<body>

    <div class="page">

        <div class="side-frame">

            <div class="logo">
                
            </div>
    
            <div class="system-name">
                <label>Halkhata - Shop Management System</label>
            </div>
    
            <div class="motto">
                <label>Less Hassle, More Profit.</label>
            </div>
    
        </div>

        <div class="wrapper">
            <form action='login.php' method="get">
                <div class="welcome-label">
                    <label>Welcome to Halkhata - The Shop Management System</label>
                </div>
                <div class="login-label">
                    <label>Please Login!</label>
                </div>
                <div class="shop-id-label">
                    <label>Shop ID</label>
                </div>                     
                <div>
                    <input type="text" name ="shopID" placeholder="Enter the Shop ID" class="shop-id-input">
                </div>


                <div class="password-label">
                    <label>Password</label>
                </div>        
                <div>
                    <input type="text" name ="password" placeholder="Enter Your Password"  class="password-input">
                </div>
                <div>
                    <button type="submit" name = "logIn" class="login-button" required>Login</button>
                </div>
            </form>
        </div>

    </div> 
</body>
</html>