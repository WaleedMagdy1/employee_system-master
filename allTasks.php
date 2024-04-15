<?php
session_start();
if(!isset($_SESSION['password'])){
  header('Location:index.php');
}
if(isset($_SESSION['city'])){
  header('Location:myTasks.php');
}
?>
<!DOCTYPE html>

<html>
  <head>
	<title>Company Name</title>
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styleindex.css">
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	<link rel="stylesheet" type="text/css" href="css/styletasks.css">


  </head>
<body>

<?php include 'nav.php' ; ?>
	
    <div class="divider"></div>
    

    <h2 class="task_title" >Empolyee Leaderboard</h2>
    <h3 class="task_title"><a class="btn btn-info m-3" href="addTask.php">Add new task</a></h3>
    <table>

			<tr bgcolor="#000">
			
<?php
  include 'db_connection.php' ;
  
  $query = "select tasks.task_id,tasks.emp_id as Emp_Id,employees.name as Emp_Name,tasks.task_name as Task_Name,tasks.desc as Description,tasks.status as Status,tasks.deadline as Deadline
  from employees join tasks
  on tasks.emp_id = employees.id" ;
    $result = $conn->query($query);
    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      foreach($row as $keys=>$values){
        if($keys == "task_id"){continue;}
        ?>
        <th align = "center"><?= $keys; ?></th>
        <?php
      }
      echo "<th align = 'center'>Actions</th></tr>";
      $results = $conn->query($query);
    while($rows = $results->fetch_assoc()){
?>                   
            <tr>
            <?php
            foreach($rows as $key=>$values){
              if($key == "task_id"){continue;}
            ?>
                <td><?= $values; ?></td>
                
            <?php
              }
            ?> 
                <td> <a class="btn btn-success" href="editTask.php?task_id=<?= $rows['task_id']; ?>">Edit</a>
                 <a class="btn btn-danger" href="actions/deleteTask.php?task_id=<?= $rows['task_id']; ?>">Delete</a>
                 <a class="btn btn-primary" href="assignTask.php?task_id=<?= $rows['task_id']; ?>">Assign to</a></td>
                            </tr>
            <?php
            }}
            ?>

	</table>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    
    <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <script src="js/global.js"></script> 

  </body>
</html>


