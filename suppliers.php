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
        <title>SUPPLIERS</title>
                                        
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
                
                
                $("#btn").click(function(){
                    var cname = $("#cname").val();
                    var address = $("#add").val();
                    var phone = $("#phone").val();
                    var email = $("#email").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"supdetails.php",
                        data:"cname="+cname+"&address="+address+"&phone="+phone+"&email="+email,
                        
                        
                        success:function(data)
                        {
                            $("#ayo").html(data);
                        },
                        
                        
                        error:function()
                        {
                            alert('No Service');
                        }
                        
                        
                    });
                    
                    
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
            <div class="form-group " >
                
                <label class="form-control" style=" background:  skyblue">Suppliername</label>
                <input type="text" id="cname" class="form-control">
                
                <label class="form-control" style=" background:  skyblue">Address</label>
                <input type="text" id="add" class="form-control">
                <label class="form-control" style=" background:  skyblue">Phone#</label>
                <input type="text" id="phone" class="form-control">
                <label class="form-control" style=" background: skyblue">Email</label>
                <input type="email" id="email" class="form-control">
                
                
                <input type="button" id="btn" value="update" class="btn btn-primary btn-lg">
            </div>
            
                </div>
                <div id="ayo" class="col-md-8"></div>
                
            </div>
        </div>
        
        
                                                                            		                           <script type="text/javascript">
$("input#sname").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "supps.php",
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
        
        ?>
    </body>
</html>
