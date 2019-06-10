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
    <body>
        <script>
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    
                    var date = $("#dte").val();
                    
                    $.ajax({
                        type:"post",
                        url:"allaudito.php",
                        data:"date="+date,
                        
                        
                        success:function(data)
                        {
                            $("#rina").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#rina").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" id="dte" class="form-control">
                        <input type="button" id="btn" class="btn btn-primary btn-lg" value="Preview">
                        
                    </div>
                    
                </div>
                <div id="rina" class="col-md-10"></div>
            </div>
            
        </div>
        
        
        <script>
            $(function(){
                
                $("#dte").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>
        <?php
        
        ?>
    </body>
</html>
