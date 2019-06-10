<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html ng-app = "myApp" >
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title>OLLYTEX NIGERIA LIMITED</title>
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
                                  <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
          <script src="js/bootstrap.min.js"></script>
          <script src="js/jquery-1.11.3.js"></script>
        ‪<script src="js/bootstrap.min.js"></script>
        <script src = "js/angular.min.js"></script>
          <script src = "js/angular-route.min.js"></script>


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

                    <a class="navbar-brand brand" href="#" style=" background: lightblue; font-size: 2em;">OLLYTEX</a>

                </div>

                <div class="collapse navbar-collapse navbar-center" id="mynavbar-content" style=" background: orangered; color:  #8c8c8c;">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Start<b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: #a6e1ec;">

                                <li><a href="#!dcustomers">Customers</a></li>
                                <li><a href="#!custprev">Preview Customers</a></li>
                                <li><a href="#!editcusts">Edit Customers</a></li>
                                <li><a href="#!custedit">Edit Customer Status</a></li>
                                <li><a href="#!suppliers">Suppliers</a></li>

                                <li><a href="#!items">Opening Stock</a></li>

                                <li><a href="#!olycustomers">Preview Customers</a></li>
                                <li><a href="#!olysuppliers">Preview Suppliers</a></li>
                                <li><a href="#!stockreprev">Preview Products</a></li>
                                <li><a href="#!priceupdate">Update Selling Prices</a></li>
                                <li><a href="#!costpriceupdate">Update Cost Prices</a></li>
                                <li><a href="#!upcust">Update Customer Balances</a></li>
                                <li><a href="#!updateprods">Update Stock</a></li>
                                <li><a href="#!regmarketers">Register Marketers</a></li>
                                <li><a href="#!reorders">Reorder Levels</a></li>
                                <li><a href="#!subplaceprods">Product Stock Status</a></li>
                                <li><a href="#!hms">Create Users</a></li>
                                <li><a href="#!rems">Remove User</a></li>


                            </ul>
                        </li>

                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Transactions<b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: #a6e1ec;">
                                <li><a href="#!retails">Point Of Sales</a></li>
                                <li><a href="#!tpurch">Purchases</a></li>
                                <li><a href="#!allmana">Customer Opening Balance</a></li>
                                <li><a href="#!allman">Deposits-Payments-Others</a></li>




                            </ul>
                        </li>





                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="">Sales Reports <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: white;">
                                <li><a href="#!dinvoice">Daily Sales Invoice Summary</a></li>
                                <li><a href="#!dpayments">Daily Payments Summary</a></li>
                                <li><a href="#!dsales">Daily Sales Summary</a></li>
                                <li><a href="#!repinvoice">Preview Invoice</a></li>
                                <li><a href="#!dreturns">Daily Returns</a></li>
                                <li><a href="#!mreturns">Monthly Returns</a></li>
                                <li><a href="#!mmsales">Monthly Sales Summary</a></li>
                                <li><a href="yrrsales.php">Yearly Sales Summary</a></li>
                                <li><a href="proledger.php">Customer Sales And Purchases</a></li>

                            </ul>

                        </li>


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Purchases Report <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: lightskyblue;">
                                <li><a href="mpurchases.php">Monthly Purchases Amount</a></li>
                                <li><a href="spmts.php">Monthly Payment To Suppliers</a></li>
                                <li><a href="ypurchases.php">Yearly</a></li>

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
                                <li><a href="stockbydated.php">All Products Stock By Dates</a></li>

                                <li><a href="prodsalesmnt.php">Stock By Company</a></li>

                                <li><a href="search.php">Stock Search</a></li>


                            </ul>

                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Edits <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:  #f8efc0;">
                                <li><a href="invoicedit.php">Edit Customer Invoice</a></li>
                                <li><a href="custledgeredit.php">Customer Ledger In Place Editing</a></li>
                                <li><a href="repinvoiceeddit.php">Invoice In Place Editing</a></li>

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




                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Expenses <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: #a6e1ec;">
                                <li><a href="cccenter.php">Create Cost Centers</a></li>
                                <li><a href="expenses.php">Daily Expenses Entry</a></li>
                                <li><a href="expreports.php">Expenses Reports</a></li>
                                <li><a href="expedit.php">Edit Expenses</a></li>




                            </ul>



                        </li>

                    </ul>

                </div>

            </div>
        </div>
        <div ng-view></div>
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

<script>
                    var angela = angular.module('myApp',['ngRoute']);
                    angela.config(function($routeProvider){
                        $routeProvider.when("/",{

                            templateUrl:'trumains.html'

                        }).when("/dcustomers",{

                            templateUrl:'dcustomers.php'
                        }).when('/custprev',{

                            templateUrl:'custprev.php'
                        }).when('/editcusts',{

                            templateUrl:'editcusts.php'
                        }).when('/custedit',{
                            templateUrl:'custedito.php'
                        }).when('/suppliers',{

                            templateUrl:'suppliers.php'
                        }).when('/items',{
                            templateUrl:'items.php'
                        }).when('/olycustomers',{
                            templateUrl:'olycustomers.php'
                        }).when('/olysuppliers',{
                            templateUrl:'olysuppliers.php'
                        }).when('/stockreprev',{
                            templateUrl:'stockreprev.php'
                        }).when('/priceupdate',{
                            templateUrl:'priceupdate.php'
                        }).when('/costpriceupdate',{
                            templateUrl:'costpriceupdate.php'
                        }).when('/upcust',{
                            templateUrl:'upcust.php'
                        }).when('/regmarketers',{
                            templateUrl:'regmarketers.php'
                        }).when('/reorders',{
                            templateUrl:'reorders.php'
                        }).when('/subplaceprods',{
                            templateUrl:'subplaceprods.php'
                        }).when('/hms',{
                            templateUrl:'hmsuseradmin.php'
                        }).when('/rems',{
                            templateUrl:'remuser.php'
                        }).when('/retails',{
                            templateUrl:'retails.php'
                        }).when('/tpurch',{
                            templateUrl:'tpurch.php'
                        }).when('/allmana',{

                            templateUrl:'allmana.php'
                        }).when('/allman',{

                            templateUrl:'allman.php'
                        }).when('/dinvoice',{
                            templateUrl:'dinvoice.php'
                        }).when('/dpayments',{
                            templateUrl:'dpayments.php'
                        }).when('/dsales',{
                            templateUrl:'dsales.php'
                        }).when('/repinvoice',{
                            templateUrl:'repinvoice.php'
                        }).when('/dreturns',{
                            templateUrl:'dreturns.php'
                        }

                        ).when('/mreturns',{
                            templateUrl:'mreturns.php'
                        }).when('/mmsales',{

                            templateUrl:'mmsales.php'
                        }).when('/audit',{

                            templateUrl:'audit.php'
                        }).when('/worth',{
                            templateUrl:'stockwrth.php'
                        }).when('/count',{
                            templateUrl:'stockcount.php'
                        }).when('/supas',{
                            templateUrl:'supayments.php'
                        }).when('/edits',{
                            templateUrl:'edits.php'
                        }).when('/editprods',{
                            templateUrl:'editprods.php'
                        })


                    });

                    </script>

    </body>
</html>
