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
            h3{
                color: orangered;
            }
        </style>
    </head>
    <body>
        <?php
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app);
        
        $pname = $_POST['pname'];
        $disc = $_POST['disc'];
        
        $star = "update products set discount = '$disc' where productname = '$pname'";
        $tas = mysql_query($star);
        
        if($star)
        {
            echo '<h3>Discount Updated,Refresh Page To Preview</h3>';
        }
        
 else {
            echo '<h3>Discount Not Update</h3>';
 }
        
        ?>
    </body>
</html>
