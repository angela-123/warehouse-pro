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
       $conn = mysql_connect('localhost','luminexl_staff','kovachenko123');
        mysql_select_db(luminexl_app)or die('Cant connect');
        $staff = $_POST['staff'];
        $desig = $_POST['desig'];
        $add = $_POST['add'];
        $phone = $_POST['phone'];
        $basic = $_POST['basic'];
        $date = $_POST['date'];
        $loc = $_POST['loc'];
        
        
        $zila = "insert into staff(staffname,designation,address,phoneno,basicsalary,oplocation,empdate)values('$staff','$desig','$add','$phone','$basic','$loc','$date')";
        
        $rdx = mysql_query($zila) or die('cant insert');
        
        $rdx = "select * from staff where staffname = '$staff'";
        
        $res = mysql_query($rdx) or die('cant insert');
        
        ?>
        
        
        
        
        
        <table class="table table-responsive table-bordered table-hover">
            
            <?php
            
                    while ($row = mysql_fetch_assoc($res))
                    {
            ?>
            <tr>
                <td>Staff Name</td>
                <td><?php echo $row['staffname']; ?></td>
            </tr>
            
            
            <tr>
                <td>Designation</td>
                <td><?php echo $row['designation']; ?></td>
            </tr>
            
            <tr>
                <td>Address</td>
                <td><?php echo $row['address']; ?></td>
            </tr>
            <tr>
                <td>Phone#</td>
                <td><?php echo $row['phoneno']; ?></td>
            </tr>
            
            
            <tr>
                <td>Basic Salary</td>
                <td><?php echo $row['basicsalary']; ?></td>
            </tr>
            
            <tr>
                <td>Operation Location</td>
                <td><?php echo $row['oplocation']; ?></td>
            </tr>
            
            <tr>
                <td>Date Of Employment</td>
                <td><?php echo $row['empdate']; ?></td>
            </tr>
            <tr>
                <td>Passport</td>
                <td><?php echo $row['passport']; ?></td>
            </tr>
            
                    <?php } ?>
        
        
        
    </body>
</html>
