 <?php  
 if(isset($_POST["id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "collegedb");  
      $query = "SELECT * FROM station WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label class="text-danger">SID</label></td>  
                     <td width="70%" class="text-danger">'.$row["sid"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label class="text-danger">Station Name</label></td>  
                     <td width="70%" class="text-danger">'.$row["sname"].'</td>  
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