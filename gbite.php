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
            td{
                color: black;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <?php
              $zon = mysql_connect('localhost','ejhil_staff','kovachenko123');
    mysql_selectdb(ejhil_app);
    $date = $_POST['date'];
    $cname = $_POST['cname'];
    $pname = $_POST['pname'];
    $rate = $_POST['rate'];
    $qty = $_POST['qty'];
    $invoice = $_POST['invoice'];
    
    $gask = "insert into luq(date,invoice,productname,qty,rate,customername)values('$date', '$invoice', '$pname','$qty','$rate','$cname')";
    mysql_query($gask) or die('cant insert');
    
    $set = "select date,productname,qty,rate,qty * rate as amount,invoice from luq where customername = '$cname' and qty > 0";
    
    $zade = "select sum(qty * rate) as total from luq where customername = '$cname' group by customername";
    
    $load = mysql_query($zade);
    $zoid = mysql_fetch_assoc($load);
    $total = $zoid['total'];
    
    $res = mysql_query($set);
    
                                            $buns = mysql_num_fields($res);
        
         echo '<table id = "diaga" class = " table table-responsive table-striped table-bordered table-hover">';
         echo '<tr>';
         echo '<td>';
         echo 'Statement Of Account For';
         echo '</td>';
         echo '<td>';
         echo $cname;
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
		echo $row[$i];
	}   echo '</td>';
	echo '</tr>';
}

echo '<tr>';
echo '<td>';
echo 'Total';
echo '</td>';
echo '<td>';
echo number_format($total,2);
echo '</td>';
echo '</tr>';
echo '</table>';
    
    
    
        ?>
    </body>
</html>
