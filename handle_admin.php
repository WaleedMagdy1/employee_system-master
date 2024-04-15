<?php
session_start();
if(isset($_SESSION['city'])){
header('Location:myTasks.php');
}
if(isset($_SESSION['password'])){
  header('Location:allTasks.php');
}
//connect to DB
include 'db_connection.php' ;
//validation
include 'validation.php' ;


$email = valid_email($_POST['email']);
$password = valid_email($_POST['password']);
valid($email , $password);


 
$sql = "select * from admins 
where email = '$email' and password = '$password' " ;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $row = $result->fetch_assoc();
    $_SESSION['password'] = $row["password"];
    header('Location:allTasks.php');
} else {
    session_destroy();
    $error[]="data";
    header('Location:empLogin.php?error='.implode(",",$error));
}
$conn->close();

?>