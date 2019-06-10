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
                font-family: Arial Black;
                font-weight: bolder;
                color:black;
                font-size: 0.95em;
                border: 0px #1c94c4 solid;
            }
            
            td{
                
                border: #1b6d85 solid 0px;
                font-size: 0.75em;
                font-family: Arial Black;
                font-weight: bold;
                color: black;
            }
            
            .col-sm-3{
                font-family: calibri;
                font-size: 0.85em;
                font-weight: bold;
            }
            
            
            .yili,.bal{
                
                font-size: 1em;
                color: black;
                font-family: Arial Black;
            }
            
            
            .bal{
                
                font-size: 1em;
                color:  black;
                    
            }
            
            #zah{
                font-size: 0.65em;
                font-weight: bold;
            }
            
             li{
                
                text-align:center;
                color:  #000066;
                font-size: .65em;
                list-style:  none; 
                font-family: tahoma;
                color: black;
                
                
            }
            
            h2{
                
                color: crimson;
            }
            .lag{
                font-size: 1.5em;
                font-weight: bold;
            }
        </style>
                                        
 
    </head>
    <body>
        <div class="row-fluid" title="AUTHORISED DEALERS OF">
            <h3 style=" text-align: center;">OLLYTEX NIGERIA LIMITED</h3>
            
            <p style=" text-align: center;">(Dealers of all kinds of drinks,wine,alcoholic beverages and provisions)</p>
            <div class="clearfix" id="zah">
                    <div class="col-sm-3">
                        <b>Head Office:</b><br>
                        <div style=" text-align: left">
                            Shop 087,Zuba Main Market,
                            Zuba,Abuja
                            08055106444,08134876652
                            07041909902,07060946803
                        </div>
                        
                
                    </div>
                    
                    <div class="col-sm-3">
                        <b>Branch Offices:</b><br>
                        Shop LS7,Kado Fish Market
                        Kado,Abuja
                        08165678318
                        
                    </div>
                
                      <div class="col-sm-3">
                          Shop 14,Wada Aliyu Street.
                          Garki Modern Market,Garki
                          Abuja.
                          07040041150
                        
                    </div>  
                    <div class="col-sm-3">
                          Shop 3,Block A20,
                          Section A,Wuse Market,Abuja
                          08069037127
                        
                    </div>
                
                </div>
            </div>
        
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app) or die('cant connect');
        
        $product = $_POST['pname'];
        $qty = $_POST['qty'];
        $rate = $_POST['rate'];
        $paid = $_POST['pmt'];
        $recno = $_POST['recno'];
        $user = $_POST['user'];
        $disk =$_POST['disc'];
        
        $loc = $_POST['loc'];
        $customer = mysql_escape_string($_POST['customer']);
        
        $rayo = "select * from customers where customername = '$customer'";
        
        $tf = mysql_query($rayo);
        
        $drx = mysql_fetch_assoc($tf);
        
        $lim = $drx['limit'];
        
        
         $mydate = "select curdate() as tdate";
        $rdate = mysql_query($mydate);
        $zdate = mysql_fetch_assoc($rdate);
        $today = $zdate['tdate'];
        
        $dix = "select productname,dept,rate,discount from products where productname = '$product'";
        $fad = mysql_query($dix);
        
        $go = mysql_fetch_assoc($fad);
        $sprice = $go['rate'];
        $dept = $go['dept'];
        $disc = $go['discount'];
        
        //$ox = "select productname,location,stockbal from stock where productname = '$product'";
        
        //$box = mysql_query($ox);
        //$vox = mysql_fetch_assoc($box);
        //$gstock = $vox['stockbal'];
        //$pstock = $gstock - $qty;
        
        
        $cust = "select * from customers where customername = '$customer'";
        
        //$cxt = mysql_query($cust);
        //$rax = mysql_fetch_assoc($cxt);
        
        //$cdisc = $rax['discount'];
        
        $chx = "select * from stock where productname = '$product'";
        $chxx = mysql_query($chx);
        $dxr = mysql_fetch_assoc($chxx);
        
        $stock = $dxr['stockbal'];
        
        if($qty > $stock)
        {
            echo '<blink><h2>Product Out Of Stock,Or The Current Qty Exceeds Current Stock</h2></blink>';
            echo '<blink><h2> Available stock is.......'.$stock.'</h2></blink>';
        }
        
 else {
        
        $yey = "insert into sales(sdate,productname,customername,qtyout,unitprice,paid,discount,staffname,recno)values(curdate(),'$product', '$customer', '$qty','$sprice','$paid','$disk', '$user', '$recno')";
        $rans = "insert into trans(transdate,productname,qtyin,qtyout,opstock,recno)values(curdate(), '$product',0.0,'$qty',0.0,'$recno')";
        $dstock = "insert into dstock(stdate,productname,qtyin,qtyout,stock)values(curdate(),'$product',0,'$qty',0)";
        $poke = "insert into audit(adate,jobtype,doneby,productname,qty,rate,payment,discount,customername,invno)values(curdate(),'Sales Entry','$user','$product','$qty','$sprice', '$paid','$disk', '$customer','$recno')";
        $cstock = "insert into cledger(ldate,transtype,customername,productname,qtyin,rate,deposit,paid,opbal)";
        $ups = "update stock set stockbal = stockbal - $qty where productname = '$product'";
        mysql_query($ups) or die('cant update stock table');
        
        $zade = mysql_query($yey)or die('cant insert now');
        $trice = mysql_query($rans) or die('cant insert trans table');
        
        
        $ox = "select productname,stockbal from stock where productname = '$product'";
        
        $box = mysql_query($ox);
        $vox = mysql_fetch_assoc($box);
        $gstock = $vox['stockbal'];
        
        $fiu = "insert into dstock(stdate,customername,invno,productname,opstock,qtyin,qtyout,stock)values(curdate(),'$customer','$recno', '$product',0.0,0.0,'$qty',$gstock)";
        
        mysql_query($fiu) or die('cant insert into stock counter');
        
        mysql_query($poke) or die('No Auditing');
        
 }
        
 //}
        if($zade)
        {
            //echo 'Data Inserted';
        }
        
 else {
           echo 'Data Not Inserted';
 }
 
 
 $tata = "select productname,sum(qtyout) as qty,discount,unitprice,sum(qtyout*unitprice)-sum(qtyout * unitprice * 0.01 * discount) as amount from sales where recno = '$recno' And qtyout > 0 group by productname";
 
 $sisi = "select productname,sum(qtyout * unitprice * 0.01 * discount) as discount from sales where recno = '$recno' group by recno";
 
 $tadau = "select customername, productname,sum(qtyout*unitprice)-sum(qtyout * unitprice * 0.01 * discount) as amount from sales where recno = '$recno' group by recno ";
 
 $data = "select productname,sum(qtyout * unitprice) as extended from sales where recno = '$recno' group by recno";
 $all = "select productname,sum(qtyout) as qty,sum(qtyout * unitprice) as extended,sum(paid) as payment,sum(deposit) as deposits,sum(others) as others  from sales where recno = '$recno' group by recno";
 
 $tog = mysql_query($sisi);
 $fred = mysql_fetch_assoc($tog);
 
 $mydisc = $fred['discount'];
 $tall = mysql_query($all);
 $debit = mysql_query($tadau) or die('cant chilli');
 $dall = mysql_fetch_assoc($tall);
 
 $extended = $dall['extended'];
 $payment = $dall['payment'];
 $deposit = $dall['deposits'];
 $others = $dall['others'];
 $qtall = $dall['qty'];
 
 $alldebt = mysql_fetch_assoc($debit);
 //$edebt = $alldebt['amount'];
 //$tup = "update balances set balance = balance + $edebt where customername = '$customer'";
 //mysql_query($tup) or die('cant update balance');
 
 $edebt = $alldebt['amount'];
 //mysql_query($rek) or die('cant update balance');
 //echo 'Total is.........' .$edebt;
 //echo 'Customer--------------' .$customer;
 $rian = "select * from balances where customername = '$customer'";
 
 $arian = mysql_query($rian);
 
 $ras = mysql_fetch_assoc($arian);
 
 $cbal = $ras['balance'];
 $rayy = $qty * $sprice;
 $prodisc = $qty *$sprice * 0.01 * $disc;
 $pmt = $payment;
 
 
     $rax = "update balances set balance = balance - $paid where customername = '$customer'";
     mysql_query($rax);
     $era = "select * from balances where customername = '$customer'";
     
     $mera = mysql_query($era);
     
     $dera = mysql_fetch_assoc($mera);
     
     $fball = $dera['balance'];
     
      $rekia = "insert into dbalance(bdate,invno,customername,sales,payment,balance)values(curdate(),'$recno','$customer',0,0,'$fball')";
      mysql_query($rekia);
      $gbal = $fball - $paid;
      $rekid = "insert into dbalance(bdate,invno,customername,sales,payment,balance)values(curdate(),'$recno','$customer',0,0,'$gbal')";
      //mysql_query($rekid);
 
 //$dt = "select curdate() as tdate";
 //$minsk = mysql_query($dt);
 //$xt = mysql_fetch_assoc($minsk);
 //$todai = $xt['tdate'];
 //echo $todai;
     

 $newball = $cbal + $rayy- $paid-$prodisc;
 //echo 'New Balance..............' .$newball;
 //$rayy = $qty * $rate;
 
 $rust = "update balances set balance = '$cbal'-$pmt-$rayy - $prodisc where customername = '$customer'";
 mysql_query($rust);
 
 $udo = "select * from balances where customername = '$customer' ";
 
 $x = mysql_query($udo);
 $y = mysql_fetch_assoc($x);
 
 $rball = $y['balance'];
 $rek = "insert into dbalance(bdate,invno,customername,sales,payment,balance)values(curdate(),'$recno','$customer','$rayy','$pmt','$newball')";
 
 mysql_query($rek) or die('cant update dynamin balance');
 
 //$edebt = $alldebt['amount'];
 //$rayy = $qty * $rate;
 $tup = "update balances set balance = balance + $rayy - $pmt where customername = '$customer'";
 mysql_query($tup) or die('cant update balance');
 
 
 
 $balance = $extended-$payment;
 $res = mysql_query($tata) or die('cant display');
 
 $sidi = mysql_query($data);
 $sid = mysql_fetch_assoc($sidi);
 
 $ext = $sid['extended'];
 
    $buns = mysql_num_fields($res);
    echo '<div>';
 echo '<table class = "table table-striped">';
 //echo '<tr>';
 echo '<thead>';
 //echo '<th>';
 //echo  '<h4 align = "center">EJHIL NIG.LTD. </h4>';
 //echo  '<h5 align = "center">Liquor Centre,Manufacturers Representatives,Merchandising,Suppliers,General Contractors</h5>';
 //echo  '<h5 align = "left">HEAD OFFICE</h5>' .'<nobr>';
 //echo  '<h5 align = "left">SHOP LS, 1194 ZUBA INTERNATIONAL MKT.</h5>'; 
 //echo  '<h5 align = "left">P.O.BOX 218, Gwagwalada, Area Council</h5>';
 //echo  '<h5 align = "left">08035047002,08074979776</h5>';
 //echo  '<h5 align = "left">07045161003,08188169198</h5>';
 //echo '<h4 align = "center"> </h4>';
 //echo '<h4 align = "center"><b>Credit</b> </h4>';
 
 //echo '<div class = "clearfix">';
 //echo '<div class = "pull-left">';                                                                                     
 
                                                                                                                  
                
 
 echo '<tr>';
 echo '<td>';
 echo 'Invoice#';
 echo '</td>';
 echo '<td>';
 echo $recno;
 echo '</td>';
 echo '</tr>';
 
 
 
 echo '<tr>';
 echo '<td>';
 echo 'Customername';
 echo '</td>';
 echo '<td>';
 echo $customer;
 echo '</td>';
 echo '</tr>';
 
 
 echo '<tr>';
 echo '<td>';
 echo 'Invoiced By';
 echo '</td>';
 echo '<td>';
 echo $user;
 echo '</td>';
 echo '</tr>';
 
 
 
 
echo '<tr>';

echo '<tr>';
 echo '<td>';
 echo 'Date';
 echo '</td>';
 echo '<td>';
 echo $today;
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
		echo '<td id = "zloho">';
                if(is_numeric($row[$i]))
                {
		echo $row[$i];
                }
 else {
                    echo $row[$i];
 }
	}   echo '</td>';
	echo '</tr>';
}
echo '<tr>';
echo '<td class = yili>';
echo "Total ";
echo '</td>';


echo '<td class = yili>';
echo number_format($ext,2);
echo '</td>';


echo '</tr>';






echo '<tr>';
echo '<td>';
echo "Total Payment";
echo '</td>';


echo '<td>';
echo number_format($payment,2);
echo '</td>';


echo '</tr>';


//echo '<tr>';
////echo '<td>';
//echo "Total Deposit";
//echo '</td>';


//echo '<td>';
//echo number_format($deposit,2);
//echo '</td>';


//echo '</tr>';

$totdisc = 0.01 * $cdisc * $extended + $mdisc;
echo '<tr>';
echo '<td class = bal>';
echo "Total Discount";
echo '</td>';

$fbal = $balance - $mydisc;
echo '<td class = bal>';
echo number_format($mydisc,2);
echo '</td>';


echo '</tr>';



echo '<tr>';
echo '<td class = bal>';
echo "Balance";
echo '</td>';


echo '<td class = bal>';
echo number_format($fbal,2);
echo '</td>';


echo '</tr>';

echo '<tr>';
echo '<td>';
echo "Total Quantity";
echo '</td>';


echo '<td>';
echo $qtall;
echo '</td>';


echo '</tr>';





echo '</table>';
echo '<h5 align = "right">Customer Sign...........................       Storekeeper Sign................. Manager`s Sign ...........</h5>';
  //echo '<h6 align = "center"> * * * *   Customer Sign*     *   *     Store Keeper`Sign    *     *    *     *           Manager`s Sign</h6>';
echo '<thead>';
echo '<tr>';
echo '<hr>';
                                                    
echo '<h5 align = "center">Received above goods in good condition </h5>';
echo '<h5 align = "center">No refund of money after payment </h5>';

//echo '<h5 align = "center">Motto:Gods time the best </h5>';

echo '<h6 align = "center">Thanks for your patronage </h6>';


echo '</tr>';

//echo '</thead>';
echo '</div>';
        ?>
        
        
    </body>
</html>
