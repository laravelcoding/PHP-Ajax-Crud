<?php

  include_once('config.php');

  $student_id = mysqli_real_escape_string($conn, $_POST["id"]);

  $sql = "DELETE FROM students WHERE id = {$student_id}";

  if(mysqli_query($conn, $sql)){
    echo 1;
  }else{
    echo 0;
  }

?>
