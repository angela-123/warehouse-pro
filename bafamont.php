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
            }
            
            td{
                border: 1px #255625 solid;
            }
        </style>
        
        
        
    </head>
    <body>
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        
        $pnamex = $_POST['pname'];
        $date = $_POST['date'];
        $yr = $_POST['yr'];
        
        $set = "select sdate as date,productname,recno as invoiceno,qtyout,unitprice, qtyout * unitprice as debit,paid as credit,deposit,others, 0.01 * qtyout * unitprice * discount as discount from sales where customername = '$pnamex' and monthname(sdate) = '$date' and year(sdate) = '$yr'";
        $totals = "select sum(qtyout * unitprice) as debit,sum(paid) as credit,sum(deposit) as deposit,sum(others) as others,sum(opbal) as bal,sum(0.01 * qtyout * unitprice * discount) as disc, sum(0.01 * qtyout * unitprice * pdisc) as prodisc from sales where customername = '$pnamex' and monthname(sdate) = '$date' and year(sdate) = '$yr'";
        
        
        $res = mysql_query($set);
        $tessy = mysql_query($totals);
        
        $tosin = mysql_fetch_assoc($tessy);
        $debit = $tosin['debit'];
        $credit = $tosin['credit'];
        $deposit = $tosin['deposit'];
        $others = $tosin['others'];
        $xball = $tosin['bal'];
        $rdisc = $tosin['disc'];
        
        $prodisc = $tosin['prodisc'];
        echo $rdisc;
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
echo 'Ledger For';
echo '</td>';

echo '<td>';
echo $pnamex;
echo '</td>';
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

//echo '<tr>';
       // echo '<td>';
       // echo 'Opening Balance';
        //echo '</td>';
        //echo '<td>';
        //echo number_format($xball,2);
        //echo '</td>';
        //echo '</tr>';



 echo '<tr>';
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
        
        $aldisc = $rdisc + $prodisc;
        
        echo '<tr>';
        echo '<td>';
        echo 'Total Discount';
        echo '</td>';
        echo '<td>';
        echo number_format($aldisc,2);
        echo '</td>';
        echo '</tr>';
        
        
        
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
