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

<html>

<head>

	<title>Shopping Cart</title>
	<link rel="icon" href="images/cake_icon.png"/>

	<link rel="stylesheet" type="text/css" href="css/order.css">

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>



<div class="container">

	<h1>Shopping Cart</h1>

	<div class="cart">

    <?php
			$sum=0;
			$count=0;
            $sql = "SELECT * FROM orders";
            $result = $conn->query($sql);
            while($rows=$result->fetch_assoc())
            {
            $pImage="images/".$rows['productImage'];
            ?>

		<div class="products">

			<div class="product">

				<img src=<?php echo $pImage; ?> >

				<div class="product-info">

					<h3 class="product-name"><?php echo $rows['productName'];?></h3>

					<h4 class="product-price"><?php echo $rows['productPrice'];?></h4>

					<p class="product-quantity">Qnt: <input value=<?php echo $rows['quantity'];?> name="">

					<p class="product-remove">

						<i class="fa fa-trash" aria-hidden="true"></i>

						<span class="remove">Remove</span>

					</p>

				</div>

			</div>

            <?php
				$sum+=$rows['productPrice'];
				$count++;
                        }
                      ?>

			

		<div class="cart-total">

			<p>

				<span>Total Price</span>

				<span>Kshs. <?php echo $sum;?></span>

			</p>

			<p>

				<span>Number of Items</span>

				<span><?php echo $count;?></span>

			</p>
			<a href="payup.php">Proceed to Checkout</a>
			<!-- <form action="" method="post">
            <input type="hidden" name="productID" value="">
			<button name="payup">Proceed to Checkout</button>
			</form> -->

            

		</div>

	</div>

</div>
</div>

</body>
</html>


