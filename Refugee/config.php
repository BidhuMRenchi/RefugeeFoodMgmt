<?php 
$link=mysqli_connect("localhost","root","") or die ('unable to connect host');
mysqli_select_db($link,'foodmanagement')or die ('unable to connect database');
?>