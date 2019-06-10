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
            
    </head>
    
    
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
                    var recpt = $("#recpt").val();
                    var det = $("#det").val();
                    
                    if(customer === '')
                    {
                        alert('Please Enter Customer Name,Ok');
                         return;
                    }
                    
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"all.php",
                        data:"date="+date+"&customer="+customer+"&bal="+bal+"&dep="+dep+"&bpmt="+bpmt+"&others="+others+"&recno="+recno+"&recpt="+recpt+"&det="+det,
                        
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
            <div class="col-sm-3">
            <div class="form-group">
                
                 
                <label class="form-control" style=" background:lightblue; color: white">Date</label>
                <input type="text" id="dte" class="form-control" >
                   
                
                
                <label class="form-control" style=" background: black; color: white ">Trans#</label>
                        
                        <input type="number" id="recno" class="form-control" value="<?php echo $rec; ?>">
                        
                
                
                
                <label class="form-control" style=" background:lightblue; color: white">Customername</label>
                <input type="text" id="cname" class="form-control" placeholder="customername">
                    
                 
                <label class="form-control" style=" background:lightblue; color:  white">Deposit</label>
                <input type="text" id="dep" class="form-control" value="0">
                
                
                <label class="form-control" style=" background:lightskyblue; color: white">Payment</label>
                <input type="text" id="bpmt" class="form-control" value="0">
                
                
                <label class="form-control" style=" background:lightskyblue; color:  white">Expenses</label>
                <input type="number" id="others" class="form-control" value="0">
                
                <label class="form-control" style=" background:lightskyblue; color:  white">Particulars</label>
                <input type="text" id="det" class="form-control">
                
                
                <label class="form-control" style=" background: burlywood; color: white">Receipt#</label>
                <input type="text" id="recpt" class="form-control">
                <input type="button" id="btd" value="Update" class="btn btn-primary btn-lg">
            </div>
            </div>
            <div class="col-md-9">
                <div id="mayo"></div>
            </div>
        </div>
        
    </div>
        
    <script>
            $(function(){
                
                $("#dte").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
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
     
        ?>
    </body>
</html>
