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
        <title>PURCHASES</title>
        <style>
            thr{ position: relative;
                width:100%;
            }
            
            
        </style>
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
                
                $("#btview").click(function(){
                    
                    var date = $("#date").val();
                    var cname = $("#cname").val();
                    var pname = $("#pname").val();
                    var qty = $("#qty").val();
                    var uprice = $("#uprice").val();
                    var paid = $("#paid").val();
                    var dep = $("#dep").val();
                    var other = $("#others").val();
                    var rec = $("#rec").val();
                    var inv = $("#inv").val();
                    var crd = $("#crd").val();
                    var part = $("#part").val();
                    var bal = $("#bal").val();
                    
                    
                    if(cname === '')
                    {
                        alert('Enter Supplier Name');
                        return;
                    }
                    
                    $.ajax({
                        
                        type:"post",
                        url:"zpurch.php",
                        data:"date="+date+"&cname="+cname+"&pname="+pname+"&qty="+qty+"&uprice="+uprice+"&paid="+paid+"&dep="+dep+"&other="+other+"&rec="+rec+"&inv="+inv+"&crd="+crd+"&part="+part+"&bal="+bal,
                        
                        success:function(data)
                        {
                            $("#ayo").html(data);
                            $("#qty").val('0');
                            $("#pname").val('');
                            $("#uprice").val('0');
                            $("#paid").val('0');
                            $("#other").val('0');
                           
                        },
                        
                        
                        error:function()
                        {
                            alert('No Network');
                        }
                        
                    });
                    
                    
                });
                
                
                $("#btf").click(function(){
                    
                    var cname = $("#cname").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"bafapurch.php",
                        data:"pname="+cname,
                        
                        success:function(data)
                        {
                            $("#ayo").html(data);
                            $("#pname").val('payment');
                        },
                        
                        
                        error:function()
                        {
                            alert('Btf Clicked');
                        }
                    });
                    
                    
                });
                
                $("#bdelete").click(function(){
                    
                    var cname = $("#cname").val();
                    var pname = $("#pname").val();
                    var date = $("#date").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"pdel.php",
                        data:"date="+date+"&cname="+cname+"&pname="+pname,
                        
                        success:function(data)
                        {
                            $("#ayo").html(data);
                        },
                        
                        
                        error:function()
                        {
                            alert('Data Not Deleted');
                        }
                    });
                    
                    
                });
                
                
                $("#pname").click(function(){
                    
                    var cname = $("#pname").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"cost.php",
                        data:"cname="+cname,
                        
                        
                        success:function(data)
                        {
                            $("#layo").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#layo").html('Not Connected');
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
                <div class="col-md-3">
                
                
                    
                    <div class="form-group">
                        
                        
                    
                    
                    
                        <label>Date</label>
                        <input type="date" id="date" class="form-control" value="<?php echo $date; ?>">
                    
                    
                        
                        
                        <label>Suppliername</label>
                        <input type="text" id="cname" class="form-control">
                        
                    
                        <label>Invoice#</label>
                        <input type="text" id="inv" class="form-control">
                        
                        
                    
                        <label>Productname</label>
                        <input type="text" id="pname" class="form-control">
                       
                    
                    
                    
                        <label>Qty</label>
                        <input type="number" id="qty" class="form-control">
                       
                    
                    
                    
                    
                        <label>Unitcost</label>
                        <input type="number" id="uprice" class="form-control">
                       
                    
                    
                   
                        <label>Paid</label>
                        <input type="text" id="paid" class="form-control" value="0">
                       
                    <label>Particulars</label>
                        <input type="text" id="part" class="form-control" value="0">
                       
                    
                    
                        <label>Deposit</label>
                        <input type="number" id="dep" class="form-control" value="0">
                       
                    
                    
                    
                    
                        <label>Expenses</label>
                        <input type="number" id="others" class="form-control" value="0">
                       
                     <label>Opening Balance</label>
                        <input type="number" id="bal" class="form-control" value="0">
                    
                   
                        <label>Receipt#</label>
                        <input type="text" id="rec" class="form-control" value="<?php echo $rec; ?>">
                       
                    
                    
                    <input type="button" id="btview" value="Save" class="btn btn-primary btn-lg "><input type="button" value="Preview Ledger" id="btf" class="btn btn-primary btn-lg"><input type="button" id="bdelete" value="Delete" class="btn btn-primary btn-lg">
                    </div>
                
                    
                    <button class="btn btn-primary btn-lg" id="layo"></button>
                       
                   
                </div>
                <div id="ayo" class="col-md-9"></div>
            
            </div>
            
           
            
        </div>
        
        
                 
                 <script>
            $(function(){
                
                $("#date").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>
                
                           
                
            
        
        
              
                
            
        
            
        
        
        
        
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



        
        <?php
        // put your code here
        ?>
    </body>
</html>
