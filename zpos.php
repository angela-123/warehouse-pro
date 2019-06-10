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
            
            
            .yili{
                
                font-size: 1.6em;
                color: darkred;
            }
            
            
            .bal{
                
                font-size: 1.3em;
                color:  darkblue;
                    
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
        $customer = $_POST['cname'];
        $customerr = mysql_escape_string($customer);
        $product = $_POST['pname'];
        $qty = $_POST['qty'];
        $rate = $_POST['uprice'];
        $paid = $_POST['paid'];
        $recno = $_POST['rec'];
        $dep = $_POST['dep'];
        $other = $_POST['other'];
        $stype = $_POST['stype'];
        $loc = $_POST['loc'];
        
        $dix = "select productname,dept,rate from products where productname = '$product'";
        $fad = mysql_query($dix);
        
        $go = mysql_fetch_assoc($fad);
        $sprice = $go['rate'];
        $dept = $go['dept'];
        
        $ox = "select productname,stockbal from stock where productname = '$product'";
        
        $box = mysql_query($ox);
        $vox = mysql_fetch_assoc($box);
        $gstock = $vox['stock'];
        $pstock =$gstock - $qty;
        
        $yey = "insert into sales(sdate,salestype,location,customername,productname,qtyout,unitprice,paid,deposit,others,recno)values('$date', '$stype','$loc','$customerr','$product','$qty','$sprice','$paid','$dept','$other','$recno')";
        $rans = "insert into trans(transdate,location,productname,qtyin,qtyout,opstock)values('$date', '$loc', '$product',0.0,'$qty',0.0)";
        $dstock = "insert into dstock(stdate,opstock,location,productname,qtyin,qtyout,stock)values('$date', 0,'$loc','$product','$qty',0,0)";
        
        $ups = "update stock set stockbal = stockbal - $qty  where productname = '$product' and location = '$loc'";
        mysql_query($ups) or die('cant update stock table');
        
        $zade = mysql_query($yey)or die('cant insert now');
        $trice = mysql_query($rans) or die('cant insert trans table');
        $raya = mysql_query($dstock) or die('cant update dynamic stock');
        
        if($zade)
        {
            //echo 'Data Inserted';
        }
        
 else {
            echo 'Data Not Inserted';
 }
 
 
 $tata = "select productname,sum(qtyout) as qty,unitprice,sum(qtyout*unitprice) as amount from sales where recno = '$recno'  group by productname";
 $data = "select productname,sum(qtyout * unitprice) as extended from sales where recno = '$recno' group by recno";
 $all = "select customername,productname,sum(qtyout * unitprice) as extended,sum(paid) as payment,sum(deposit) as deposits,sum(others) as others from sales where recno = '$recno' group by recno";
 $tall = mysql_query($all);
 
 $dall = mysql_fetch_assoc($tall);
 
 $extended = $dall['extended'];
 $payment = $dall['payment'];
 $deposit = $dall['deposits'];
 $others = $dall['others'];
 $balance = $extended -$payment ;
 $res = mysql_query($tata) or die('cant display');
 
 $sidi = mysql_query($data);
 $sid = mysql_fetch_assoc($sidi);
 
 $ext = $sid['extended'];
 
    $buns = mysql_num_fields($res);
    echo '<div class = "table-responsive">';
 echo '<table id = "diaga" class = "table col-sm-4 col-md-6 col-lg-7">';
 echo '<tr>';
 echo '<thead>';
 echo '<tr>';
 echo  '<h3 align = "center"> NWINCO ELECTRONICS NIGERIA LIMITED   </h3>';
 echo  '<h4 align = "center">Dealers In All Kind Of Electronics,Such As TV,Center Tables,Home Theater,Fan,Gens,Stabilizers,etc</h4>';
 echo  '<h4 align = "center">No.12/1314,Lagos Line,Electrical/Electronics International Market,Zuba,FCT,Abuja </h4>';
 echo '<h4 align = "center">08037037991 </h4>';
 echo '<h4 align = "center"><b>INVOICE</b> </h4>';
 
 
 echo '</tr>';
 echo '</thead>';
 
 echo '<tr>';
 
 echo '<td>';
 echo 'Customer Name';
 echo '</td>';
 
 
 echo '<td>';
 echo $customer;
 echo '</td>';
 echo '</tr>';
 
 
 echo '<tr>';
 echo '<td>';
 echo 'Invoice#';
 echo '</td>';
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
echo '<td class = yili>';
echo "Total Amount For Invoice";
echo '</td>';


echo '<td class = yili>';
echo number_format($ext,2);
echo '</td>';


echo '</tr>';






echo '<tr>';
echo '<td>';
echo "Payment";
echo '</td>';


echo '<td>';
echo number_format($payment,2);
echo '</td>';


echo '</tr>';






echo '<tr>';
echo '<td class = bal>';
echo "Balance";
echo '</td>';


echo '<td class = bal>';
echo number_format($balance,2);
echo '</td>';


echo '</tr>';





echo '</table>';
echo '<thead>';
echo '<tr>';
echo '<h5 align = "center">Received above goods in good condition </h5>';
echo '<h5 align = "center">No refund of money after payment </h5>';
echo '<h2 align = "center">Thanks for your patronage </h2>';


echo '</tr>';
echo '</thead>';
echo '</div>';
        ?>
        
        
    </body>
</html>
