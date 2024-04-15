<?php
session_start();
if(!isset($_SESSION['city'])){
  header('Location:index.php');
}
if(isset($_SESSION['password'])){
  header('Location:allTasks.php');
}
require __DIR__ . '/vendor/autoload.php';



// Change the following with your app details:

// Create your own pusher account @ https://app.pusher.com



$options = array(

   'cluster' => 'mt1',

   'encrypted' => true

 );

 $pusher = new Pusher\Pusher(

   '2af2a7ef41df693bef5c',

   '0d245df9472822835c8e',

   '1053828',

   $options

 );



// Check the receive message

if(isset($_POST['message']) && !empty($_POST['message'])) {

  $data = $_POST['message'];

// Return the received message

if($pusher->trigger('test_channel', 'my_event', $data)) {

echo 'success';

} else {

echo 'error';

}

}