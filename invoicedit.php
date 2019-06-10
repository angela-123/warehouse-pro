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
        <title>INVOICE EDIT</title>
                                        
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
                
                $("#gtb").click(function(){
                    
                    var invoice =$("#invoice").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"ivedit.php",
                        data:"invoice="+invoice,
                        
                        success:function(data)
                        {
                            $("#faya").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#faya").html('Not Connected');
                        }
                        
                    });
                    
                });
                
                
                
                $("#mtb").click(function(){
                    
                    var invoice = $("#invoice").val();
                    var pname = $("#pname").val();
                    var price = $("#price").val();
                    var qty = $("#qty").val();
                    var cname = $("#cname").val();
                    var disc = $("#disc").val();
                    var date = $("#dte").val();
                    var pmt = $("#pmt").val();
                    var rets = $("#rets").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"zoro.php",
                        data:"invoice="+invoice+"&pname="+pname+"&price="+price+"&qty="+qty+"&cname="+cname+"&disc="+disc+"&date="+date+"&pmt="+pmt+"&rets="+rets,
                        
                        
                        success:function(data)
                        {
                            $("#faya").html(data);
                           
                                
                        },
                        
                        
                        error:function()
                        {
                            $("#faya").html('Not Connected');
                        }
                    });
                    
                });
                
                
                $("#ptb").click(function(){
                    
                    var invoice = $("#invoice").val();
                    var cname = $("#cname").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"proinvoice.php",
                        data:"invoice="+invoice+"&cname="+cname,
                        
                        success:function(data)
                        {
                            $("#faya").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#faya").html('Not Connected');
                        }
                        
                    });
                    
                });
                
                $("#mtx").click(function(){
                    
                    var invoice = $("#invoice").val();
                    var pname = $("#pname").val();
                    var price = $("#price").val();
                    var disc = $("#disc").val();
                    var cname = $("#cname").val();
                     
                     
                     
                     $.ajax({
                         type:"post",
                         url:"zorov.php",
                         data:"invoice="+invoice+"&pname="+pname+"&price="+price+"&disc="+disc+"&cname="+cname,
                         
                         success:function(data)
                         {
                             $("#faya").html(data);
                         },
                         
                         
                         error:function()
                         {
                             $("#faya").html('Not Connected');
                         }
                         
                     });
                });
            });
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Invoice#</label>
                        
                        <input type="number" id="invoice" class="form-control">
                        
                          <label>Date Of Entry</label>
                       <input type="date" id="dtex" class="form-control">
                        
                        
                        
                         <label>Invoice Date</label>
                       <input type="date" id="dte" class="form-control">
                          
                       <label>Customer Name</label>
                        <input type="text" id="cname" class="form-control">
                       
                       
                        
                        <label>Productname</label>
                        <input type="text" id="pname" class="form-control">
                        <label>Returned Qty</label>
                        <input type="number" id="qty" class="form-control">

                        
                        
                        <label>Unitprice</label>
                        <input type="number" id="price" class="form-control">
                        
                       
                         <label>Discount</label>
                         <input type="number" id="disc" class="form-control">
                       
                         <label>Payment</label>
                         <input type="number" id="pmt" class="form-control">
                       
                       
                       <input type="button" value="Preview Invoice" class="btn btn-primary btn-lg" id="gtb">
                            
                       <input type="button" value="Update Record" class="btn btn-primary btn-lg" id="mtb">
                       <input type="button" value="Update Price" class="btn btn-primary btn-lg" id="mtx">
                        <input type="button" value="Printable Invoice" class="btn btn-primary btn-lg" id="ptb">
                        
                        
                    </div>
                    
                </div>
                <div id="faya" class="col-md-6"></div>
                
            </div>
            
        </div>
        
        
        <script>
            $(function(){
                
                $("#dte").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>
        
        
        <script>
            $(function(){
                
                $("#dtex").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>
        
        
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
$("input#cname").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "custs.php",
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
