
<!-- MENU SECTION -->
<div id="left" >
    <div class="media user-media well-small">
        <a class="user-link" href="#">
            <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php
            include('../host.php');
            mysqli_set_charset($connect, "utf8");
            $sql_td = mysqli_query($connect, 'select * from register where vuser="'.$_SESSION['vuser'].'"' );
            while ($row = mysqli_fetch_array($sql_td)) {
                echo $row['vava'];
            }
            ?>" />
        </a>
        <br />
        <div class="media-body">
            <h5 class="media-heading"><?php
                include('../host.php');
                mysqli_set_charset($connect, "utf8");
                $sql_td = mysqli_query($connect, 'select * from register where vuser="'.$_SESSION['vuser'].'"' );
                while ($row = mysqli_fetch_array($sql_td)) {
                    echo $row['vuser'];
                }
                ?></h5>
            <ul class="list-unstyled user-info">

                <li>
                    <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online

                </li>

            </ul>
        </div>
        <br />
    </div>

    <ul id="menu" class="collapse">
        <?php
            session_start();
            if(isset($_SESSION['vuser']) && $_SESSION['vlever']==1 ){
                echo '<li class="panel active">
            <a href="index.php" >
                <i class="icon-table"></i> Dashboard
            </a>
        </li>
        <li><a href="cart-list.php"><i class="icon-table"></i> Quản trị Đơn hàng</a></li>
        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                <i class="icon-table"></i> Quản trị Menu
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                &nbsp; <span class="label label-success">2</span>&nbsp;
            </a>
            <ul class="collapse" id="form-nav">
                <li class=""><a href="add-menu.php"><i class="icon-angle-right"></i> Thêm mới Menu </a></li>
                <li class=""><a href="menu-list.php"><i class="icon-angle-right"></i> Danh sách Menu </a></li>
            </ul>
        </li>

        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#ads-nav">
                <i class="icon-table"></i> Quản trị Quảng Cáo

                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                &nbsp; <span class="label label-success">2</span>&nbsp;
            </a>
            <ul class="collapse" id="ads-nav">
                <li class=""><a href="ads-list.php"><i class="icon-angle-right"></i> Chỉnh sửa Banner Trái </a></li>
                <li class=""><a href="slideshow-list.php"><i class="icon-angle-right"></i> Chỉnh sửa Slideshow </a></li>
            </ul>
        </li>

        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#kh-nav">
                <i class="icon-table"></i> Liên hệ
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                &nbsp; <span class="label label-success">2</span>&nbsp;
            </a>
            <ul class="collapse" id="kh-nav">
                <li class=""><a href="contact-list.php"><i class="icon-angle-right"></i> Nhận thông tin mới </a></li>
                <li class=""><a href="send-user-list.php"><i class="icon-angle-right"></i> Khách hàng phản hồi  </a></li>
            </ul>
        </li>
        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#lh-nav">
                <i class="icon-table"></i> Quản trị Liên hệ
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                &nbsp; <span class="label label-success">2</span>&nbsp;
            </a>
            <ul class="collapse" id="lh-nav">
                <li class=""><a href="branch-list.php"><i class="icon-angle-right"></i> Quản lý chi nhánh </a></li>
                <li class=""><a href="send-user-list.php"><i class="icon-angle-right"></i> Khách hàng phản hồi  </a></li>
            </ul>
        </li>

        <li><a href="gallery.php"><i class="icon-film"></i> Image Gallery </a></li>
        <li><a href="add-user.php"><i class="icon-film"></i> Thêm tài khoản </a></li>
        <li><a href="khachhang.php"><i class="icon-film"></i> Khách Hàng </a></li>
        <li><a href="product-list.php"><i class="icon-table"></i> Quản trị Sản phẩm</a></li>

        <li><a href="../logout.php"><i class="icon-signin"></i> Đăng xuất </a></li>';
            }else if(isset($_SESSION['vuser']) && $_SESSION['vlever']==2){
                echo '<li class="panel active">
            <a href="index.php" >
                <i class="icon-table"></i> Dashboard
            </a>
        </li>
        <li><a href="cart-list.php"><i class="icon-table"></i> Quản trị Đơn hàng</a></li>
            <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                <i class="icon-table"></i> Quản trị Menu
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                &nbsp; <span class="label label-success">2</span>&nbsp;
            </a>
            <ul class="collapse" id="form-nav">
                <li class=""><a href="add-menu.php"><i class="icon-angle-right"></i> Thêm mới Menu </a></li>
                <li class=""><a href="menu-list.php"><i class="icon-angle-right"></i> Danh sách Menu </a></li>
            </ul>
        </li>

        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#ads-nav">
                <i class="icon-table"></i> Quản trị Quảng Cáo

                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                &nbsp; <span class="label label-success">2</span>&nbsp;
            </a>
            <ul class="collapse" id="ads-nav">
                <li class=""><a href="ads-list.php"><i class="icon-angle-right"></i> Chỉnh sửa Banner Trái </a></li>
                <li class=""><a href="slideshow-list.php"><i class="icon-angle-right"></i> Chỉnh sửa Slideshow </a></li>
            </ul>
        </li>

        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#kh-nav">
                <i class="icon-table"></i> Quản trị Khách hàng
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                &nbsp; <span class="label label-success">2</span>&nbsp;
            </a>
            <ul class="collapse" id="kh-nav">
                <li class=""><a href="contact-list.php"><i class="icon-angle-right"></i> Nhận thông tin mới </a></li>
                <li class=""><a href="send-user-list.php"><i class="icon-angle-right"></i> Khách hàng phản hồi  </a></li>
            </ul>
        </li>
        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#lh-nav">
                <i class="icon-table"></i> Quản trị Liên hệ
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                &nbsp; <span class="label label-success">2</span>&nbsp;
            </a>
            <ul class="collapse" id="lh-nav">
                <li class=""><a href="branch-list.php"><i class="icon-angle-right"></i> Quản lý chi nhánh </a></li>
                <li class=""><a href="send-user-list.php"><i class="icon-angle-right"></i> Khách hàng phản hồi  </a></li>
            </ul>
        </li>

        <li><a href="gallery.php"><i class="icon-film"></i> Image Gallery </a></li>
        <li><a href="product-list.php"><i class="icon-table"></i> Quản trị Sản phẩm</a></li>

        <li><a href="../logout.php"><i class="icon-signin"></i> Đăng xuất </a></li>';
            }else if(isset($_SESSION['vuser']) && $_SESSION['vlever']==3){
                echo '<li class="panel active">
            <a href="index.php" >
                <i class="icon-table"></i> Dashboard
            </a>
        </li>
        <li class="panel ">
            <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#ads-nav">
                <i class="icon-table"></i> Quản trị Quảng Cáo
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                &nbsp; <span class="label label-success">2</span>&nbsp;
            </a>
            <ul class="collapse" id="ads-nav">
                <li class=""><a href="ads-list.php"><i class="icon-angle-right"></i> Chỉnh sửa Banner Trái </a></li>
                <li class=""><a href="slideshow-list.php"><i class="icon-angle-right"></i> Chỉnh sửa Slideshow </a></li>
            </ul>
        </li>
        <li><a href="gallery.php"><i class="icon-film"></i> Image Gallery </a></li>
        <li><a href="product-list.php"><i class="icon-table"></i> Quản trị Sản phẩm</a></li>

        <li><a href="../logout.php"><i class="icon-signin"></i> Đăng xuất </a></li>';
            }else{

            }
        ?>
    </ul>

</div>
<!--END MENU SECTION -->