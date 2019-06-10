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
 
        <style>
            th{
                color:  #122b40;
                border: 1px #1c94c4 solid;
                
            }
            
            
            td{
                border: 1px #8c8c8c solid;
                color:  blueviolet;
            }
            
        </style>
    </head>
    <body>
        <?php
         //require 'connection.php';
         $don = mysql_connect('localhost','ejhil_staff','kovachenko123');
         mysql_select_db(ejhil_app) or die('cant connect');
         $can = $_POST['cname'];
         $addres = $_POST['address'];
         $phone = $_POST['phone'];
         $email = $_POST['email'];
         $limit = $_POST['limit'];
         $disc = $_POST['disc'];
                 
          $seg = "insert into customers(customername,address,phoneno,email,limit,discount)values('$can','$addres','$phone','$email','$limit','$disc')"; 
          $regg = "insert into customers(customername,address,phoneno)values('$can','$addres','$phone')";
          $rey = mysql_query($regg) or die('cant insert into customers');
          
          if($rey)
          {
              echo 'Customer Data Inserted';
          }
          
 else {
     
              echo 'No Data Inserted';
 }
 
 
 $rax = "select customername,address from customers where customername!=''";
 
 $res = mysql_query($rax);
 
 
  $buns = mysql_num_fields($res);
 
 echo '<table id = "diaga" class = "table table-responsive table-striped" table-bordered>';
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
