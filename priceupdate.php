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
                
                
                $("#btx").click(function(){
                    
                    var pname = $("#pname").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"prick.php",
                        data:"pname="+pname,
                        
                        
                        success:function(data)
                        {
                            $("#neymar").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#neymar").html('Not Connected');
                        }
                        
                        
                    });
                    
                });
                
                
                
                $("#update").click(function(){
                    
                    
                    var pname = $("#pname").val();
                    var price = $("#price").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"pradon.php",
                        data:"pname="+pname+"&price="+price,
                        
                        
                        success:function(data)
                        {
                            $("#neymar").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#neymar").html('Not Connected');
                        }
                        
                    });
                    
                });
                
                
                $("#prices").click(function(){
                    
                    $.ajax({
                        
                        type:"post",
                        url:"xprices.php",
                        
                        
                        success:function(data)
                        {
                            $("#neymar").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#neymar").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-control" style=" background:  #bce8f1;">Productname</label>
                        <input type="text" id="pname" class="form-control">
                        <label class="form-control" style=" background:  #c7ddef;">New Price</label>
                        <input type="number" id="price" class="form-control">
                        <button id="btx" class="btn btn-primary btn-lg">Preview Current Price</button><button id="update" class="btn btn-primary btn-lg">Update Price</button><button id="prices" class="btn btn-primary btn-lg">View All Prices</button>
                        
                    </div>
                    
                </div>
                
                <div class="col-md-6">
                    <div id="neymar"></div>
                    
                </div>
                
            </div>
            
        </div>
        
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
        <?php
        // put your code here
        ?>
    </body>
</html>
