<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>OLLYTEX NIGERIA LIMITED</title>
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
        

        var dte = $("#dte").val();
        var dtx = $("#dtx").val();

        $.ajax({

          type:"post",
          url:"expsedit.php",
          data:"dtx="+dtx+"&dte="+dte,

          success:function(data)
          {
            $("#bobo").html(data);
          },

          error:function()
          {
            $("#bobo").html('Not Connected');
          }
        })
      })

    })
    </script>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <label>Beginning Date</label>
          <input type="date" id="dte" class="form-control">
          <label>End Date</label>
          <input type="date" id="dtx" class="form-control">
          <button class="btn btn-primary btn-lg" id="btx">Preview Expenses</button>
        </div>
        <div class="col-md-5" id="bobo"></div>
      </div>
    </div>

    <script>
                $(function(){

                    $("#dte").datepicker({

                        dateFormat:"yy-mm-dd"

                    });
                });
            </script>



            <script>
                        $(function(){

                            $("#dtx").datepicker({

                                dateFormat:"yy-mm-dd"

                            });
                        });
                    </script>

  </body>
</html>
