<!DOCTYPE html>
<html lang="en">

    <head>

        <!--Meta Data -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>RailMaster | SearchTrains </title>

        <!--Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
         <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">  

    </head>

    <body>

    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

                <h3 class = "header text-danger">Search Train</h3>
                <br/>

                    <div class=>
                        <div class="input-field col s12">
                            <input type="number" name="search_text" id="search_text" class="form-control" placeholder="Search Train" />
                        </div>
                    </div>

                    <div class="container">
                        <br/>
            <div class="container">
                <h3 class="header text-primary">Search Result</h3>
            </div>
            <br/>
            <div id="result"></div>
        </div>

        <a href="home_user.php" class="btn btn-lg btn-primary btn-block">Go to Home</a>

                </div>
            </div>
        </div>

        
    </body>
</html>


<script>
    $(document).ready(function () {

        load_data();

        function load_data(query)
        {
            $.ajax({
                url: "fetchtrain.php",
                method: "POST",
                data: {query: query},
                success: function (data)
                {
                    $('#result').html(data);
                }
            });
        }
        $('#search_text').keyup(function () {
            var search = $(this).val();
            if (search != '')
            {
                load_data(search);
            } else
            {
                load_data();
            }
        });
    });
</script>