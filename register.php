<?php
session_start();
$conn=mysqli_connect("localhost","root","","food_db");
if(!$conn){
    die("Not connected".mysqli_connect_error());
} else {
    echo "Connected Successfully";
}
if(isset($_SESSION['privilege'])=="Administator"){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $userName=$_POST['userName'];
    $email=$_POST['email'];
    $password=$_POST['loginPassword'];
    $phone=$_POST['phone'];
    $residence=$_POST['residence'];

$sql_select="SELECT * FROM users WHERE username='$userName'";
$result=mysqli_query($conn,$sql_select);
$num=mysqli_num_rows($result);
if($num>1){
    echo '<script type="text/JavaScript"> 
    alert("Username already taken.");
    window.location = "login.html";
    </script>';
    // header('location:home.php');
    
}
else{
$sql_insert="INSERT INTO users(fname,lname,username,email,password,phone,residence,userType)VALUES('$fname','$lname','$userName',
'$email','$password','$phone','$residence','Admin')";
if($conn->query($sql_insert)===TRUE){
    $_SESSION['userName']=$userName;
    header('location:home.php');
} else {
    echo "Error".$conn->error;
}
}

} else {

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $userName=$_POST['userName'];
    $email=$_POST['email'];
    $password=$_POST['loginPassword'];
    $phone=$_POST['phone'];
    $residence=$_POST['residence'];

$sql_select="SELECT * FROM users WHERE username='$userName'";
$result=mysqli_query($conn,$sql_select);
$num=mysqli_num_rows($result);
if($num>1){
    echo '<script type="text/JavaScript"> 
    alert("Username already taken.");
    window.location = "login.html";
    </script>';
    // header('location:home.php');
    
}
else{
$sql_insert="INSERT INTO users(fname,lname,username,email,password,phone,residence)VALUES('$fname','$lname','$userName',
'$email','$password','$phone','$residence')";
if($conn->query($sql_insert)===TRUE){
    $_SESSION['userName']=$userName;
    header('location:home.php');
} else {
    echo "Error".$conn->error;
}
}
}
?>