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
        
        $month = $_POST['month'];
        $yr = $_POST['yr'];
        
        $rug = "select tdate as date,company,depositor,details as tellerno,bank,acctno,amount from btellers where monthname(tdate) = '$month' and year(tdate) = '$yr'";
        
        $soho = "select sum(amount) as total from btellers where monthname(tdate) = '$month'and year(tdate) = '$yr'";
        
        $zoho = mysql_query($soho);
        $roho = mysql_fetch_assoc($zoho);
        $total = $roho['total'];
        
        $res = mysql_query($rug);
        
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
echo 'Total Payment For The Month';
echo '</td>';

echo '<td>';
echo number_format($total,2);
echo '</td>';


echo '</tr>';
echo '</table>';
        
        
        ?>
    </body>
</html>
