<?php

 $connect = mysqli_connect("localhost", "root", "", "collegedb");  
 $query = "CALL select_trains(@p0)";  
 $result = mysqli_query($connect, $query);
   
 ?>

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>RailMaster | Trains</title>  
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
                <h3 align="center" class="header text-danger">Availabe Trains.</h3>  
                <br />  
                <div  class="table-responsive">  
                     
                     <div align="center">  
                          <a href = "home_admin.php" class="btn btn-warning red">Go To Home</a> 
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button> 
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
                                    <td><?php echo $row["trainno"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["type"]; ?></td>
                                    <td><?php echo $row["fromst"]; ?></td>
                                    <td><?php echo $row["tost"]; ?></td>  
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
                     <h4 class="modal-title text-danger" align="left">Train Details</h4>
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
                     <h4 class="modal-title text-danger" align="left">Update Trains</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label class="text-danger">Train Number</label>  
                          <input type="text" name="trainno" id="trainno" class="form-control" />  
                          <br />  
                          <label class="text-danger">Name</label>  
                          <input type="text" name="name" id="name" class="form-control"/>  
                          <br />  
                          <label class="text-danger">Type</label>  
                          <select name="type" id="type" class="form-control">  
                               <option class="text-danger" value="Express">Express</option>  
                               <option class="text-danger" value="Shatabdhi">Shatabdhi</option>
                               <option class="text-danger" value="Local">Local</option>
                               <option class="text-danger" value="Intercity">Intercity</option>
                               <option class="text-danger" value="SuperFast">SuperFast</option>  
                          </select>  
                          <br />  
                          <label class="text-danger">From Station</label>  
                          <input type="text" name="fromst" id="fromst" class="form-control" />  
                          <br />  
                          <label class="text-danger">To Station</label>  
                          <input type="text" name="tost" id="tost" class="form-control" />  
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
                url:"fetch.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('#trainno').val(data.trainno);  
                     $('#name').val(data.name);  
                     $('#type').val(data.type);  
                     $('#fromst').val(data.fromst);  
                     $('#tost').val(data.tost); 
                     $('#insert').val("Update");  
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
           else if($('#days').val() == '')  
           {  
                alert("Days is required");  
           }  
           else if($('#dep').val() == '')  
           {  
                alert("Departure Time is required");  
           }  
           else if($('#arr').val() == '')  
           {  
                alert("Arrival Time is required");  
           }     
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
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
                     url:"select.php",  
                     method:"POST",  
                     data:{id:id},  
                     success:function(data){  
                          $('#train_detail').html(data);  
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
                     url:"delete.php",  
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