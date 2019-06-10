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
                font-size: .85em;
                border: 0px #1c94c4 solid;
            }
            
            td{
                
                border: #1b6d85 solid 0px;
                font-size: .75em;
            }
            
            #zah{
                font-size: 0.75em;
            }
            
            
            .yili{
                
                font-size: 0.75em;
                color: darkred;
            }
            
            
            .bal{
                
                font-size: .75em;
                color:  black;
                    
            }
            
             li{
                
                text-align:center;
                color:  #000066;
                font-size: 1em;
                list-style:  none; 
                
            }
            
            h2{
                
                color: crimson;
            }
            
        </style>
                     
    </head>
    <body>
        
        
        <div class="row-fluid" title="AUTHORISED DEALERS OF">
            <div class="row-fluid" title="AUTHORISED DEALERS OF">
            <h3 style=" text-align: center;">OLLYTEX NIGERIA LIMITED</h3>
            
            <p style=" text-align: center;">(Dealers of all kinds of drinks,wine,alcoholic beverages and provisions)</p>
            <div class="clearfix" id="zah">
                    <div class="col-sm-3">
                        <div style=" text-align: left">
                            <b>Head Office:</b>
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
        
        $recno = $_POST['recno'];
        
        $uju = "select * from sales where recno = '$recno'";
        $ratu = mysql_query($uju);
        $nr = mysql_fetch_assoc($ratu);
        
        $newrec = $nr['recno'];
        $newcust = $nr['customername'];
        
        $fata = mysql_query($uju);
  $tata = "select productname,sum(qty) as qty,rate,sum(qty)*rate as amount from audit where invno = '$recno'  group by productname";
 
 $sisi = "select adate, productname,sum(qty * rate * 0.01 * discount) as discount from audit where invno = '$recno' group by invno";
 
 $tadau = "select customername, productname,sum(qty*rate)-sum(qty * rate * 0.01 * discount) as amount from audit where invno = '$recno' group by invno ";
 
 $data = "select productname,sum(qty * rate) as extended from audit where invno = '$recno' group by invno";
 $all = "select customername,doneby, productname,sum(qty) as qty,sum(qty * rate) as extended,sum(payment) as payment  from audit where invno = '$recno' group by invno";
 
 $tog = mysql_query($sisi);
 $fred = mysql_fetch_assoc($tog);
 
 $mydisc = $fred['discount'];
 $gadate = $fred['adate'];
 $tall = mysql_query($all);
 $debit = mysql_query($tadau) or die('cant chilli');
 $dall = mysql_fetch_assoc($tall);
 
 $extended = $dall['extended'];
 $payment = $dall['payment'];
 //$deposit = $dall['deposits'];
 //$others = $dall['others'];
 $qtall = $dall['qty'];
 $custname = $dall['customername'];
 $staff = $dall['doneby'];
 
 //$alldebt = mysql_fetch_assoc($debit);
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
 $pmt = $payment;
 $newball = $cbal + $rayy - $pmt;
 //echo 'New Balance..............' .$newball;
 //$rayy = $qty * $rate;
 $rek = "insert into dbalance(bdate,invno,customername,sales,payment,balance)values(curdate(),'$recno','$customer','$rayy','$pmt','$newball')";
 
 //mysql_query($rek) or die('cant update dynamin balance');
 
 //$edebt = $alldebt['amount'];
 //$rayy = $qty * $rate;
 $tup = "update balances set balance = balance + $rayy - $pmt where customername = '$customer'";
 //mysql_query($tup) or die('cant update balance');
 
 
 
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
 echo $newcust;
 echo '</td>';
 echo '</tr>';
 
 
 echo '<tr>';
 echo '<td>';
 echo 'Invoiced By';
 echo '</td>';
 echo '<td>';
 echo $staff;
 echo '</td>';
 echo '</tr>';
 
 
 
 
echo '<tr>';

echo '<tr>';
 echo '<td>';
 echo 'Date';
 echo '</td>';
 echo '<td>';
 echo $gadate;
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
echo "Total ";
echo '</td>';


echo '<td class = yili>';
echo number_format($extended,2);
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
//echo '<tr>';
//echo '<td class = bal>';
//echo "Total Discount";
//echo '</td>';

$fbal = $balance;
//echo '<td class = bal>';
//echo number_format($mydisc,2);
//echo '</td>';


echo '</tr>';



//echo '<tr>';
//echo '<td class = bal>';
//echo "Balance";
//echo '</td>';


//echo '<td class = bal>';
//echo number_format($fbal,2);
//echo '</td>';


//echo '</tr>';

echo '<tr>';
echo '<td>';
echo "Total Quantity";
echo '</td>';


echo '<td>';
echo number_format($qtall,2);
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



echo '<h6 align = "center">Thanks for your patronage </h6>';


echo '</tr>';
echo '<tr>';
 echo '<td>';
 echo 'Limit.............................';
 echo '</td>';
 echo '<td>';
 echo number_format($lim,2);
 echo '</td>';
 echo '</tr>';
//echo '</thead>';
echo '</div>';
        ?>
    </body>
</html>
