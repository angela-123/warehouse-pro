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
        <title></title>
        <style>
            th{
                border:1px #aaa solid;
                color:  navy;
            }
            
            td{
                border: 1px #255625 solid;
                font-size: 1em;
                font-weight: bolder;
            }
            
            
            .maya{
                
                font-size: 1.3em;
                color:  #000099;
            }
            
            
            .luger{
                
                font-size: 1.5em;
                color: red;
                font-weight:  bolder;
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
        
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        
        $pnamex = $_POST['pname'];
        
        $set = "select customername, sum(qtyout * unitprice) as debit,sum(paid) as credit,sum(deposit) as deposit,sum(others) as others,sum(opbal) as openingbal,sum(qtyout * unitprice)+sum(opbal)-sum(paid)+sum(others) -sum(deposit)-sum(qtyout * unitprice * 0.01 * discount) as debt,sum(qtyout * unitprice * 0.01 * discount) as discount  from sales  group by customername";
        $totals = "select sum(qtyout * unitprice) as debit,sum(paid) as credit,sum(deposit) as deposit,sum(others) as others,sum(opbal) as bal from sales ";
        
        
        $res = mysql_query($set);
        $tessy = mysql_query($totals);
        
        $tosin = mysql_fetch_assoc($tessy);
        $debit = $tosin['debit'];
        $credit = $tosin['credit'];
        $deposit = $tosin['deposit'];
        $others = $tosin['others'];
        $xball = $tosin['bal'];
        //echo $debit;
        //echo $credit,$deposit;
        if($res) 
        {
            //echo 'Ledger';
        }
        
 else {
            echo 'Nopee';
 }
 
 
    $buns = mysql_num_fields($res);
    echo '<div class = "container-fluid">';
 echo '<table class = "table table-responsive table-striped table-bordered">';
 
 echo '<tr>';
echo '<td class = "maya">';
echo 'Debtors List';
echo '</td>';

echo '<td>';
echo $pnamex;
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

echo '<tr>';
        echo '<td>';
        echo 'Opening Balance';
        echo '</td>';
        echo '<td>';
        echo number_format($xball,2);
        echo '</td>';
        echo '</tr>';



 echo '<tr>';
        echo '<td>';
        echo 'Total Debit';
        echo '</td>';
        echo '<td>';
        echo number_format($debit,2);
        echo '</td>';
        echo '</tr>';
        
        
        echo '<tr>';
        echo '<td>';
        echo 'Total Credit';
        echo '</td>';
        echo '<td>';
        echo number_format($credit,2);
        echo '</td>';
        echo '</tr>';
        
        echo '<tr>';
        echo '<td>';
        echo 'Total Deposit';
        echo '</td>';
        echo '<td>';
        echo number_format($deposit,2);
        echo '</td>';
        echo '</tr>';
        
        echo '<tr>';
        echo '<td>';
        echo 'Other Expenses';
        echo '</td>';
        echo '<td>';
        echo number_format($others,2);
        echo '</td>';
        echo '</tr>';
        
        
        
        
        
        
        $bal = $debit - $credit -$deposit +$others +$xball;
        
       echo '<tr>';
        echo '<td class = "luger">';
        echo 'Total Debt';
        echo '</td>';
        echo '<td class = "luger">';
        echo number_format($bal,2);
        echo '</td>';
        echo '</tr>';
echo '</table>';
echo '</div>';
        
        ?>
    </body>
</html>
