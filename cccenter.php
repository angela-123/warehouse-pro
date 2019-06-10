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
        $("#bingo").click(function(){

            var cc = $("#cc").val();

            $.ajax({
                type:"post",
                url:"cc.php",
                data:"cc="+cc,


                success:function(data)
                {
                   $("#mojo").html(data);
                },

                error:function()
                {
                    $("#mojo").html('Not Connected');
                }
                
                
            })
        })

    })
        
    </script>
    <div class = "container-fluid">
    <div class = "row">
    <div class = "col-md-3">
        <label>Cost Center</label>
        <input class = "form-control" type="text" id ="cc" placeholder = "cost center">
        <button type="button" class = "btn btn-primary btn-lg" id = "bingo">Update</button>


    </div>
    <div class = "col-md-4" id = "mojo"></div>
    </div>
    </div>
    </body>
</html>