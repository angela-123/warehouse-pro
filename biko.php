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
        mysql_select_db(ejhil_app);
        
        $user = $_POST['user'];
        
        $yiz = "delete from users where username = '$user'";
        
        if(mysql_query($yiz))
        {
            echo '<h3>USER REMOVED</h3>';
        }
 else {
            echo '<h3>PRODUCT NOT REMOVED</h3>';
 }
        ?>
    </body>
</html>
