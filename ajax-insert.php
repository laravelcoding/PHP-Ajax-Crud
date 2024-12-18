<?php

  include_once('config.php');

  $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
  $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
  
  $sql = "INSERT INTO students(first_name, last_name) VALUES ('{$first_name}','{$last_name}')";

  if(mysqli_query($conn, $sql)){
    echo 1;
  }else{
    echo 0;
  }
  
?>
