<?php include "db.php";
include("functions.php");
/*xoa bo sp*/
	if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
        remove_product($_REQUEST['pid']);
    }
    /*nguoc lai thi huy bo 1 bien ra khoi cart*/
    else if($_REQUEST['command']=='clear'){
        unset($_SESSION['cart']);
    }
    /*neu dung thi tao 1 vong lap sp trong gio hang*/
    else if($_REQUEST['command']=='update'){
        $max=count($_SESSION['cart']);
        /*dem so luong sp trong gio hang*/
        for($i=0;$i<$max;$i++){
            $pid=$_SESSION['cart'][$i]['productid'];
            $q=intval($_REQUEST['product'.$pid]);
            if($q>0 && $q<=999){
                $_SESSION['cart'][$i]['qty']=$q++;
            }
            else{
                $msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
            }
        }
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
        /*khoi tao 1 ham js ben trong tim input va tao hanh dong cho moi input */
        $(function(){
            $('input[type=text]').each(function(){
                var text_value=$(this).val();/*khoi tao 1 bien va luu gia tri cua input vao bien do*/
                if(text_value!='')/*neu bien rong*/
                {
                    $(this).css('background','#E0E0E0');/*thi thuc hien viec doi mau nen cua input duoc quet qua co gia tri bang rong*/
                }
            })
        });
    </script>
    <script language="javascript">
        function del(pid){
            /*khoi tao 1 ham co ten delete va gia tri truyen vao la pid*/
            if(confirm('Do you really mean to delete this item')){/*hien ra 1 cau hoi neu ma no bang true thi thuc hanh dong ben trong*/
                document.form1.pid.value=pid;/*lay gia tri cua bien pid gan vao the pid*/
                document.form1.command.value='delete';/*lay gia tri cua bien delete gan vao the command*/
                document.form1.submit();/*neu ca gia tri thoa man thi cho phep hoan thanh*/
            }
        }
        function clear_cart(){
            /*tuong tu tren*/
            if(confirm('This will empty your shopping cart, continue?')){
                document.form1.command.value='clear';
                document.form1.submit();
            }
        }
        function update_cart(){
            document.form1.command.value='update';
            document.form1.submit();
        }


    </script>
</head>
<body>
<?php
include('header.php');
session_start();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            /*neu tai khoan da duoc dang nhap vao luu trong sesion thi thuc hien cau lenh in ra tròn sesion*/
            if (isset($_SESSION['user'])) {
                echo "<span class='alert_cart'>Hiện tại bạn đã đăng nhập dưới tên <b>" . $_SESSION['user']."</b></span>";
            }
            ?>
            <form name="form1" method="post">
                <input type="hidden" name="pid" />
                <input type="hidden" name="command" />
                <div style="margin:0px auto; " >
                    <div style="padding-bottom:10px">
                        <h1 align="center">Giỏ hàng của bạn</h1>
                        <input class="btn btn-success" type="button" value="Tiếp tục mua hàng" onclick="window.location='index.php'" />
                    </div>
                    <div style="color:#F00"><?php echo $msg?></div>
                    <table class="table" border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
                        <?php
                        /*cấu trúc của hiển thị trong giỏ hàng*/
                        if(is_array($_SESSION['cart'])){
                            mysqli_set_charset($dbselected, "utf8");
                            mysql_query("SET NAMES 'UTF8'");
                            echo '<tr bgcolor="#FFFFFF" style="font-weight:bold"><td>Tên sản phẩm</td><td>Giá bán</td><td>Số lượng</td><td>Tổng giá</td><td>Xóa</td></tr>';
                            $max=count($_SESSION['cart']);
                            for($i=0;$i<$max;$i++){
                                $pid=$_SESSION['cart'][$i]['productid'];
                                $q=$_SESSION['cart'][$i]['qty'];
                                $pname=get_product_name($pid);
                                if($q==0) continue;
                                ?>
                                <tr bgcolor="#FFFFFF"><!--<td><?php /*echo $i+1*/?></td>--><td><?php echo $pname ?></td>
                                    <td> <?php echo number_format(get_price($pid))?> VND</td>
                                    <td><input class="btn" type="text" name="product<?php echo $pid?>" value="<?php echo $q?>" maxlength="3" size="2" /></td>
                                    <td> <?php echo number_format(get_price($pid)*$q)?> VND</td>
                                    <td><a href="javascript:del(<?php echo $pid?>)"><img src="images/close.png"></a></td></tr>
                            <?php
                            }
                            ?>
                            <tr><td><b>Tổng giá đơn hàng: <?php echo number_format(get_order_total())?> VND</b></td><td colspan="5" align="right"><input class="btn btn-danger btn_pay" type="button" value="Xóa giỏ hàng" onclick="clear_cart()"><input class="btn btn-info btn_pay" type="button" value="Cập nhật" onclick="update_cart()"><input class="btn btn-success" type="button" value="Thanh toán" onclick="window.location='billing.php'"></td></tr>
                        <?php
                        }
                        else{
                            echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
                        }
                        ?>
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
