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
               
‪<!-- Optional Bootstrap theme -->
‪
           
    
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

    <?php 
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app) or die('cant connect');
        
        $adele = "insert into receipts(rdate,cashier)values(CURDATE(),'na')";
        mysql_query($adele) or die('cant insert');
        
        $jan = "select MAX(recno)as Recno,curdate() as date from receipts ";
        $ran = mysql_query($jan);
        
        
        ?>
        
        <?php
        $fam = mysql_fetch_assoc($ran);
        
            $max = $fam['Recno'];
        
        
        $rec = $fam['Recno'];
        $datex = $fam['date'];
        
        ?>
    
   
    <body>
        
        <script>
            
            $(document).ready(function(){
                
                $("#btd").click(function(){
                    
                    var date = $("#dte").val();
                    var customer = $("#cname").val();
                    var bal = $("#bal").val();
                    var dep = $("#dep").val();
                    var bpmt = $("#bpmt").val();
                    var others = $("#others").val();
                    var recno = $("#recno").val();
                    
                    if(customer === '')
                    {
                        alert('Please Enter Customer Name,Ok');
                         return;
                    }
                    
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"allan.php",
                        data:"date="+date+"&customer="+customer+"&bal="+bal+"&dep="+dep+"&bpmt="+bpmt+"&others="+others+"&recno="+recno,
                        
                        success:function(data)
                        {
                            $("#mayo").html(data);
                            $("#bal").val('');
                            $("#dep").val('');
                            $("#bpmt").val('');
                            $("#others").val('');
                        },
                        
                        
                        error:function()
                        {
                            $("#mayo").html('Not Connected');
                        }
                        
                    });
                    
                });
            });
        </script>
        
        
         <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
            <div class="form-group">
               
                
                <label class="form-control" style=" background: black; color: white ">Receipt#</label>
                        
                        <input type="number" id="recno" class="form-control" value="<?php echo $rec; ?>">
                
                
                <label class="form-control" style=" background: skyblue; color: white">Customername</label>
                <input type="text" id="cname" class="form-control" placeholder="customername">
                    
                 <label class="form-control" style=" background:skyblue; color: white">Opening Balance</label>
                 <input type="number" id="bal" class="form-control" value="0">
                
                
                
                
                <input type="button" id="btd" value="Update" class="btn btn-primary btn-lg">
            </div>
            </div>
            <div class="col-md-8">
                <div id="mayo"></div>
            </div>
        </div>
        
    </div>
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
     
        ?>
    </body>
</html>
