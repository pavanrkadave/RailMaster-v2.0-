<?php

//fetch.php
$connect = mysqli_connect("localhost", "root", "", "collegedb");
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
  SELECT * FROM train_status 
  WHERE trainno LIKE '%" . $search . "%'
 ";
} else {
    $query = "
  SELECT * FROM train_status ORDER BY trainno
 ";
}
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
  <div class="table-responsive">
   <table class="table table-bordered">
    <thead>
     <th>ID</th>
     <th>Train Number</th>
     <th>Name</th>
     <th>Availabel Days</th>
     <th>Total Seats</th>
    </thead>
 ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
   <tbody>
    <td>' . $row["id"] . '</td>
    <td>' . $row["trainno"] . '</td>
    <td>' . $row["name"] . '</td>
    <td>' . $row["available_date"] . '</td>
    <td>' . $row["seats"] . '</td>
   </tbody>
  ';
    }
    echo $output;
} else {
    echo 'Data Not Found';
}
?>