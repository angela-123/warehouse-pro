<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title>LUMINEX STAFF</title>
                         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <script>
            
            $(document).ready(function(){
                
                $("#btk").click(function(){
                    
                 
                    
                    var staff = $("#staff").val();
                    var desig = $("#desig").val();
                    var add = $("#add").val();
                    var phone = $("#phone").val();
                    var basic = $("#basic").val();
                    var date = $("#dte").val();
                    var loc = $("#loc").val();
                    var psp = $("#psp").val();
                    
                    $.ajax({
                        type:"post",
                        url:"staffdetails.php",
                        data:"staff="+staff+"&desig="+desig+"&add="+add+"&phone="+phone+"&basic="+basic+"&date="+date+"&loc="+loc+"&psp="+psp,
                        
                        success:function(data)
                        {
                            $("#tolo").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#tolo").html('No Network');
                        }
                        
                        
                    });
                    
                }); 
                
            });
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Staff Name</label>
                        <input type="text" id="staff" class="form-control">
                        <label>Passport</label>
                        <input type="file" id="psp" class="form-control">
                        
                        
                        <label>Designation</label>
                        <input type="text" id="desig" class="form-control">
                        
                        <label>Address</label>
                        <input type="text" id="add" class="form-control">
                        
                        <label>Phone#</label>
                        <input type="text" id="phone" class="form-control">
                        <label>Basic Salary</label>
                        <input type="text" id="basic" class="form-control">
                        <label>Operation Location</label>
                        <input type="text" id="loc" class="form-control">
                        
                        <label>Date Of Employment</label>
                        <input type="text" id="dte" class="form-control">
                        
                        <input type="button" id="btk" class="btn btn-success btn-lg" value="Save">
                        
                    </div>
                    
                </div>
                <div id="tolo" class="col-md-5"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
