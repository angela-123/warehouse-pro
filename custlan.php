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
        
        $cname = $_POST['cname'];
        
        $dex = "select sdate as date,recno as invoiceno,sum(opbal) as opbal,sum(qtyout * unitprice)-sum(0.01 * discount * qtyout *unitprice) as amount,sum(others)as expenses,paid as payment,sum(qtyout * unitprice)-sum(0.01 * qtyout * unitprice * discount)-sum(paid) as balance,sum(0.01 *discount * qtyout * unitprice) as discount,phyrec as receiptno,details from sales where customername = '$cname' group by recno,phyrec";
        
        $pex = "select sum(opbal) as opbal, sum(qtyout * unitprice)-sum(0.01 * discount * qtyout *unitprice) as amount,sum(paid) as payment,sum(qtyout * unitprice)-sum(0.01 * qtyout * unitprice * discount)-sum(paid)+sum(others) as balance,sum(0.01 *discount * qtyout * unitprice) as discount,phyrec as receiptno from sales where customername = '$cname' group by customername";
        
        $tes = mysql_query($pex);
        
        $yala = mysql_fetch_assoc($tes);
        $amt = $yala['amount'];
        $pmt = $yala['payment'];
        $bal = $yala['balance'];
        $disc = $yala['discount'];
        $bala = $yala['opbal'];
        $exp = $yala['expenses'];
        
        
        $res = mysql_query($dex);
        
        
         $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-striped table-bordered table-hover">';
                
               
                
                
                
                
                
           
                echo '<tr>';
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($res, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($res))
{
	echo '<tr>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td id = moko>';
		
		{
			echo '<nobr>'. $row2[$i] . '</nobr>';
		}
	}   echo '</td>';
        
	echo '</tr>';
        
    }
      
    
    
    
    echo '<tr>';
    echo '<td>';
    echo 'Opening Balance';
    echo '</td>';
    echo '<td>';
    echo number_format($bala,3);
    echo '</td>';
    
       
    
    echo '</tr>';
    
    
    
    
    
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Purchases';
    echo '</td>';
    echo '<td>';
    echo number_format($amt,3);
    echo '</td>';
    
       
    
    echo '</tr>';
    
   
    echo '<tr>';
    echo '<td>';
    echo 'Total Paymnet';
    echo '</td>';
    echo '<td>';
    echo number_format($pmt,3);
    echo '</td>';
    
       $tbal = $bal + $bala+$exp;
    
    echo '</tr>';
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Expenses';
    echo '</td>';
    echo '<td>';
    echo number_format($exp,3);
    echo '</td>';
    
       
    
    echo '</tr>';
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Balance';
    echo '</td>';
    echo '<td>';
    echo number_format($tbal,3);
    echo '</td>';
    
       
    
    echo '</tr>';
    
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Discount';
    echo '</td>';
    echo '<td>';
    echo number_format($disc,3);
    echo '</td>';
    
       
    
    echo '</tr>';
    
    
    echo '</table>';
 
        
        ?>
    </body>
</html>
