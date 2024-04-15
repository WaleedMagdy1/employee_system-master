<?php

include '../db_connection.php' ;
$task_id = $_GET['task_id'] ;
$emp_id = $_POST['emp_id'] ;
$deadline = $_POST['deadline'] ;

$query = "update tasks set emp_id=$emp_id , deadline = '$deadline' where task_id =".$task_id ;
$conn->query($query);
header('Location:../allTasks.php');

?>