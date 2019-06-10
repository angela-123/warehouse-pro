<?php session_start();?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title>CUSTOMERS</title>
        <style>
            td{
                
                font-size:1em;
                font-weight: bold;
            }
        </style>
                                         
                                          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    </head>
    <body>


        
                 <?php      
     $don = mysql_connect('localhost','ejhil_staff','kovachenko123');
         mysql_select_db(ejhil_app) or die('cant connect');
    $user = $_SESSION['username'];
$wela = "select username,password,status,location from users where username = '$user'";
	$tas = mysql_query($wela);
	$message = "Access Denied, You Have No Business Here";
	$vid = mysql_fetch_assoc($tas);
	
		$perm = $vid['status'];
                $loc = $vid['location'];
	
	
	//if($perm!='pharmacy') 
	if($perm!='admin')
	{   print '<div id = "jimi" class = "col-sm-4 col-md-6 col-lg-10">';
		print '<h1><blink>' .$message.'</blink></h1>';
		print '</div>';
		
		exit();
	}
        
        ?>
        












        <?php
        
         $don = mysql_connect('localhost','ejhil_staff','kovachenko123');
         mysql_select_db(ejhil_app) or die('cant connect');
      
 $rax = "select customername,address,phoneno from customers where customername!=''";
 
 $res = mysql_query($rax);
 
 
  $buns = mysql_num_fields($res);
  echo '<div class = "container-fluid">';
  echo '<div class = "row">';
  echo '<div class = "col-md-6 col-md-offset-3">';
 
 echo '<table id = "diaga" class = "table table-responsive table-striped table-hover table-bordered">';
 echo '<tr>';
 echo '<td>';
 echo '<p>CUSTOMERS LIST</p>';
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
 
echo '</div>';
echo '</div>';
echo '</div>';
 
        ?>
    </body>
</html>
