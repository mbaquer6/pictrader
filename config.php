<?php
$mysql_hostname = "localhost";
$mysql_user = "mbaquer6";
$mysql_password = "database12";
$mysql_database = "mbaquer6_pictrader";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>