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

        $("#tvx").click(function(){
            var d1 = $("#d1").val();
            var d2 = $("#d2").val();

            $.ajax({

                type:"post",
                url:"xports.php",
                data:"d1="+d1+"&d2="+d2,

                success:function(data)
                {
                  $("#toro").html(data);
                },

                error:function()
                {
                    $("#toro").html('Not Connected');
                }
            })

        })
    })
        
    </script>
    <div class = "container-fluid">
    <div class = "row">
    <div class = "col-md-3">
    <label>Beginning Date</label>
    <input type="date" id="d1" class="form-control">
    <label>End Date</label>
    <input type="date" id="d2" class="form-control">
   

    <button type="button" class = "btn btn-default btn-lg" id = "tvx">Search</button>
    </div>
        <div class = "col-md-6" id = "toro">
            
        </div>
    </div>
        
    </div>

    <script>
            $(function(){
                
                $("#d1").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>


<script>
            $(function(){
                
                $("#d2").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>
    </body>
</html>