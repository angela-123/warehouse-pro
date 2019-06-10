<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title>STOCK REPORT</title>
        
        <style>
            th{
                font-style:  italic;
                font-weight: normal;
                background: whitesmoke;
                font-weight: bolder;
            }
            
            td{
                
                background:white;
                color:  #000099;
                font-weight: bold;
                font-size: 1.3em;
            }
            
            
            label{
                
                background:  #c4e3f3;
            }
            
            #xira{
                
                background: white;
            }
        </style>
         <title></title>
                                        
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
                
        
         $zon = mysql_connect('localhost','ejhil_staff','kovachenko123');
    mysql_selectdb(ejhil_app);
    $user = $_SESSION['username'];
$wela = "select username,password,status,location from users where username = '$user'";
	$tas = mysql_query($wela);
	$message = "Access Denied, You Have No Business Here";
	$vid = mysql_fetch_assoc($tas);
	
		$perm = $vid['status'];
                $loc = $vid['location'];
	
	
	//if($perm!='pharmacy') 
	if($perm!='admin')
	{   print '<div id = "jimi" class = "col-sm-4 col-md-6 col-lg-10">';
		print '<h1><blink>' .$message.'</blink></h1>';
		print '</div>';
		
		exit();
	}
        
        ?>
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        
        
        //$ref = "select * from stock";
        $ref = "select customername,discount,limits from customers where customername !=''";
        $res = mysql_query($ref);
        
       // $graf = "select sum(rate * stockbal) as stockworth,sum(unitcost * stockbal) as stockcost from stock";
 //$graffa = mysql_query($graf);
 
 //$rafa = mysql_fetch_assoc($graffa);
 
 //$stwth = $rafa['stockworth'];
 //$stcost = $rafa['stockcost'];
        
           $buns = mysql_num_fields($res);
           echo '<div class = "container-fluid">';
           //echo '<div class = "row">';
    echo '<div class = "row">';
    echo '<div class = "col-md-3">';
    echo '<label class = "form-control">EJHIL CUSTOMERS</label>';
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
		//echo '<a href = #'. $row[$i]> .'</a>'; 
                echo '<a href = # class = xira>' .$row[$i].'</a>' ;
	}   echo '</td>';
	echo '</tr>';
}

//echo '<tr>';
        //echo '<td>';
        //echo 'Tota Stock Worth.............';
        //echo '</td>';
        
         //echo '<td>';
        //echo number_format($stwth);
        //echo '</td>';
        
        
        //echo '</tr>';
        
        //echo '<br>';
        
        //echo '<tr>';
        //echo '<td>';
        //echo 'Tota Stock Cost.............';
        //echo '</td>';
        
         //echo '<td class = "vili">';
        //echo number_format($stcost);
        //echo '</td>';
        
        
        
echo '</table>';
echo '<div>';
echo '</div class = "col-md-5">';
echo '<div id = "preview">';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';


        ?>
        
        
        <script>
            $(document).ready(function(){
                
                $(".xira").click(function(){
                    
                    
                    alert(new Date());
                    
                });
                
                
            });
        </script>
        
    </body>
</html>
