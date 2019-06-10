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
        
        $pname = $_POST['pname'];
        $loc = $_POST['loc'];
        
        $zas = "select * from stock where productname = '$pname'";
        
        $res = mysql_query($zas);
        
        $kolo = mysql_fetch_assoc($res);
        
        $stock = $kolo['stockbal'];
        
        echo 'Stock Balance Is.......' .$stock;
        
        
        ?>
    </body>
</html>
