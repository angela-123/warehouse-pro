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
				url: "saveeditocust.php",
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
        //$sw = "select expid,date,costcenter,recby,details,amount from expenses where costcenter !='' and  date between '$dte' and '$dtx'";
        //$totals = "select sum(amount) as total from expenses where date between '$dte' and '$dtx'";
          $sw = "select custid,customername,status from customers";
        $faq = $dbhandle->runquery($sw) or die('cant query');
        $raf = $xd->numrows($sw);




        ?>
                <div class=" container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
        <table class="table table-responsive table-striped table-hover table-bordered">

            <thead>
            <th class="table-header">custid</th>
            <th class="table-header">customername</th>
            <th class="table-header">customername</th>


            </thead>
            <tbody>
                <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
                               <td><?php echo $k+1; ?></td>
                              <td contenteditable="true" onBlur="saveToDatabase(this,'customername','<?php echo $faq[$k]["custid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["customername"]; ?></td>
                              <td contenteditable="true" onBlur="saveToDatabase(this,'status','<?php echo $faq[$k]["custid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["status"]; ?></td>


			  </tr>
		<?php
                $k++;

		}
		?>
            </tbody>
            <tfoot>

            </tfoot>

        </table>
                </div>
                </div>
                </div>
    </body>
</html>
