<!DOCTYPE html>

<html lang="en" dir="ltr">

<?php 
session_start(); 
require 'connection.php';
$conn = Connect();
?>

  <head>
    <meta charset="UTF-8">
    <title> Contact Us </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
     <link rel="shortcut icon" type="image/png" href="assets/img/P.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
   </head>
<body>

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
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');



.containerr {
  width: 100%;
  background: #fff;
  border-radius: 6px;
  padding: 20px 60px 30px 40px;
  margin-top: 80px;
 
}

.containerr .content {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.containerr .content .left-side {
  width: 25%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 15px;
  position: relative;
}

.content .left-side::before {
  content: '';
  position: absolute;
  height: 70%;
  
  right: -15px;
  top: 50%;
  transform: translateY(-50%);
  background: #afafb6;
}

.content .left-side .details {
  margin: 14px;
  text-align: center;
}

.content .left-side .details i {
  font-size: 30px;
  color: #5c5b5c;
  margin-bottom: 10px;
}

.content .left-side .details .topic {
  font-size: 18px;
  font-weight: 500;
}

.content .left-side .details .text-one,
.content .left-side .details .text-two {
  font-size: 14px;
  color: #afafb6;
}

.container .content .right-side {
  width: 75%;
  margin-left: 75px;
}

.content .right-side .topic-text {
  font-size: 23px;
  font-weight: 600;
  color: #504c50;
}

.right-side .input-box {
  height: 50px;
  width: 100%;
  margin: 12px 0;
}

.right-side .input-box input,
.right-side .input-box textarea {
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  font-size: 16px;
  background: #f0f1f8;
  border-radius: 6px;
  padding: 0 15px;
  resize: none;
}

.right-side .message-box {
  min-height: 110px;
}

.right-side .input-box textarea {
  padding-top: 6px;
}

.right-side .button {
  display: inline-block;
  margin-top: 12px;
}

.right-side .button input[type="button"] {
  color: #fff;
  font-size: 18px;
  outline: none;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  background: #504c50;
  cursor: pointer;
  transition: all 0.3s ease;
}

.button input[type="button"]:hover {
  background: #6d6c6d;
}

@media (max-width: 950px) {
  .container {
    width: 90%;
    padding: 30px 40px 40px 35px;
  }

  .container .content .right-side {
    width: 75%;
    margin-left: 55px;
  }
}

@media (max-width: 820px) {
  .container {
    margin: 40px 0;
    height: 100%;
  }

  .container .content {
    flex-direction: column-reverse;
  }

  .container .content .left-side {
    width: 100%;
    flex-direction: row;
    margin-top: 40px;
    justify-content: center;
    flex-wrap: wrap;
  }

  .container .content .left-side::before {
    display: none;
  }

  .container .content .right-side {
    width: 100%;
    margin-left: 0;
  }
}


    </style>

  <div class="containerr">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">No. 12/5 Edirisuriya Road</div>   
          
    
          <div class="text-two">Colomo 3, Sri Lanka</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">(+94) 71 234 4567</div>
          <div class="text-two">(+94) 71 234 9874</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">Lk.dreamscars@gmail.com</div>
          <div class="text-two"> Support@Dream.Cars.lk</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have any work from us or any types of help from our team members, you can send us message from here. It's our pleasure to help you.</p>
        <?php  
            $Msg = "";
            if(isset($_GET['error']))
            {
                $Msg = "Please Fill in the Blanks!";
                echo '<div style="color: red; font-weight: bold;  background-color: #ffff4a;">'.$Msg.'</div>';
            }
            if(isset($_GET['success']))
            {
                $Msg = "Your Message Has Been Sent..";
                echo '<div style="color: #10b946; font-weight: bold; ">'.$Msg.'</div>';
            }
        
            if(isset($_POST['btn-send']))
            {
                $UName = $_POST['UName'];
                $Email = $_POST['Email'];
                $Subject = $_POST['Subject'];
                $msg = $_POST['msg'];

                if(empty($UName) || empty($Email) || empty($Subject) || empty($msg))
                {
                    header("location:contactUs.php?error");
                }
                else
                {
                    $to = "imashanethmi2022@gmail.com"; // Change this to your email address
                    if(mail($to,$Subject,$msg,$Email))
                    {
                        header("location:contactUs.php?success");
                    }
                }
            }
        ?>
        <form method="post" action="#">
            
        <div class="input-box">
          <input type="text" name="UName" placeholder="Enter your name">
        </div>
        <div class="input-box">
          <input type="text" name="Email" placeholder="Enter your email">
        </div>
        <div class="input-box">
          <input type="text" name="Subject" placeholder="Subject">
        </div>
        <div class="input-box message-box">

          
          <textarea rows="10" cols="100" id="message" name="msg" class="form-control" placeholder="Enter your message"></textarea>
          
        </div>
        <div class="button">
          <button style="color: #fff; font-size: 18px; padding: 8px 16px; border-radius: 6px; background: #504c50; cursor: pointer; transition: all 0.3s ease;" name="btn-send">Send Now</button>
        </div>
      </form>
    </div>
    </div>
  </div>



  

  
</body>
</html>
<?php
    include("footer.php");
?>
