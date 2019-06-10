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
                                               
                                          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    </head>
    <body>
        
        <script>
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    var supname = $("#supname").val();
                    var invoice = $("#invoice").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"sinvoice.php",
                        data:"supname="+supname+"&invoice="+invoice,
                        
                        success:function(data)
                        {
                            $("#zexil").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#zexil").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <label>Supplier Name</label>
                    <input type="text" id="supname" class="form-control">
                    <label>Invoice#</label>
                    <input type="text" id="invoice" class="form-control">
                    <input type="button" id="btn" class="btn btn-primary btn-lg" value="Preview Invoice" style=" background: orange;">
                    <input type="button" id="btn" class="btn btn-primary btn-lg" value="Print Invoice" style=" background: orange;" onclick="printDiv('zexil')">
                    
                </div>
                <br><br><br>
                <div class="col-md-6" id="zexil">
                    
                </div>
                
            </div>
            
        </div>
        
        
        
                 <script type="text/javascript">
    function printDiv(divID)
    {   //var dte = document.getElementById('hy');
     //dte = new Date();
        var divElements = document.getElementById(divID).innerHTML;

        var oldpage = document.body.innerHTML;

        document.body.innerHTML = "<html><head><title></title></head><body><table title = INTENT ENERGY SOLUTIONS>" +divElements + "</table></body>";
        
        window.print();
        
        
        

        document.body.innerHTML = oldpage; 
        //document.forms["dag"].refresh();
        window.location.reload();
        
    }
    </script>
        
        
        
        
                
                                                            		                           <script type="text/javascript">
$("input#supname").autocomplete ({
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
