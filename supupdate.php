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
        <title>SUPPLIER RECORDS EDIT</title>
        
        <style>
            input[type = "button"]
            {
                
                background: skyblue;
                border: 1px orange solid;
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
                
                $("#btp").click(function(){
                    
                    var sname = $("#sname").val();
                    
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"supo.php",
                        data:"sname="+sname,
                        
                        
                        success:function(data)
                        {
                            $("#maya").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#maya").html('Not Connected');
                        }
                        
                    });
                    
                    
                });
                
                
                
                $("#btx").click(function(){
                    
                    var sname = $("#sname").val();
                    var inv = $("#inv").val();
                    var pid = $("#pid").val();
                    var paid = $("#pmt").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"jimi.php",
                        data:"sname="+sname+"&inv="+inv+"&pid="+pid+"&paid="+paid,
                        
                        success:function(data)
                        {
                            $("#maya").html(data)
                        },
                        
                        
                        
                        error:function()
                        {
                            $("#maya").html('Not Connected');
                        }
                    });
                    
                    
                });
                
                
                
                $("#btg").click(function(){
                    
                    var sname = $("#sname").val();
                    var inv = $("#inv").val();
                    var pid = $("#pid").val();
                    var paid = $("#pmt").val();
                    var pname = $("#pname").val();
                    var qty = $("#qty").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"yimi.php",
                        data:"sname="+sname+"&inv="+inv+"&pid="+pid+"&paid="+paid+"&pname="+pname+"&qty="+qty,
                        
                        success:function(data)
                        {
                            $("#maya").html(data)
                        },
                        
                        
                        
                        error:function()
                        {
                            $("#maya").html('Not Connected');
                        }
                    });
                    
                    
                    
                    
                    
                    
                    
                });
                
                
                $("#inv").click(function(){
                    
                    
                    var inv = $("#inv").val();
                    var ninv = $("#ninv").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"invest.php",
                        data:"inv="+inv+"&ninv="+ninv,
                        
                        
                        success:function(data)
                        {
                            $("#maya").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#maya").html('Not Connected');
                        }
                    });
                    
                });
                
                
                $("#btv").click(function(){
                    
                    var inv = $("#inv").val();
                    var ninv = $("#ninv").val();
                    var sname  = $("#sname").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"revest.php",
                        data:"inv="+inv+"&ninv="+ninv +"&sname="+sname,
                        
                        
                        success:function(data)
                        {
                            $("#maya").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#maya").html('Not Connected');
                        }
                    });
                    
                });
                
                
                $("#btz").click(function(){
                    
                    var sname = $("#sname").val();
                    var inv = $("#inv").val();
                    var pname = $("#pname").val();
                    var ucost = $("#ucost").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"jimo.php",
                        data:"sname="+sname+"&pname="+pname+"&inv="+inv+"&ucost="+ucost,
                        
                        success:function(data)
                        {
                            $("#maya").html(data);
                        },
                        
                        error:function()
                        {
                            $("#maya").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Suppler Name</label>
                        <input type="text" id="sname" class="form-control">
                        
                        <label>Current Invoice#</label>
                        <input type="text" id="inv" class="form-control">
                        
                        <label>New Invoice#</label>
                        <input type="text" id="ninv" class="form-control">
                        
                        <label>Date</label>
                        <input type="date" id="dte" class="form-control">
                        
                        
                        <label>Product Name</label>
                        <input type="text" id="pname" class="form-control">
                        
                        
                        
                        
                        
                        <label>Qty</label>
                        <input type="text" id="qty" class="form-control">
                        
                        <label>Unitcost</label>
                        <input type="text" id="ucost" class="form-control">
                        
                        
                        
                        <label>Pid Number</label>
                        <input type="text" id="pid" class="form-control">
                        
                        
                        <label>Payment</label>
                        <input type="text" id="pmt" class="form-control">
                        <input type="button" id="btp" class="btn btn-default btn-lg" value="View Supplier Records">
                        <input type="button" id="btx" class="btn btn-default btn-lg" value="Update Payment">
                        <input type="button" id="btg" class="btn btn-default btn-lg" value="Update Quantity">
                        <input type="button" id="btv" class="btn btn-default btn-lg" value="Update Invoice#">
                         <input type="button" id="btz" class="btn btn-default btn-lg" value="Update Unitcost">
                        
                        
                        
                    </div>
                    
                </div>
                <div id="maya" class="col-md-6"></div>
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
        

        
                                                            		                           <script type="text/javascript">
$("input#sname").autocomplete ({
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


    </body>
</html>
