<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

$result = $db_handle->executeUpdate("UPDATE sales set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  sid=".$_POST["id"]);
?>