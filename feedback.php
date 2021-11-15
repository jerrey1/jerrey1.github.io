<?php
$db=mysqli_connect("localhost","root","","db_foodie");
if(!$db){
    die("Connection failed: ". mysqli_connect_error());
}
if(isset($_POST['submit'])){
    $feedback=$_POST['feedback'];
    $insert=mysqli_query($db,"INSERT INTO feedback(feedback) VALUES('$feedbacks')");
    if(!$insert){
        echo $db->error;
    }
    else{
        echo "Records added successfully";
    }
}
mysqli_close($db);
?>