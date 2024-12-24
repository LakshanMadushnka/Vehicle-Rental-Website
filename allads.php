<!DOCTYPE html>
<html>
<?php 
session_start(); 
require 'connection.php';
$conn = Connect();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Ads</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                    </button>
                <a class="navbar-brand page-scroll" href="index.php">
                   Dream-Cars.lk </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <?php
                if(isset($_SESSION['login_client'])){
            ?> 
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="allads.php">All-Ads</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_client']; ?></a>
                    </li>
                    <li>
                    <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Control Panel <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="entercar.php">Add Car</a></li>
              <li> <a href="enterdriver.php"> Add Driver</a></li>
              <li> <a href="clientview.php">View</a></li>

            </ul>
            </li>
          </ul>
                    </li>
                    <li>
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>
            
            <?php
                }
                else if (isset($_SESSION['login_customer'])){
            ?>
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="allads.php">All-Ads</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_customer']; ?></a>
                    </li>
                    <ul class="nav navbar-nav">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Garagge <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="prereturncar.php">Return Now</a></li>
              <li> <a href="mybookings.php"> My Bookings</a></li>
            </ul>
            </li>
          </ul>
                    <li>
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>

            <?php
            }
                else {
            ?>

            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>

                    <li>
                        <a href="allads.php">All-Ads</a>
                    </li>

                    <li>
                        <a href="clientlogin.php">Employee</a>
                    </li>
                    <li>
                        <a href="customerlogin.php">Customer</a>
                    </li>
                    <li>
                        <a href="faq/index.php"> FAQ </a>
                    </li>
                </ul>
            </div>
                <?php   }
                ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <style>
    .containerr {
    width: 80%;
    
    background: rgba(255, 255, 255, 0.8);
    margin-left: auto;
    margin-right: auto;
    padding-bottom: 500px;
    margin-top: 100px;
    
  
    
    
    padding: 50px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  }
  h1, h2 {
    text-align: center;
  }

  .conten-bg{
    background-image:url("logo new1.png");
    filter: blur(5px);

  }

  
  .search-form {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  .form-group {
    margin: 10px;
  }
  .form-group3
  {
      display: flex;
     
      margin: 20px;
  }

  .form-group2{
      margin-right: 15px;
  }

  label {
    display: block;
    font-weight: bold;
  }
  select {
    width: 200px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
  }
  button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  button:hover {
    background-color: #7a00c1;
  }
  .submit-button {
    text-align: center;
    margin-top: 100px;
    

  }
      </style>
      <div class="containerr">
    <h1>Welcome to Dream-Car.lk</h1>
    <h2>Find Your Dream Vehicle</h2>

    <form class="search-form" action="search.php" method="GET">

        <div class="form-group">
            <label for="make">Vehicle Brand:</label>
            <select name="make" id="make">
                <?php
                // Establish database connection
                
                
                // Fetch distinct brands from the database
                $query = "SELECT DISTINCT brand FROM cars";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['brand'] . "'>" . $row['brand'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="model">Vehicle Model:</label>
            <select name="model" id="model">
            <?php
                // Fetch distinct cities from the database
                $query = "SELECT DISTINCT car_name FROM cars";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['car_name'] . "'>" . $row['car_name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="city">Any City:</label>
            <select name="city" id="city">
                <?php
                // Fetch distinct cities from the database
                $query = "SELECT DISTINCT city FROM cars";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['city'] . "'>" . $row['city'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="submit-button">
            <button type="submit">Search</button>
        </div>

    </form>
</div>

    
   
    <div id="sec2" style="margin-top: 6px; color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
        <h1 style="text-align:center;">All Rental Vehicles</h1>
<br>
<section class="menu-content">
    <?php   
    $sql1 = "SELECT * FROM cars WHERE car_availability='yes'";
    $result1 = mysqli_query($conn, $sql1);

    if(mysqli_num_rows($result1) > 0) {
        while($row1 = mysqli_fetch_assoc($result1)){
            $car_id = $row1["car_id"];
            $car_name = $row1["car_name"];
            $ac_price = $row1["ac_price"];
            $ac_price_per_day = $row1["ac_price_per_day"];
            $non_ac_price = $row1["non_ac_price"];
            $non_ac_price_per_day = $row1["non_ac_price_per_day"];
            $car_img = $row1["car_img"];
            $car_brand = $row1["brand"];
       
    ?>
    <a href="booking.php?id=<?php echo($car_id) ?>">
        <div class="sub-menu">
           
            <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Card image cap">
            <h5><b><?php echo $car_brand; ?></b></h5>
            <h6>AC Fare: <?php echo "Rs. " . $ac_price . "/km & Rs." . $ac_price_per_day . "/day"; ?></h6>
            <h6>Non-AC Fare: <?php echo "Rs. " . $non_ac_price . "/km & Rs." . $non_ac_price_per_day . "/day"; ?></h6>
            
        </div> 
      
    </a>
    <?php 
        }
    } else {
    ?>
        <h1>No cars available :(</h1>
    <?php
    }
    ?>       
    
    
    
</section>

                    
    </div>
    
    
    

    <script>
        function myMap() {
            myCenter = new google.maps.LatLng(25.614744, 85.128489);
            var mapOptions = {
                center: myCenter,
                zoom: 12,
                scrollwheel: true,
                draggable: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

            var marker = new google.maps.Marker({
                position: myCenter,
            });
            marker.setMap(map);
        }
    </script>
    <script>
        function sendGaEvent(category, action, label) {
            ga('send', {
                hitType: 'event',
                eventCategory: category,
                eventAction: action,
                eventLabel: label
            });
        };
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCuoe93lQkgRaC7FB8fMOr_g1dmMRwKng&callback=myMap" type="text/javascript"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="assets/js/theme.js"></script>
</body>

</html>

<?php
    include("footer.php");
?>