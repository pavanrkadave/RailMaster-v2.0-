<?php  
 $connect = mysqli_connect("localhost", "root", "", "collegedb");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $sid = mysqli_real_escape_string($connect, $_POST["sid"]);  
      $sname = mysqli_real_escape_string($connect, $_POST["sname"]);    
      if($_POST["id"] != '')  
      {  
           $query = "  
           UPDATE station   
           SET sid='$sid',   
           sname='$sname'   
           WHERE id='".$_POST["id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO station(sid, sname)  
           VALUES('$sid', '$sname');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM station ORDER BY sid ASC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th>ID</th>
                          <th>SID</th>
                          <th>Station Name</th>  
                          <th>Edit</th>  
                          <th>View</th>
                          <th>Delete</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["id"] . '</td>
                          <td>' . $row["sid"] . '</td>
                          <td>' . $row["sname"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>
                          <td><input type="button" name="delete" value="Delete" id="' . $row["id"] . '" class="btn btn-info btn-xs delete_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>