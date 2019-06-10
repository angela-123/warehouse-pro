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
        
        <style>
            #pd,#prod,#bte{
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
                
                $("#bts").click(function(){
                    
                    $("#dp").fadeIn(2000);
                    $("#dept").fadeIn(2000);
                    $("#bts").fadeOut(2000);
                    $("#bte").fadeIn(2000);
                    $("#prod").fadeIn(2000);
                    $("#pd").fadeIn(2000);
                    $('#dept').fadeIn(2000);
                    $("#prod").val('');
                    
                });
                
                $("#btn").click(function(){
                    
                    var dept = $("#dept").val();
                    
                    
                    
                    $.ajax({
                        type:"post",
                        url:"prods.php",
                        data:"dept="+dept,
                        
                        success:function(data)
                        {
                            $("#nata").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#nata").html('Not Connected');
                        }
                        
                    });
                    
                });
                
                
                $("#bte").click(function(){
                    
                    var dept = $("#dept").val();
                    var prod = $("#prod").val();
                    
                    
                    
                    $.ajax({
                        type:"post",
                        url:"dpost.php",
                        data:"dept="+dept+"&prod="+prod,
                        
                        success:function(data)
                        {
                            $("#nata").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#nata").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <label id="dp">Company Name</label>
                    <input type="text" id="dept" class="form-control">
                    <label id="pd">Product Name</label>
                    <input type="text" id="prod" class="form-control">
                    
                    <input type="button" id="btn" class="btn btn-primary btn-lg" value="Preview Stock" style=" background: orangered">
                    <input type="button" id="bte" class="btn btn-primary btn-lg" value="Edit Products" style=" background: darkorange">
                    <input type="button" id="bts" class="btn btn-primary btn-lg" value="Edit Product Source">
                </div>
                <div id="nata" class="col-md-6"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
        
                                                                    		                           <script type="text/javascript">
$("input#dept").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "sdrives.php",
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
 
                                                                    		                           <script type="text/javascript">
$("input#prod").autocomplete ({
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
