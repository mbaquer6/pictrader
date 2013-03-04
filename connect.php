<?php
$connection =  mysql_connect('localhost', 'mbaquer6', 'database12');
if (!$connection) {
    die('Unable to connect: ' . mysql_error());
}
?>