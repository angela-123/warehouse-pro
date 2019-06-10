<?php
$term = $_REQUEST["term"];
$term = utf8_decode ($term);
$bd = mysql_connect ('localhost', 'ejhil_staff', 'kovachenko123');
$ret = mysql_select_db ("ejhil_app", $bd);
$query = sprintf (
"SELECT * FROM customers WHERE customername  LIKE '%%%s%%' And customername != '' and status = 'y'",
mysql_real_escape_string($term));
$result = mysql_query($query);
if ($result)
{
// Use the result (sent to the browser)
while ($row = mysql_fetch_assoc($result))
{
echo ("<li>" . utf8_encode ($row["customername"]) . "</li>");
//echo ("<li>"  . utf8_encode($row["genericname"]). "</li>");
}
mysql_free_result($result);
}
mysql_close ($bd);
?>
