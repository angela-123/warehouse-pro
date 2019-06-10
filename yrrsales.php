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
        <title>DAILY SALES REPORT</title>
                                   
                                        
                                          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
          
          

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
            $(document).ready( function(){
                
                $("#btn").click(function(){
                    
                    var date = $("#dte").val();
                    var yr = $("#yr").val();
                    
                    $.ajax({
                        type:"post",
                        url:"yrepsrad.php",
                        data:"date="+date+"&yr="+yr,
                        
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
                
                
                $("#btx").click(function(){
                    
                    var date = $("#dte").val();
                    var yr = $("#yr").val();
                    
                    $.ajax({
                        type:"post",
                        url:"yrepsoid.php",
                        data:"date="+date+"&yr="+yr,
                        
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
                <form class="form-group col-sm-4">
                    
                    <label class="form-control" style=" background: #c9e2b3;">Year</label>
                    <input type="text" id="yr" class="form-control">
                    
                   
                    <input type="button" id="btn" value="Search Customer Summary" class="btn btn-primary btn-lg">
                    <input type="button" id="btx" value="Search Product Summary" class="btn btn-primary btn-lg">
                    <button class="btn btn-primary btn-lg" onclick="printDiv('taz')">Print Sales</button>
                    
                    
                </form>
                
                    
        <div id="taz" class="col-md-6"></div>
            
                
            </div>
            
        
        <?php
        // put your code here
        ?>
        
        </div>
        
                      <script type="text/javascript">
    function printDiv(divID)
    {   //var dte = document.getElementById('hy');
     //dte = new Date();
        var divElements = document.getElementById(divID).innerHTML;

        var oldpage = document.body.innerHTML;

        document.body.innerHTML = "<html><head><title></title></head><body><table title = INTENT ENERGY SOLUTIONS>" +divElements + "</table></body>";
        
        window.print();
        
        
        

        document.body.innerHTML = oldpage; 
        //document.forms["dag"].refresh();
        window.location.reload();
        
    }
    </script>
                
        
    </body>
</html>
