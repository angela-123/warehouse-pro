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
        <title>SALES POINT</title>
        <style>
            thr{ position: relative;
                width:100%;
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
                
                $("#btview").click(function(){
                    
                    var date = $("#date").val();
                    var cname = $("#cname").val();
                    var pname = $("#pname").val();
                    var qty = $("#qty").val();
                    var uprice = $("#uprice").val();
                    var paid = $("#paid").val();
                    var dep = $("#dep").val();
                    var other = $("#other").val();
                    var rec = $("#rec").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"zpos.php",
                        data:"date="+date+"&cname="+cname+"&pname="+pname+"&qty="+qty+"&uprice="+uprice+"&paid="+paid+"&dep="+dep+"&other="+other+"&rec="+rec,
                        
                        success:function(data)
                        {
                            $("#ayo").html(data);
                        },
                        
                        
                        error:function()
                        {
                            alert('No Network');
                        }
                        
                    });
                    
                    
                });
                
                
                $("#btf").click(function(){
                    
                    var cname = $("#cname").val();
                    var mont = $("#date").val();
                    var yr = $("#yr").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"bafamont.php",
                        data:"pname="+cname+"&date="+mont+"&yr="+yr,
                        
                        success:function(data)
                        {
                            $("#ayo").html(data);
                        },
                        
                        
                        error:function()
                        {
                            alert('Btf Clicked');
                        }
                    });
                    
                    
                });
                
            });
            
            
        </script>
        
      
            
    
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        $adele = "insert into receipts(rdate)values(curdate())";
        mysql_query($adele);
        
        $jan = "select MAX(recno)as recno,curdate() as date from receipts";
        $ran = mysql_query($jan);
        
        $fam = mysql_fetch_assoc($ran);
        
        $rec = $fam['recno'];
        $date = $fam['date'];
        
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3" style="background: white;">
                
                <form role="form" id="diag" >
                    
                    <div class="form-group">
                        <label class="form-control" style=" background: white;">Month</label>
                        <input type="text" id="date" class="form-control">
                   
                        <label class="form-control" style=" background: white;">Year</label>
                        <input type="text" id="yr" class="form-control">
                        
                        
                    
                        <label class="form-control" style=" background: white;">Customername</label>
                        <input type="text" id="cname" class="form-control">
                        
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <input type="button" value="Preview Ledger" id="btf" class="btn btn-primary btn-lg">
                </form>
                    
          
                       
                   
                </div>
                <div id="ayo" class="col-sm-9"></div>
            
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



        
        <?php
        // put your code here
        ?>
    </body>
</html>
