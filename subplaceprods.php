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
                font-size: 1.2em;
            }

            td{
                font-size: 1.1em;
                font-weight: bold;
                color: black;
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
				url: "saveeditoprods.php",
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
         $san = mysql_connect('localhost','staff','angela');
        mysql_select_db(ejhil_app);


        $pnamex = mysql_escape_string( $_POST['pname']);

        //$sw = "select sid,customername, sdate as date,productname,recno as invoiceno,qtyout,returns,unitprice, (qtyout-returns) * unitprice as debit,paid ,deposit,others as expenses,phyrec,details, 0.01 * (qtyout-returns) * unitprice * discount as discount, 0.01 * (qtyout-returns) * unitprice * pdisc as prdisc,opbal from sales where customername = '$pnamex'";
        //$totals = "select sum((qtyout-returns) * unitprice) as debit,sum(paid) as credit,sum(deposit) as deposit,sum(others) as others,sum(opbal) as bal,sum(0.01 * (qtyout-returns) * unitprice * discount) as disc, sum(0.01 * (qtyout-returns) * unitprice * pdisc) as prodisc from sales where customername = '$pnamex'";
        //$sw = "select itid, itemname,lrate,dept  from positems";
        $sw = "select * from stock";
        $faq = $dbhandle->runquery($sw);
        $raf = $xd->numrows($sw);



        ?>
                <div class=" container-fluid">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-3">
        <table class="table table-responsive table-striped table-hover table-bordered">

            <thead>
            <th class="table-header">pid</th>
            <th class="table-header">productname</th>
            <th class="table-header">stocked</th>

            </thead>
            <tbody>
                <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
                               <td><?php echo $k+1; ?></td>
                               <td contenteditable="true" onBlur="saveToDatabase(this,'productname','<?php echo $faq[$k]["pid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["productname"]; ?></td>

                              <td contenteditable="true" onBlur="saveToDatabase(this,'stocked','<?php echo $faq[$k]["pid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["stocked"]; ?></td>


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
