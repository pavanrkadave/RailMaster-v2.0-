<?php
//index.php
session_start();
if(isset($_SESSION["username"]))
{
 header("location:home_user.php");
}
?>
<!doctype html>
<html lang="en">

 <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>RailMaster | SignIn</title>

   <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/ GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

  <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script> 
  <style>
  #box
  {
   width:100%;
   max-width:500px;
   border:1px solid #ccc;
   border-radius:5px;
   margin:0 auto;
   padding:0 20px;
   box-sizing:border-box;
   height:270px;
  }
  body {
    background-image: url(img/gdnt.png);
    -webkit-background-size: cover;
         -moz-background-size: cover;
         -o-background-size: cover;
         background-size: cover;
  }
  
  </style>
 </head>

 <body>
 <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <header class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand text-danger">RailMaster (Beta 2.0)</h3>
              
              <nav class="nav nav-masthead">
                <a class="nav-link text-danger" href="index.php">Home</a>
              </nav>
            </div>
          </header>
   

   <div id="box">
    <br />
    <form method="post">
     <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" id="username" class="form-control" />
     </div>
     <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" id="password" class="form-control" />
     </div>
     <div class="form-group">
      <input type="button" name="login" id="login" class="btn btn-success" value="Login" />
     </div>
    </form>
    <br/>

    <div class="text-danger">
    <div id="error"></div>
    </div>   
    </div>

    <br/><br/>
    <a href="register_user.php">Dont have an Account? Register.</a>

          <footer class="mastfoot">
            <div class="inner">
              <p>Designed and Developed By <a href="https://facebook.com/pavanrkadave" target="_blank">Pavan Hegde</a> and <a href="https://www.facebook.com/mehul.mullur" target="_blank">Mehul Mullur</a> , using <a href="https://getbootstrap.com/" target="_blank">BootStrap</a>.</p>
            </div>
          </footer>

   </div>
  </div>
</div>

 </body>
</html>

<script>
$(document).ready(function(){
 $('#login').click(function(){
  var username = $('#username').val();
  var password = $('#password').val();
  if($.trim(username).length > 0 && $.trim(password).length > 0)
  {
   $.ajax({
    url:"login.php",
    method:"POST",
    data:{username:username, password:password},
    cache:false,
    beforeSend:function(){
     $('#login').val("connecting...");
    },
    success:function(data)
    {
     if(data)
     {
      $("html").load("home_user.php");
      $("title").title("RailMaster|Home User");
     }
     else
     {
      var options = {
       distance: '20',
       direction:'left',
       times:'2'
      }
      $("#box").effect("shake", options, 350);
      $('#login').val("Login");
      $('#error').html("<span class='text-danger'>Invalid username or Password</span>");
     }
    }
   });
  }
  else
  {

  }
 });
});
</script>