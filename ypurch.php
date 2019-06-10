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
                font-weight: bolder;
                font-size: 1.2em;
                color: darkred;
            }
            
            td{
                
                border: 1px #adadad solid;
                color: darkblue;
                font-style:  italic;
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
        mysql_select_db(ejhil_app);
        
        //$date = $_POST['date'];
        $yr = $_POST['yr'];
        
        $dex = "select pdate,suppliername,productname,qtyin,unitcost,qtyin * unitcost as amount,paid,deposit,others from purchases where  YEAR(pdate) = '$yr'";
        $tara = "select pdate, sum(qtyin) as qtysold,sum(qtyin*unitcost) as sales,sum(paid) as payment,sum(deposit) as deposits,sum(others) as others from purchases where YEAR(pdate) = '$yr' group by pdate";
        $mum = mysql_query($tara);
        
        $zobo = mysql_fetch_assoc($mum);
        $totqty = $zobo['qtysold'];
        $totsales = $zobo['sales'];
        $pmt = $zobo['payment'];
        $dpx = $zobo['deposits'];
        $othx = $zobo['others'];
        
        
        $res = mysql_query($dex);
        
        if($res)
        {
            //echo 'Preview Returned Data';
        }
 else {
     
            echo 'No Data Returned';
 }
 
    $buns = mysql_num_fields($res);
    echo '<div class = "table-responsive table-striped">';
 
 echo '<table id = "diaga" class = " table col-sm-4 col-md-6 col-lg-8">';
 echo '<tr>';
 echo '<td>';
 echo 'Purchases For';
 echo '</td>';
 
 //echo '<td>';
 //echo $date;
 //echo '</td>';
 //echo '</tr>' .'<br>';
 
 
 echo '<td>';
 echo $yr;
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
		echo number_format($row[$i]);
                }
                
 else {
                    echo $row[$i];
 }
	}   echo '</td>';
	echo '</tr>';
}


echo '<tr>';
echo '<td>';
echo 'Total Purchases';
echo '</td>';
echo '<td>';
echo number_format($totsales,2);
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo 'Total Cash Purchases';
echo '</td>';
echo '<td>';
echo number_format($pmt,2);
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>';
echo 'Total Deposits';
echo '</td>';
echo '<td>';
echo number_format($dpx,2);
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>';
echo 'Other Expenses';
echo '</td>';
echo '<td>';
echo number_format($othx,2);
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>';
echo 'Total Quantity';
echo '</td>';
echo '<td>';
echo $totqty;
echo '</td>';
echo '</tr>';

echo '</table>';
 
echo '</div>';
 
 
        ?>
    </body>
</html>
