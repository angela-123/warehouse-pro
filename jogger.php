<?php 
        
        session_start();
        ?>

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
        <style>
            #show{
                position:  absolute;
                top:150px;
                left: 300px;
                border: 1px;
                background:  #149bdf;
                width: 400px;
                height: 350px;
            }
            #btn{
               position:  relative;
               top: 100px;
               left: 100px;
               width: 200px;
               height: 100px;
               background:  #d59392;
            }
            
            
            h1{
                position:  absolute;
                left:  350px;
                top:350px;
                color:  darkred;
            }
            a{
                text-decoration: none;
                position:  absolute;
                top: 200px;
                left: 50px;
                font-size: 20pt;
                font-weight:  bold;
            }
            
            img{
                position:  relative;
                width: 350px;
                left: 20px;
                top:20px;
            }
        </style>
        
                                              
                                          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
 
    </head>
    <body>
         
        
        <div id="show" class="container-fluid">
            <div class="row col-sm-4 col-md-4">
            <h2 style="color: darkblue;">
             WELCOME <?php echo $_SESSION['username']; ?>
            </h2>
            <a href="mainza.php">CLICK TO CONTINUE</a>
            </div>
        </div>
        <?php
        // put your code here
        ?>
        
        
    </body>
</html>
