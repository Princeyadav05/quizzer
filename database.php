<?php
//Create Connection Credentials
$db_host = 'localhost';
$db_name = 'quizzer';
$db_user = 'root';
$db_pass = '';

//Create Mysqli Object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Error Handler
if (!$mysqli)
  {
  die("Connection error: " . mysqli_connect_error());
  }
?>