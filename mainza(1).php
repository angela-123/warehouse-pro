<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title>EJHIL NIGERIA LIMITED</title>
        <style> 
            
           
            
           #mynavy a{
                color: #122b40;
                font-size: 1.2em;
                font-family: tahoma;
            }
            
           .dropdown ul,dropdown-toggle ul{
                color: darkred;
                background: #8c8c8c;
            }
            
            #eva{
                position: absolute;
                bottom:5%;
                left:5%;
            }
            
            #max{
                
                display: block;
            }
            
            h1{
                
                color:yellow;
                font-style:  italic;
            }
            
            body{
                
                opacity: 0.75;
            }
        </style>
‪               
                                        
                                          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         
‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
               
 
    </head>
    <body onload="adx();">
        
        <?php //session_start(); ?>
        
        <div class="navbar navbar-default" id="mynavy">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle = "collapse" data-target="#mynavbar-content">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        
                    </button>
                    
                    <a class="navbar-brand brand" href="#" style=" background: lightblue; font-size: 2em;">EJHIL</a>
                    
                </div>
                
                <div class="collapse navbar-collapse navbar-center" id="mynavbar-content" style=" background: orangered; color:  #8c8c8c;">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Start<b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: #a6e1ec;">
                                
                                <li><a href="dcustomers.php">Customers</a></li>
                                <li><a href="custprev.php">Preview Customers</a></li>
                                <li><a href="editcusts.php">Edit Customers</a></li>
                                <li><a href="suppliers.php">Suppliers</a></li>
                                
                                <li><a href="items.php">Opening Stock</a></li>
                                
                                <li><a href="ehjilcustomers.php">Preview Customers</a></li>
                                <li><a href="ejhilsuppliers.php">Preview Suppliers</a></li>
                                <li><a href="stockreprev.php">Preview Products</a></li>
                                <li><a href="priceupdate.php">Update Selling Prices</a></li>
                                <li><a href="costpriceupdate.php">Update Cost Prices</a></li>
                                <li><a href="upcust.php">Update Customer Balances</a></li>
                                <li><a href="updateprods.php">Update Stock</a></li>
                                <li><a href="regmarketers.php">Register Marketers</a></li>
                                <li><a href="reorders.php">Reorder Levels</a></li>
                                
                                <li><a href="hmsuseradmin.html">Create Users</a></li>
                                <li><a href="remuser.php">Remove User</a></li>
                                
                                
                            </ul>
                        </li>
                        
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Transactions<b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: #a6e1ec;">
                                <li><a href="retails.php">Point Of Sales</a></li>
                                <li><a href="tpurch.php">Purchases</a></li>
                                <li><a href="allmana.php">Customer Opening Balance</a></li>
                                <li><a href="allman.php">Deposits-Payments-Others</a></li>
                                
                                
                                
                                
                            </ul>
                        </li>
                        
                        
                       
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="">Sales Reports <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: white;">
                                <li><a href="dinvoice.php">Daily Sales Invoice Summary</a></li>
                                <li><a href="dpayments.php">Daily Payments Summary</a></li>
                                <li><a href="dsales.php">Daily Sales Summary</a></li>
                                <li><a href="repinvoice.php">Preview Invoice</a></li>
                                <li><a href="dreturns.php">Daily Returns</a></li>
                                <li><a href="mreturns.php">Monthly Returns</a></li>
                                <li><a href="mmsales.php">Monthly Sales Summary</a></li>
                                <li><a href="yrrsales.php">Yearly Sales Summary</a></li>
                                <li><a href="custdaily.php">Customer Daily Report</a></li>
                                <li><a href="custmont.php">Customer Monthly Report</a></li>
                                <li><a href="custyr.php">Customer Yearly Report</a></li>
                            </ul>
                            
                        </li>
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Purchases Report <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: lightskyblue;">
                                <li><a href="mpurchases.php">Monthly Purchases Amount</a></li>
                                <li><a href="spmts.php">Monthly Payment To Suppliers</a></li>
                                <li><a href="ypurchases.php">Yearly</a></li>
                                <li><a href="supinvprev.php">Preview Supplier Invoice</a></li>
                                
                            </ul>
                            
                        </li>
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ledger<b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:  #e78f08;">
                                <li><a href="custledger.php">Customers Ledger</a></li>
                                <li><a href="dateledger.php">Customers Ledger By Date</a></li>
                                <li><a href="custall.php">Accounts Reconciliation</a></li>
                                
                                
                                <li><a href="tledger.php">Suppliers Ledger</a></li>
                                <li><a href="tledger.php">Suppliers Ledger By Date</a></li>
                                
                                
                                
                            </ul>
                            
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stock Reports <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:  #f8efc0;">
                                <li><a href="stockreps.php">Stock Sheet</a></li>
                                <li><a href="stockrepall.php">Stock Worth</a></li>
                                <li><a href="stockbydate.php">Stock By Dates</a></li>
                                
                                <li><a href="prodsalesmnt.php">Stock By Company</a></li>
                               
                                <li><a href="search.php">Stock Search</a></li>
                                
                                
                            </ul>
                            
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Edits <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:  #f8efc0;">
                                <li><a href="invoicedit.php">Edit Customer Invoice</a></li>
                                <li><a href="uppayments.php">Edit Payments</a></li>
                                <li><a href="repinvoicealt.php">Alternative Invoice</a></li>
                                <li><a href="supupdate.php">Edit Suppliers Invoice</a></li>
                                <li><a href="adjprods.php">Edit Product Discount</a></li>
                               <li><a href="updateprods.php">Edit Product Stock Balance</a></li>
                                
                            </ul>
                            
                        </li>
                        
                        
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Reports <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: #a6e1ec;">
                                <li><a href="debtors.php">Debtors</a></li>
                                <li><a href="creditors.php">Creditors</a></li>
                                <li><a href="stocktaking.php">Stock Taking Sheet</a></li>
                                <li><a href="allaudit.php">Daily Audits</a></li>
                                <li><a href="banksreg.php">Register Banks</a></li>
                                <li><a href="btellers.php">Bank Tellers</a></li>
                                <li><a href="mtellers.php">Teller Reporting</a></li>
                                <li><a href="supdata.php">Suppliers Details</a></li>
                                <li><a href="staffers.php">Staff Phonenos</a></li>
                                <li><a href="mktreps.php">Marketers Report</a></li>
                                
                                
                                
                            </ul>
                            
                            
                            
                        </li>
                    </ul>
                    
                </div>
                
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6" id="max">
                   
                    
                    <div class="row">
                        
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
        <?php
        // put your code here
        ?>
<script>
    $(document).ready(function(){
        
        $("#help").click(function(){
            
           
           $.ajax({
               
               url:"help.php",
               
               success:function(data)
               {
                   $("#yaya").html(data);
               },
               
               error:function()
               {
                   alert('No Network');
               }
               
           });
            
        });
        
    });
</script>
<div id="yaya"></div>




        
        <div id="eva" style="background:  #1c94c4;color: #e7e7e7;font-size: 2.5em" class="col-sm-6 col-md-6 col-lg-10">
            
            <h2 style="color: darkblue;"><nobr>Welcome:<?php echo $_SESSION['username']; ?></nobr></h2>
            
        </div>
        
        <script>
            function adx()
            {
                $("#eva").fadeOut(5000);
            }
        </script>
    </body>
</html>
