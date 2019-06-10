<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title>CUSTOMER TRANSACTIONS</title>
        <style>
            thr{ position: relative;
                width:100%;
            }
            
            #btf{

                background:orangered;
                color:darkblue;
                font-weight:bold;
            }


            #pa,#pb,#pc{

                background:navy;
                color:white;
            }

            td{

                color:black;
                font-size:1.2em;
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
                    var dte = $("#dte").val();
                    var endte = $("#endte").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"bafra.php",
                        data:"pname="+cname+"&dte="+dte+"&endte="+endte,
                        
                        success:function(data)
                        {
                            $("#ayo").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#ayo").html('No Network');
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
                <div class="col-md-3" >
                
                       <label id = "pa" class=" form-control">Customername</label>
                        <input type="text" id="cname" class="form-control">
                    
                    
                        <label id = "pb" class="form-control" >Beginning Date</label>
                        <input type="date" id="dte" class="form-control" >
                    
                        <label id = "pc" class="form-control" >End Date</label>
                        <input type="date" id="endte" class="form-control" >
                        
                        
                        <button id = "btf" type="button" class = "btn btn-default btn-lg"><span class = "glyphicon glyphicon-signal"></span> Preview</button>
                        <button id = "btt" type="button" class = "btn btn-primary btn-lg"onclick="printDiv('ayo')" ><span class = "glyphicon glyphicon-printer"></span> Print Ledger</button>
                        
                    </div>
                    <div id="ayo" class="col-md-9"></div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                
                    
                    
                    
                
                    
          
                       
                   
                </div>
                
            
            </div>
            
           
            
        <
        
        
            
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
                
                
                           
                
            
        
        
              
        <script>
            $(function(){
                
                $("#dte").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script> 


          <script>
            $(function(){
                
                $("#endte").datepicker({
                    
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
<script>
            $(function(){
                
                $("#date").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>

    </body>
</html>
