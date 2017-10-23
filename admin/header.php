<?php
include('../host-phpold.php');
session_start();/*bắt đầu lưu tài khoản*/
if (isset($_SESSION['vuser']) && $_SESSION['vlever']==1 || $_SESSION['vlever']==2 || $_SESSION['vlever']==3 ) /*kiểm tra biến lưu đã tồn tại chưa*/ {
    /*nếu đã tồn tại chuyển đến form nhapmonhoc và tạo 1 thẻ a là logout*/


}else if(isset($_SESSION['vuser']) && $_SESSION['vlever']==4 ){
    echo("<script>location='../index.php'</script>");
    header("Location:../index.php");
}
else /*ngược lại thì quay trở lại form login */
{
    echo("<script>location='login.php'</script>");
    header("Location: login.php");
}
?>
<!-- HEADER SECTION -->
<div id="top">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
        <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip"
           class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu"
           id="menu-toggle">
            <i class="icon-align-justify"></i>
        </a>
        <!-- LOGO SECTION -->
        <header class="navbar-header">

            <a href="index.php" class="navbar-brand">
                Educative

            </a>
        </header>
        <!-- END LOGO SECTION -->
        <ul class="nav navbar-top-links navbar-right">

            <!--ADMIN SETTINGS SECTIONS -->
            <li class="open_cart"><a href="../index.php" target="_blank">Xem cửa hàng</a> </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                </a>

                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="icon-user"></i> User Profile </a>
                    </li>
                    <li><a href="#"><i class="icon-gear"></i> Settings </a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="../logout.php"><i class="icon-signout"></i> Logout </a>
                    </li>
                </ul>

            </li>
            <!--END ADMIN SETTINGS -->
        </ul>

    </nav>

</div>
<!-- END HEADER SECTION -->