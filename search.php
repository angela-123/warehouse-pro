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
                
                
                $("#btg").click(function(){
                    
                    var pname = $("#pname").val();
                    var loc = $("#loc").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"sasha.php",
                        data:"pname="+pname+"&loc="+loc,
                        
                        success:function(data)
                        {
                            $("#bcx").html(data);
                        },
                        
                        
                        error:function()
                        {
                            alert('No Network');
                        }
                    });
                    
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="form-control" style=" background:  #1c94c4;">Productname</label>
                        <input type="text" id="pname" class="form-control">
                        
                        
                        <button id="btg" class="btn btn-primary btn-lg">Search</button>
                        <button id="bcx" class="btn btn-primary btn-lg"></button>
                        
                    </div>
                </div>
                
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
