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
        
        $cname = $_POST['cname'];
        
        
        $rex = "select bdate as date,invno as invoiceno,sales,payment,balance from dbalance where customername = '$cname'";
        
        $res = mysql_query($rex);
        
        
           $buns = mysql_num_fields($res);
    echo '<div class = "table-responsive">';
 echo '<table id = "diaga" class = "table table-responsive table-striped table-bordered">';
 
 
 
 
 
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
                if(is_numeric($row[$i]))
                {
		echo number_format($row[$i],2);
                }
                
 else {
                    echo $row[$i];
 }
	}   echo '</td>';
	echo '</tr>';
        
       
}

 
echo '</table>';
echo '</div>';
        
        
        
        ?>
    </body>
</html>
