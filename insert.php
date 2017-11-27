<?php  
 $connect = mysqli_connect("localhost", "root", "", "collegedb");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $trainno = mysqli_real_escape_string($connect, $_POST["trainno"]);  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $type = mysqli_real_escape_string($connect, $_POST["type"]);  
      $fromst = mysqli_real_escape_string($connect, $_POST["fromst"]);  
      $tost = mysqli_real_escape_string($connect, $_POST["tost"]);  
      if($_POST["id"] != '')  
      {  
           $query = "  
           UPDATE trains   
           SET trainno='$trainno',   
           name='$name',   
           type='$type',   
           fromst = '$fromst',   
           tost = '$tost'   
           WHERE id='".$_POST["id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO trains(trainno, name, type, fromst, tost)  
           VALUES('$trainno', '$name', '$type', '$fromst', '$tost');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM trains ORDER BY id ASC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th>Train Number</th>
                          <th>Train Name</th>
                          <th>Type</th>
                          <th>From Station</th>
                          <th>To Station</th>  
                          <th>Edit</th>  
                          <th>View</th>
                          <th>View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["trainno"] . '</td>
                          <td>' . $row["name"] . '</td>
                          <td>' . $row["type"] . '</td>
                          <td>' . $row["fromst"] . '</td>
                          <td>' . $row["tost"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>
                          <td><input type="button" name="view" value="Delete" id="' . $row["id"] . '" class="btn btn-info btn-xs delete_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>