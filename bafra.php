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
            th{
                border:1px #aaa solid;
                font-weight: normal;
                font-weight:bold;
                color:black;
                background:orange;

            }
            
            td{
                border: 2px black solid;
                font-size: 1em;
                color:black;
                font-weight:bold;
            }
        </style>
        

        
    </head>
    <body>
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        
        $pnamex = mysql_escape_string( $_POST['pname']);
        $d1 = $_POST['dte'];
        $d2 = $_POST['endte'];
        
        
        $set = "select sdate,productname,recno as invoiceno,qtyout,returns,unitprice, qtyout * unitprice as debit,paid as credit,deposit,others as expenses,phyrec,details, 0.01 * qtyout * unitprice * discount as discount, 0.01 * qtyout * unitprice * pdisc as prdisc,opbal from sales where customername = '$pnamex' and sdate between '$d1' and '$d2'";
        //$totals = "select sum((qtyout-returns) * unitprice)) as debit,sum(returns * unitprice) as retamt,sum(paid) as credit,sum(deposit) as deposit,sum(others) as others,sum(opbal) as bal,sum(0.01 * qtyout * unitprice * discount) as disc,sum(0.01 * returns * unitprice * discount) as retdisc, sum(0.01 * qtyout * unitprice * pdisc) as prodisc from sales where customername = '$pnamex' and sdate between '$d1' and '$d2'";
        $totals = "select sum((qtyout-returns) * unitprice) as debit,sum(paid) as credit,sum(deposit) as deposit,sum(others) as others,sum(opbal) as bal,sum(0.01 * (qtyout-returns) * unitprice * discount) as disc, sum(0.01 * (qtyout-returns) * unitprice * pdisc) as prodisc from sales where customername = '$pnamex' and sdate between '$d1' and '$d2'";
        
        
        $res = mysql_query($set);
        $tessy = mysql_query($totals);
        
        $tosin = mysql_fetch_assoc($tessy);
        $debit = $tosin['debit'];
        $credit = $tosin['credit'];
        $deposit = $tosin['deposit'];
        $others = $tosin['others'];
        $xball = $tosin['bal'];
        $rdisc = $tosin['disc'];
        $retamt = $tosin['retamt'];
        $retdisc = $tosin['retdisc'];
        
        $prodisc = $tosin['prodisc'];
        //echo $rdisc;
        //echo $credit,$deposit;
        if($res)
        {
            //echo 'Ledger';
        }
        
 else {
            echo 'Nopee';
 }
 
 
    $buns = mysql_num_fields($res);
    echo '<div class = "table-responsive">';
 echo '<table id = "diaga" class = "table table-responsive table-striped table-bordered">';
 
 echo '<tr>';
echo '<td>';
echo 'Transaction Records For';
echo '</td>';

echo '<td>';
echo $pnamex;
echo '</td>';
echo '</tr>';

echo '<td>';
echo 'Between';
echo '</td>';
echo '<td>';
echo $d1;
echo '</td>';
echo '</tr>';
echo '<td>';
echo 'And';
echo '</td>';
//echo '</tr>';
echo '<td>';
echo $d2;
echo '</td>';
echo '</tr>';
echo '</tr>';
 
 
 
echo '<tr>';
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($res, $i).'</th>';
}
echo '</tr>';


while ($row = mysql_fetch_row($res))
{
	echo '<tr>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td>';
                if(is_numeric($row[$i]))
                {
		echo $row[$i];
                }
                
 else {
                    echo $row[$i];
 }
	}   echo '</td>';
	echo '</tr>';
        
       
}

echo '<tr>';
        echo '<td>';
        echo 'Opening Balance';
        echo '</td>';
        echo '<td>';
        echo number_format($xball,2);
        echo '</td>';
        echo '</tr>';



 echo '<tr>';
        echo '<td>';
        echo 'Total Purchases';
        echo '</td>';
        echo '<td>';
        echo number_format($debit,2);
        echo '</td>';
        echo '</tr>';
        
        
        echo '<tr>';
        echo '<td>';
        echo 'Total Payment';
        echo '</td>';
        echo '<td>';
        echo number_format($credit,2);
        echo '</td>';
        echo '</tr>';
        
        echo '<tr>';
        echo '<td>';
        echo 'Total Deposits';
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
        
        $aldisc = $rdisc + $prodisc;
        
        echo '<tr>';
        echo '<td>';
        echo 'Total Discount';
        echo '</td>';
        echo '<td>';
        echo number_format($aldisc,2);
        echo '</td>';
        echo '</tr>';
        


       


        $probal = $rdisc+$prodisc+$retamt+$retdisc;
        
        //$bal = $debit - $credit -$deposit +$others+$xball - $probal;
        $bal = $debit - $credit -$deposit +$others+$xball - $rdisc - $prodisc;
       echo '<tr>';
        echo '<td>';
        echo 'Total Balance';
        echo '</td>';
        echo '<td>';
        echo number_format($bal,2);
        echo '</td>';
        echo '</tr>';
echo '</table>';
echo '</div>';
        
        ?>
    </body>
</html>
