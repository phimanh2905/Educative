<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8"/>


</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="padTop53 ">
<?php
include("../connect.php");
mysqli_set_charset($connect, "utf8");
mysql_query("SET NAMES 'UTF8'");

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM customers where serial=".$id);
while($data2 = mysql_fetch_assoc($sql)){
    echo 'Tên khách hàng: '.$data2['name'].'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo 'Email: '.$data2['email'].'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo 'Địa chỉ: '.$data2['address'].'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo 'Phone: '.$data2['phone'];
}
?>
<table border="1">
    <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá bán</th>
    </tr>
    <?php
    //connection to mysql
    //query get data
    $sql = mysql_query("SELECT * FROM order_detail where orderid=".$id);
    $no = 1;
    while($data = mysql_fetch_assoc($sql)){
        mysql_query("SET NAMES 'UTF8'");
        echo '
		<tr>
			<td>'.$no.'</td>
			<td>';
            $sql_sp = mysql_query("SELECT * FROM product where iID=".$data['productid']) ;
            /* lay id( product )= productid ( order_detail ) */
            while ($rowsp = mysql_fetch_assoc($sql_sp)) {
                echo $rowsp['product_name'];
            };
            echo '</td>
			<td>'.$data['quantity'].'</td>
			<td>'.$data['price'].'</td>
		</tr>
		';

        $no++;
    }
    ?>
</table>
</body></html>