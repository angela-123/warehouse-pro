<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>TELLER REPORTING</title>
        
        <style>
            #zade{
                
                display: none;
            }
        </style>
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
                
                $("#seaman").click(function(){
                    
                    $("#x").hide(1000);
                    $("#mnt").hide(1000);
                    $("#btp").hide(1000);
                    $("#seaman").hide(2000);
                    //$("#y").show(2000);
                    $("#yr").show(2000);
                    $("#zade").show(2000);
                    
                });
                
                
                $("#btp").click(function(){
                    
                    var mnt = $("#mnt").val();
                    var yr = $("#yr").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"tl.php",
                        data:"month="+mnt+"&yr="+yr,
                        
                        success:function(data)
                        {
                            $("#alika").html(data);
                        },
                        
                        error:function()
                        {
                            $("#alika").html('Not Connected,Oga')
                        }
                        
                    });
                    
                });
                
                
                $("#zade").click(function(){
                    
                    var yr = $("#yr").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"yrs.php",
                        data:"yr="+yr,
                        
                        success:function(data)
                        {
                            $("#alika").html(data);
                        },
                        
                        error:function()
                        {
                            $("#alika").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <label id="x">Month</label>
                    <input type="text" id="mnt" class="form-control" placeholder="month">
                    <label id="y">Year</label>
                    <input type="text" id="yr" class="form-control">
                    <input type="button" id="btp" class="btn btn-primary btn-lg" value="Monthly">
                    <input type="button" id="seaman" class="btn btn-default btn-lg" value="Reset Form">
                    <input type="button" id="zade" class="btn btn-primary btn-lg" value="Yearly">
                    
                    
                </div>
                <div id="alika" class="col-md-5"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
