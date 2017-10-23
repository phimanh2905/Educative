<?php
	include("db.php");
	include("functions.php");
	mysqli_set_charset($dbselected, "utf8");
	mysql_query("SET NAMES 'UTF8'");
	if($_REQUEST['command']=='update'){
		$name=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		$address=$_REQUEST['address'];
		$phone=$_REQUEST['phone'];
		
		$result=mysql_query("insert into customers values('','$name','$email','$address','$phone')");
		$customerid=mysql_insert_id();
		$date=date('Y-m-d');
		$result=mysql_query("insert into orders values('','$date','$customerid')");
		$orderid=mysql_insert_id();

		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			mysql_query("insert into order_detail values ($orderid,$pid,$q,$price)");
		}
		echo '<script>alert("Gửi đơn hàng thành công");location="index.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Educative</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<!--//theme-style-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script type="application/x-javascript"> addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);
		function hideURLbar() {
			window.scrollTo(0, 1);
		} </script>
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<script src="js/jquery.min.js"></script>
	<script>
		$(function(){
			$('input[type=text]').each(function(){
				var text_value=$(this).val();
				if(text_value!='')
				{
					$(this).css('background','#E0E0E0');
				}

			})

		});
	</script>
	<script language="javascript">
		function validate(){
			var f=document.form1;
			if(f.name.value==''){
				alert('Your name is required');
				f.name.focus();
				return false;
			}
			f.command.value='update';
			f.submit();
		}
	</script>
</head>
<body>
<?php
include('header.php');
session_start();
?>
<!--cau truc cua form của trang đăng kí thông tin người mua hàng-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form name="form1" onsubmit="return validate()">
				<input type="hidden" name="command" />
				<div align="center">
					<h1 align="center">Thông tin khách hàng</h1>
					<table class="table" border="0" cellpadding="2px">
						<tr><td>Tổng giá trị đơn hàng:</td><td><?php echo number_format(get_order_total())?> VND</td></tr>
						<tr><td><label class="lable_pay"> Tên khách hàng:</label></td><td><input class="form-control" type="text" name="name" /></td></tr>
						<tr><td><label class="lable_pay">Địa chỉ:</label></td><td><input class="form-control" type="text" name="address" /></td></tr>
						<tr><td><label class="lable_pay">Email:</label></td><td><input class="form-control" type="text" name="email" /></td></tr>
						<tr><td><label class="lable_pay">Phone:</label></td><td><input class="form-control" type="text" name="phone" /></td></tr>
						<tr><td>&nbsp;</td><td><input class="btn btn-success" type="submit" value="Gửi đơn hàng" /></td></tr>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>

<!---->
<?php
include('footer.php');
?>
</body>
</html>
