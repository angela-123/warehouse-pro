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
				url: "saveeditoexp.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(){
					$(editableObj).css("background","#FDFDFD");
				}
		   });
		}
		</script>




        <?php
        require_once('dbcontroller.php');
        $dbhandle = new DBController();
        $xd = new DBController();
        $zonn = mysql_connect('localhost','ejhil_staff','kovachenko123');
        mysql_select_db(ejhil_app) or die('cant connect');

     $dte = $_POST['dte'];
     $dtx = $_POST['dtx'];


     //$tx = "insert into expenses(date,costcenter,recby,details,amount)values('$date','$cc','$recby','$det','$amt')";

    // mysql_query($tx) or die('cant insert');


        //$pnamex = mysql_escape_string( $_POST['pname']);

        //$sw = "select sid, sdate as date,productname,recno as invoiceno,qtyout,unitprice, qtyout * unitprice as debit,paid ,deposit,others as expenses,phyrec,details, 0.01 * qtyout * unitprice * discount as discount, 0.01 * qtyout * unitprice * pdisc as prdisc,opbal from sales where customername = '$pnamex'";
        //$totals = "select sum(qtyout * unitprice) as debit,sum(paid) as credit,sum(deposit) as deposit,sum(others) as others,sum(opbal) as bal,sum(0.01 * qtyout * unitprice * discount) as disc, sum(0.01 * qtyout * unitprice * pdisc) as prodisc from sales where customername = '$pnamex'";
        //$sw = "select itid, itemname,lrate,dept  from positems";
        //$sw = "select expid,date,costcenter,recby,details,amount from expenses where date = '$date' and amount > 0";
        $sw = "select expid,date,costcenter,recby,details,amount from expenses where costcenter !='' and  date between '$dte' and '$dtx'";
        $totals = "select sum(amount) as total from expenses where date between '$dte' and '$dtx'";

        $faq = $dbhandle->runquery($sw) or die('cant query');
        $raf = $xd->numrows($sw);
       $tessy = mysql_query($totals);

        $tosin = mysql_fetch_assoc($tessy);
        $total = $tosin['total'];



        ?>
                <div class=" container-fluid">
                    <div class="row">
                        <div class="">
        <table class="table table-responsive table-striped table-hover table-bordered">

            <thead>
            <th class="table-header">expid</th>
            <th class="table-header">date</th>
            <th class="table-header">costcenter</th>

             <th class="table-header">recby</th>
            <th class="table-header">details</th>
            <th class="table-header">amount</th>

            </thead>
            <tbody>
                <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
                               <td><?php echo $k+1; ?></td>
                              <td contenteditable="true" onBlur="saveToDatabase(this,'date','<?php echo $faq[$k]["expid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["date"]; ?></td>

				<td contenteditable="true" onBlur="saveToDatabase(this,'costcenter','<?php echo $faq[$k]["expid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["costcenter"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'recby','<?php echo $faq[$k]["expid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["recby"]; ?></td>

                                <td contenteditable="true" onBlur="saveToDatabase(this,'details','<?php echo $faq[$k]["expid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["details"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'amount','<?php echo $faq[$k]["expid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["amount"]; ?></td>

			  </tr>
		<?php
                $k++;

		}
		?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="era">Total Expenses</td>
                    <td class="era"><?php echo number_format($total,2); ?></td>
                </tr>
            </tfoot>

        </table>
                </div>
                </div>
                </div>
    </body>
</html>
