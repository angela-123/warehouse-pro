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
    </head>
    <body>
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        
        $ninv = $_POST['ninv'];
        $inv = $_POST['inv'];
        $sname = $_POST['sname'];
        
        
        $dash = "update purchases set invno = '$ninv' where invno = '$inv' and suppliername = '$sname'";
        
        $red = mysql_query($dash);
        
        echo 'Recorded Updated';
        
        
        ?>
    </body>
</html>
