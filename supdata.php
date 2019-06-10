<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title></title>
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
                
                
                $.ajax({
                    type:"post",
                    url:"sudata.php",
                    
                    
                    success:function(data)
                    {
                        $("#mookie").html(data);
                    },
                    
                    
                    error:function()
                    {
                        $("#mookie").html('Not Connected');
                    }
                    
                });
                
                
                $("#btn").click(function(){
                    
                    var sname = $("#sname").val();
                    var phone =$("#phn").val();
                    var bank =$("#bank").val();
                    var acct = $("#acct").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"sdata.php",
                        data:"sname="+sname+"&phone="+phone+"&bank="+bank+"&acct="+acct,
                        
                        
                        success:function(data)
                        {
                            $("#mookie").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#mookie").html('Not Connected Now');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <label>Supplier</label>
                    <input type="text" id="sname" class="form-control">
                    <label>Phone#</label>
                    <input type="text" id="phn" class="form-control">
                    <label>Bank</label>
                    <input type="text" id="bank" class="form-control">
                    <label>Account#</label>
                    <input type="text" id="acct" class="form-control">
                    <input type="button" id="btn" class="btn btn-primary" value="Update">
                </div>
                <div id="mookie" class="col-md-4"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
