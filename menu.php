<?php
session_start();
$conn = mysqli_connect("localhost","root","","food_db");
if(!$conn){
    die("Not connected".mysqli_connect_error());
} else {
    // echo "Connected Successfully";
}
$userName=$_SESSION['userName'];
$user="SELECT * FROM users WHERE username='$userName'";
$result = $conn->query($user);
    while($rows=$result->fetch_assoc())
    {
        $clientID=$rows['clientID'];
        $residence=$rows['residence']; 
    }

 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="icon" href="images/cake_icon.png"/>
    <link rel="icon" href=""/>
    <title>Menu</title>
</head>
<body>
    <div class="wrapper">
        <div class="title">
            <h4>Our Menu</h4>
        </div>
        <div class="menu">
            <!-- <div class="single-menu">
                <img src="images/c1.jpg" alt="">
                <div class="menu-content">
                    <h4>Dark Chocolate Cake <span>Kshs. 4500</span></h4>
                    <p>Moist, rich, chocolaty perfection, something that every chocolate fan should taste.</p>
                </div>
            </div>
            <div class="single-menu">
                <img src="images/c2.jpg" alt="">
                <div class="menu-content">
                    <h4>Strawberry Cake <span>Kshs. 5950</span></h4>
                    <p>You won't be able to pass up a slice of this scrumptious strawberry cake with champagne buttercream! Just look how pretty it is!</p>
                </div>
            </div>
            <div class="single-menu">
                <img src="images/c3.jpg" alt="">
                <div class="menu-content">
                    <h4>Strawberry Cream <span>Kshs. 3990</span></h4>
                    <p>Master the art of nostalgic cakes guaranteed to light up your eyes and tempt your tastebuds.</p>
                </div>
            </div>
            <div class="single-menu">
                <img src="images/slide-2.jpg" alt="">
                <div class="menu-content">
                    <h4>Kawaii Cake <span>Kshs. 6550</span></h4>
                    <p> This magical unicorn cake tastes as good as it looks.</p>
                </div>
            </div>
            <div class="single-menu">
                <img src="images/slide-3.jpg" alt="">
                <div class="menu-content">
                    <h4>Vegan Vanilla <span>Kshs. 4950</span></h4>
                    <p> Light, fluffy, sweet vanilla bliss.</p>
                </div>
                White forest cake is an awesome spin on the black forest cake variety. Instead of using dark chocolate for flavor and color
            </div> -->

            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            while($rows=$result->fetch_assoc())
            {
            $pImage="images/".$rows['productImage'];
            ?>

            <div class="single-menu">
                <img src=<?php echo $pImage;?> alt="">
                <div class="menu-content">
                    <h4><?php echo $rows['productName'].'&nbsp;'.'&nbsp;'.'&nbsp;'?> <span> Kshs. <?php echo $rows['productPrice'];?></span></h4>
                    <p><?php echo $rows['Description'];?></p>
                    <br>
            <form action="" method="post">
                <input type="hidden" name="productID" value="<?php echo $rows['productID'];?>">
                <button type="submit" name="order" style= "
                font-size:18px;
                font-style:italic;
                margin-bottom:10px; 
                background: transparent;
                border: 1px solid white;
                padding: 14px;
                padding-left: 50px;
                padding-right: 50px;
                border-radius: 14px;
                color: #ff7720;
                letter-spacing: 2px;
                 ">Order</button>
            </form>
                </div>
                
            </div>

                    <?php
                        }
                      ?>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST['order'])) {
        $productID=$_POST['productID'];
        $date=date("Y/m/d");
        $product="SELECT * FROM products WHERE productID='$productID'";
        $result = $conn->query($product);
    while($rows=$result->fetch_assoc())
    {
        $productImage=$rows['productImage'];  
        $productPrice=$rows['productPrice'];
        $productName=$rows['productName'];      
        $sql_insert="INSERT INTO orders(clientID,username,productID,residence,productName,productPrice,productImage,quantity,date)VALUES
                ('$clientID','$userName','$productID',
                '$residence','$productName','$productPrice','$productImage',
                '1','$date')";
                if($conn->query($sql_insert)===TRUE){
                    echo '<script type="text/JavaScript"> 
                    alert("Product added to shopping cart.");
                    window.location = "menu.php";
                    </script>';
                } else {
                    echo '<script type="text/JavaScript"> 
                    alert("Error.");
                    </script>';
                    echo "Error".$conn->error;

                }
        }        
                
    }
?>