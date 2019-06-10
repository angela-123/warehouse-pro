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
                
                $("#inv").click(function(){
                    
                    var invoice = $("#invoice").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"invrep.php",
                        data:"invoice="+invoice,
                        
                        success:function(data)
                        {
                            $("#raye").html(data);
                            
                            
                        },
                        
                        
                        error:function()
                        {
                            $("#raye").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Enter Invoice#</label>
                        <input type="number" id="invoice" class="form-control">
                        <input type="button" value="Preview Invoice" class="btn btn-primary" style=" background: burlywood; font-size: 1.2em;" id="inv">
                        <input type="button" value="Print Invoice" class="btn btn-primary" style=" background: burlywood; font-size: 1.2em;" id="inv" onclick="printDiv('raye')" >
                        
                    </div>
                    
                </div>
                <div id="raye" class="col-md-6"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
        
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
