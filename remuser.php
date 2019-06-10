<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title>REMOVE USERS</title>
                                                
                       <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                
‪
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
               
‪<!-- Optional Bootstrap theme -->
‪
            
    </head>
    <body>
        
                                                <?php
                
        
         $zon = mysql_connect('localhost','ejhil_staff','kovachenko123');
    mysql_selectdb(ejhil_app);
    $user = $_SESSION['username'];
$wela = "select username,password,status,location from users where username = '$user'";
	$tas = mysql_query($wela);
	$message = "Access Denied, You Have No Business Here";
	$vid = mysql_fetch_assoc($tas);
	
		$perm = $vid['status'];
                $loc = $vid['location'];
	
	
	//if($perm!='pharmacy') 
	if($perm!='admin')
	{   print '<div id = "jimi" class = "col-sm-4 col-md-6 col-lg-10">';
		print '<h1><blink>' .$message.'</blink></h1>';
		print '</div>';
		
		exit();
	}
        
        ?>
        
        
        <script>
            
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    var user = $("#user").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"gambia.php",
                        data:"user="+user,
                        
                        success:function(data)
                        {
                            $("#zira").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#zira").html('Not Connected');
                        }
                        
                    });
                    
                    
                });
                
                
                $("#btc").click(function(){
                    var user = $("#user").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"biko.php",
                        data:"user="+user,
                        
                        success:function(data)
                        {
                            $("#zira").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#zira").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" id="user" class="form-control">
                        <input type="button" id="btn" class="btn btn-primary btn-lg" value="Preview Users">
                        <input type="button" id="btc" class="btn btn-primary btn-lg" value="Remove User">
                    </div>
                    
                </div>
                
                <div id="zira" style=" background: white"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
