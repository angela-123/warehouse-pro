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
                                        
                                          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <style>
            #diag{
                
                background:  lightseagreen;
                
            }
        </style>
    </head>
    <body>
        <?php
         $ram = mysql_connect('localhost','ejhil_staff','kovachenko123');
         mysql_select_db(ejhil_app);
         
         $can = $_POST['cname'];
         $addres = $_POST['address'];
         $phone = $_POST['phone'];
         $email = $_POST['email'];
                 
          $seg = "insert into suppliers(suppliername,address,phoneno,email)values('$can','$addres','$phone','$email')"; 
          
          $res = mysql_query($seg);
          
          if($res)
          {
              echo 'Suppler Data Inserted';
          }
          
 else {
     
              echo 'No Data Inserted';
 }
 
 
 $rxd = "select * from suppliers";
 
 $res = mysql_query($rxd);
 
  $buns = mysql_num_fields($res);
  //echo '<div class = "col-sm-4 col-md-6 col-lg-8">';
 echo '<table class = "table table-responsive  table-striped table-hovered">';
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
        ?>
    </body>
</html>
