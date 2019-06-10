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
        
                  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        
        $pnamex = $_POST['pname'];
        
        $set = "select pdate as date,invno as invoice,productname,qtyin,unitcost, qtyin * unitcost as debit,paid as credit,deposit,others as expenses,opbal as opbal,particulars from purchases where suppliername = '$pnamex'";
        $totals = "select sum(qtyin * unitcost) as purchases,sum(paid) as payments,sum(deposit) as deposits,sum(others) as expenses,sum(opbal) as opbal from purchases where suppliername = '$pnamex' group by suppliername";
        
        
        
        $res = mysql_query($set);
        $tessy = mysql_query($totals)or die('cant query');
        
        $tosin = mysql_fetch_assoc($tessy);
        $debit = $tosin['purchases'];
        $credit = $tosin['payments'];
        $deposit = $tosin['deposits'];
        $others = $tosin['expenses'];
        $bal = $tosin['opbal'];
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
    echo '<div class = "">';
 echo '<table id = "diaga" class = "table table-responsive table-bordered table-striped table-hover ">';
 
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
		echo number_format($row[$i],2);
                }
                
 else {
                    echo $row[$i];
 }
	}   echo '</td>';
	echo '</tr>';
        
       
}

 echo '<tr>';
 
 
 echo '<tr>';
        echo '<td>';
        echo 'Opening Balance';
        echo '</td>';
        echo '<td>';
        echo number_format($bal,2);
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
        echo 'Total Expenses';
        echo '</td>';
        echo '<td>';
        echo number_format($others,2);
        echo '</td>';
        echo '</tr>';
        
        
        $balx = $debit - $credit -$deposit+$others+$bal;
        
       echo '<tr>';
        echo '<td>';
        echo 'Total Balance';
        echo '</td>';
        echo '<td>';
        echo number_format($balx,2);
        echo '</td>';
        echo '</tr>';
echo '</table>';
echo '</div>';
        
        ?>
    </body>
</html>
