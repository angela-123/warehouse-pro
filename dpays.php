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
            td{
                
                font-size: 0.75em;
                font-style:  initial;
                font-weight: normal;
            }
        </style>
    </head>
    <body>
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app) or die('cant connect');
        
        $date = $_POST['date'];
        
        $water = "select pdate as date,customername,invno as receiptno,details,amount as payment from cuspays where pdate = '$date' and invno !=''";
        $tawo = "select pdate, sum(amount) as payment from cuspays where pdate = '$date' and invno !='' group by pdate";
        
        $ratan = mysql_query($tawo);
        
        $goof = mysql_fetch_assoc($ratan);
        
        $pmt = $goof['payment'];
        $date = $goof['pdate'];
        
        $res = mysql_query($water);
        
        $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-striped table-hover table-bordered">';
                
                echo '<h4>OLLYTEX NIGERIA LIMITED</H4>';
                echo '<h4>PAYMENT RECEIPTS FOR</h4>';
                echo '<h4>' .$date. '</h4>';
                
                
                
                
           
                echo '<tr>';
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($res, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($res))
{
	echo '<tr>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td id = moko>';
		
		{
			echo '<nobr>'. $row2[$i] . '</nobr>';
		}
	}   echo '</td>';
        
	echo '</tr>';
        
    }
      
    echo '<tr>';
    echo '<td>';
    echo 'Total Payment';
    echo '</td>';
    
    echo '<td>';
    echo number_format($pmt,2);
    echo '</td>';
    
    
    
    echo '</tr>';
    
   
    
    
    echo '</table>';
 
        
        
        
        ?>
    </body>
</html>
