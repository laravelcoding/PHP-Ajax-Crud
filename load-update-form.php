<?php

include_once('config.php');

$student_id =mysqli_real_escape_string($conn, $_POST["id"]); 

$sql = "SELECT * FROM students WHERE id = {$student_id}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");


if(mysqli_num_rows($result) > 0 ){
  $output = "";
  while($row = mysqli_fetch_assoc($result)){
    $output .= "<tr>
      <td width='90px'>First Name</td>
      <td><input type='text' id='edit-fname' value='{$row["first_name"]}'>
          <input type='text' id='edit-id' hidden value='{$row["id"]}'>
      </td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><input type='text' id='edit-lname' value='{$row["last_name"]}'></td>
    </tr>
    <tr>
      <td></td>
      <td><input type='submit' id='edit-submit' value='save'></td>
    </tr>";

  }

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
