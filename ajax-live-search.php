<?php

  include_once('config.php');

  $search_value = mysqli_real_escape_string($conn, $_POST["search"]); 

  $sql = "SELECT * FROM students WHERE first_name LIKE '%{$search_value}%' OR last_name LIKE '%{$search_value}%'";
  $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

  
  if(mysqli_num_rows($result) > 0 ){
    $output = "";
    $output .= '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
                <tr>
                  <th width="60px">Id</th>
                  <th>Name</th>
                  <th width="90px">Edit</th>
                  <th width="90px">Delete</th>
                </tr>';

                while($row = mysqli_fetch_assoc($result)){
                  $output .= "<tr><td align='center'>{$row["id"]}</td><td>{$row["first_name"]} {$row["last_name"]}</td><td align='center'><button class='edit-btn' data-eid='{$row["id"]}'>Edit</button></td><td align='center'><button Class='delete-btn' data-id='{$row["id"]}'>Delete</button></td></tr>";
                }
      $output .= "</table>";

      mysqli_close($conn);

      echo $output;
  }else{
      echo "<h2>No Record Found.</h2>";
  }

?>
