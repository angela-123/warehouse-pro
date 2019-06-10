<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title>EJHIL CREDITORS</title>
                                        
                                          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    </head>

                                    <?php
                
        
         $zon = mysql_connect('localhost','ejhil_staff','kovachenko123');
    mysql_selectdb(ejhil_app);
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


    <body>
        
        <div class="container-fluid" style=" background: whitesmoke;">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                        
                        <?php 
                        $zon = mysql_connect('localhost','ejhil_staff','kovachenko123');
                         mysql_selectdb(ejhil_app);
                         
                         $tes = "select suppliername,sum(qtyin * unitcost) as extended,sum(paid) as payment,sum(others) as expenses, sum(deposit) as deposits,sum(opbal) as opbal,sum(unitcost * qtyin)-sum(paid)+sum(others)+sum(opbal)-sum(deposit)+sum(opbal) as balance from purchases group by suppliername";
                         
                          $tess = "select suppliername,sum(qtyin * unitcost) as extended,sum(paid) as payment,sum(others) as expenses,sum(deposit) as deposits,sum(unitcost * qtyin)-sum(paid)+sum(others)-sum(deposit)+sum(opbal) as balance from purchases  group by suppliername";
                         
                         $res = mysql_query($tes);
                         $yup = mysql_query($tess);
                         $roro = mysql_fetch_assoc($yup);
                         $purch = $roro['extended'];
                         $cnotes = $roro['creditnotes'];
                         $paid = $roro['payment'];
                         $exp = $roro['expenses'];
                         $deps = $roro['deposits'];
                         //$bala = $roro['balance'];
                         $bal = $purch -$paid - $exp+$deps;
                         
                          $buns = mysql_num_fields($res);
 
 echo '<table class = " table table-responsive table-striped table-bordered table-hover">';
 echo '<tr>';
 echo '<td>';
 echo 'EJHIL NIGERIA LIMITED:CREDITORS LIST';
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
echo 'Total Purchases';
echo '</td>';

echo '<td>';
echo number_format($purch,2);
echo '</td>';


echo '<tr>';
echo '<td>';
echo 'Total Credit Notes';
echo '</td>';

echo '<td>';
echo number_format($cnotes,2);
echo '</td>';


echo '</tr>';



echo '<tr>';
echo '<td>';
echo 'Total Payment';
echo '</td>';

echo '<td>';
echo number_format($paid,2);
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>';
echo 'Total Expenses';
echo '</td>';

echo '<td>';
echo number_format($exp,2);
echo '</td>';
echo '</tr>';


echo '<tr>';
echo '<td>';
echo 'Total Deposit';
echo '</td>';

echo '<td>';
echo number_format($deps,2);
echo '</td>';
echo '</tr>';



echo '<tr>';
echo '<td>';
echo 'Total Balance';
echo '</td>';

echo '<td>';
echo number_format($bal,2);
echo '</td>';
echo '</tr>';





echo '</table>';
 
        ?>
                         
                        
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
