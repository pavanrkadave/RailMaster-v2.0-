<?php  
 $connect = mysqli_connect("localhost", "root", "", "collegedb");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $trainno = mysqli_real_escape_string($connect, $_POST["trainno"]);
      $fromst = mysqli_real_escape_string($connect, $_POST["fromst"]);
      $tost = mysqli_real_escape_string($connect, $_POST["tost"]);
      $deptime = mysqli_real_escape_string($connect, $_POST["deptime"]);
      $arrival = mysqli_real_escape_string($connect, $_POST["arrival"]);
      $coach = mysqli_real_escape_string($connect, $_POST["coach"]);
      $seat = mysqli_real_escape_string($connect, $_POST["seatno"]);    
      if($_POST["id"] != '')  
      {  
           $query = "  
           UPDATE ticket   
           SET name='$name',   
           trainno='$trainno',
           fromst='$fromst',
           tost='$tost',
           deptime='$deptime',
           arrival='$arrival',
           coach='$coach',
           seatno='$seat'   
           WHERE id='".$_POST["id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO ticket(name, trainno,fromst,tost,deptime,arrival,coach,seatno)  
           VALUES('$name','$trainno','$fromst','$tost','$deptime','$arrival','$coach','$seat');  
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
                           <th>Train ID</th>   
                            <th>Train Number</th>  
                            <th>Name</th>  
                            <th>Type</th>
                            <th>From Station</th>
                            <th>To Station</th>
                            <th>Book Ticket</th>   
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["id"] . '</td>
                          <td>' . $row["trainno"] . '</td>
                          <td>' . $row["name"] . '</td>
                          <td>' . $row["type"] . '</td>
                          <td>' . $row["fromst"] . '</td>
                          <td>' . $row["tost"] . '</td>  
                          <td><input type="button" name="edit" value="Book Ticket" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>   
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      } else {
        $message = mysqli_error($connect);
        echo $message;
      }  
      echo $output;  
 }  
 ?>