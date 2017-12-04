<html>
 <head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <title>Home| User</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/ GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
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
  </div>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <header class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand text-danger">RailMaster (Beta 2.0)</h3>
              
              <nav class="nav nav-masthead">
                <?php
                session_start();
                echo '<p><a href="logout.php" class="nav-link text-danger">Logout :  </a></p>';
                echo '  ';
                echo '<p class= "masthead-brand text-danger"> '.$_SESSION["username"].'</p>';
                  ?>
              </nav>
            </div>
          </header>

   


          <a href="search_train.php" class="btn btn-lg btn-primary btn-block">Search Train</a>
          <a href="book_ticket.php" class="btn btn-lg btn-primary btn-block">Book Ticket</a>
          <a href="train_status.php" class="btn btn-lg btn-primary btn-block">Check Train Status</a>
          


          <footer class="mastfoot">
            <div class="inner">
              <p>Designed and Developed By <a href="https://facebook.com/pavanrkadave" target="_blank">Pavan Hegde</a> and <a href="https://www.facebook.com/mehul.mullur" target="_blank">Mehul Mullur</a> , using <a href="https://getbootstrap.com/" target="_blank">BootStrap</a>.</p>
            </div>
          </footer>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  </body>

  




 </body>


</html>