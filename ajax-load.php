<?php
  include_once('config.php');

  $limit_per_page = 3;

  $page = "";
  if(isset($_POST["page_no"])){
    $page = $_POST["page_no"];
  }else{
    $page = 1;
  }

  $offset = ($page - 1) * $limit_per_page;

  $sql = "SELECT * FROM students ORDER BY id DESC LIMIT {$offset},{$limit_per_page} ";  
  $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

  $output = "";
  if(mysqli_num_rows($result) > 0 ){
    $output .= '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
                <tr>
                  <th width="60px">Id</th>
                  <th>Name</th>
                  <th width="90px">Edit</th>
                  <th width="90px">Delete</th>
                </tr>';

                while($row = mysqli_fetch_assoc($result)){
                  $output .= "<tr>
                                <td align='center'>{$row["id"]}</td>
                                <td>{$row["first_name"]} {$row["last_name"]}</td>
                                <td align='center'>
                                  <button class='edit-btn' data-eid='{$row["id"]}'>Edit</button>
                                </td>
                                <td align='center'>
                                  <button Class='delete-btn' data-id='{$row["id"]}'>Delete</button>
                                </td>
                              </tr>";
                            }
      $output .= "</table>";

    $sql_total = "SELECT * FROM students";
    $records = mysqli_query($conn,$sql_total) or die("Query Unsuccessful.");
    $total_record = mysqli_num_rows($records);
    $total_pages = ceil($total_record/$limit_per_page);

    $output .='<div id="pagination">';
    if($page > 1){
      $output .= "<a id='".(($page - 1))."' href=''>Prev</a>";  
    }
    for($i=1; $i <= $total_pages; $i++){
      if($i == $page){
        $class_name = "active";
      }else{
        $class_name = "";
      }
      $output .= "<a class='{$class_name}' id='{$i}' href=''>{$i}</a>";
    } 
    if($total_pages > $page){
      $output .= "<a id='".(($page + 1))."' href=''>Next</a>";  
    }

    $output .='</div>';

    echo $output;
  }else{
    echo "<h2>No Record Found.</h2>";
  }
?>
