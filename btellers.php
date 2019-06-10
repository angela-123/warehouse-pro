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
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
               
‪<!-- Optional Bootstrap theme -->
‪
          <script src="js/bootstrap.min.js"></script>  
    </head>
    <body>
        
 

        
        
        <script>
            $(document).ready(function(){
                
                $("#btx").click(function(){
                    
                    var date = $("#dte").val();
                    var cname = $("#cname").val();
                    var dep = $("#dep").val();
                    var bname = $("#bname").val();
                    var acctno =$("#acctno").val();
                    var details =$("#details").val();
                    var amt = $("#amt").val();
                    
                    $.ajax({
                        type:"post",
                        url:"btl.php",
                        data:"date="+date+"&cname="+cname+"&dep="+dep+"&bname="+bname+"&acctno="+acctno+"&details="+details+"&amt="+amt,
                        
                        success:function(data)
                        {
                            $("#sugar").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#sugar").html('Not Connected');
                        }
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <label>Date</label>
                    <input type="date" id="dte" class="form-control">
                    <label>Company Name</label>
                    <input type="text" id="cname" class="form-control">
                    <label>Deposited By</label>
                    <input type="text" id="dep" class="form-control">
                    <label>Bank Name</label>
                    <input type="text" id="bname" class="form-control">
                    
                    <label>Account#</label>
                    <input type="text" id="acctno" class="form-control">
                    
                    <label>Deposit Slip#</label>
                    <input type="text" id="details" class="form-control">
                    <label>Amount Deposited</label>
                    <input type="number" id="amt" class="form-control">
                    <input type="button" id="btx" class="btn btn-primary btn-lg" value="Update">
                </div>
                <div id="sugar" class="col-md-5"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
        
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
url : "bsups.php",
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
$("input#bname").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "mybanks.php",
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
