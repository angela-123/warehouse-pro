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
        <title>UPDATE PRODUCTS</title>
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
                
                $("#btn").click(function(){
                    
                    var pname = $("#pname").val();
                    var price = $("#price").val();
                    
                    $.ajax({
                        type:"post",
                        url:"upss.php",
                        data:"pname="+pname+"&price="+price,
                        
                        success:function(data)
                        {
                            $("#vx").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#vx").html('Not Connected To Server');
                        }
                        
                    });
                    
                });
                
                
                $("#btp").click(function(){
                    var pname = $("#pname").val();
                    var price = $("#price").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"pupdate.php",
                        data:"pname="+pname+"&price="+price,
                        
                        success:function(data)
                        {
                            $("#vx").html(data);
                        },
                        
                        error:function()
                        {
                            $("#vx").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Productname</label>
                        <input type="text" id="pname" class="form-control">
                        
                        <label>New Stock</label>
                        <input type="text" id="price" class="form-control">
                        
                        <input type="button" id="btn" class="btn btn-primary btn-lg" value="Preview Products">
                        <input type="button" id="btp" class="btn btn-primary btn-lg" value="Update Stock">
                    </div>
                    
                </div>
                <div id="vx" class="col-md-7"></div>
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
