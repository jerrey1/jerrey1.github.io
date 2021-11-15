<?php
session_start();
// if(!isset($_SESSION['userName'])){
//     header('location:login.html');
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cupcake Notion</title>
    <link rel="icon" href="images/cake_icon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/food.css"/>
    
</head>
<body>
    <div class="navbar">
        <a href="#" class="active">Home</a>
        <a href="menu.php">Menu</a>
        <a href="reservations.html">Make Reservations</a>
        <a href="order.php">Order Online</a>
        <a href="#aboutinfo">About</a>
    
        <?php 
        if(isset($_SESSION['type'])){
            if($_SESSION['type']=="Admin"){
                $userName=$_SESSION['userName'];
                $_SESSION['userName']=$userName;
                echo '<a href="admin.php">Admin</a>';
            }else{
                $userName=$_SESSION['userName'];
                $_SESSION['userName']=$userName;
            echo '<a href="accounts.php">Account</a>';
            }
            echo '<a href="logout.php">Log out</a>';
        }
        else {
            echo '<a href="login.html">Log In</a>';
        }
        ?>
        <!-- <a href="account.php">Account</a> -->
        <!-- <a href="logout.php">Log out</a> -->
        <a class="right" href="login.html">Sign Up</a>
    </div>
    <br><br>
    <h1 style="text-align: right; font-size: 20px;">Welcome <?php 
        if(isset($_SESSION['userName'])){
            echo $_SESSION['userName'];
        }
        ?>!</h1>
    <br><br><br>
    <div class="opening">
        <div class="col">
        <h1>For Heaven's Cakes!</h1>
        <p></p>
    </div>
    <div class="col">
        <div class="card card1">
            <h5>Great taste in every bite.</h5>
        </div>
        <div class="card card2">
            <h5>Mouthwatering taste, exceptional service.</h5>
        </div>
        <div class="card card3">
            <h5>A little bliss in every bite.</h5>
        </div>
        <div class="card card4">
            <h5>They are baked, especially for you.</h5>
        </div>
    </div>
    </div>
    <br><br>
    <div class="about">
        <h3>WHAT'S HAPPENING HERE?</h3>
        <p>We use the most simple or unusual ingredients to create an array of pure and natural flavours with stunning colours and tastes to behold.
             We use organic milk, free-range eggs and fresh fruit to produce small batches of cakes in our kitchen at the back of our parlour in Nairobi, Kenya. The majority of our packaging is either recyclable or compostable.
        <a href="#">Click here</a> for a list of all the flavours we have ever made! 
        Visit our <a href="#">NEWS PAGE</a> for weekly updates on events, opening hours, flavours etc.</p>
    </div>

    
    <div class="welcome">
        <h3>ORDER NOW!</h3>
        <p>
            Cakes make everything better.
Order any flavour of cakes from our restaurants and bakers in Nairobi. Home delivery services available. Pay cash on delivery!        </p>
        <form class="form">
            <fieldset>
                <legend>Talk to Us</legend>
                <label for="email" >Email: </label><br><br>
                <input type="text" name="email" ><br><br>
                <label for="message" >Message:</label><br><br>
                <textarea id="message" name="message"></textarea><br><br>
                <input type="submit" value="Send Message" name="send_message">
            </fieldset>
        </form>
    </div>

    <footer id="aboutinfo">
    <p><strong>CONTACT US</strong>
    <br>Madaraka Estate Ole Sangale Road, 
    <br>PO Box 59857, 00200 City Square Nairobi, Kenya
    <br>Phone : (+254) (0)703-034000 (+254) (0)703-034200 (+254) (0)703-034300
    <br>E-mail : cupcakes@gmail.com
    </p>
    <a href="https://www.facebook.com/" class="fa fa-facebook" target="_blank"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="https://www.linkedin.com/in/jeremy-munroe-b5ab711a4/" class="fa fa-linkedin" target="_blank"></a>
    <a href="https://www.instagram.com/_jerrey/?hl=en" class="fa fa-instagram" target="_blank"></a>
    <a href="#" class="fa fa-skype"></a>
    <a href="#" class="fa fa-snapchat-ghost"></a>
    <a href="https://www.facebook.com/" class="fa fa-uber" target="_blank"></a>
    <p>Company © Cupcake Notion. All rights reserved.</p>
<foooter>


</body>
</html>

<!-- <p>CHeck out ou recipes</p>
    <p>Best restaurant in NAirobi</p>
    <p>Quality service assured.</p>
    <p>A little bliss in every bite.</p> -->
