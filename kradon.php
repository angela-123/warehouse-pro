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
        $rate = $_POST['price'];
        
        $zap = "update products set unitcost = '$rate' where productname = '$pname'";
        $rap = "update stock set unitcost = '$rate' where productname = '$pname'";
        
        $dag = mysql_query($zap);
        $gop = mysql_query($rap);
        
        if($dag)
        {
            echo 'Cost Price Updated';
        }
        
 else {
            echo 'Cost Price Not Updated';
 }
        ?>
    </body>
</html>
