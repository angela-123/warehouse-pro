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
        
        $cname = $_POST['cname'];
        
        
        $sed = "select * from customers where customername = '$cname'";
        
        $res = mysql_query($sed);
        
        $teddy = mysql_fetch_assoc($res);
        
        ?>
        
        <script>
            $(document).ready(function(){
                
                $("#btx").click(function(){
                    
                    
                    var cname = $("#cnam").val();
                    var add = $("#addd").val();
                    var phn = $("#phnn").val();
                    var email = $("#emaill").val();
                    var limit = $("#limit").val();
                    var discount = $("#discount").val();
                    
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"mital.php",
                        data:"cname="+cname+"&add="+add+"&phn="+phn+"&email="+email+"&limit="+limit+"&discount="+discount,
                        
                        success:function(data)
                        {
                            $("#titi").html(data)
                        },
                        
                        
                        
                        error:function()
                        {
                            $("#titi").html('Not Connected');
                        }
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <table class="table table-responsive table-bordered table-striped table-hover">
                        <tr>
                            <td>
                                <label>Customer Name</label>
                            </td>
                            <td>
                                <input type="text" id="cnam" value="<?php echo $teddy['customername']; ?>">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label>Address</label>
                            </td>
                            <td>
                                <input type="text" id="addd" value="<?php echo $teddy['address']; ?>">
                            </td>
                        </tr>
                        
                        
                        
                        <tr>
                            <td>
                                <label>Phone#</label>
                            </td>
                            <td>
                                <input type="text" id="phnn" value="<?php echo $teddy['phoneno']; ?>">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" id="emaill" value="<?php echo $teddy['email']; ?>">
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td>
                                <label>Limit</label>
                            </td>
                            <td>
                                <input type="number" id="limit" value="<?php echo $teddy['limits']; ?>">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label>Discount</label>
                            </td>
                            <td>
                                <input type="number" id="discount" value="<?php echo $teddy['discount']; ?>">
                            </td>
                        </tr>
                        
                    </table>
                    <button id="btx" class="btn btn-default btn-lg">Update Records</button>
                </div>
                <div id="titi"></div>
            </div>
            
        </div>
    </body>
</html>
