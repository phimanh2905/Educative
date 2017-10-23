<?php include "host.php"; ?>
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
    <!--script-->
</head>
<body>
<?php
//cac module nho trang chu
include('header.php');
?>
<div class="container">
    <div class="shoes-grid">
<div class="wrap-in">
        <?php include('slideshow.php') ?>
</div>
<!--cau truc khung cua 1 loai san pham duoc hien thi tren trang chu-->
<div class="products">
    <h5 class="latest-product">Khóa học PEN-I</h5>
    <a class="view-all" href="product-child.php?id=17">XEM TẤT CẢ<span> </span></a>
</div>
<div class="product-left">
    <?php
    $id = $_GET['id'];
    mysqli_set_charset($connect, "utf8");
    $sql_td1 = mysqli_query($connect, "select * from product where iid_parent=17 limit 0,4" );//hien thi ra san pham co ma = 4, hien thi toi da 4 san pham, it nhat 0
    /*su dung vong lap de hien thi ra 1 cau truc cua nhung san pham duong hien thi ngoai trang chu va cau truc hien thi cua san pham*/
    while ($row1 = mysqli_fetch_array($sql_td1))
    {
        mysql_query("SET NAMES 'UTF8'");
        /*cau truc cua khung hien thi san pham*/
        echo "<div class='index-product grid-product'>";
        echo "<div class='product-grid'>";
        echo "<div class='content_box'>";
        echo " <a href='product-detail.php?id=" . $row1['iID'] . "'>";
        echo "<div class='left-grid-view grid-view-left'>";
        echo " <span class='star'>-".$row1['sale']."%</span><img src='" . $row1['img_path'] . "' class='img-responsive watch-right' alt=''/>";
        echo "<div class='mask'>";
        echo "<div class='info'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
        echo "<h4><a href='product-detail.php?id=" . $row1['iID'] . "'>" . substr($row1['product_name'] ,0, 50) . "...</a></h4>";
        echo "<h4 class='giaban'>" . number_format($row1['cost']) . " VND</h4>";
        echo "</div>";
        echo "</div>";
        /*-------------*/
    }
    ?>
    <div class="clearfix"></div>
</div>
<!---->
        <div class="products">
            <h5 class="latest-product">PEN-M</h5>
            <a class="view-all" href="product-child.php?id=18">XEM TẤT CẢ<span> </span></a>
        </div>
        <div class="product-left">
            <?php
            $id = $_GET['id'];
            mysqli_set_charset($connect, "utf8");
            $sql_td1 = mysqli_query($connect, "select * from product where iid_parent=18 limit 0,4" );
            /*sử dụng vòng lặp để tìm kiếm mã môn tên môn theo id bằng check box*/
            while ($row1 = mysqli_fetch_array($sql_td1)) {
                mysql_query("SET NAMES 'UTF8'");
                echo "<div class='index-product grid-product'>";
                echo "<div class='product-grid'>";
                echo "<div class='content_box'>";
                echo " <a href='product-detail.php?id=" . $row1['iID'] . "'>";
                echo "<div class='left-grid-view grid-view-left'>";
                echo " <span class='star'>-".$row1['sale']."%</span><img src='" . $row1['img_path'] . "' class='img-responsive watch-right' alt=''/>";
                echo "<div class='mask'>";
                echo "<div class='info'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</a>";
                echo "</div>";
                echo "<h4><a href='product-detail.php?id=" . $row1['iID'] . "'>" . substr($row1['product_name'] ,0, 50) . "...</a></h4>";
                echo "<h4 class='giaban'>" . number_format($row1['cost']) . " VND</h4>";
                echo "</div>";
                echo "</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>
        <div class="products">
            <h5 class="latest-product">PRO-S</h5>
            <a class="view-all" href="product-child.php?id=20">XEM TẤT CẢ<span> </span></a>
        </div>
        <div class="product-left">
            <?php
            $id = $_GET['id'];
            mysqli_set_charset($connect, "utf8");
            $sql_td1 = mysqli_query($connect, "select * from product where iid_parent=20 limit 0,4" );
            /*sử dụng vòng lặp để tìm kiếm mã môn tên môn theo id bằng check box*/
            while ($row1 = mysqli_fetch_array($sql_td1)) {
                mysql_query("SET NAMES 'UTF8'");
                echo "<div class='index-product grid-product'>";
                echo "<div class='product-grid'>";
                echo "<div class='content_box'>";
                echo " <a href='product-detail.php?id=" . $row1['iID'] . "'>";
                echo "<div class='left-grid-view grid-view-left'>";
                echo " <span class='star'>-".$row1['sale']."%</span><img src='" . $row1['img_path'] . "' class='img-responsive watch-right' alt=''/>";
                echo "<div class='mask'>";
                echo "<div class='info'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</a>";
                echo "</div>";
                echo "<h4><a href='product-detail.php?id=" . $row1['iID'] . "'>" . substr($row1['product_name'] ,0, 50) . "...</a></h4>";
                echo "<h4 class='giaban'>" . number_format($row1['cost']) . " VND</h4>";
                echo "</div>";
                echo "</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>

        <div class="products">
            <h5 class="latest-product">Các khóa cơ bản</h5>
            <a class="view-all" href="product-child.php?id=19">XEM TẤT CẢ<span> </span></a>
        </div>
        <div class="product-left">
            <?php
            $id = $_GET['id'];
            mysqli_set_charset($connect, "utf8");
            $sql_td1 = mysqli_query($connect, "select * from product where iid_parent=19 limit 0,4" );
            /*sử dụng vòng lặp để tìm kiếm mã môn tên môn theo id bằng check box*/
            while ($row1 = mysqli_fetch_array($sql_td1)) {
                mysql_query("SET NAMES 'UTF8'");
                echo "<div class='index-product grid-product'>";
                echo "<div class = 'product-grid'>";
                echo "<div class = 'content_box'>";
                echo " <a href='product-detail.php?id=" . $row1['iID'] . "'>";
                echo "<div class='left-grid-view grid-view-left'>";
                echo " <span class='star'>-".$row1['sale']."%</span><img src='" . $row1['img_path'] . "' class='img-responsive watch-right' alt=''/>";
                echo "<div class = 'mask'>";
                echo "<div class = 'info'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</a>";
                echo "</div>";
                echo "<h4><a href='product-detail.php?id=" . $row1['iID'] . "'>" . substr($row1['product_name'] ,0, 50) . "...</a></h4>";
                echo "<h4 class='giaban'>" . number_format($row1['cost']) . " VND</h4>";
                echo "</div>";
                echo "</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>
<div class="clearfix"></div>
</div>
<?php
include('sidebar.php');
?>
<div class="clearfix"></div>
</div>
<?php
include('footer.php');
?>
</body>
</html>
