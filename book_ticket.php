<?php

 $connect = mysqli_connect("localhost", "root", "", "collegedb");  
 $query = "CALL select_trains(@p0)";  
 $result = mysqli_query($connect, $query);
 session_start();
   
 ?>

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>RailMaster | Tickets</title>  
          <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/ GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
         
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
           <div class="container" style="width:900px";>  
            <br/>
                <h3 align="center" class="header text-danger">Select A Train To Book Ticket.</h3>  
                <br />  
                <div  class="table-responsive">  
                     
                     <div align="center">  
                          <a href = "home_user.php" class="btn btn-warning red">Go To Home</a> 
                     </div>

                     <br />  
                     <div  id="train_table" >  
                          <table  class="table table-bordered">  
                               <thead>
                                    <th>Train ID</th>   
                                    <th>Train Number</th>  
                                    <th>Name</th>  
                                    <th>Type</th>
                                    <th>From Station</th>
                                    <th>To Station</th>
                                    <th>Book Ticket</th>  
                               </thead>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tbody>  
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["trainno"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["type"]; ?></td>
                                    <td><?php echo $row["fromst"]; ?></td>
                                    <td><?php echo $row["tost"]; ?></td>  
                                    <td><input type="button" name="edit" value="Book Ticket" id="<?php echo $row["id"]; ?>" class="btn btn-info edit_data" /></td>  
                               </tbody>  
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
                </div>  
           </div>  
      </body>  
 </html>  

 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title text-danger" align="left">Ticket Details</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body" id="train_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default text-danger" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title text-danger" align="left">Book Ticket</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">
                          <label class="text-danger">User Name</label>  
                          <input type="text" name="name" id="name" value=<?php echo $_SESSION["username"]; ?> class="form-control" />
                          <br />
                          <label class="text-danger">Train Number</label>  
                          <input type="text" name="trainno" id="trainno" class="form-control" />  
                          <br />      
                          <label class="text-danger">From Station</label>  
                          <input type="text" name="fromst" id="fromst" class="form-control" />  
                          <br />  
                          <label class="text-danger">To Station</label>  
                          <input type="text" name="tost" id="tost" class="form-control" />  
                          <br/>
                          <label class="text-danger">Departure Time</label>  
                          <input type="text" name="deptime" id="deptime" class="form-control" />  
                          <br/>
                          <label class="text-danger">Arrival</label>  
                          <input type="text" name="arrival" id="arrival" class="form-control" />  
                          <br/>
                          <label class="text-danger">Coach</label>  
                          <input type="text" name="coach" id="coach" class="form-control" />  
                          <br/>
                          <label class="text-danger">Seat No</label>  
                          <input type="text" name="seatno" id="seatno" class="form-control" />  
                          <br/>
                          <input type="hidden" name="id" id="id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>
 $(document).ready(function(){

      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });

      $(document).on('click', '.edit_data', function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"book.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('#trainno').val(data.trainno);  
                     $('#fromst').val(data.fromst);
                     $('#tost').val(data.tost);
                     $('#deptime').val(data.deptime);  
                     $('#arrival').val(data.arrival);  
                     $('#coach').val(data.coach);
                     $('#seat').val(data.seat); 
                     $('#insert').val("Book Ticket");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault(); 
           if($('#trainno').val() == "")  
           {  
                alert("Number is required");  
           }  
           else if($('#name').val() == '')  
           {  
                alert("Name is required");  
           }  
           else if($('#fromst').val() == '')  
           {  
                alert("From St is required");  
           }  
           else if($('#tost').val() == '')  
           {  
                alert("To Station is required");  
           }
           else if($('#deptime').val() == '')  
           {  
                alert("Departure is required");  
           }    
           else if($('#arr').val() == '')  
           {  
                alert("Arrival Time is required");  
           }
           else if($('#coach').val() == '')  
           {  
                alert("Coach Number Time is required");  
           }
           else if($('#seatno').val() == '')  
           {  
                alert("Seat Number Time is required");  
           }     
           else  
           {  
                $.ajax({  
                     url:"insert_ticket.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#train_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var id = $(this).attr("id");  
           if(id != '')  
           {  
                $.ajax({  
                     url:"select_ticket.php",  
                     method:"POST",  
                     data:{id:id},  
                     success:function(data){  
                          $('#train_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      }); 
 }); 

 </script>