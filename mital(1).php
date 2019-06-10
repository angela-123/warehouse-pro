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
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
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
