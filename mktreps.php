<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>MARKETERS REPORT</title>
        
        <style>
            #mnt,#mmt,#yyr,#yr,#monthly,#yearly,#mtsumm,#yrsumm{
                
                display: none;
            }
        </style>
  <script src="libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script src="libs/jquery-ui-1.10.0.custom.min.js"></script>
        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <script>
            $(document).ready(function(){
                
                $("#adjmt").click(function(){
                    
                    $("#mnt").show(2000);
                    $("#mmt").show(2000);
                    $("#yyr").show(2000);
                    $("#yr").show(2000);
                    $("#ddt").hide(2000);
                     $("#dte").hide(2000);
                     $("#day").hide(2000);
                     $("#monthly").show(2000);
                    $("#adjmt").hide(2000);
                    $("#yearly").hide(2000);
                    $("#adjyr").show(2000);
                     $("#dsumm").hide(2000);
                     $("#mtsumm").show(2000);
                      $("#yrsumm").hide(2000);
                });
                
                $("#adjyr").click(function(){
                    
                    $("#yyr").show(2000);
                    $("#yr").show(2000);
                    $("#mnt").hide(2000);
                    $("#mmt").hide(2000);
                    $("#dte").hide(2000);
                     $("#ddt").hide(2000);
                     $("#day").hide(2000);
                     $("#monthly").hide(2000);
                     $("#yearly").show(2000);
                     $("#adjmt").show(2000);
                     $("#adjyr").hide(2000);
                      $("#mtsumm").hide(2000);
                       $("#yrsumm").show(2000);
                        $("#dsumm").hide(2000);
                });
                
                
                $("#day").click(function(){
                    
                    var date = $("#dte").val();
                    var mnt =$("#mnt").val();
                    var mkt =$("#mkt").val();
                    var yr = $("#yr").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"mafa.php",
                        data:"date="+date+"&mkt="+mkt,
                        
                        success:function(data)
                        {
                            $("#oroyo").html(data);
                        },
                        
                        error:function()
                        {
                            $("#oroyo").html('Not Connected');
                        }
                        
                    });
                    
                    
                   
                
            });
            
            
             $("#monthly").click(function(){
                    
                    var date = $("#dte").val();
                    var mnt =$("#mnt").val();
                    var mkt =$("#mkt").val();
                    var yr = $("#yr").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"matafa.php",
                        data:"mnt="+mnt+"&yr="+yr+"&mkt="+mkt,
                        
                        success:function(data)
                        {
                            $("#oroyo").html(data);
                        },
                        
                        error:function()
                        {
                            $("#oroyo").html('Not Connected');
                        }
                        
                    });
                    
                    
                    
                });
                
                
                
                $("#yearly").click(function(){
                    
                    //var date = $("#dte").val();
                    var mnt =$("#mnt").val();
                    var mkt =$("#mkt").val();
                    var yr = $("#yr").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"yatafa.php",
                        data:"mnt="+mnt+"&yr="+yr+"&mkt="+mkt,
                        
                        success:function(data)
                        {
                            $("#oroyo").html(data);
                        },
                        
                        error:function()
                        {
                            $("#oroyo").html('Not Connected');
                        }
                        
                    });
                    
                    
                    
                });
                
                
                
                  $("#dsumm").click(function(){
                    
                    var date = $("#dte").val();
                    var mnt =$("#mnt").val();
                    var mkt =$("#mkt").val();
                    var yr = $("#yr").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"mafasum.php",
                        data:"date="+date+"&mkt="+mkt,
                        
                        success:function(data)
                        {
                            $("#oroyo").html(data);
                        },
                        
                        error:function()
                        {
                            $("#oroyo").html('Not Connected');
                        }
                        
                    });
                    
                    
                   
                
            });
            
            
            $("#mtsumm").click(function(){
                    
                    var date = $("#dte").val();
                    var mnt =$("#mnt").val();
                    var mkt =$("#mkt").val();
                    var yr = $("#yr").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"matafasum.php",
                        data:"mnt="+mnt+"&yr="+yr+"&mkt="+mkt,
                        
                        success:function(data)
                        {
                            $("#oroyo").html(data);
                        },
                        
                        error:function()
                        {
                            $("#oroyo").html('Not Connected');
                        }
                        
                    });
                    
                    
                    
                });
                
                
                
                
                
                $("#yrsumm").click(function(){
                    
                    //var date = $("#dte").val();
                    var mnt =$("#mnt").val();
                    var mkt =$("#mkt").val();
                    var yr = $("#yr").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"yatafasum.php",
                        data:"mnt="+mnt+"&yr="+yr+"&mkt="+mkt,
                        
                        success:function(data)
                        {
                            $("#oroyo").html(data);
                        },
                        
                        error:function()
                        {
                            $("#oroyo").html('Not Connected');
                        }
                        
                    });
                    
                    
                    
                });
                
            
    });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <label>Marketer</label>
                    <input type="text" id="mkt" class="form-control">
                    <label id="ddt">Date</label>
                    <input type="date" id="dte" class="form-control">
                    <label id="mmt">Month</label>
                    <input type="text" id="mnt" class="form-control">
                    <label id="yyr">Year</label>
                    <input type="number" id="yr" class="form-control">
                    <input type="button" id="day" class="btn btn-default btn-lg" value="Daily">
                    <input type="button" id="monthly" class="btn btn-default btn-lg" value="Monthly">
                    <input type="button" id="yearly" class="btn btn-default btn-lg" value="Yearly">
                    <input type="button" id="dsumm" class="btn btn-default btn-lg" value="Daily Summary">
                    <input type="button" id="mtsumm" class="btn btn-default btn-lg" value="Monthly Summary">
                    <input type="button" id="yrsumm" class="btn btn-default btn-lg" value="Yearly Summary">
                    <input type="button" id="adjmt" class="btn btn-default btn-lg" value="Monthly UI ">
                    <input type="button" id="adjyr" class="btn btn-default btn-lg" value="Yearly UI ">
                </div>
                <div id="oroyo"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
                                                                   		                           <script type="text/javascript">
$("input#mkt").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "mkters.php",
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

<script>
            $(function(){
                
                $("#dte").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>

    </body>
</html>
