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
            th{
                background: orange;
            }
            
            td{
                font-size: 0.85em;
                font-weight: bold;
            }
            
            .era{
                font-size: 1.5em;
                font-weight: bold;
            }
        </style>
                               <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        
        <script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
                        
		} 
		
		function saveToDatabase(editableObj,column,id) {
			$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
                        
			$.ajax({
				url: "saveedito.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
                    $(editableObj).css("background","#FDFDFD");
                    $("#toyo").html(data);
                    
				}        
		   });
		}
		</script>
        
        
        
        
        <?php
        require_once('dbcontroller.php');
        $dbhandle = new DBController();
        $xd = new DBController();
         $san = mysql_connect('localhost','staff','angela');
        mysql_select_db(ejhil_app);
        
        
        $pnamex =$_POST['invoice'];
        
        $sw = "select sid, sdate as date,customername,productname,recno as invoiceno,qtyout,returns,unitprice, (qtyout-returns) * unitprice as debit,paid, 0.01 * (qtyout-returns) * unitprice * discount as discount from sales where recno = '$pnamex'";
        $totals = "select sum(qtyout-returns) * unitprice as debit,sum(paid) as credit,sum(deposit) as deposit,sum(others) as others,sum(opbal) as bal,sum(0.01 * (qtyout-returns) * unitprice * discount) as disc, sum(0.01 * (qtyout-returns) * unitprice * pdisc) as prodisc from sales where recno = '$pnamex'";
        //$sw = "select itid, itemname,lrate,dept  from positems";
        $faq = $dbhandle->runquery($sw);
        $raf = $xd->numrows($sw);
       $tessy = mysql_query($totals);
        
        $tosin = mysql_fetch_assoc($tessy);
        $debit = $tosin['debit'];
        $credit = $tosin['credit'];
        $deposit = $tosin['deposit'];
        $others = $tosin['others'];
        $xball = $tosin['bal'];
        $rdisc = $tosin['disc'];
        $bal = $debit - $credit -$deposit +$others+$xball - $rdisc - $prodisc;
        
        
        ?>
                <div class=" container-fluid">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-3">
        <table class="table table-responsive table-striped table-hover table-bordered">
            
            <thead>
            <th class="table-header">transid</th>
            <th class="table-header">date</th>
            <th class="table-header">customername</th>
            <th class="table-header">productname</th>
            
             <th class="table-header">invoiceno</th>
            <th class="table-header">qtyout</th>
            <th class="table-header">returns</th>
            <th class="table-header">unitprice</th>
            <th class="table-header">debit</th>
            <th class="table-header">credit</th>
            <th class="table-header">discount</th>
            <th class="table-header">receipt#</th>
            
            
            </thead>
            <tbody>
                <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
                               <td><?php echo $k+1; ?></td>
                              <td contenteditable="true" onBlur="saveToDatabase(this,'date','<?php echo $faq[$k]["sid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["date"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'customername','<?php echo $faq[$k]["sid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["customername"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'productname','<?php echo $faq[$k]["sid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["productname"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'invoiceno','<?php echo $faq[$k]["sid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["invoiceno"]; ?></td>
				
                                <td contenteditable="true" onBlur="saveToDatabase(this,'qtyout','<?php echo $faq[$k]["sid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["qtyout"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'returns','<?php echo $faq[$k]["sid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["returns"]; ?></td>
                                
				<td contenteditable="true" onBlur="saveToDatabase(this,'unitprice','<?php echo $faq[$k]["sid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["unitprice"]; ?></td>
                                <td style=" background: yellow;" contenteditable="false" onBlur="saveToDatabase(this,'debit','<?php echo $faq[$k]["sid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["debit"]; ?></td>
                                <td style=" background:white;" contenteditable="true" onBlur="saveToDatabase(this,'paid','<?php echo $faq[$k]["sid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["paid"]; ?></td>
                               
				
                                <td style="background: #888; " contenteditable="true" onBlur="saveToDatabase(this,'discount','<?php echo $faq[$k]["sid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["discount"]; ?></td>
				<td style="background: #888; " contenteditable="false" onBlur="saveToDatabase(this,'invoiceno','<?php echo $faq[$k]["sid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["invoiceno"]; ?></td>
				
                                
                                
                                
				
		<?php
			  
                $k++;
                
		}
		?>   
            </tbody>
            
            
        </table>
                </div>
                </div>
                </div>
                <div id = "toyo"></div>
    </body>
</html>
