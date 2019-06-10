<?php session_start(); ?>
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
            h1{
                
                font-weight:  bolder;
                font-size: 1.7em;
                color: darkred;
            }
        </style>
    </head>
              
        
                       
        
        
        
                              <?php
                
        
         $zon = mysql_connect('localhost','ejhil_staff','kovachenko123');
    mysql_selectdb(ejhil_app);
    $user = $_SESSION['username'];
$wela = "select username,password,status,location from users where username = '$user'";
	$tas = mysql_query($wela);
	$message = "Access Denied, You Have No Business Here";
	$vid = mysql_fetch_assoc($tas);
	
		$perm = $vid['status'];
                $loc = $vid['location'];
	
	
	//if($perm!='pharmacy') 
	if($perm!='admin')
	{   print '<div id = "jimi" class = "col-sm-4 col-md-6 col-lg-10">';
		print '<h1><blink>' .$message.'</blink></h1>';
		print '</div>';
		
		exit();
	}
        
        ?>
        
    
    <body>
        <?php
        $zon = mysql_connect('localhost','magnelli_staff','kovachenko123');
        mysql_selectdb(magnelli_app);
        
        $product = $_POST['prod'];
        $customer = $_POST['customer'];
        $qty = $_POST['qty'];
        $retqty = -$qty;
        $rate = $_POST['price'];
        $recno = $_POST['recno'];
        $disc = $_POST['disc'];
        
        $check = "select * from products where productname = '$product'";
        
        $rask = mysql_query($check);
        
        $rdat = mysql_fetch_assoc($rask);
        $price = $rdat['rate'];
        
        $yey = "insert into sales(sdate,productname,customername,qtyout,unitprice,paid,discount,recno)values(curdate(),'$product', '$customer', '$retqty','$price',0,'$disc', '$recno')";
        $rans = "insert into trans(transdate,productname,qtyin,qtyout,opstock,recno)values('$today', '$product',0.0,'$retqty',0.0,'$recno')";
        $dstock = "insert into dstock(stdate,productname,qtyin,qtyout,stock)values('$date','$product','$retqty',0,0)";
        
        $ups = "update stock set stockbal = stockbal + $qty where productname = '$product'";
        mysql_query($ups) or die('cant update stock table');
        
        $zade = mysql_query($yey)or die('cant insert now');
        $trice = mysql_query($rans) or die('cant insert trans table');
        
        
        
        $ox = "select productname,location,stockbal from stock where productname = '$product'";
        
        $box = mysql_query($ox);
        $vox = mysql_fetch_assoc($box);
        $gstock = $vox['stockbal'];
        
        $fiu = "insert into dstock(stdate,productname,opstock,qtyin,qtyout,stock)values('$date','$product',0.0,'$qty',0.0,$gstock)";
        
        mysql_query($fiu) or die('cant insert into stock counter');
        
        
        
        
        
        $rian = "select * from balances where customername = '$customer'";
 
 $arian = mysql_query($rian);
 
 $ras = mysql_fetch_assoc($arian);
 
 $cbal = $ras['balance'];
 $rayy = $qty * $price- $qty * 0.01 * $disc *$price;
 $pmt = $payment;
 $newball = $cbal + $rayy;
 $tup = "update balances set balance = balance + $newball  where customername = '$customer'";
 mysql_query($tup) or die('cant update balance');
 
 echo 'New Balance..............' .$newball;
 //$rayy = $qty * $rate;
 
 $rek = "insert into dbalance(bdate,invno,customername,sales,payment,balance)values(curdate(),'$recno','$customer','$rayy',0,'$newball')";
 
 mysql_query($rek) or die('cant update dynamic balance');
 
 //$edebt = $alldebt['amount'];
 //$rayy = $qty * $rate;
 //$tup = "update balances set balance = balance + $rayy  where customername = '$customer'";
 //mysql_query($tup) or die('cant update balance');
 
 
        
        
        
        
        echo '<h2> PRODUCTS RETURNED TO STOCK, CUSTOMERS LEDGER ADJUSTED</h2>';
        
        
        
        ?>
    </body>
</html>
