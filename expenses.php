<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            var cc = $("#cc").val();
            var date = $("#dte").val();
            var recby = $("#recby").val();
            var det = $("#details").val();
            var amt = $("#amt").val();

            $.ajax({
                type:"post",
                url:"exps.php",
                data:"cc="+cc+"&date="+date+"&recby="+recby+"&det="+det+"&amt="+amt,

                success:function(data)
                {
                   $("#oga").html(data);
                   $("#cc").val('');
                   $("#recby").val('');
                   $("#details").val('');
                   $("#amt").val('');
                },

                error:function()
                {
                    $("#oga").html('Not Connected');
                }
            })
        })
    })
        
    </script>
    <div class = "container-fluid">
        <div class = "row">
        <div class = "col-md-3">
        <label>Date</label>
        <input type="date" id="dte" class="form-control">
        <label>Cost Center</label>
         <input type="text" id ="cc" class="form-control">
         <label>Received By</label>   
         <input type="text" id="recby" class ="form-control">
         <label>Details</label>   
         <input type="text" id="details" class ="form-control">
         <label>Amount</label>   
         <input type="text" id="amt" class ="form-control">
         <button type="button" id = "btx" class = "btn btn-default btn-lg">Update</button>
        </div>
            <div id= "oga" class = "col-md-6">
                
            </div>
        </div>
        
    </div>
    <script type="text/javascript">
$("input#cc").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "ccnext.php",
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