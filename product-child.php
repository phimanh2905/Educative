<?php include "host.php" ?>
<!DOCTYPE html>
<html>
<head>
    <title>Educative</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8">
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
    <div class="col-md-4 fix-col-4">
        <a href="#"><img src="http://localhost/educative/Image/fix.png"> </a>
        <!-- thay doi duong dan phan nay -->
    </div>
    <div class="col-md-4 fix-col-4">
        <a href="#"><img src="http://localhost/educative/Image/275x165_(9).jpg"> </a>
    </div>
    <div class="col-md-4 fix-col-4">
        <a href="#"><img src="http://localhost/educative/Image/275x165_penm_hoc_thu.png"> </a>
    </div>
    <div class="women-product">
        <div class=" w_content">
            <div class="women">
            <!-- dua ra so san pham theo id -->
                <a href="#"><h4>Sản phẩm -
                    <span>
                        <?php

                        $id = $_GET['id'];
                        $conn = mysql_connect("localhost", "root", "") or die("die");
                        mysql_select_db("educative");
                        $sql = "SELECT * FROM `product` where iid_parent=" . $id;
                        $query = mysql_query($sql);
                        $row = mysql_num_rows($query);
                        echo $row;

                        ?>
                    </span></h4></a>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- grids_of_4 -->


        <?php
        $id = $_GET['id'];
        mysqli_set_charset($connect, "utf8");
        $sql_td1 = mysqli_query($connect, "select * from product where iid_parent=" . $id);
        ?>
        <?php

        $id = $_GET['id'];
        $conn  = mysql_connect('localhost', 'root', '');
        $db  = mysql_select_db('educative');
/*kiem tra trong 1 trang neu co qua 9 san pham thi day nhung san pham con lai qua trang ke tiep*/
         if (!isset($_GET['page'])) {
             $_GET['page'] = 1;
        }
        mysqli_set_charset($conn, "utf8");
        mysql_query("SET NAMES 'UTF8'");
        $vitri = ($_GET['page'] - 1) * 9;
        $result = mysql_query('select * from product where iid_parent=' . $id.' limit '.$vitri.',9');
/*tạo vòng lặp xây dựng cấu trúc 1 khung hiển thị của từng sản phẩm*/
 while ($row1 = mysql_fetch_assoc($result)) {

     echo "<div class='grid-product'>";
     echo "<div class='product-grid'>";
     echo "<div class='content_box'>";
     echo " <a href='product-detail.php?id=" . $row1['iID'] . "'>";
     echo "<div class='left-grid-view grid-view-left'>";
     echo " <img src='" . $row1['img_path'] . "' class='img-responsive watch-right' alt=''/>";
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
echo "<div class='clear'></div>";
        /*Phan trang*/
 $re = mysql_query('select * from product where iid_parent=' . $id.' ');
 $n = mysql_num_rows($re);
 $tong_so_trang = floor($n/10) + 1;
 for ($i=1 ; $i<=$tong_so_trang ; $i++) {
     if ($i == $_GET['page']) {
         echo ' <a class="phantrang active" >'.$i.'</a> ';
  } else {
         echo '<a class="phantrang" href="product-child.php?id='. $id.'&page='.$i.'">'.$i.'</a>';
   }
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
</html>