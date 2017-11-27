<?php

//fetch.php
$connect = mysqli_connect("localhost", "root", "", "collegedb");
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
  SELECT * FROM trains 
  WHERE trainno LIKE '%" . $search . "%'
 ";
} else {
    $query = "
  SELECT * FROM trains ORDER BY trainno
 ";
}
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
  <div class="table-responsive">
   <table class="table table-bordered">
    <thead>
     <th>Train No</th>
     <th>Name</th>
     <th>Type</th>
     <th>From</th>
     <th>To</th>
    </thead>
 ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
   <tbody>
    <td>' . $row["trainno"] . '</td>
    <td>' . $row["name"] . '</td>
    <td>' . $row["type"] . '</td>
    <td>' . $row["fromst"] . '</td>
    <td>' . $row["tost"] . '</td>
   </tbody>
  ';
    }
    echo $output;
} else {
    echo 'Data Not Found';
}
?>