<!DOCTYPE html> 
<html> 
 
 <head> 
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>RailMaster | Register</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!--Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/ GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet"> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
 </head>

 <style type="text/css">
   body {
    background-image: url(img/gdnt.png);
    background-size: cover;
    -webkit-background-size: cover;
         -moz-background-size: cover;
         -o-background-size: cover;
   }
 </style>


 <body>

      <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <header class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand text-danger">RailMaster (Beta 2.0)</h3>
              
              <nav class="nav nav-masthead">
                <a class="nav-link text-danger" href="login_user.php">LogIn</a>
              </nav>
            </div>
          </header> 
 

<div class="cover-container">
  <div class="container">
 <form id="insert_data" class="form-signin">

 <label for="userid" class="sr-only">User Id</label> 
 <input type="text" name="userid" id="userid" class="form-control" placeholder="User ID" required autofocus/> 
 <br/> 
 <label for="name" class="sr-only">Name</label> 
 <input type="text" name="name" id="name" class="form-control" placeholder="Name" required /> 
 <br/> 
 <label for="email" class="sr-only">Email</label> 
 <input type="text" name="email" id="email" class="form-control" placeholder="Email" required /> 
 <br/> 
 <label for="address" class="sr-only">Address</label> 
 <input type="text" name="address" id="address" class="form-control" placeholder="Address" required/> 
 <br/> 
 <label for="phone" class="sr-only">Phone</label> 
 <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" required/> 
 <br/> 
 <label for="password" class="sr-only">Password</label> 
 <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/> 
 <br/> 
 <input type="button" name="submit" id="submit" value="Submit" class="btn btn-lg btn-primary btn-block" /> 
 </form>
 </div>
 </div> 



 <div id="return"></div>


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
 $('#submit').click(function(){ 
 var name = $('#userid').val(); 
 var age = $('#name').val(); 
 var email = $('#email').val();
 var address = $('#address').val();
 var phone = $('#phone').val();
 var password = $('#password').val(); 
 if(userid == '' || name == '' || email == '' || address == '' || phone == '' || password == '' ) 
 { 
 $('#return').html('<h4 style="color:red;">Required All Fields..</h4>'); 
 } 
 else 
 { 
 $.ajax({ 
 url:"register.php", 
 method:"POST", 
 data:$('#insert_data').serialize(), 
 success:function(data){ 
 $('form').trigger("reset"); 
 $('#return').fadeIn().html(data); 
 setTimeout(function(){ 
 $('#return').fadeOut("slow"); 
 }, 6000); 
 } 
 }); 
 } 
 }); 
 }); 
 </script> 