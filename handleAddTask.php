<?php
session_start();
include 'db_connection.php' ;
if(isset($_SESSION['city'])){
    header('Location:myTasks.php');  
}
if(!isset($_SESSION['password'])){
  header('Location:index.php');
}



$emp_id = $_POST['emp_id'];
$task_name = $_POST['task_name'];
$desc = $_POST['desc'];
$status = $_POST['status'];
$deadline = $_POST['deadline'];


$query = "insert into  tasks 
(`task_id`, `emp_id`, `task_name`, `desc`,
 `status`, `deadline`) VALUES (NULL, '$emp_id', '$task_name', '$desc', '$status', '$deadline')" ;


if($conn->query($query)){
  header('Location:allTasks.php') ;
}
?>
