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
        $zon = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_selectdb(ejhil_app);
        
        $pname = $_POST['pname'];
        $price = $_POST['price'];
        
        $sed = "update stock set stockbal = $price where productname = '$pname'";
        $ins = "insert into dstock(stdate,productname,opstock,qtyin,qtyout,stock)values(curdate(),'$pname',0,0,0,$price)";
        mysql_query($ins) or die('cant update dstock');
        if(mysql_query($sed))
        {
            echo 'Stock Updated';
        }
        
 else {
     
            echo 'Stock Not Updated';
 }
        ?>
    </body>
</html>
