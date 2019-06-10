<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>
    <?php
     $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
     mysql_select_db(ejhil_app) or die('cant connect');

     $d1 = $_POST['d1'];
     $d2 = $_POST['d2'];

     $rtx = "select costcenter,sum(amount) as amount from expenses where date between '$d1' and '$d2' group by costcenter";

     $dx = "select sum(amount) as total from expenses where date between '$d1' and '$d2'";
     $tax = mysql_query($dx);
     $zx = mysql_fetch_assoc($tax);

     $total = $zx['total'];

     $res = mysql_query($rtx);

                   
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
echo 'Total Sales';
echo '</td>';
echo '<td>';
echo number_format($total,2);
echo '</td>';
echo '</tr>';
echo '</table>';


     ?>
    </body>
</html>