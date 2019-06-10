<?php ob_start(); ?>
<?php session_start(); ?>
<?php 
$zon = mysql_connect('localhost','ejhil_staff','kovachenko123');
    mysql_selectdb(ejhil_app);
$userr = $_SESSION['username'];
$wela = "select username,password,status from users where username = '$userr'";
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

<?php
$user = $_SESSION['username'];
$usname = addslashes($_POST['usname']);
$pswdd = addslashes($_POST['pswd']);
$pswd = sha1($pswdd);
$loc = addslashes($_POST['loc']);
$sta = addslashes($_POST['sta']);

$konn = mysql_connect('localhost','ejhil_staff','kovachenko123')or die('Cannot connect');
    mysql_selectdb('ejhil_app')or die('cannot connect to database');
    
   
    
    $sql = "insert into users(username,password,status,location)values('$usname','$pswd','$sta','$loc')";
   
    mysql_query($sql,$konn)or die('bros, the query no execute');
    
    header('Location:hmsuseradmin.html' );
    
?>