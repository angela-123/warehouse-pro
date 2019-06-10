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
        <title>PRODUCTS</title>
        <style>
            .form{
                
            }
            
            
        </style>
        <style>
            
        </style>
                                        
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
                    
                    var bcode = $("#bcode").val();
                    var pname = $("#pname").val();
                    var subdep = $("#subdep").val();
                    var dep = $("#dept").val();
                    var rate = $("#rate").val();
                    var ucost = $("#ucost").val();
                    var opstock = $("#opstock").val();
                    var disc = $("#disc").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"regitems.php",
                        data:"bcode="+bcode+"&pname="+pname+"&subdep="+subdep+"&dep="+dep+"&rate="+rate+"&ucost="+ucost+"&opstock="+opstock+"&disc="+disc,
                        
                        success:function(data)
                        {
                            $("#ayo").html(data);
                            $("#bcode").val('');
                            $("#pname").val('');
                            $("#subdep").val('');
                            $("#dept").val('');
                            $("#rate").val('');
                            $("#ucost").val('');
                            $("#disc").val('');
                        },
                        
                        error:function()
                        {
                            alert(new Date());
                        }
                        
                    });
                    
                    
                });
                
                
                $("#btx").click(function(){
                    
                    
                    $.ajax({
                        type:"post",
                        url:"docks.php",
                        
                        success:function(data)
                        {
                            $("#ayo").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#ayo").html('Data Not Available');
                        }
                            
                        
                        
                        
                    });
                    
                });
                
                
                $("#btp").click(function(){
                    
                    
                    var bcode = $("#bcode").val();
                    var pname = $("#pname").val();
                    var subdep = $("#subdep").val();
                    var dep = $("#dept").val();
                    var rate = $("#rate").val();
                    var ucost = $("#ucost").val();
                    var opstock = $("#opstock").val();
                    var disc = $("#disc").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"ejupdate.php",
                        data:"bcode="+bcode+"&pname="+pname+"&subdep="+subdep+"&dep="+dep+"&rate="+rate+"&ucost="+ucost+"&opstock="+opstock+"&disc="+disc,
                        
                        success:function(data)
                        {
                            $("#ayo").html(data);
                            $("#bcode").val('');
                            $("#pname").val('');
                            $("#subdep").val('');
                            $("#dept").val('');
                            $("#rate").val('');
                            $("#ucost").val('');
                            $("#disc").val('');
                        },
                        
                        
                        error:function()
                        {
                            $("#ayo").html('Not Connected');
                        }
                        
                    });
                    
                    
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row " >
                <div class="col-sm-3">
                <label class="form-control" style=" background: lightblue; border: 0px #eea236 solid;">Productname</label>
                <input type="text" id="pname" class="form-control">
                
                <label class="form-control" style=" background: lightblue; border: 0px #d59392 solid;">Dealer</label>
                <input type="text" id="dept" class="form-control">
                <label class="form-control" style=" background: lightblue; border: 0px #d59392 solid;">Rate</label>
                <input type="number" id="rate" class="form-control" value="0">
                <label class="form-control" style=" background: lightblue; border: 0px #eea236 solid;">Unitcost</label>
                <input type="number" id="ucost" class="form-control">
                
                <label class="form-control" style=" background: lightblue; border: 0px #eea236 solid;">Discount</label>
                <input type="text" id="disc" class="form-control" value="0">
                
                
                
                <label class="form-control" style=" background: lightblue; border: 0px #eea236 solid;">Opening Stock</label>
                <input type="number" id="opstock" class="form-control" value="0">
                
                <input type="button" id="btn" value="Save" class="btn btn-primary btn-lg">
                <input type="button" id="btp" value="Update Product" class="btn btn-primary btn-lg">
                <input type="button" id="btx" value="Preview Stock" class="btn btn-primary btn-lg">
               
            </div>
                <div class="col-sm-8">
                    <div id="ayo" style=" background: white;"></div>
                </div>
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
$("input#subdep").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "subdrives.php",
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
$("input#pname").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "pducts.php",
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
