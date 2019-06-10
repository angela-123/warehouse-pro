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
                
                background: #c4e3f3;
                font-size: 1.2em;
                font-weight: normal;
                color: orangered;
            }
            
            
            td{
                
                color: darkblue;
                border: 1px #c7ddef solid;
                font-size: 0.75em;
            }
            
            .tulipp{
                border: 1px #000099 solid;
            }
        </style>
                                               
                                   
 
    </head>
    <script>
        $(document).ready(function(){
            $('.tulip').bind('click',function(){
              
              
              var invoice = $(this).attr('id');
              
              $.ajax({
                   type:"post",
                        url:"proinv.php",
                        data:"invoice="+invoice,
                        
                        success:function(data)
                        {
                            $("#faya").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#faya").html('Not Connected');
                        }
                  
              });
                
            });
            
        });
    </script>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        $datex = $_POST['date'];
      
        $tef = "select recno as invoiceno,customername,staffname as invoicedby, sum(qtyout-returns) * unitprice - sum(0.01 * (qtyout-returns) * unitprice*discount) as totalsales,sum(paid) as payment,sum(qtyout-returns) * unitprice-sum(0.01 * (qtyout-returns) * unitprice * discount) -sum(paid) as balance from sales  where sdate = '$datex' And staffname!='0'  group by recno";
        
        $ras = "select sdate,productname,staffname, sum(qtyout-returns) * unitprice-sum(qtyout-returns) * unitprice *0.01 *discount  as total,sum(paid) as payment,sum(0.01 * (qtyout-returns) * unitprice * discount) as tdiscount,sum(qtyout-returns) * unitprice-sum(0.01 * (qtyout-returns) * unitprice *discount)-sum(paid) as totbalance from sales where sdate = '$datex' And staffname!='0'  group by sdate";
        
        $tand = mysql_query($ras) or die('cant query');
        
        $daf = mysql_fetch_assoc($tand);
        
        $gtotal = $daf['total'];
        $payment = $daf['payment'];
        $bal = $daf['totbalance'];
        $disc = $daf['tdiscount'];
        $date = $daf['sdate'];
        
        $res = mysql_query($tef) or die('Cant query');
        
                           $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-striped table-borderd table-hover">';
                echo '<h4>OLLYTEX</h4>';
                echo '<h4>DAILY INVOICE REPORT</h4>';
                echo '<h4>'  .$date .'</h4>';
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
		echo '<td>';
		
		{      
			echo '<button  class = "tulip" id='.$row2[$i].  '>' .$row2[$i] . '</button>';
		}
	}   echo '</td>';
	echo '</tr>';
        
        
        
    }
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Sales For The Day';
    echo '</td>';
    echo '<td>';
    echo number_format($gtotal,2);
    echo '</td>';
    
    
    echo '</tr>';
    
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Cash Sales';
    echo '</td>';
    echo '<td>';
    echo number_format($payment,2);
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
    
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Discount';
    echo '</td>';
    echo '<td>';
    echo number_format($disc,2);
    echo '</td>';
    
    
    echo '</tr>';
    
    
     
    echo '</table>';
        
 
          
        
        
        ?>
        
        
        </div>
                
            </div>
            
        </div>
    </body>
</html>
