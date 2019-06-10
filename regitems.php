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
                font-size: 1.1em;
                width: 40%;
                border: 0px #c0c0c0 solid;
                font-weight: normal;
                background:  #49afcd;
            }
            
            td{
                font-size: 0.95em;
                color:darkblue;
                font-weight:  bold;
                border:1px #adadad solid;
            }
            
            
            .vili{
                
                font-size: 2em;
                color:  #990033;
            }
            
            
            input[type = "text"]
            {
                font-size: 0.85em;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        
        $bcode = $_POST['bcode'];
        $pname = $_POST['pname'];
        $sub = $_POST['subdep'];
        $dep = $_POST['dep'];
        $rate = $_POST['rate'];
        $ucost = $_POST['ucost'];
        $opstock = $_POST['opstock'];
        $disc = $_POST['disc'];
        
        $rak = "insert into stock(productname,dept,rate,unitcost,stockbal)values('$pname', '$dep','$rate','$ucost','$opstock')";
        $stock = "insert into products(productname,dept,rate,unitcost,discount)values('$pname','$dep','$rate','$ucost','$disc')";
        $sales = "insert into trans(transdate,productname,qtyin,qtyout,opstock)values(curdate(),'$pname',0.0,0.0,'$opstock')";
        $dstock = "insert into dstock(stdate,productname,returns,qtyin,qtyout,opstock,stock)values(curdate(),'$pname',0,0,0,'$opstock','$opstock')";
        
        
        $fes = mysql_query($rak)or die('cant insert into stock');
        $tax = mysql_query($stock) or die('cant insert into products');
        $ros = mysql_query($sales) or die('cant update trans');
        $vlac = mysql_query($dstock) or die('cant insert into dstock');
        
        if($fes)
        { 
            echo '';
        }
        
 else {
            echo '';
 }
 
 $zak = "select productname,dept,rate,unitcost,discount from products ";
 $graf = "select sum(rate * stockbal) as stockworth,sum(unitcost * stockbal) as stockcost from stock";
 $graffa = mysql_query($graf);
 
 //$rafa = mysql_fetch_assoc($graffa);
 
 $stwth = $rafa['stockworth'];
 $stcost = $rafa['stockcost'];
         
 $res = mysql_query($zak);
 
   $buns = mysql_num_fields($res);
 
 echo '<table id = "diaga" class = "table table-responsive table-striped">';
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
