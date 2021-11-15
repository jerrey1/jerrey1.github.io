<?php
session_start();
$conn=mysqli_connect("localhost","root","","food_db");
if(!$conn){
    die("Not connected".mysqli_connect_error());
} else {
    echo "Connected Successfully";
}
    $type=$_POST['type'];
    $userName=$_POST['userName'];
    $password=$_POST['loginPassword'];
    $sql_select="SELECT * FROM users WHERE username='$userName' && password='$password' 
    && userType='$type'";
$result=mysqli_query($conn,$sql_select);
$num=mysqli_num_rows($result);

if($num==1){
    $_SESSION['userName']=$userName;
    $_SESSION['type']=$type;
    header('location:home.php');
}
else{
echo '<script type="text/JavaScript"> 
alert("Incorrect Username, Password or User Type.");
window.location = "login.html";
</script>';
// header('location:home.php');
}
?>