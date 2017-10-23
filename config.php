<?php
$host="localhost";
$user="root";//Username truy cập phpmyadmin
$password="";//Password truy cập phpmyadmin
$db="educative";//database
$connection=mysqli_connect("{$host}","{$user}","{$password}","{$db}") or die ('Could not connect database');
require_once "mysqli.class.php";
mysqli_set_charset($connection, "utf8");
mysql_query("SET NAMES 'UTF8'");
$db=new db();
?>
