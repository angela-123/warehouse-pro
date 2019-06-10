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
            .liki{
                
                font-weight: bolder;
                color: darkred;
                font-size: 1.5em;
            }
        </style>
                                   
                                         
 <script src="libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script src="libs/jquery-ui-1.10.0.custom.min.js"></script>
        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
         $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        
        $pnamex = mysql_escape_string($_POST['customer']);
        
        $set = "select sdate as date,productname,qtyout,unitprice, qtyout * unitprice as debit,paid as credit,deposit,others,opbal as opbal from sales where customername = '$pnamex'";
        $totals = "select sum(qtyout * unitprice) as debit,sum(paid) as credit,sum(deposit) as deposit,sum(others) as others,sum(opbal) as bal,sum(0.01 * qtyout * unitprice * discount) as discount,sum(0.01 * qtyout * unitprice * pdisc) as pdiscount from sales where customername = '$pnamex'";
        
        
        $res = mysql_query($set);
        $tessy = mysql_query($totals);
        
        $tosin = mysql_fetch_assoc($tessy);
        $debit = $tosin['debit'];
        $credit = $tosin['credit'];
        $deposit = $tosin['deposit'];
        $others = $tosin['others'];
        $xbal = $tosin['bal'];
        $zdisc = $tosin['discount'];
        $prdisc = $tosin['pdiscount'];
        //echo $debit;
        //echo $credit,$deposit;
        if($res)
        {
            //echo 'Ledger';
        }
        
 else {
            echo 'Nopee';
 }
 
 
    $buns = mysql_num_fields($res);
    //echo '<div class = "table-responsive">';
 echo '<table class = "table table-responsive table-striped-table-bordered">';
 
 echo '<tr>';
echo '<td>';
echo 'Ledger For';
echo '</td>';

echo '<td>';
echo $pnamex;
echo '</td>';
echo '</tr>';
 
 
 

 echo '<tr>';
 
 
        echo '<td>';
        echo 'Opening Balance';
        echo '</td>';
        echo '<td>';
        echo number_format($xbal,2);
        echo '</td>';
        echo '</tr>';
 
 
 
        echo '<td>';
        echo 'Total Debit';
        echo '</td>';
        echo '<td>';
        echo number_format($debit,2);
        echo '</td>';
        echo '</tr>';
        
        
        echo '<tr>';
        echo '<td>';
        echo 'Total Credit';
        echo '</td>';
        echo '<td>';
        echo number_format($credit,2);
        echo '</td>';
        echo '</tr>';
        
        echo '<tr>';
        echo '<td>';
        echo 'Total Deposit';
        echo '</td>';
        echo '<td>';
        echo number_format($deposit,2);
        echo '</td>';
        echo '</tr>';
        
        echo '<tr>';
        echo '<td>';
        echo 'Other Expenses';
        echo '</td>';
        echo '<td>';
        echo number_format($others,2);
        echo '</td>';
        echo '</tr>';
        
        $ydisc = $prdisc + $zdisc;
        echo '<tr>';
        echo '<td>';
        echo 'Total Discount';
        echo '</td>';
        echo '<td>';
        echo number_format($ydisc,2);
        echo '</td>';
        echo '</tr>';
        
        
        
        
        
        
        $bal = $debit - $credit -$deposit +$others + $xbal - $zdisc - $prdisc;
        
       echo '<tr>';
        echo '<td class = "liki">';
        echo 'Total Balance';
        echo '</td>';
        echo '<td class = "liki">';
        echo number_format($bal,2);
        echo '</td>';
        echo '</tr>';
echo '</table>';
//echo '</div>';
        
        ?>
    </body>
</html>
