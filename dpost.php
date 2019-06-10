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
        <style>
            h3{
                
                color: darkred;
            }
        </style>
    </head>
    <body>
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        
        $dept = $_POST['dept'];
        $prod = $_POST['prod'];
        
        $tx = "update stock set dept = '$dept' where productname = '$prod'";
        mysql_query($tx) or die('cant update');
        
        echo '<h3>RECORD UPDATE,CLICK PREVIEW STOCK TO CONFIRM</h3>';
        ?>
    </body>
</html>
