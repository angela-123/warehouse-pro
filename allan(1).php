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
                
                font-style:  italic;
                font-weight: normal;
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
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app) or die('cant connect');
        
        $date = $_POST['date'];
        $customer = $_POST['customer'];
        $bal = $_POST['bal'];
        $dep = $_POST['dep'];
        $bpmt = $_POST['bpmt'];
        $others = $_POST['others'];
        $rec = $_POST['recno'];
        
        $cex = "insert into balances(customername,balance)values('$customer','$bal')";
        $due = "insert into cledger(ldate,transtype,customername,productname,qtyin,rate,deposit,paid,opbal,others,balance)values(curdate(),'opening balance','$customer','ob',0,0,0,0,'$bal',0,'$bal')";
        $setx = "insert into sales(sdate,salestype,productname,customername,opbal,deposit,paid,others,discount,pdisc,recno)values(curdate(),'payments','payments','$customer','$bal',0,0,0,0,0,'$rec')";
        $sety = "insert into dbalance(bdate,customername,sales,payment,balance)values(curdate(),'$customer',0,0,'$bal')";
        
        
        $raz = mysql_query($cex);
        $roni = mysql_query($due);
        $boni = mysql_query($setx);
        $zidi = mysql_query($sety) or die('cant insert into dbalance');
        
        //echo $debit;
        //echo $credit,$deposit;
        
  
        
        
        $eye = "select customername, opbal as openingbalance from cledger where opbal >0";
        $res = mysql_query($eye);
        if($res)
        {
            //echo 'Ledger';
        }
        
 else {
            echo 'Nopee';
 }
 
 
    $buns = mysql_num_fields($res);
    echo '<div class = "table-responsive">';
 echo '<table id = "diaga" class = "table table-responsive table-striped table-bordered">';
 
 
 
 
 
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

 
echo '</table>';
echo '</div>';
        
        
        
                
        ?>
        
        <?php 
        
        
        ?>
    </body>
</html>
