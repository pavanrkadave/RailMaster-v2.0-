<?php  
 $connect = mysqli_connect("localhost", "root", "", "collegedb");  
 $query = "SELECT * FROM trains ORDER BY id ASC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
        <title>RailMaster | Schedules</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/ GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> 
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">Add Schedule</h3>  
                <br />  
                <div class="table-responsive">  
                     <div align="right">  
                          <a href="home_admin.php" class="btn btn-warning">Go to Home</a>  
                     </div>  
                     <br />  
                     <div id="schedule_table">  
                          <table class="table table-bordered">  
                               <tr>  
                                    <th>Train ID</th>
                                    <th>Train Number</th>
                                    <th>Train Name</th>
                                    <th>From Station</th>
                                    <th>To Station</th>  
                                    <th>Edit</th>  
                                    <th>View</th>  
                               </tr>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["trainno"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["fromst"]; ?></td>
                                    <td><?php echo $row["tost"]; ?></td>  
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                    <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
                               </tr>  
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
                     <h4 class="modal-title text-danger">Schedule Details</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>

                <div class="modal-body" id="schedule_detail"></div>                  
                
                <div class="modal-footer">  
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>

           </div>  
      </div>  
 </div>

 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title text-danger"">Add Schedule</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>

                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label class="text-danger">ID</label>  
                          <input type="text" name="id" id="id" class="form-control" />  
                          <br />  
                          <label class="text-danger">Train Number</label>  
                          <input name="trainno" id="trainno" class="form-control"/>  
                          <br />
                          <label class="text-danger">Train name</label>  
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />
                          <label class="text-danger">From Station</label>  
                          <input type="text" name="fromst" id="fromst" class="form-control" />  
                          <br />
                          <label class="text-danger">To Station</label>  
                          <input type="text" name="tost" id="tost" class="form-control" />  
                          <br />  
                          <label class="text-danger">Days</label>  
                          <select name="days" id="days" class="form-control">  
                               <option value="Everyday">Everyday</option>  
                               <option value="Weekdays">Weekdays</option>
                               <option value="Weekends">Weekends</option>
                               <option value="Twice A Week">Twice A Week</option>
                               <option value="Sundays">Sundays</option>  
                          </select>  
                          <br />
                          <label class="text-danger">Departure</label>  
                          <input type="text" name="deptime" id="deptime" class="form-control" />  
                          <br />
                          <label class="text-danger">Arrival</label>  
                          <input type="text" name="arrival" id="arrival" class="form-control" />  
                          <br />    
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
                url:"fetch_schedule.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('#id').val(data.id);  
                     $('#trainno').val(data.trainno);  
                     $('#name').val(data.name);  
                     $('#fromst').val(data.fromst);  
                     $('#tost').val(data.tost);  
                     $('#days').val(data.days);
                     $('#deptime').val(data.deptime);
                     $('#arrival').val(data.arrival);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#id').val() == "")  
           {  
                alert("ID is required");  
           }  
           else if($('#trainno').val() == '')  
           {  
                alert("Train Number is required");  
           }  
           else if($('#name').val() == '')  
           {  
                alert("Name is required");  
           }  
           else if($('#fromst').val() == '')  
           {  
                alert("From Station is required");  
           } 
           else if($('#tost').val() == '')  
           {  
                alert("To Station is required");  
           } 
           else if($('#days').val() == '')  
           {  
                alert("Days is required");  
           } 
           else if($('#deptime').val() == '')  
           {  
                alert("Departure Time is required");  
           }
           else if($('#arrival').val() == '')  
           {  
                alert("Arrival Time is required");  
           }   
           else  
           {  
                $.ajax({  
                     url:"insert_schedule.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#schedule_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var id = $(this).attr("id");  
           if(id != '')  
           {  
                $.ajax({  
                     url:"select_schedule.php",  
                     method:"POST",  
                     data:{id:id},  
                     success:function(data){  
                          $('#schedule_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>