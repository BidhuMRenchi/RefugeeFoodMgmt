<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbase = "foodmanagement";

$link = mysql_connect($host, $user, $pass) or die("connection not establish");

mysql_select_db($dbase, $link) or die("database not selected");


$db = new PDO('mysql:host='.$host.';dbname='.$dbase, $user, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>