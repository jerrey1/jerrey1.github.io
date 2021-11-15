<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="icon" href="images/cake_icon.png"/>
    <link rel="stylesheet" href="css/payup.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Confirm Your Payment</h1>
        <div class="first-row">
            <div class="owner">
                <h3>Owner</h3>
                <div class="input-field">
                    <input type="text">
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="password">
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field">
                    <input type="text">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Card Number</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                      </select>
                      <select name="years" id="years">
                        <option value="2026">2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                      </select>
                </div>
                <div class="cards">
                    <img src="images/mc.png" alt="">
                    <img src="images/vi.png" alt="">
                    <img src="images/pp.png" alt="">
                </div>
            </div>    
        </div>
        <form action="" method="post">
            <input type="hidden" name="productID" value="">
			<button type="submit" name="payup">Confirm</button>
			</form> 
        
    </div>
   
    </div>
</body>
</html>

<?php
if(isset($_POST['payup'])){
    session_start();
    $conn = mysqli_connect("localhost","root","","food_db");
if(!$conn){
    die("Not connected".mysqli_connect_error());
} else {
    // echo "Connected Successfully";
}
    $userName=$_SESSION['userName'];
    $sql = "UPDATE orders
    SET status = 'Delivered'
    WHERE username='$userName'";
            if($conn->query($sql)){
                echo '<script type="text/JavaScript"> 
                alert("Product delivered.");
                window.location = "menu.php";
                </script>';
            }
            else{
                echo '<script type="text/JavaScript"> 
                alert("Error purchasing product.");
                window.location = "menu.php";
                </script>';
            }
}
    ?>