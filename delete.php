<?php  
 $connect = mysqli_connect("localhost", "root", "", "collegedb");  
 $sql = "DELETE FROM trains WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>