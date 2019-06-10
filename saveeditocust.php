<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
//echo $_POST['editval'];

$result = $db_handle->executeUpdate("UPDATE customers set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  custid=".$_POST["id"]);
?>
