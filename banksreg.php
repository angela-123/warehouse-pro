<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CREATE BANKS</title>
                                                      
                        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
               
‪<!-- Optional Bootstrap theme -->
‪
          <script src="js/bootstrap.min.js"></script>  
    </head>
    <body>
        <script>
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    
                    var bank =$("#bname").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"banks.php",
                        data:"bank="+bank,
                        
                        success:function(data)
                        {
                            $("#mb").html(data);
                        },
                        
                        error:function()
                        {
                            $("#mb").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <label>Bank Name</label>
                    <input type="text" id="bname" class="form-control">
                    <input type="button" id="btn" class="btn-default btn-lg" value="Update">
                    
                </div>
                <div id="mb" class="col-md-3"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
