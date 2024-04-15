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
$task_id = $_GET['task_id'] ;
$query = "delete from tasks where task_id = $task_id" ;
$conn->query($query);
header('Location:../allTasks.php');

?>