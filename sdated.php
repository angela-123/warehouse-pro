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
        $zon = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_selectdb(ejhil_app);
        
        $date = $_POST['date'];
        echo $date;
        
        
        
        $yaya = "select invno as invoice , stdate as date,productname,opstock,qtyin,qtyout,returns,stock from dstock where stdate = '$date' group by productname,invno  ";

        //$yaya = "select productname,sum(opstock) + sum(qtyin) -sum(qtyout) - sum(returns) as stock from dstock where stdate = '$date' group by productname";
        
        
        $res = mysql_query($yaya) or die('cant select');
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
