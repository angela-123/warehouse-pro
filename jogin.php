<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLLYTEX</title>
        <style>
            #fex{
                
               
                border: 0px #c09853 solid;
                
            }
            
            #arama{
                
                font-size: 2.5em;
               
                
            }
            input[type = "button"]{
                width: 100px;
                height: 50px;
                border: 1px #fef1ec solid;
                background:  #7699d1;
                font-size: 12pt;
            }
            
            label{
                border: 0px #c43c35 solid;
            }
            
            h3{
                position: absolute;
                left: 390px;
                top:200px;
                color:  #c43c35;
            }
            
            label{
                font-size: 14pt;
                color: darkred;
                font-weight:  bold;
            }
            
            #mid{
                position: relative;
                left: 100px;
                top:40px;
            }
            
            #mac{
                display: none;
            }
            
            body{
                background:white;
            }
            
            #tuliop{
                position: absolute;
                left: 400px;
                top:250px;
                color: red;
                font-size: 35pt;
            }
            
            
            input[type = "text"]
            {
                font-size: 11pt;
                color:darkblue;
            }
        </style>
        
                        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body id="infoo">
        
        <script>
            $(document).ready(function(){
            $("#save").click(function()
            {  
                
               //var date = $("#dte").val();
               var username = $("#usname").val();
               var password = $("#pswd").val();
               //var shift = $("#shift").val();
               
               //var qty = $("#qty").val();
              
              //var recno = $("#recno").val();
              
                
                $.ajax({
                    type:"POST",
                    url:"newjogger.php",
                    //data:"rdate="+date+"&guestname="+gname+"&menuitem="+kode+"&qty="+qty+"&rate="+rate+"&recno="+recno;
                    data:"username="+username+"&password="+password,
                     
                    success:function(data)
                    {
                       $("#infoo").html(data);
                       $("#tulio").html(data);
                       
                       $("#fex").fadeOut(100);
                       $("#moro").fadeOut(100);
                       
                    },
                    
                    error:function(data)
                    {
                        $("#info").html(data);
                        
                        
                    }
                    
                    
                });
            }
                    
                    );
            
    });
        </script>
        <br><br>
        <div class="container-fluid">
            <div class="row" id="moro">
                <div class="col-md-4 col-md-offset-4">
                    <img src="images/henesy.jpg" width="200" height="100" class="img img-responsive img-rounded" id="mac">
                  
                </div>
                
            </div>
        
        <div id="fex" class="row">
           
            <div id="midd" class="form-group col-md-4 col-md-offset-3" >
                
                <label class="form-control" style=" text-align:  center; color:  #000099; font-size: 1.2em; background: #c43c35 ;">OLLYTEX</label>
                <label class="form-control" style=" background:  #c43c35; color: darkblue;">Username</label>
                <input type="text" name="usname" id="usname" class="form-control">
                <label class="form-control" style=" background:  #c43c35; color: darkblue;" >Password</label>
                <input type="password" name="pswd" id="pswd" class="form-control">
            
                <input type="button" value="login" id="save" class="btn bg-primary btn-lg" style=" background: #c43c35;">
            <div id="info"></div>
            
            </div>
            
        </div>
            <div class="col-md-4">
                <h3>nextweb.io</h3>
            </div>
        </div>
        <div id="tulio">
        </div>
        
        </script>
        
        <script>
           $("#mac").fadeIn(8000);
        </script>

      <script type="text/javascript">
	$("#flex").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"560",
			    position:"center"
			    
			    	
			}
			
			);
	</script>
        
        
    </body>
</html>
