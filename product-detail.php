<?php include "host.php"; include "db.php";
include "functions.php";
if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
    $pid=$_REQUEST['productid'];
    addtocart($pid,1);
    header("location:show_cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Educative</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/etalage.css" type="text/css" media="all"/>
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="UTF-8">
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

    <script src="js/jquery.etalage.min.js"></script>
    <script>
        jQuery(document).ready(function ($) {

            $('#etalage').etalage({
                thumb_image_width: 300,
                thumb_image_height: 400,
                source_image_width: 900,
                source_image_height: 1200,
                show_hint: true,
                click_callback: function (image_anchor, instance_id) {
                    alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
                }
            });

        });
    </script>
    <script language="javascript">
        function addtocart(pid){
            document.form1.productid.value=pid;
            document.form1.command.value='add';
            document.form1.submit();
        }
    </script>
</head>
<body>
<?php
include('header.php');
?>

<div class="container">
    <form name="form1">
        <input type="hidden" name="productid" />
        <input type="hidden" name="command" />
    </form>
    <div class=" single_top">
        <?php
        $id = $_GET['id'];
        mysqli_set_charset($connect, "utf8");
        $result = mysqli_query($connect, "select * from product where iID=" . $id);
        while ($row = mysqli_fetch_array($result)) {
            mysql_query("SET NAMES 'UTF8'");
            echo "<div class='single_grid'>";
            echo "<div class='grid images_3_of_2'>";
            echo "<ul id='etalage'><li> <a href='optionallink.html'>";
            echo "<img class='etalage_source_image' src='" . $row['img_path'] . "' class='img-responsive' title=''/>";
            echo "</a></li></ul><div class='clearfix''></div>";
            echo "</div>";
            echo "<div class='desc1 span_3_of_2'>";
            echo "<h4>" . $row['product_name'] . "</h4>";
            echo "<div class='cart-b'>
                            <div class='left-n '>" . number_format($row['cost']) . " VND</div>
                            <a class='now-get get-cart-in' onclick='addtocart(". $row['iID'].")'>ĐẶT HÀNG</a>
                            <div class='clearfix''></div>
                          </div>";
            ?>
            <?php
            echo "<h6>Số lượng: " . $row['quantity'] . "</h6>
                <p>" . $row['description'] . "</p>";
            echo "</div>";
            echo "</div>";
            echo "<div class='clearfix'></div>";
            echo " <div class='toogle'>
            <h3 class='m_3'>Thông tin chi tiết</h3>

            <p class='m_text'>" . $row['note'] . "</p>
        </div>";
        }
        mysqli_close($con);
        ?>
        <h6 class="sp_khac">Sản phẩm khác</h6>
        <ul id="flexiselDemo1">
            <?php
            mysqli_set_charset($connect, "utf8");
            $sql_td1 = mysqli_query($connect, "select * from product ORDER BY RAND() limit 0,20");
            /*sư dụng vòng lặp để show ra những sản phẩm ở bên dưới ngẫu nhiên của 1 sản phẩm chi tiết*/
            while ($row1 = mysqli_fetch_array($sql_td1)) {
                mysql_query("SET NAMES 'UTF8'");
                echo "  <li><img src='" . $row1['img_path'] . "'/>
                <div class='grid-flex'><a href='product-detail.php?id=" . $row1['iID'] . "'>" . $row1['product_name'] . "</a>
                <p>" . number_format($row1['cost']) . "</p></div>
                </li>";
            }
            mysqli_close($con);
            ?>


        </ul>
        <script type="text/javascript">
            $(window).load(function () {
                $("#flexiselDemo1").flexisel({
                    visibleItems: 5,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint: 480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint: 640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint: 768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>
        <script type="text/javascript" src="js/jquery.flexisel.js"></script>
    </div>

    <!---->
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