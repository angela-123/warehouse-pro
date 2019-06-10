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
                        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
               
‪<!-- Optional Bootstrap theme -->
‪
          <script src="js/bootstrap.min.js"></script>  
    </head>
    <body>
        <?php 
$zon = mysql_connect('localhost','luminexl_staff','kovachenko123');
    mysql_selectdb(luminexl_app);
$user = $_SESSION['username'];
$wela = "select username,password,page from users where username = '$user'";
	$tas = mysql_query($wela);
	$message = "Access Denied";
	while ($vid = mysql_fetch_assoc($tas))
	{
		$perm = $vid['page'];
	}
	
	if($perm!='pharmacy') 
        {
	if($perm!='admin')
	{   print '<div id = "jim">';
		//print '<h1>' .$message.'</h1>';
		//print '</div>';
		
		//exit();
	}
        }

?>
        <div class="container-fluid">
            <div class="row">
        <div class="col-md-6">
            <table  class="table table-responsive table-striped table-bordered table-hover" style=" border: 0px #d3d3d3 solid;">
            <?php
            
             $san = mysql_connect('localhost','luminexl_staff','kovachenko123');
        mysql_select_db(luminexl_app);
            
            
                  $ede = "select * from staff";
        
        $res = mysql_query($ede) or die('cant query');
        //$file_path = 'http://localhost/shopping/images/';
        //$src = $file_path.$row['passport'];
        $file_path = 'images/';
        while($row = mysql_fetch_assoc($res))
        {
            
            $src = $file_path.$row['passport'];
            echo '<tr>';
            echo '<td>';
            echo 'Passport';
            echo '</td>';
            echo '<td>';
            echo "<img  src = ".$src." width = 150 height = 150><br>"; 
            echo '</td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td>';
            echo 'Staff Name';
            echo '</td>';
            echo '<td>';
            echo $row['staffname']; 
            echo '</td>';
            echo '</tr>';
            
            
            
            
            
            
            echo '<tr>';
            echo '<td>';
            echo 'Address';
            echo '</td>';
            echo '<td>';
            echo $row['address']; 
            echo '</td>';
            echo '</tr>';
            
            
            echo '<tr>';
            echo '<td>';
            echo 'Phone#';
            echo '</td>';
            echo '<td>';
            echo $row['phoneno']; 
            echo '</td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td>';
            echo 'Basic Salary';
            echo '</td>';
            echo '<td>';
            echo $row['basicsalary']; 
            echo '</td>';
            echo '</tr>';
            
            
            
            echo '<tr>';
            echo '<td>';
            echo 'Operation Location';
            echo '</td>';
            echo '<td>';
            echo $row['oplocation']; 
            echo '</td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td>';
            echo 'Date Of Employment';
            echo '</td>';
            echo '<td>';
            echo $row['empdate']; 
            echo '</td>';
            echo '</tr>';
            
            
           
            
            
            echo '<tr>';
            echo '<td>';
            echo 'Imagename';
            echo '</td>';
            echo '<td>';
            echo $row['imagename']; 
            echo '</td>';
            echo '</tr>';
            
            
            
            
            
           
            
            
            
            
            
            
            
                               
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
           
            
            
            
            
            
            
            
                        
                                 
            
            
                      
                       
           
            
            
            
            
            
        }
        
            ?>
            
            
            
        </table>
        </div>
            </div>
        </div>
        
        
        
        
    </body>
</html>
