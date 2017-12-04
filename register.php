<?php 
 $conn = mysqli_connect("localhost", "root", "", "collegedb"); 
 if(isset($_POST["userid"])) 
 { 
 $userid = mysqli_real_escape_string($conn, $_POST["userid"]);	
 $name = mysqli_real_escape_string($conn, $_POST["name"]); 
 $email = mysqli_real_escape_string($conn, $_POST["email"]); 
 $address = mysqli_real_escape_string($conn, $_POST["address"]);
 $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
 $password = mysqli_real_escape_string($conn, $_POST["password"]); 

 $query = "INSERT INTO user(userid, name, email,address,phone,password) VALUES ('".$userid."', '".$name."','".$email."','".$address."','".$phone."',md5('".$password."'))"; 
 if(mysqli_query($conn, $query)) 
 { 
 echo '<br/><div class="alert alert-success" role="alert">
  <strong>Successfully Registered!</strong> Login To Get Started.
</div>'; 
 } 
 else
 {
 echo '<p>Data Insertion Failed..</p>';
 }
 } 
 ?> 