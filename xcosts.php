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
        
        $pane = "select productname,unitcost from products where productname !='' ";
        
        $res = mysql_query($pane);
        
                   $buns = mysql_num_fields($res);
           echo '<div class = "container-fluid">';
           //echo '<div class = "row">';
    echo '<div class = "row">';
    echo '<div class = "col-md-6">';
    echo '<label class = "form-control">PRICE LIST</label>';
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
		//echo '<a href = #'. $row[$i]> .'</a>'; 
                echo '<a href = priceupdate.php class = xira>' .$row[$i].'</a>' ;
	}   echo '</td>';
	echo '</tr>';
}

//echo '<tr>';
        //echo '<td>';
        //echo 'Tota Stock Worth.............';
        //echo '</td>';
        
         //echo '<td>';
        //echo number_format($stwth);
        //echo '</td>';
        
        
        //echo '</tr>';
        
        //echo '<br>';
        
        //echo '<tr>';
        //echo '<td>';
        //echo 'Tota Stock Cost.............';
        //echo '</td>';
        
         //echo '<td class = "vili">';
        //echo number_format($stcost);
        //echo '</td>';
        
        
        
echo '</table>';
echo '<div>';
echo '</div class = "col-md-5">';
echo '<div id = "preview">';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';


        ?>
    </body>
</html>
