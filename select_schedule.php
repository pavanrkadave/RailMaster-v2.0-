 <?php  
 if(isset($_POST["id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "collegedb");  
      $query = "SELECT * FROM schedule WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label class = "text-danger">Train ID</label></td>  
                     <td width="70%" class = "text-danger">'.$row["id"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label class = "text-danger">Train Number</label></td>  
                     <td width="70%" class = "text-danger">'.$row["trainno"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label class = "text-danger">Train Name</label></td>  
                     <td width="70%" class = "text-danger">'.$row["name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%" class = "text-danger"><label>From Station</label></td>  
                     <td width="70%" class = "text-danger">'.$row["fromst"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label class = "text-danger">To Station</label></td>  
                     <td width="70%" class = "text-danger">'.$row["tost"].' </td>  
                </tr>
                <tr>  
                     <td width="30%"><label class = "text-danger">Days</label></td>  
                     <td width="70%" class = "text-danger">'.$row["days"].' </td>  
                </tr>  
                <tr>  
                     <td width="30%"><label class = "text-danger">Departure</label></td>  
                     <td width="70%" class = "text-danger">'.$row["deptime"].' </td>  
                </tr>
                <tr>  
                     <td width="30%"><label class = "text-danger">Arrival</label></td>  
                     <td width="70%" class = "text-danger">'.$row["arrival"].' </td>  
                </tr>
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>