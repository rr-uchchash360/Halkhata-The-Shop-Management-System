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
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="icon" href="icons/dashboard.png" type="image/icon type">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


    
</head>

<body>

  <div class="navbar">

    <div class="navbar-shop-logo">
      <a href="dashboard.php"><img src="icons/shop.png" style="width: 90px; height: 90px;">
    </div>

    <div class="navbar-add-product-button">
      <a href='add.php'><button>Add</button></a>
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


  <section class="home-section">
    
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number"><?php $query="SELECT COUNT(order_id) FROM orders";
                                      $result = $conn->query($query); 
                                      $output = mysqli_fetch_array($result);
                                      echo $output['COUNT(order_id)']; ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Revenue</div>
            <div class="number"><?php $query="SELECT SUM(total_price) FROM orders";
                                      $result = $conn->query($query); 
                                      $output = mysqli_fetch_array($result);
                                      echo $output['SUM(total_price)']; ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <div class="number">৳12,34,56,789</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Return</div>
            <div class="number">36</div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down From Today</span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Sales</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">Date</li>

              <!-- Demo code for list adding... -->


              <!-- <li><a href="#">02 Jan 2021</a></li>
              <li><a href="#">02 Jan 2021</a></li> -->
            </ul>
            <ul class="details">
              <li class="topic">Customer</li>

              <!-- Demo code for list adding... -->

              <!-- <li><a href="#">Rafiur</a></li>
              <li><a href="#">Zubayer</a></li> -->
            </ul>
            <ul class="details">
              <li class="topic">Sales</li>

              <!-- Demo code for list adding... -->

              <!-- <li><a href="#">Delivered</a></li>
              <li><a href="#">Pending</a></li> -->
            </ul>
            <ul class="details">
              <li class="topic">Total</li>

              <!-- Demo code for list adding... -->

              <!-- <li><a href="#">$204.98</a></li>
              <li><a href="#">$24.55</a></li> -->
            </ul>
            </div>
            <div class="button">
              <a href="#">See All</a>
            </div>
        </div>
        <div class="top-sales box">
          <div class="title">Top Selling Product</div>
          <ul class="top-sales-details">

            <!-- Demo code for list adding... -->

            <!-- <li>
            <a href="#">
              <span class="product">Vuitton Sunglasses</span>
            </a>
            <span class="price">$1107</span>
          </li> -->

          </ul>
        </div>
      </div>
    </div>
  </section>
  <div class="footer">
      <label>©</label>
      <a href = https://github.com/rr-uchchash360>Md. Rafiur Rahman</a>
      <a href = https://github.com/zubayertahmid>Zubayer Tahmid</a>
  </div>

</body>
  
</html>
<?php 
  }
  else{
    header('location:login.php');
  }
?>








