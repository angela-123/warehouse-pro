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
                font-family:  sans-serif;
                font-weight: normal;
                color:  #0f0f0f;
                font-size: .95em;
                border: 1px #1c94c4 solid;
            }
            
            td{
                
                border: #1b6d85 solid 1px;
            }
        </style>
                                 <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
                                        
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
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        $date = $_POST['date'];
        $supplier = $_POST['cname'];
        $product = $_POST['pname'];
        $qty = $_POST['qty'];
        $rate = $_POST['uprice'];
        $paid = $_POST['paid'];
        $recno = $_POST['rec'];
        $dep = $_POST['dep']; 
        $other = $_POST['other'];
        
        $yey = "insert into purchases(pdate,suppliername,productname,qtyin,unitcost,paid,deposit,others,recno)values('$date','$supplier','$product','$qty','$rate','$paid','$dep','$other','$recno')";
        
        $zade = mysql_query($yey)or die('cant insert');
        
 
 
 
 $tata = "select invno, productname,qtyin,unitcost,qtyin*unitcost as amount,paid,deposit,others from purchases where suppliername = '$supplier'";
 $res = mysql_query($tata) or die('cant display');
 
 
    $buns = mysql_num_fields($res);
    echo '<div class = "container-fluid">';
    echo '<div class = "row" >';
 echo '<table id = "" class = "table table-responsive table-bordered table-hover table-striped">';
 echo '<tr>';
 echo '<td>';
 echo $supplier;
 echo '</td>';
 echo '</tr>';
 
 
 echo '<tr>';
 echo '<td>';
 echo $recno;
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
        ?>
    </body>
</html>
