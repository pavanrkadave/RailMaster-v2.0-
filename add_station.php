<?php

 $connect = mysqli_connect("localhost", "root", "", "collegedb");  
 $query = "SELECT * FROM station ORDER BY id ASC";  
 $result = mysqli_query($connect, $query);
   
 ?>

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>RailMaster | Stations</title>  
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
      <body>  
           <div class="container" style="width:900px";>  
            <br/>
                <h3 align="center" class="header text-danger">Availabe Station.</h3>  
                <br />  
                <div  class="table-responsive">  
                     
                     <div align="center">  
                          <a href = "home_admin.php" class="btn btn-warning red">Go To Home</a> 
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button> 
                     </div>

                     <br />  
                     <div  id="station_table" >  
                          <table  class="table table-bordered">  
                               <thead>   
                                    <th>ID</th>
                                    <th>ID</th>  
                                    <th>Station Name</th>  
                                    <th>Edit</th>
                                    <th>View</th>
                                    <th>Delete</th>  
                               </thead>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tbody>  
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["sid"]; ?></td>
                                    <td><?php echo $row["sname"]; ?></td> 
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info edit_data" /></td>  
                                    <td><input type="button" name="view" value="View" id="<?php echo $row["id"]; ?>" class="btn btn-info view_data" /></td>
                                    <td><input type="button" name="delete" value="Delete" id="<?php echo $row["id"]; ?>" class="btn btn-info delete_data" /></td>
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
                     <h4 class="modal-title text-danger" align="left">Station Details</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body" id="station_detail">  
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
                     <h4 class="modal-title text-danger" align="left">Update Trains</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">
                     <label class="text-danger">SID</label>  
                          <input type="text" name="id" id="id" class="form-control" />  
                          <br />   
                          <label class="text-danger">SID</label>  
                          <input type="text" name="sid" id="sid" class="form-control" />  
                          <br />  
                          <label class="text-danger">Station Name</label>  
                          <input type="text" name="sname" id="sname" class="form-control"/>  
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
                url:"fetch_station.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('#id').val(data.id);
                     $('#sid').val(data.sid);  
                     $('#sname').val(data.sname);   
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#sid').val() == "")  
           {  
                alert("SID is required");  
           }  
           else if($('#sname').val() == '')  
           {  
                alert("Station Name is required");  
           }       
           else  
           {  
                $.ajax({  
                     url:"insert_station.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#station_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var id = $(this).attr("id");  
           if(id != '')  
           {  
                $.ajax({  
                     url:"select_station.php",  
                     method:"POST",  
                     data:{id:id},  
                     success:function(data){  
                          $('#station_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      }); 

      $(document).on('click', '.delete_data', function(){  
           var id =$(this).attr("id");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete_station.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);
                          window.location.reload();  
                          fetch_data();  
                     }  
                });  
           }  
      });   
 }); 

 </script>