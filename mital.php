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
  <script src="libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script src="libs/jquery-ui-1.10.0.custom.min.js"></script>
        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        
        
        $cname = $_POST['cname'];
        $add = $_POST['add'];
        $phone = $_POST['phn'];
        $email = $_POST['email'];
        $limit = $_POST['limit'];
        $disc = $_POST['discount'];
        
        
        $yup = "update customers set address = '$add',phoneno = '$phone',email = '$email',discount = '$disc',limits = '$limit' where customername = '$cname'";
        
        if(mysql_query($yup))
        {
            echo  '<blink><p>Customer Records Updated</p></blink>';
        }
        
        
 else {
     
            echo 'Customer Records Not Updated';
 }
        ?>
    </body>
</html>
