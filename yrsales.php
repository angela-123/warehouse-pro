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
            $(document).ready( function(){
                
                $("#btn").click(function(){
                    
                    
                    var yr = $("#yr").val();
                    
                    $.ajax({
                        type:"post",
                        url:"yreps.php",
                        data:"&yr="+yr,
                        
                        success:function(data)
                        {
                            $("#taz").html(data);
                        },
                        
                        error:function()
                        {
                            alert(new Date());
                        }
                        
                        
                    });
                    
                });
                
            });
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <form class="form-group col-sm-4 col-md-4 col-lg-4">
                    
                    <label class="form-control">Year</label><br>
                    <input type="number" id="yr" class="form-control"><br>
                    <input type="button" id="btn" value="Search" class="btn btn-primary btn-lg">
                    
                    
                </form>
                
                    
        <div id="taz" class="col-sm-6 col-md-6 col-lg-8"></div>
            
                
            </div>
            
        
        <?php
        // put your code here
        ?>
        
        </div>
    </body>
</html>
