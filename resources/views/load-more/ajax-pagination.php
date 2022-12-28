<?php

$conn = mysqli_connect("localhost", "root", "", "load-more") or die("Connection failed");



// $count =  mysqli_query($conn,"SELECT COUNT( *) as 'Number of Rows' FROM posts");
// print_r($count);
// exit;
$sql = "SELECT * FROM posts ";

$query = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$count = $query->num_rows;
$offset = isset($_POST['offset']) ? $_POST['offset'] : 0;
$limit = isset($_POST['limit']) ? $_POST['limit'] : 5;
// echo $offset;
// exit;

$sql = "SELECT * FROM posts LIMIT $limit OFFSET $offset";
$query = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
// $count = $query->num_rows;
//echo $count;
// exit; 


if (mysqli_num_rows($query) > 0) {
  $output = "";
  $output .= "<tbody>";
  while ($row = mysqli_fetch_assoc($query)) {
    $output .= "<tr>
                  <td align='center'>{$row["id"]}</td>
                  <td>{$row["title"]} </td>
                  </tr></body>";
  }
} else {
  $output .= "<tbody>
             <td>No Data Found...<td>  
            </tbody>";
}

$response = array(
  'html' => $output,
  'count' => $count
);

echo json_encode($response);
exit;
