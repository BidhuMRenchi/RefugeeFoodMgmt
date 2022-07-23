<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=foodmanagement', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM refugee  WHERE Fname  LIKE (:keyword) ORDER BY rfid  ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['Fname']);
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['refNo']).'\')">'.$name.'</li>';
}
?>