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
        
        $cname = $_POST['cname'];
        $amt = $_POST['amt'];
        
        $first = "update balances set balance = '$amt' where customername = '$cname'";
        $fash = mysql_query($first);
        
        $second = "insert into dbalance(bdate,customername,sales,payment,balance)values(curdate(),'$cname',0,0,'$amt')";
        $cash = mysql_query($second) or die('Cant select');
        
        if($fash)
        {
            echo 'Balance Updated';
        }
        
 else {
     
            echo 'Balance Not Updated';
 }
 
 
 if($cash)
 {
     echo 'Balance By Date Updated';
 }
 
 else {
     echo 'Balance By date not updated';
 }
 
 $sales = "insert into sales(sdate,customername,productname,opbal)values(curdate(),'$cname','payments','')";
 
 //mysql_query($sales) or die('cant insert into sales');
        
        ?>
    </body>
</html>
