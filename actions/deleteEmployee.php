<?php

session_start();
include '../db_connection.php';
if(isset($_SESSION['city'])){
  header('Location:myTasks.php');  
}
if(!isset($_SESSION['password'])){
header('Location:index.php');
}
include '../db_connection.php' ;
$id = $_GET['id'] ;
$query = "delete from employees where id = $id" ;
$conn->query($query);
header('Location:../viewEmployees.php');

?>