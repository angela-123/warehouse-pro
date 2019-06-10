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
    </head>
    <body>
        <?php
         $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app) or die('cant connect');
        
        $date =$_POST['date'];
        $cname =$_POST['cname'];
        $dep = $_POST['dep'];
        $bname = $_POST['bname'];
        $acctno = $_POST['acctno'];
        $details = $_POST['details'];
        $amt = $_POST['amt'];
        
        
        $rxs ="insert into btellers(tdate,company,depositor,acctno,bank,amount,details)values('$date','$cname','$dep','$acctno','$bname','$amt','$details')";
        
        $reds = mysql_query($rxs) or die('cant insert');
        
        $dex = "select tdate as date,company,acctno as accountno,depositor,details as tellerno,bank,amount from btellers where tdate = '$date' and company ='$cname'";
        
        $res = mysql_query($dex);
        
        
                                $buns = mysql_num_fields($res);
        
         echo '<table id = "diaga" class = " table table-responsive table-striped table-bordered table-hover">';
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
