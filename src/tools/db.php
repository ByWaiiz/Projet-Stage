<?php 

$dbusername = 'root';

$bddpw = '';

$pdo = new PDO('mysql:host=localhost;dbname=anka;charset=utf8mb4;',$dbusername, $bddpw, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


?>