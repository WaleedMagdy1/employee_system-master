<?php
session_start();
if(!isset($_SESSION['city'])){
    header('Location:index.php');
  }
  if(isset($_SESSION['password'])){
    header('Location:allTasks.php');
  }
include '../db_connection.php';
$id = $_GET['task_id'];
$status = $_GET['status'];
 

if($status == "completed"){
    $query = "update tasks set status = 'in process'
where task_id = $id";
$conn->query($query);

}else{
    $query = "update tasks set status = 'completed'
    where task_id = $id";
    $conn->query($query);
}

header('Location:../myTasks.php') ;
?>