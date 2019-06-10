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
        $cname = $_POST['cname'];
        $invoice = $_POST['invoice'];
        $paid = $_POST['paid'];
        
        $rup = "update sales set paid = '$paid' where phyrec = '$invoice'";
        if(mysql_query($rup))
        {
            echo 'Payment updated';
        }
        
 else {
     
            echo 'Payment not update';
 }
 
 $zang = "update cuspays set amount = '$paid' where invno = '$invoice'";
 
 if(mysql_query($zang))
 {
     echo 'Record updated';
 }
 
 
 else {
     
 
     echo 'Record Not Updated';
 }
        ?>
    </body>
</html>
