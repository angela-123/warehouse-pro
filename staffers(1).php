<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
                                                                 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    </head>
    <body>
        <script>
            
            $(document).ready(function(){
                
                
                
                $.ajax({
                    type:"post",
                    url:"stfe.php",
                    
                    success:function(data)
                    {
                        $("#pato").html(data);
                    },
                    
                    error:function()
                    {
                        
                        $("#pato").html('Not Connected');
                    }
                    
                });
                
                
                
                
                $("#bts").click(function(){
                    
                    var staff =$("#staff").val();
                    var phn = $("#phn").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"stf.php",
                        data:"staff="+staff+"&phn="+phn,
                        
                        success:function(data)
                        {
                            $("#pato").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#pato").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <label>Staff Name</label>
                    <input type="text" id="staff" class="form-control">
                    <label>Phone#</label>
                    <input type="text" id="phn" class="form-control">
                    <input type="button" id="bts" class="btn btn-primary" value="Update">
                    
                    
                </div>
                <div id="pato" class="col-md-5"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
