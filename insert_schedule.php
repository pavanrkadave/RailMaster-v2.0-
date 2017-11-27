<?php  
 $connect = mysqli_connect("localhost", "root", "", "collegedb");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';    
      $trainno = mysqli_real_escape_string($connect, $_POST["trainno"]);  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $fromst = mysqli_real_escape_string($connect, $_POST["fromst"]);  
      $tost = mysqli_real_escape_string($connect, $_POST["tost"]); 
      $days = mysqli_real_escape_string($connect, $_POST["days"]);
      $deptime = mysqli_real_escape_string($connect, $_POST["deptime"]);
      $arrival = mysqli_real_escape_string($connect, $_POST["arrival"]);   
           $query = "  
           INSERT INTO schedule(trainno, name, fromst, tost, days,deptime,arrival)  
           VALUES('$trainno','$name','$fromst', '$tost', '$days', '$deptime', '$arrival');  
           ";  
           $message = 'Data Inserted';  

      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM trains ORDER BY id ASC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th>ID</th>
                          <th>Train Number</th>
                          <th>Train Name</th>
                          <th>From Station</th>  
                          <th>To Station</th>
                          <th>Edit</th>
                          <th>View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["id"] . '</td>
                          <td>' . $row["trainno"] . '</td>
                          <td>' . $row["name"] . '</td>
                          <td>' . $row["fromst"] . '</td>
                          <td>' . $row["tost"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>