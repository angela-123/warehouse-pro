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
        $cname = $_POST['cname'];
        $invoice = $_POST['invoice'];
        $paid = $_POST['paid'];
        
        
        $rad = "select sdate,customername,paid,phyrec as invoice from sales where phyrec = '$invoice'";
        
        $res = mysql_query($rad);
        
                 $buns = mysql_num_fields($res);
 
 echo '<table id = "diaga" class = " table table-responsive table-striped table-bordered table-hover">';
 
 echo '<tr>';
 echo 'Record In Ledger';
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
        
        
        ?>
        
        <?php
        
        $rt = "select pdate,customername,invno,amount from cuspays where invno = '$invoice'";
        
        $rer = mysql_query($rt);
                        $bunns = mysql_num_fields($rer);
 
 echo '<table id = "diaga" class = " table table-responsive table-striped table-bordered table-hover">';
 echo '<tr>';
 echo 'Record In Payments Table';
 echo '</tr>';
echo '<tr>';
for($i = 0;$i<$bunns;$i++)
{
	echo '<th>' .mysql_field_name($rer, $i).'</th>';
}
echo '</tr>';

while ($row1 = mysql_fetch_row($rer))
{
	echo '<tr>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td>';
		echo $row1[$i];
	}   echo '</td>';
	echo '</tr>';
}
echo '</table>';
        
        
        ?>
    </body>
</html>
