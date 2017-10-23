<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>Educative</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
     <!-- END HEAD -->
     <!-- BEGIN BODY -->
<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">

        <?php include('header.php') ?>
        <?php include('sidebar.php') ?>

        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="list-product"> Nhận thông tin mới </h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Đăng kí nhận tất cả nhận thông tin mới qua email
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <form action="contact-list.php" method="post">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('../host.php');
                                        mysqli_set_charset($connect, "utf8");
                                        $sql_td = mysqli_query($connect, "SELECT * FROM newsfeed");
                                        /*sử dụng vòng lặp để tìm kiếm mã môn tên môn theo id bằng check box*/
                                        $stt=1;
                                        while ($row = mysqli_fetch_array($sql_td)) {
                                            echo " <tr>";
                                            echo "<td>" . $stt++ . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td><input name=chk[] class='checkk' type=checkbox value='" . $row['id'] . "'></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                    <label><input type="checkbox" id="checkAll" /> Chọn tất cả</label>
                                <input type="submit" name='btn-delete' class="btn btn-danger btn-delete" value="Xóa">
                                </form>
                                <?php
                                if (isset($_POST['btn-delete'])) {
                                    if (empty($_POST['chk'])) {
                                        echo "<script>alert('Vui lòng chọn dòng cần xóa')</script>";
                                    } else {
                                        if (is_array($_POST['chk']))
                                        {
                                            $id = join($_POST['chk'], ',');
                                        }
                                        $del = mysql_query("delete from newsfeed where id IN ($id)");
                                        if($del) {echo 'Xoá chuyên mục thành công <script>window.location.href = window.location.pathname;</script>';}
                                        else {
                                            echo 'Không thể xoá chuyên mục này';
                                            header("Refresh:0; url=product-list.php");
                                        }
                                    }
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>

     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
     <script>
         $(function(){
             $("#checkAll").click(function () {
                 $(".checkk").attr('checked','checked');
             });
         });
     </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
