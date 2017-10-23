<?php
include('../host.php');
$id = $_GET['serial'];
var_dump($id);
mysqli_set_charset($connect, "utf8");
$result = mysqli_query($connect, "delete from customers where serial=".$id);
$result = mysqli_query($connect, "delete from orders where customerid=".$id);
header("location:cart-list.php");
?>