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


    <!--script-->
</head>
<body>
<?php
include('header.php');
?>
<!-- start content -->
<div class="container">

    <div class="women-product">
        <div class=" w_content">
            <div class="women">
                <a href="#"><h4>Sản phẩm -
                    <span>
                        <!--sử dụng câu lệnh sql để tìm kiếm 1 sản phẩm qua tên hoặc từ có trong đó-->
                        <?php
                        $conn = mysql_connect("localhost", "root", "") or die("die");
                        mysql_select_db("educative");
                        $search = addslashes($_GET['search']);
                        $sql = "SELECT * FROM `product` where (product_name like '%$search%')";
                        $query = mysql_query($sql);
                        $row = mysql_num_rows($query);
                        echo $row;

                        ?>
                    </span></h4></a>
                <ul class="w_nav">
                    <li>Sort :</li>
                    <li><a class="active" href="#">popular</a></li>
                    |
                    <li><a href="#">new </a></li>
                    |
                    <li><a href="#">discount</a></li>
                    |
                    <li><a href="#">price: Low High </a></li>
                    <div class="clearfix"></div>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- grids_of_4 -->


        <?php
        mysqli_set_charset($connect, "utf8");
        $sql_td1 = mysqli_query($connect, "select * from product where product_name like '%$search%'");
        /*sau khi tìm kiếm được sản phẩm thì sử dụng vòng lặp để in ra cấu trúc của sản phẩm có chứa từ khóa tìm kiếm*/
        while ($row1 = mysqli_fetch_array($sql_td1)) {
            mysql_query("SET NAMES 'UTF8'");
            echo "<div class='grid-product'>";
            echo "<div class='product-grid'>";
            echo "<div class='content_box'>";
            echo " <a href='product-detail.php?id=" . $row1['iID'] . "'>";
            echo "<div class='left-grid-view grid-view-left'>";
            echo " <img src='" . $row1['img_path'] . "' class='img-responsive watch-right' alt=''/>";
            echo "<div class='mask'>";
            echo "<div class='info'>";
            echo "SFSDFDF";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</a>";
            echo "</div>";
            echo "<h4><a href='product-detail.php?id=" . $row1['iID'] . "'>" . $row1['product_name'] . "</a></h4>";
            echo "<h4 class='giaban'>" . number_format($row1['cost']) . " VND</h4>";
            echo "<p>" . substr($row1['description'], 1, 100) . "...</p>";
            echo "</div>";
            echo "</div>";
        }
        ?>
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
