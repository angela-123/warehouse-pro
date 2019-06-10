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
                
                $("#btn").click(function(){
                    
                    var date = $("#dte").val();
                    var pname = $("#pname").val();
                    var qty = $("#qty").val();
                    var rate = $("#rate").val();
                    var cname = $("#cname").val();
                    var invoice = $("#inv").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"gbite.php",
                        data:"date="+date+"&pname="+pname+"&qty="+qty+"&rate="+rate+"&cname="+cname+"&invoice="+invoice,
                        
                        
                        success:function(data)
                        {
                            $("#ade").html(data);
                        },
                        
                        error:function(xata)
                        {
                            alert(xata);
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
                    <label>Customername</label>
                    <input type="text" id="cname" class="form-control">
                    <label>Productname</label>
                    <input type="text" id="pname" class="form-control">
                    <label>Qty</label>
                    <input type="number" id="qty" class="form-control">
                    <label>Rate</label>
                    <input type="number" id="rate" class="form-control">
                    <label>Invoice#</label>
                    <input type="text" id="inv" class="form-control">
                    <input type="button" id="btn" class="btn btn-primary" value="Save">
                    <input type="button" id="btp" class="btn btn-primary" value="Print" onclick="printDiv('ade');">
                    
                </div>
                <div id="ade" class="col-md-8"></div>
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
        <?php
        // put your code here
        ?>
    </body>
</html>
