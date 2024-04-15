<?php
session_start();
include '../db_connection.php';
if(isset($_SESSION['city'])){
  header('Location:myTasks.php');  
}
if(!isset($_SESSION['password'])){
header('Location:index.php');
}


function validation($email , $password,$phone){

  
}
function valid ($input){
  $input=trim($input);
  $input=htmlspecialchars($input);
  return $input ;
}


$error = array();
$flag =true ;
$name = valid($_POST['name']);
$email = valid($_POST['email']);
$password = valid($_POST['password']);
$phone = valid($_POST['phone']);
$city = valid($_POST['city']);
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];

if(!isset($email) || !filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
  $error[] = "email" ;
  $flag = false ;
}
if(!isset($password) || empty($password) || strlen($password)<5){
  $error[] = "password" ;
  $flag = false ;
}
if(strlen($phone) != 11){
  $error[] = "phone";
  $flag=false;
}

$sql = "select * from employees 
where email = '$email'  " ;
$result = $conn->query($sql);
if($result->num_rows >0){
$error[] ="emails";
$flag =false;
}
if($flag == false){
  header('Location:../addEmployee.php?error='.implode(",",$error)) ;
  
  }
  else{
  $query = "insert into  employees 
  (name,email,password,phone,city,gender,birthday)
  values ('$name','$email','$password','$phone','$city','$gender','$birthday')" ;
  if($conn->query($query)){
    header('Location:../viewEmployees.php') ;
  }
  
  }

 

?>
