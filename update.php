
<form id='register' class='input-group-register' action="register.php" method="POST">
 <input type='text' onfocus=this.value='' class='input-field'name="fname" placeholder='First Name' required><br><br>
 <input type='text' onfocus=this.value='' class='input-field' name ="lname" placeholder='Last Name ' required><br><br>
 <input type='text' onfocus=this.value='' class='input-field'name="userName" placeholder='User Name' required><br><br>
 <input type='email' onfocus=this.value='' class='input-field' name="email" placeholder='Email Id' required><br><br>
 <input type='password' onfocus=this.value='' class='input-field' name="loginPassword" placeholder='Enter Password' required><br><br>
 <input type='password' onfocus=this.value='' class='input-field'placeholder='Confirm Password'  required><br><br>
     <input type='tel' onfocus=this.value='' class='input-field' name="phone" placeholder='Enter Phone' required><br><br>
 <input type='text' onfocus=this.value='' class='input-field' name="residence" placeholder='Enter Residence' required><br><br>
            <button type='submit'name="update">Update</button><br><br>
   </form>
<?php
   if(isset($_POST["update"])){
    session_start();
$conn = mysqli_connect("localhost","root","","food_db");
if(!$conn){
    die("Not connected".mysqli_connect_error());
} else {
    // echo "Connected Successfully";
} 
// SQL query to select data from database
$userName1=$_SESSION['userName'];

$query = "UPDATE users SET users.fname='$fname', users.lname='$lname',users.username='$userName',users.email='$email',
users.password='$password',users.phone='$password',users.residence='$residence' WHERE users.username='$userName1'";
mysqli_query($conn,$query);
$message = 'Data Updated';
}
?>