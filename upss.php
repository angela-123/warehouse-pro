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
        
        $pname = $_POST['pname'];
        
        $ry = "select productname,rate,unitcost,stockbal from stock where productname = '$pname'";
        
        $res = mysql_query($ry);
        
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