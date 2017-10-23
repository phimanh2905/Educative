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
<?php
include('header.php');
session_start();
if (isset($_SESSION['user'])) {
    header("Location: index.php");
}
?>
<div class="container">

    <div class="register">
        <form action="register.php" method="post">
            <div class="  register-top-grid">
                <h3>THÔNG TIN CÁ NHÂN</h3>

                <div class="mation">
                    <span>Họ Tên<label>*</label></span>
                    <input name="namead" type="text">

                    <span>Email Address<label>*</label></span>
                    <input name="emailad" type="text">
                </div>
                <div class="clearfix"></div>

            </div>
            <div class="  register-bottom-grid">
                <h3>TÀI KHOẢN ĐĂNG NHẬP</h3>

                <div class="mation">
                    <span>Tài khoản<label>*</label></span>
                    <input name="userad" type="text">
                    <span>Password<label>*</label></span>
                    <input name="pwad" type="password">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="box-success"></div>

            <div class="register-but">
                <input type="submit" value="đăng ký" onclick="load_ajax()" name="btn-signin">

                <div class="clearfix"></div>
            </div>
        </form>
        <?php
        if (isset($_POST["btn-signin"])) /*kiêm tra nút thêm đã được click chưa, nếu được thì tạo biến để lưu dữ liệu*/ {
            $signnamead = $_POST["namead"];
            $signemailad = $_POST["emailad"];
            $signuserad = $_POST["userad"];
            $signpwad = $_POST["pwad"];
            if (isset($signnamead) != '' && ($signemailad) != '' && ($signuserad) != '' && ($signpwad) != '') {
                $dangmail = "/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,4}$/"; /*dinh dang cua @gmail.com*/
                if (preg_match($dangmail, $signemailad)) {/*kiem tra dieu kien cua */
                    $connect = mysql_connect("localhost", "root", "") or die("không thể kết nối với datebasse");
                    mysql_select_db("educative", $connect);
                    $sqladd = "select * from register where user='" . $signuserad . "'";
                    $queryadd = mysql_query($sqladd);
                    if (mysql_num_rows($queryadd) != "") {
                        echo "<div> Tên đăng nhập đã tồn tại xin vui lòng nhập lại</div>";
                    } else {
                        mysql_query("SET NAMES 'UTF8'");
                        $sqladd2 = "insert into register(vuser,vpass,vname,vmail,vlever)values('" . $signuserad . "','" . $signpwad . "','" . $signnamead . "','" . $signemailad . "','4')";
                        $queryadd2 = mysql_query($sqladd2);
                        echo "<script>
                $('.box-success').text('Đã đăng ký thành công');
            </script>";
                    }
                }else{
                    echo "<script>alert('Sai dinh dang email')</script>";
                }
            } else {
                echo "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
            }
        }

        ?>
    </div>
    <?php
    include('sidebar.php');
    ?>
</div>
<!---->
<?php
include('footer.php');
?>
</body>
</html>