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
        $zonn = mysql_connect('localhost','staff','angela');
        mysql_select_db(ejhil_app);
        $mnt = $_POST['mnt'];
        $yr = $_POST['yr'];
        
        $sla = "select rdate as date, edate as enterydate,customername,productname,invno as invoice,qty,unitprice,discount from returns where monthname(rdate) = '$mnt' and year(rdate) = '$yr' and qty + unitprice + discount >0";
        
        $res = mysql_query($sla);
        
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
