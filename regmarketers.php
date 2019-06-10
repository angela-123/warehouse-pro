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
        <title>MARKETERS</title>
                       <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
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
                
                
                 
                    
                    $.ajax({
                        type:"post",
                        url:"show.php",
                        
                        success:function(data)
                        {
                            $("#mpape").html(data);
                        },
                        
                        error:function()
                        {
                            $("#mpape").html('Not Connected');
                        }
                    });
                
                $("#btn").click(function(){
                    
                   var mkt = $("#mkt").val();
                    
                    $.ajax({
                        type:"post",
                        url:"mkp.php",
                        data:"mkt="+mkt,
                        
                        success:function(data)
                        {
                            $("#mpape").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#mpape").html('Not Conneted For Inserts');
                        }
                    });
                    
                });
                
            });
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <label>Marketer Name</label>
                    <input type="text" id="mkt" class="form-control">
                    <input type="button" id="btn" class="btn btn-default" value="Update">
                    
                </div>
                <div id="mpape" class="col-md-3"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
