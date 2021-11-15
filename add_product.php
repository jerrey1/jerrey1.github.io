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
    <link rel="stylesheet" href="add_product.css">
    <title>Document</title>
</head>
<body>
<div class="login-wrapper">
    <form class="form" method="POST">
    <h2>Upload Product</h2>
    <div class="input-group">
          <input type="text" name="productname" id="productname" required>
          <label for="productname">Product Name</label>
        </div>
    <div class="input-group">
          <input type="number" step="any" name="productprice" id="productprice" required>
          <label for="email">Product Price</label>
        </div>
    <div class="input-group">
          <textarea name="description" id="description" rows="4" cols="50" required></textarea>
          <label for="description">Description</label>
        </div>
    <div class="input-group">
          <input type="number" name="stock" id="stock" required>
          <label for="stock">Stock</label>
        </div>

        <div class="container">
         <div class="wrapper">
            <div class="image">
               <img src="" alt="">
            </div>
            <div class="content">
               <div class="icon">
                  <i class="fas fa-cloud-upload-alt"></i>
               </div>
               <div class="text">
                  No file chosen, yet!
               </div>
            </div>
            <div id="cancel-btn">
               <i class="fas fa-times"></i>
            </div>
            <div class="file-name">
               File name here
            </div>
         </div>
         
         <button onclick="defaultBtnActive()" id="custom-btn">Choose a file</button>
         <input id="default-btn" type="file" hidden name="productimage">
      </div>
      <br><br><br>
      <div class="uploadproduct">
      <button id="custom-btn" name="uploadbtn">Upload Product</button>
         <input id="default-btn" type="submit" hidden>
      </div>
  <script src="add_product.js"></script>
    </form>
</div>
</body>
</html>
<?php
if(isset($_POST["uploadbtn"])){
    $pname=$_POST['productname'];
    $pprice=$_POST['productprice'];
    $pdescription=$_POST['description'];
    $pImage=$_POST['productimage'];


$sql_insert="INSERT INTO products(productName,productPrice,Description,productImage)VALUES('$pname','$pprice','$pdescription','$pImage')";
if($conn->query($sql_insert)===TRUE){
    echo '<script type="text/JavaScript"> 
    alert("Product Added Successfully.");
    window.location = "admin.php";
    </script>';
} else {
    $errormess="Error".$conn->error;
    echo '<script type="text/JavaScript"> 
    alert("Error".$conn->error);
    window.location = "add_product.php";
    </script>';
    echo "Error".$conn->error;
}
}
?>