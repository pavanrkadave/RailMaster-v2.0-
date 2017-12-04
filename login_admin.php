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
  </head>

  <style type="text/css">
    body {
    background-image: url(img/gdnt.png);
    -webkit-background-size: cover;
         -moz-background-size: cover;
         -o-background-size: cover;
         background-size: cover;
  }
  </style> 

  <body>

    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

       <header class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand text-danger" >RailMaster (Beta 2.0)</h3>
              
              <nav class="nav nav-masthead">
                <a class="nav-link text-danger" href="index.php">Home</a>
              </nav>
            </div>
        </header>
      
      <div class="container">

       <form class="form-signin" action="login_admin.php" method="post" autocomplete="off">
        <h1 class="form-signin-heading">Admin Login</h1>
        <h4 class="form-signin-heading">Please sign in</h4>
        <br/>
        <label for="user" class="sr-only">Email address</label>
        <input type="text" id="user" name="user" class="form-control" placeholder="User ID" required autofocus>
        <br/>

        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name = "password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      </div>


      <footer class="mastfoot">
            <div class="inner">
              <p>Designed and Developed By <a href="https://facebook.com/pavanrkadave" target="_blank">Pavan Hegde</a> and <a href="https://www.facebook.com/mehul.mullur" target="_blank">Mehul Mullur</a> , using <a href="https://getbootstrap.com/" target="_blank">BootStrap</a>.</p>
            </div>
          </footer>

       </div>
     </div>
    </div> <!-- /container -->
  </body>
</html>

<?php  
 $mysqli = new mysqli('localhost', 'root', '', 'collegedb');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $mysqli->real_escape_string($_POST['user']);
            $password = $mysqli->real_escape_string($_POST['password']);

            if ($user == 'admin' && $password == 'admin' ) {

               echo '<script type="text/javascript">alert("Successfully Logged In As ' . $user . '"); location.href="home_admin.php"</script>';
          }
          else {
               echo '<script type="text/javascript">alert("Login Failed! ");</script>';
            }
        }  
 ?>
