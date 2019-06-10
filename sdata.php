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
        
        $sname = $_POST['sname'];
        $phone = $_POST['phone'];
        $acct = $_POST['acct'];
        $bank = $_POST['bank'];
        
        $red = "insert into bsuppliers(supplier,phoneno,bank,acctno)values('$sname','$phone','$bank','$acct')";
        
        $zas = mysql_query($red);
        
        $rex = "select * from bsuppliers";
        
        $res = mysql_query($rex);
        
        
        
        
        
        
        
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
