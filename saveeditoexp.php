<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
echo $_POST['editval'];

$result = $db_handle->executeUpdate("UPDATE expenses set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  expid=".$_POST["id"]);
?>