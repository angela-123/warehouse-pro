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
        
        $rxt = "select sdate,customername,productname,qtyout as qty,returns,sum(qtyout-returns) as qtyout,unitprice,sum((qtyout-returns) * unitprice) as amount,discount,recno from sales where recno = '$invoice' group by productname";
        //$rxt = "select productname,sum(qtyout-returns) as qty,discount,unitprice,sum(qtyout-returns)*unitprice-sum((qtyout-returns) * unitprice * 0.01 * discount) as amount from sales where recno = '$invoice'  group by productname";
        $res = mysql_query($rxt);
        
          $buns = mysql_num_fields($res);
 
 echo '<table id = "diaga" class = " table table-responsive table-striped table-bordered table-hover">';
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
echo '</table>';
        ?>
    </body>
</html>
