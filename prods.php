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
        
        $dept = $_POST['dept'];
        //$ref = "select * from stock";
        $ref = "select productname,stockbal,maxqty from stock where productname != 'payments' and dept = '$dept'  group by productname";
        $res = mysql_query($ref);
        
        $graf = "select sum(rate * stockbal) as stockworth,sum(unitcost * stockbal) as stockcost from stock";
 $graffa = mysql_query($graf);
 
 $rafa = mysql_fetch_assoc($graffa);
 
 $stwth = $rafa['stockworth'];
 $stcost = $rafa['stockcost'];
        
           $buns = mysql_num_fields($res);
           echo '<div class = "container-fluid">';
           echo '<div class = "row">';
    //echo '<div class = "col-md-6 col-md-offset-3">';
    //echo '<div class = "">';
 echo '<table class = "table table-responsive table-striped table-bordered table-hover ">';
 
 echo '<tr>';
 echo '<td>';
 echo 'STOCK REPORT FOR';
 echo '</td>';
 
 echo '<td>';
 echo $dept;
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


echo '</table>';
//echo '</div>';
//echo '</div>';
//echo '</div>';


        ?>
    </body>
</html>
