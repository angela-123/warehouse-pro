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

       $vx = $_POST['cc'];

       $prose = "insert into costcenters(costcenter)values('$vx')";
       mysql_query($prose) or die('cant insert');

       $jx = "select * from costcenters where costcenter !=''";

       $res = mysql_query($jx);

              
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