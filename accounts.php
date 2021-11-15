<?php
session_start();
$conn = mysqli_connect("localhost","root","","food_db");
if(!$conn){
    die("Not connected".mysqli_connect_error());
} else {
    // echo "Connected Successfully";
} 
// SQL query to select data from database
$userName=$_SESSION['userName'];
$sql = "SELECT * FROM users WHERE username='$userName'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information</title>
    <link rel="icon" href="images/cake_icon.png"/>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: #00ffef;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: #fff;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>
</head>
  
<body>
    <form method="POST">
        <h1>Customer Information</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Residence</th>
            </tr>

            <?php  
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <td><?php echo $rows['fname'];?></td>
                <td><?php echo $rows['lname'];?></td>
                <td><?php echo $rows['username'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['phone'];?></td>
                <td><?php echo $rows['residence'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
        
        <input type="submit" value="Delete" name="delete" class="submit-btn"><br><br><br>
          <input type="submit" value="Update" name="update" class="submit-btn">
            </form>
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

                      </tr>
                      <?php  
                      $sql = "SELECT * FROM orders, products, users WHERE orders.productID=products.productID AND orders.username='$userName'";
                      $result = $conn->query($sql);
                      while($rows=$result->fetch_assoc())
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
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
            <?php
if(isset($_POST["update"])){
    header('location:update.php');
} else if(isset($_POST["delete"])){
    $sql = "DELETE FROM users WHERE username = '$userName'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: ";
    }
    
    $conn->close();
}
?>
</body>
</html>