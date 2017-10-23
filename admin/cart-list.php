<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8"/>
    <title>Educative</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="assets/css/theme.css"/>
    <link rel="stylesheet" href="assets/css/MoneAdmin.css"/>
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css"/>
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->

    <link href="assets/css/jquery-ui.css" rel="stylesheet"/>

    <!-- END PAGE LEVEL  STYLES -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="padTop53 ">

<!-- MAIN WRAPPER -->
<div id="wrap">
    <?php include('header.php') ?>
    <?php include('sidebar.php') ?>

    <!--PAGE CONTENT -->
    <div id="content">

        <div class="inner">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh sách đơn hàng</h1>
                </div>
            </div>

            <?php
            include('../host.php');
            mysqli_set_charset($connect, "utf8");
            $sql_td2 = mysqli_query($connect, "SELECT * FROM customers");
            /*sử dụng vòng lặp để tìm kiếm mã môn tên môn theo id bằng check box*/
            $stt=0;

            while ($row2 = mysqli_fetch_array($sql_td2)) {
                $stt++;
                echo '<div class="row">
                <div class="col-lg-12">
                    <div class="box dark">
                        <header>
                            <div class="icons"><a href="delete_cart.php?serial='.$row2['serial'].'" name="delete_cart"><i class="icon-remove"></i></a></div>
                            <h5>'. $row2['name'] .'</h5>

                            <div class="toolbar">
                                <ul class="nav">
                                    <li>
                                        <a class="accordion-toggle minimize-box collapsed" data-toggle="collapse" href="#div-'.$stt.'">
                                            <i class="icon-chevron-down"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </header>
                        <div id="div-'.$stt.'" class="accordion-body body collapse">
                            <div class="form-group">
                                <label class="control-label fix_col col-lg-6">Tên khách hàng: <b>'.$row2['name'].'</b></label>
                                <label class="control-label fix_col col-lg-6">Email: <b>'.$row2['email'].'</b></label>
                                <label class="control-label fix_col col-lg-6">Số điện thoại: <b>'.$row2['phone'].'</b></label>
                                <label class="control-label fix_col col-lg-6">Địa điểm giao hàng: <b>'.$row2['address'].'</b></label>
                            </div>
                            <form action="cart-list.php" method="post">
                                <table class="table table-striped table-bordered table-hover table_cart" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá bán</th>
                                    </tr>
                                    </thead>
                                    <tbody>';
                                    include('../host.php');
                                    mysqli_set_charset($connect, "utf8");
                                     $sql_td = mysqli_query($connect, "SELECT * FROM order_detail where orderid=".$row2[0]);
                                    /*lay tat ca trong order_detail */
                                    while ($row = mysqli_fetch_array($sql_td)) {
                                        echo " <tr>";
                                        echo "<td>";
                                        $sql_sp = mysqli_query($connect, "SELECT * FROM product where iID=".$row['productid']) ;
                                        /*lay id ( product ) = productid( order_detail ))*/
                                        while ($rowsp = mysqli_fetch_array($sql_sp)) {
                                            echo $rowsp['product_name'];
                                            /* lay ten san pham trong product */
                                        }
                                        echo "</td>";
                                        echo "<td>" . $row['quantity'] . "</td>";
                                        echo "<td>" . number_format($row['price']) . " VND</td>";
                                        echo "</tr>";
                                        
                                        /*echo cac thuoc tinh trong order_detail */
                                    }
                                    echo ' </tbody>
                                </table>';
                                echo '<a class="export_excel" href="export.php?id='.$row2[0].'"> Xuất Excel</a>';
                            echo '</form>';
                        echo '</div>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
    </div>


</div>
<!-- END PAGE CONTENT -->

</div>


<!--END MAIN WRAPPER -->

<!-- FOOTER -->
<div id="footer">
    <p>&copy; binarytheme &nbsp;2014 &nbsp;</p>
</div>
<!--END FOOTER -->


<!-- GLOBAL SCRIPTS -->
<script src="assets/plugins/jquery-2.0.3.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<!-- END GLOBAL SCRIPTS -->


<!-- PAGE LEVEL SCRIPT-->
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/formsInit.js"></script>
<script>
    $(function () {
        formInit();
    });
</script>


<!--END PAGE LEVEL SCRIPT-->

</body>
<!-- END BODY -->
</html>
