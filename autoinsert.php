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
        mysql_select_db(ejhil_app) or die('cant connect');
        $poo = "insert into dstock(productname,stock) select productname,stockbal from stock";
        
        mysql_query($poo) or die('cant query');
        
        echo 'End Of Inserts';
        ?>
    </body>
</html>
