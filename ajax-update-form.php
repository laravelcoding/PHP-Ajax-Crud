<?php
  include_once('config.php');

  $student_id = mysqli_real_escape_string($conn, $_POST["id"]);
  $firstName = mysqli_real_escape_string($conn, $_POST["first_name"]);
  $lastName = mysqli_real_escape_string($conn, $_POST["last_name"]); 

  $sql = "UPDATE students SET first_name = '{$firstName}',last_name = '{$lastName}' WHERE id = {$student_id}";

  if(mysqli_query($conn, $sql)){
    echo 1;
  }else{
    echo 0;
  }

?>
