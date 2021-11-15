<?php
session_start();
$conn = mysqli_connect("localhost","root","","food_db");
if(!$conn){
    die("Not connected".mysqli_connect_error());
} else {
    // echo "Connected Successfully";
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="admin.js" defer></script>
    <link rel="icon" href="images/cake_icon.png"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="admin.css">

    <style>
      #my-chart{
    background: #fff;
    padding: 20px;
}
    .btn-edit{
    padding: 10px 20px;
    background: none;
    border: 2px solid #09726b;
    cursor: pointer;
    margin: 10px;
    color:#09726b;
}
    .btn-delete{
    padding: 10px 20px;
    background: none;
    border: 2px solid red;
    cursor: pointer;
    margin: 10px;
    color: red;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script type="text/javascript" src="admin.js"></script>  -->
    <title>Admin</title>
</head>
<body>
    <div class="tabs">
        <div class="tab-header" id="scrollup">
            <h2>CupCake Notion</h2>
            <div class="active">
                Dashboard
            </div>
            <div>
                Profile
            </div>
            <div>
                Customers
            </div>
            <div>
                Orders
            </div>
            <div>
                Products
            </div>
        </div>
        <div class="tab-content" onclick="window.scrollTo(0, 0);">
            <div class="active">
                <h2>Dashboard</h2>
                <div class="col-div-3">
		<div class="box">
      <?php
    $data = "SELECT COUNT(*) FROM users";
    if ($result=mysqli_query($conn, $data)){
      $row= mysqli_fetch_array($result);
      $count = $row[0];
    }
    ?>
			<p><?php echo $count; ?><br/><span>Customers</span></p>
			<i class="fa fa-users box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
    <?php
    $data = "SELECT COUNT(*) FROM products";
    if ($result=mysqli_query($conn, $data)){
      $row= mysqli_fetch_array($result);
      $count = $row[0];
    }
    ?>
			<p><?php echo $count; ?><br/><span>Products</span></p>
			<i class="fa fa-list box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
    <?php
    $data = "SELECT COUNT(*) FROM orders";
    if ($result=mysqli_query($conn, $data)){
      $row= mysqli_fetch_array($result);
      $count = $row[0];
    }
    ?>
			<p><?php echo $count; ?><br/><span>Orders</span></p>
			<i class="fa fa-shopping-bag box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
			<p>78<br/><span>Online</span></p>
			<i class="fa fa-tasks box-icon"></i>
		</div>
  <br><br>

  <div id="my-chart" style="width: 100%; height: 400px;"></div>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart'],
                'mapsApiKey': ''   // her eyou can put you google map key
            });
            google.charts.setOnLoadCallback(drawRegionsMap);

            function drawRegionsMap() {
                var data = google.visualization.arrayToDataTable([
                    ['Year', 'Sales', 'Expenses'],
                     <?php
                     $chartQuery = "SELECT * FROM orders";
                     $chartQueryRecords = mysqli_query($conn, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".$row['date']."',".$row['quantity'].",".$row['productPrice']."],";
                        }
                     ?>
                ]);

                var options = {
                   
                };

                var chart = new google.visualization.LineChart(document.getElementById('my-chart'));
                chart.draw(data, options);
            }
        </script>






	</div>
            </div>
            <div>
                <h2>Profile</h2>
                <p>Profile is cool</p>
                <h1>Admin Information</h1>
        <!-- TABLE CONSTRUCTION-->
        <table class="content-table">
                    <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Residence</th>
            </tr>

            <?php  
                $userName=$_SESSION['userName'];
                $sql = "SELECT * FROM users WHERE username='$userName'";
                $result = $conn->query($sql);
                while($rows=$result->fetch_assoc())
                {
             ?>
              </thead>
                    <tbody>
            <tr>
                <td><?php echo $rows['fname'];?></td>
                <td><?php echo $rows['lname'];?></td>
                <td><?php echo $rows['username'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['phone'];?></td>
                <td><?php echo $rows['residence'];?></td>
            </tr>
            <?php
            $_SESSION['privilege']=$rows['userType'];
                }
             ?>
             </tbody>
        </table>
        <form action="login.html" method="post">
                              <div class="btnclass" >
                                <input type="hidden" name="add_admin" value="">
                                <button  type="submit" name="add_admin" class="btn-edit"> Add Admin</button>
                              </div>
                            </form>
        
            </div>
            <div>
                <h2>Customers</h2>
                <table class="content-table">
                    <thead>
                      <tr>
                        <th> ID </th>
                        <th> First Name </th>
                        <th> Last Name </th>
                        <th> Username </th>
                        <th> Email </th>
                        <th> Password </th>
                        <th> Phone </th>
                        <th> Residence </th>
                        <th> Privilege </th>
                        <th> EDIT </th>
                        <th> DELETE </th>
                      </tr>
                      <?php  
                      $sql = "SELECT * FROM users";
                      $result = $conn->query($sql);
                      while($rows=$result->fetch_assoc())
                      {
                      ?>
                    </thead>
                    <tbody>
                    
                      <tr>
                      <td><?php echo $rows['clientID'];?></td>
                      <td><?php echo $rows['fname'];?></td>
                      <td><?php echo $rows['lname'];?></td>
                      <td><?php echo $rows['username'];?></td>
                      <td><?php echo $rows['email'];?></td>
                      <td><?php echo $rows['password'];?></td>
                      <td><?php echo $rows['phone'];?></td>
                      <td><?php echo $rows['residence'];?></td>
                      <td><?php echo $rows['userType'];?></td>
                        <td>
                            <form action="" method="post">
                              <div class="btnclass" >
                                <input type="hidden" name="edit_id" value="<?php echo $rows['clientID'];?>">
                                <button  type="submit" name="edit_btn" class="btn-edit"> EDIT</button>
                              </div>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                              <input type="hidden" name="delete_id" value="<?php echo $rows['clientID'];?>">
                              <button type="submit" name="delete_btn" class="btn-delete">DELETE</button>
                            </form>
                        </td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>

            </div>
            <div>
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
                      $sql = "SELECT * FROM orders, products, users WHERE orders.productID=products.productID AND orders.clientID=users.clientID";
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
            <div>
                <h2>Products</h2>
                <table class="content-table">
                    <thead>
                      <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Price (KES)</th>
                        <th>Product Description</th>
                        <th>Product Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                      <?php  
                      $sql = "SELECT * FROM products";
                      $result = $conn->query($sql);
                      while($rows=$result->fetch_assoc())
                      {
                        $pImage="images/".$rows['productImage'];
                      ?>
                    </thead>
                    <tbody>
                      
                      <tr>
                      <td><?php echo $rows['productID'];?></td>
                      <td><?php echo $rows['productName'];?></td>
                      <td><?php echo $rows['productPrice'];?></td>
                      <td><?php echo $rows['Description'];?></td>
                      <td valign="middle" align="center"><?php echo "<image src='$pImage' width='100'>"?></td>
                      <td>
                            <form action="" method="post">
                                <input type="hidden" name="edit_id" value="">
                                <button  type="submit" name="edit_btn" class="btn-edit"> EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                              <input type="hidden" name="delete_id" value="<?php echo $rows['productID'];?>">
                              <button type="submit" name="delete_product" class="btn-delete"> DELETE</button>
                            </form>
                        </td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                  <form action="add_product.php" method="post">
                    <input type="hidden" name="add_product" value="">
                     <button  type="submit" name="add_product" class="btn-edit"> Add Product</button>
                  </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST["edit_btn"])){
  echo $_POST['edit_id'];
    // header('location:update.php');
} else if(isset($_POST["delete_btn"])){
    $clientID=$_POST['delete_id'];
    $sql = "DELETE FROM users WHERE clientID = '$clientID'";
    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/JavaScript"> 
        alert("User Deleted Successfully.");
        window.location = "admin.php";
        </script>';
    } else {
      echo '<script type="text/JavaScript"> 
      alert("Error Deleting User.");
      window.location = "admin.php";
      </script>';
    }
    $conn->close();
}  else if(isset($_POST["delete_product"])){
  $productID=$_POST['delete_id'];
  $sql = "DELETE FROM products WHERE productID = '$productID'";
  if ($conn->query($sql) === TRUE) {
      echo '<script type="text/JavaScript"> 
      alert("Product Deleted Successfully.");
      window.location = "admin.php";
      </script>';
  } else {
    echo '<script type="text/JavaScript"> 
    alert("Error Deleting Product.");
    window.location = "admin.php";
    </script>';
  }
  $conn->close();
}
?>