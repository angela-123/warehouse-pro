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
                
                color: red;
            }
        </style>
    </head>
    <body>
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        
        $invoice = $_POST['invoice'];
        $pname = $_POST['pname'];
        $cname = $_POST['cname'];
        $price = $_POST['price'];
        $disc = $_POST['disc'];
        
        $zab = "update sales set unitprice = '$price',discount = '$disc' where recno = '$invoice' and customername = '$cname' and productname = '$pname'";
        
        $rux = mysql_query($zab) or die('Records Not Updated');
        echo '<h3><blink>RECORD UPDATED</blink></h3>';
        ?>
    </body>
</html>
