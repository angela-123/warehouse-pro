<?php ob_start();
 session_start();
?>


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
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>                                           
    </head>
    <body>
        
        
        <?php
$don = mysql_connect('localhost','ejhil_staff','kovachenko123');
mysql_select_db(ejhil_app);

$uname = $_POST['username'];
$pword = $_POST['password'];
$pwordd = sha1($pword);
$shift = $_POST['shift'];

session_start();
$_SESSION['username'] = $uname;
$xeq = "select * from users where username = '$uname' And password = '$pwordd'";
$rods = mysql_query($xeq);

$myrod = mysql_fetch_assoc($rods);
$mybase = $myrod['location'];
$myshift = $shift;
$_SESSION['loc'] = $mybase;
$_SESSION['shift'] = $shift;

$rej = mysql_query($xeq);
$numrows = mysql_num_rows($rej);
$back = ' <a href = "jogin.php"';

if($numrows >=1)
{
    echo "Access Granted";
    header('Location:jogger.php');
    //exit();
}

 else {
    echo '<h1>'. 'Access denied' .'</h1>';
    
    
    //exit();
}

        ?>
    </body>
</html>
