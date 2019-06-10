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
        
        $fex = "select productname,rate as unitprice,unitcost,stockbal, maxqty,stockbal-maxqty as difference from stock";
        
        $raf = "select sum(stockbal) as stock,sum(maxqty) as maxqty from stock";
        $missy = mysql_query($raf);
        $po = mysql_fetch_assoc($missy);
        $stockk = $po['stock'];
        $maxa = $po['maxqty'];
        
        
        
        $res = mysql_query($fex);
         
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


echo '<tr>';
echo '<td>';
echo 'Total Stock';
echo '</td>';

echo '<td>';
echo $stockk;
echo '</td>';



echo '</tr>';

echo '<tr>';
echo '<td>';
echo 'Total Maximum';
echo '</td>';
echo '<td>';
echo  $maxa;
echo '</td>';

echo '</tr>';
echo '</table>';
        ?>
    </body>
</html>
