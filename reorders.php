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
        <title></title>
                       <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
               
‪       <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
               
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
                    url:"dada.php",
                    
                    success:function(data)
                    {
                        $("#miko").html(data);
                    },
                    
                    error:function()
                    {
                        $("#miko").html('Preview Not Connected');
                    }
                });
                
                $("#btn").click(function(){
                    
                    var pname = $("#pname").val();
                    var qty = $("#qty").val();
                    
                    $.ajax({
                        type:"post",
                        url:"reord.php",
                        data:"pname="+pname+"&qty="+qty,
                        
                        success:function(data)
                        {
                            $("#tiko").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#tiko").html('Not Connected');''
                        }
                        
                    });
                    
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"dada.php",
                        
                        success:function(data)
                        {
                            $("#miko").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#miko").html('Not Connected');
                        }
                        
                    });
                    
                });
                
                
                
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <label>Product Name</label>
                    <input type="text" id="pname" class="form-control">
                    <label>Maximum Qty</label>
                    <input type="number" id="qty" class="form-control" value="0">
                    <input type="button" id="btn" class="btn btn-primary btn-lg" value="Update Records" style=" background: orangered;">
                    <div id="tiko"></div>
                </div>
                <div id="miko" class="col-md-6"></div>
            </div>
            
            
        </div>
        <?php
        // put your code here
        ?>
        
                                                                            		                           <script type="text/javascript">
$("input#pname").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "drives.php",
data : data,
complete : function (xhr, result)
{
if (result !== "success") return;
var response = xhr.responseText;
var books = [];
$(response).filter ("li").each (function ()
{
books.push ($(this).text ());
});
callback (books);
}
});
}
});
</script>
    </body>
</html>
