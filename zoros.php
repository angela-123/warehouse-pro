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
        
        $invoice = $_POST['invoice'];
        $pname = $_POST['pname'];
        $cname = $_POST['cname'];
        $qty = $_POST['qty'];
        $qtyy = -$_POST['qty'];
        $date = $_POST['date'];
        $price = $_POST['price'];
        $disc = $_POST['disc'];
        $pmt = $_POST['pmt'];
        $pmtt = -$pmt;
        $rep = "insert into sales(sdate,customername,productname,qtyout,unitprice,discount,paid,recno)values('$date','$cname','$pname','$qtyy','$price','$disc', '$pmtt', '$invoice')";
        $royo = "insert into returns(rdate,productname,discount,qty,unitprice,customername,invno)values('$date','$pname', '$disc', '$qty','$price','$cname','$invoice')";
        $titi = "update stock set stockbal = stockbal + $qty where productname = '$pname'";
        //$raf = "insert into dstock(stdate,customername,invno,productname,opstock,returns,qtyin,qtyout,stock)values('$date','$cname','$invoice','$pname'0,'$qty',0,0,'')";
        $saf = mysql_query($titi);
        $ra = mysql_query($royo) or die('cant upadte returns');
        $solo = mysql_query($rep) or die('Cant Insert');
        
        $rag = "select * from stock where productname = '$pname'";
        
        $miss = mysql_query($rag);
        $zoro = mysql_fetch_assoc($miss);
        
        $stock = $zoro['stockbal'];
        
        $raf = "insert into dstock(stdate,customername,invno,productname,opstock,returns,qtyin,qtyout,stock)values('$date','$cname','$invoice','$pname',0,'$qty',0,0,'$stock')";
        if($solo)
        {
            echo 'Inserted';
        }
        
        
 else {
            echo 'Not Inseted';
 }
 
 $rfg = mysql_query($raf) or die('cant insert');
        ?>
    </body>
</html>
