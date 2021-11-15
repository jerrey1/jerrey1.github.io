<!-- <?php
session_start();
$conn = mysqli_connect("localhost","root","","food_db");
if(!$conn){
    die("Not connected".mysqli_connect_error());
} else {
    // echo "Connected Successfully";
} 
$userName=$_SESSION['userName'];
// SQL query to select data from database
$sql = "SELECT * FROM users WHERE username='$userName'";
$result = $conn->query($sql);
$conn->close(); 
while($rows=$result->fetch_assoc())
  {
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="script/account.js" defer></script>
  <link href="css/account.css" type="text/css" rel="stylesheet">
  <link rel="icon" href="images/cake_icon.png"/>
  <title>Customer Details</title>
</head>
<body>
  <ul class="tabs">
    <li data-tab-target="#details" class="active tab">Details</li>
    <li data-tab-target="#orders" class="tab">Orders</li>
  </ul>

  <div class="tab-content">
    <div id="details" data-tab-content class="active">
      <h1>Home</h1>
      <p>This is the home</p>

    <div class="login-wrapper">
      <div id="sign-up"> 
        <form action="register.php" method="POST" class="form">
            <a href="#" class="close1">&times;</a>
            <h2>Customer Details</h2>
                <div class="input-group">
                  <input type="text" name="fname" id="loginUser" required>
                  <label style="color: white;" for="fname">
                  <!-- <?php echo $rows['fname'];?> -->
                </label>
                </div>
                  <div class="input-group">
                    <input type="text" name="lname" id="loginUser" required>
                    <label for="lname">
                    <!-- <?php echo $rows['lname'];?> -->
                    </label>
                  </div>
                  <div class="input-group">
                    <input type="text" name="userName" id="loginUser" required>
                    <label for="userName">
                    <!-- <?php echo $rows['username'];?> -->
                    </label>
                  </div>
                  <div class="input-group">
                    <input type="email" name="email" id="email" required>
                    <label for="email">
                    <!-- <?php echo $rows['email'];?> -->
                    </label>
                  </div>
                  <div class="input-group">
                    <input type="password" name="loginPassword" id="loginPassword" required>
                    <label for="loginPassword">
                    <!-- <?php echo $rows['password'];?> -->
                    </label>
                  </div>
                  <div class="input-group">
                    <input type="tel" name="phone" id="loginUser" required>
                    <label for="phone">
                    <!-- <?php echo $rows['phone'];?> -->
                    </label>
                  </div>
                  <div class="input-group">
                    <input type="text" name="residence" id="loginUser" required>
                    <label for="residence">
                    <!-- <?php echo $rows['residence'];?> -->
                    </label>
                  </div>
          <input type="submit" value="Delete" class="submit-btn">
          <input type="submit" value="Update" class="submit-btn">
          </form>
        </div>
        <?php
                }
?>
      </div>
    </div>
    <div id="orders" data-tab-content>
    <h2>Orders</h2>
                <table class="content-table">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Client ID</th>
                        <th>Username</th>
                        <th>Product Name</th>
                        <th>Product Price (KES)</th>
                        <th>Quantity</th>
                        <th>Residence</th>
                        <th>Date</th>
                        <th>Product Status</th>
                        <th>Delete</th>
                      </tr>
                      <?php  
                      $sql2 = "SELECT * FROM orders, products, users WHERE orders.productID=products.productID AND orders.clientID=users.clientID";
                      $result2 = $conn->query($sql2);
                      while($rows=$result2->fetch_assoc())
                      {
                      ?>
                    </thead>
                    <tbody>
                      <tr>
                      <td><?php echo $rows['orderID'];?></td>
                      <td><?php echo $rows['clientID'];?></td>
                      <td><?php echo $rows['username'];?></td>
                      <td><?php echo $rows['productName'];?></td>
                      <td><?php echo $rows['productPrice'];?></td>
                      <td><?php echo $rows['quantity'];?></td>
                      <td><?php echo $rows['residence'];?></td>
                      <td><?php echo $rows['date'];?></td>
                      <td><?php echo $rows['status'];?></td>
                        <td>
                            <form action="" method="post">
                              <input type="hidden" name="delete_id" value="">
                              <button type="submit" name="delete_btn" class="btn-delete"> DELETE</button>
                            </form>
                        </td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
    </div>
   
  </div>
</body>
</html>
 