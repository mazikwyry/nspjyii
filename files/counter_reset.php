<?php

$dbhost="cufal.pl";
$dbuser="mazikwyr_mazik";
$dbpassword="matzik";
$dbdatabase="mazikwyr_nspj";


//poĹ‚Ä…czenie

$db=mysql_connect($dbhost,$dbuser,$dbpassword);
mysql_select_db($dbdatabase,$db);

//kodownie znakĂłw

$sql = "SET NAMES utf-8";
mysql_query($sql);

$sql = "UPDATE counter SET d=0 WHERE id=1";
mysql_query($sql);
?>
