<?php
session_start();
if(!isset($_SESSION['city'])){
  header('Location:index.php');
}
if(isset($_SESSION['password'])){
  header('Location:allTasks.php');
}
include 'db_connection.php' ;

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$picture = $_FILES['pic'];
$image_name = $picture['name'];
$image_type = $picture['type'];
$tmp_name = $picture['tmp_name'] ;
$size =$picture['size'] ;
$target_folder = "images/";
$image_name = time().$image_name ;
$path = $target_folder.$image_name ;


move_uploaded_file($tmp_name,$path);
if($tmp_name ==""){
  $query = "update  employees 
  set name = '$name' , email = '$email' ,
  password ='$password' , phone='$phone' ,
  city = '$city' , gender = '$gender' ,
  birthday = '$birthdate'
  where id = $id" ;
  
}else{
$query = "update  employees 
set name = '$name' , email = '$email' ,
password ='$password' , phone='$phone' ,
city = '$city' , gender = '$gender' ,
birthday = '$birthdate', pic = '$path'
where id = $id" ;
}

 
if($conn->query($query)){
  header('Location:myProfile.php') ;
}

?>