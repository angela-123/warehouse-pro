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
        
        $tar = "select * from products where productname = '$pname'";
        
        $res = mysql_query($tar);
        
        $dr = mysql_fetch_assoc($res);
        
        $price = $dr['rate'];
        //echo $price;
        echo '<h4>Current Price For .......' .$pname. '......is...........' .  number_format($price,2) .'<h4>'; 
        
        ?>
    </body>
</html>
