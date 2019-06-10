<?php session_start(); ?>
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
            
            
            td{
                
                font-size: 0.85em;
            }
        </style>
                                        
                                          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
               
‪<!-- Optional Bootstrap theme -->
‪
          <script src="js/bootstrap.min.js"></script>  
    </head>
    <body>
                                     <?php
                
        
    $zon = mysql_connect('localhost','ejhil_staff','kovachenko123');
    mysql_selectdb(ejhil_app);
    $user = $_SESSION['username'];
$wela = "select username,password,status,location from users where username = '$user'";
	$tas = mysql_query($wela);
	$message = "Access Denied";
	$vid = mysql_fetch_assoc($tas);
	
		$perm = $vid['status'];
                $loc = $vid['location'];
	
	
	//if($perm!='pharmacy') 
	//if($perm!='admin')
	//{   print '<div id = "jimi" class = "col-sm-4 col-md-6 col-lg-10">';
		//print '<h1>' .$message.'</h1>';
		//print '</div>';
		
		//exit();
	//}
        
        ?>
        
        
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app) or die('cant connect');
        
        $date = $_POST['date'];
        $customer = mysql_escape_string($_POST['customer']);
        $bal = $_POST['bal'];
        $dep = $_POST['dep'];
        $bpmt = $_POST['bpmt'];
        $others = $_POST['others'];
        $rec = $_POST['recno'];
        $recpt = $_POST['recpt'];
        $det = $_POST['det'];  
        $mkt = $_POST['mkt'];
        
          $ug = "select * from sales where phyrec = '$recpt'";
        $dxp = mysql_query($ug);
       $tar = mysql_num_rows($dxp);
        
        if($tar > 0)
        {
            echo '<h3>...'.$user.'.... This Receipt Number Has been used,OK.Update Denied'.'</h3>';
            return;
        }
        
 else {
        
        $setx = "insert into sales(sdate,salestype,productname,customername,opbal,deposit,paid,others,discount,pdisc,phyrec,details,recno,marketer)values('$date','payments','payments','$customer',0,0,'$bpmt','$others',0,0,'$recpt','$det','$rec','$mkt')";
        $due = "insert into cledger(ldate,transtype,customername,productname,qtyin,rate,deposit,paid,opbal,others,balance)values(curdate(),'opening balance','$customer','ob',0,0,0,0,0,0,'$bal')";
        $vbal = "insert into balances(customername,balance)values('$customer','$bal')";
        $rool = "insert into cuspays(pdate,customername,invno,amount,details)values(curdate(),'$customer','$recpt','$bpmt','$det')";
        $poke = "insert into audit(adate,jobtype,doneby,payment,customername,invno)values(curdate(),'Payment Entry','$user', '$bpmt', '$customer','$recpt')";
        //mysql_query($vbal) or die('cant insert into balances');
        mysql_query($due) or die('Cant open balance');
        $rew = mysql_query($setx) or die('cant insert');
        $yaw = mysql_query($rool)or die('cant insert payments');
        
        echo 'Records Inserted';
        
        
        $set = "select sdate as date,customername,productname,qtyout,unitprice, qtyout * unitprice as debit,paid as credit,deposit,others, 0.01 * qtyout * unitprice * discount as discount,0.01 * qtyout * unitprice * pdisc  as prodisc,phyrec,details,opbal from sales where customername = '$customer'";
        $totals = "select sum(qtyout * unitprice) as debit,sum(paid) as credit,sum(deposit) as deposit,sum(others) as others,sum(opbal) as bal,sum(0.01 * qtyout * unitprice * discount) as disc,sum(0.01 * qtyout * unitprice * pdisc) as prdisc from sales where customername = '$customer'";
        
        
        $res = mysql_query($set);
        $tessy = mysql_query($totals);
        
        $tosin = mysql_fetch_assoc($tessy);
        $debit = $tosin['debit'];
        $credit = $tosin['credit'];
        $deposit = $tosin['deposit'];
        $otherss = $tosin['others'];
        $xbal = $tosin['bal'];
        
        $discount = $tosin['disc'];
        $prod = $tosin['prdisc'];
        //echo $debit;
        //echo $credit,$deposit;
        $tus = "update balances set balance = balance - $bpmt";
        
        mysql_query($tus) or die('cant update balance');
        
              $rian = "select * from balances where customername = '$customer'";
 
 $arian = mysql_query($rian);
 
 $ras = mysql_fetch_assoc($arian);
 
 $cbal = $ras['balance'];
 
 
 //$rayy = $qty * $sprice;
 //$pmt = $payment;
 $newball = $cbal;
 //echo 'New Balance..............' .$newball;
 //$rayy = $qty * $rate;
 $rek = "insert into dbalance(bdate,invno,customername,sales,payment,balance)values(curdate(),'$recno','$customer',0,'$bpmt','$newball')";
 
 mysql_query($rek) or die('cant update dynamin balance');
 mysql_query($poke);
 
 //$edebt = $alldebt['amount'];
 //$rayy = $qty * $rate;
 //$tup = "update balances set balance = balance  - $bpmt where customername = '$customer'";
 //mysql_query($tup) or die('cant update balance');
        
        
 }  
        
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
echo '<td>';
echo 'Ledger For';
echo '</td>';

echo '<td>';
echo $customer;
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
        echo number_format($xbal,2);
        echo '</td>';
        echo '</tr>';
 
 
     
 
 
 
 
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
        echo number_format($otherss,2);
        echo '</td>';
        echo '</tr>';
        
        $tx = $discount + $prod;
        echo '<tr>';
        echo '<td>';
        echo 'Total Discount';
        echo '</td>';
        echo '<td>';
        echo number_format($tx,2);
        echo '</td>';
        echo '</tr>';
        
        
        
        
        
        $ball = $debit - $credit -$deposit +$otherss+$xbal -$tx;
        
       echo '<tr>';
        echo '<td>';
        echo 'Total Balance';
        echo '</td>';
        echo '<td>';
        echo number_format($ball,2);
        echo '</td>';
        echo '</tr>';
echo '</table>';
echo '</div>';
        
        
        
                
        ?>
        
        <?php 
        
        
        ?>
    </body>
</html>
