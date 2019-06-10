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
      $user = $_SESSION['username'];
      
      $supname = $_POST['supname'];
      $invoice = $_POST['invoice'];
      
      
      $yaz = "select pdate as date,productname,qtyin,unitcost, qtyin * unitcost as Amount from purchases where suppliername = '$supname' and invno = '$invoice'";
      
      $tags = "select sum(qtyin * unitcost) as total from purchases where suppliername = '$supname' and invno = '$invoice'";
      $taf = mysql_query($tags);
      
      $hook = mysql_fetch_assoc($taf);
      $total = $hook['total'];
      
      $res = mysql_query($yaz);
      
      
      
        
  $buns = mysql_num_fields($res);
 
 echo '<table id = "diaga" class = " table table-responsive table-striped table-bordered table-hover">';
 echo '<tr>';
 echo '<td>';
 echo 'Supplier Name';
 echo '</td>';
 echo '<td>';
 echo $supname;
 echo '</td>';
 
 
 echo '</tr>';
 
 echo '<tr>';
 echo '<td>';
 echo 'Invoice#';
 echo '</td>';
 echo '<td>';
 echo $invoice;
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

echo '<tr>';
 echo '<td>';
 echo 'Grand Total';
 echo '</td>';
 echo '<td>';
 echo number_format($total,2);
 echo '</td>';
 
 
 echo '</tr>';
 


echo '</table>';
      
      
      
        ?>
    </body>
</html>
