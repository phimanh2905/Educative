<?php
session_start();
include('header.php');

if (isset($_SESSION['vuser'])) {
    header("Location: index.php");
}
?>
<?php include "host.php" ?>
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
</head>
<body>

<!--tao cau truc text box, the, label trong dang nhap-->
<div class="container">
    <div class="account_grid">
        <div class=" login-right">
            <h3>Đăng nhập </h3>

            <p>Nếu bạn đã có tài khoản, vui lòng đăng nhập.</p>

            <form action="login.php" method="post">
                <div>
                    <span>Tên đăng nhập<label>*</label></span>
                    <input type="text" name="user-login">
                </div>
                <div>
                    <span>Password<label>*</label></span>
                    <input type="password" name="pw-login">
                </div>
                <a class="forgot" href="#">Quên mật khẩu?</a>
                <input type="submit" name="sub-login" value="ĐĂNG NHẬP">
            </form>

        </div>
        <div class=" login-left">
            <h3>Tạo tài khoản</h3>

            <p>
                Bằng cách tạo một tài khoản với cửa hàng của chúng tôi , bạn sẽ có thể di chuyển qua các quy trình kiểm
                tra nhanh hơn, lưu trữ nhiều địa chỉ gửi hàng , xem và theo dõi đơn đặt hàng của bạn trong tài khoản của
                bạn và nhiều hơn nữa .</p>
            <a class="acount-btn" href="register.php">Tạo tài khoản ngay</a>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php
    include('sidebar.php');
    ?>
    <div class="clearfix"></div>
</div>
<!---->
<?php
include('footer.php');
?>
</body>
</html>