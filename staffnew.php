<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title></title>
        <style>
            
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
        
        session_start();
        ?>
        <?php 
$zon = mysql_connect('localhost','luminexl_staff','kovachenko123');
    mysql_selectdb(luminexl_app);
$user = $_SESSION['username'];
$wela = "select username,password,status from users where username = '$user'";
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
                <form action="staffnew.php" enctype="multipart/form-data" method="post" >
                <div class="form-group">
                    <table class="table table-responsive table-striped table-bordered">
                <div class="col-sm-4">
                    <label>Staff Name</label>
                    <input type="text" id="staff" name="staff" class="form-control">
                    <label>Designation</label>
                    <input type="text" id="brand" name="desig" class="form-control">
                    <label>Address</label>
                    <input type="text" id="add" name="add" class="form-control">
                    <label>Phone#</label>
                    <input type="text" id="pone" name="phone" class="form-control">
                    <label>Basic Salary</label>
                    <input type="text" id="sal" name="sal" class="form-control">
                    <label>Operations Location</label>
                    <input type="text" id="ops" name="ops" class="form-control">
                    <label>Date Of Employment</label>
                    <input type="text" id="dte" name="dte" class="form-control">  
                    <label>Next Of Kin</label>
                    <input type="text" id="nok" name="nok" class="form-control">  
                    
                    <label>Passport</label>
                    <input type="file"  name="filep" class="form-control">
                    <button class="btn btn-primary btn-lg" name="action" value="Load">Save</button>
                </div>
                    </table>
                </div>
                </form>
            </div>
            
        </div>
        
                                                                                    		                           <script type="text/javascript">
$("input#brand").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "wbrands.php",
data : data,
complete : function (xhr, result)
{
if (result !== "success") return;
var response = xhr.responseText;
var books = [];
$(response).filter ("li").each (function ()
{
books.push ($(this).text ());
});
callback (books);
}
});
}
});
</script>
        
        
         <?php
        
        $san = mysql_connect('localhost','luminexl_staff','kovachenko123');
        mysql_select_db(luminexl_app) or die('cant connect');
        
        if($_POST["action"]== "Load")
        {       
        $folder = 'images/';
        $staff = $_POST['staff'];
        $desig = $_POST['desig'];
        $add = $_POST['add'];
        $phone = $_POST['phone'];
        $sal = $_POST['sal'];
        
        $ops = $_POST['ops'];
        $date = $_POST['dte'];
        $nok = $_POST['nok'];
        //$price = $_POST['price'];
        
        
        
        
        echo $port;
        echo $pass;
        
                if(move_uploaded_file($_FILES["filep"]["tmp_name"], $folder.$_FILES["filep"]["name"]))
	{
	//echo $_FILES["filep"]."Loaded" ;
        }
        
 else {
     
           // echo $_FILES['filep']." Not Loaded" ;
 }
 
 
        }
        
        $sax = "insert into staff(staffname,designation,address,phoneno,basicsalary,oplocation,empdate,nextofkin,passport)values('$staff','$desig', '$add','$phone','$sal','$ops', '$date', '$nok','".$_FILES['filep']['name']."')";
        
        $aro = "insert into classes(surname,firstname,middlename,studentname,section,session,term)values('$sname','$fname','$mdname', '$stdid', '$sec','2015/16','Second Term')";
        
        //mysql_query($aro);
            
        mysql_query($sax) or die('cant insert');
        
        
        
        
        
        
        ?>
            
            
            
        
        
        
        <?php
        // put your code here
        ?>
        <div class="col-md-6">
        <table id="diag" class="table table-responsive table-striped table-bordered">
            <?php
            
                  $ede = "select * from staff where staffname = '$staff' and staffname!= ''";
        
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
            echo 'Designation';
            echo '</td>';
            echo '<td>';
            echo $row['designation']; 
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
            echo 'Next Of Kin';
            echo '</td>';
            echo '<td>';
            echo $row['nextofkin']; 
            echo '</td>';
            echo '</tr>';
            
            
            
            
            
            
            
            
            
            
            echo '<tr>';
            echo '<td>';
            echo 'Passport';
            echo '</td>';
            echo '<td>';
            echo $row['passport']; 
            echo '</td>';
            echo '</tr>';
            
            
            
            
            
           
            
            
            
            
            
            
            
                               
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
           
            
            
            
            
            
            
            
                        
                                 
            
            
                      
                       
           
            
            
            
            
            
        }
        
            ?>
            
            
            
        </table>
        </div>
        
    </body>
</html>
