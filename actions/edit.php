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
$task_id = $_POST['task_id'] ;
$task_name = $_POST['task_name'] ;
$desc = $_POST['desc'] ;
$status = $_POST['status'] ;
$deadline = $_POST['deadline'] ;

$query = "UPDATE tasks 
SET task_name = '$task_name', `desc` = '$desc',
status = '$status', deadline = '$deadline' 
WHERE task_id = $task_id" ;
$conn->query($query);
header('Location:../allTasks.php');

?>