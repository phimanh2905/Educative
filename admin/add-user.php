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
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css"/>
    <link rel="stylesheet" href="assets/css/Markdown.Editor.hack.css"/>
    <link rel="stylesheet" href="assets/plugins/CLEditor1_4_3/jquery.cleditor.css"/>
    <link rel="stylesheet" href="assets/css/jquery.cleditor-hack.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap-wysihtml5-hack.css"/>
    <style>
        ul.wysihtml5-toolbar > li {
            position: relative;
        }
    </style>
    <!-- END PAGE LEVEL  STYLES -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="assets/plugins/ckeditor/ckeditor.js"></script>
    <script src="assets/plugins/ckeditor/samples/js/sample.js"></script>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="padTop53 ">

<!-- MAIN WRAPPER -->
<div id="wrap">

    <?php include('header.php') ?>
    <?php include('sidebar.php') ?>
    <?php

    include('../host.php');
    mysqli_set_charset($connect, "utf8");
    mysql_query("SET NAMES 'UTF8'");
    ?>
    <!--PAGE CONTENT -->
    <div id="content">
        <form name="form" action="add-user.php" method="post" enctype="multipart/form-data">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="add-h2">Thêm tài khoản</h2>
                    </div>
                </div>
                <label class="label-product">User</label>
                <input class="abc-form form-control animated slideInRight" value=""
                       type="text" name="add_user">
                <label class="label-product">Pass</label>
                <input class="abc-form form-control animated slideInRight" value=""
                       type="text" name="add_pass">
                <label class="label-product">Họ tên</label>
                <input class="abc-form form-control animated slideInRight" value=""
                       type="text" name="add_name">
                <label class="label-product">Email</label>
                <input class="abc-form form-control animated slideInRight" value=""
                       type="text" name="add_mail">
                <label class="label-product">Avatar</label>
                <input class="abc-form form-control animated slideInRight" value=""
                       type="text" name="add_avt">
                <label class="label-product">Lever</label>

                <input class="abc-form form-control animated slideInRight" value=""
                       type="text" name="add_lvl">
                
<!--
                <select class="abc-form form-control animated slideInRight" value=""
                        type="text" name="add_lvl">
                    <option></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>-->
                <button type="submit" class="btn btn-success sb-save" name="submit-add">Thêm mới</button>
            </div>

        </form>
    </div>
    <!--END PAGE CONTENT -->
</div>
<?php
if (isset($_POST["submit-add"]))
/*kiêm tra nút thêm đã được click chưa, nếu được thì tạo 2 biến để lưu dữ liệu*/
{
    $add_user = $_POST['add_user'];
    $add_pass = $_POST['add_pass'];
    $add_name = $_POST['add_name'];
    $add_mail = $_POST['add_mail'];
    $add_avt = $_POST['add_avt'];
    $add_lvl = $_POST['add_lvl'];
    if (isset($add_user) != '') {
        include('../host-phpold.php');
        $sqladd = "SELECT * FROM register WHERE vuser='" . $add_user . "'";
        $queryadd = mysql_query($sqladd);
        if (mysql_num_rows($queryadd) != "") {
            echo "<script>alert('Tên đã tồn tại xin vui lòng nhập lại</script>')";
        } else {
            mysql_query("SET NAMES 'UTF8'");
            $sqladd2 = "INSERT INTO register(vuser,vpass,vname,vmail,vava,vlever)VALUES('" . $add_user . "','" . $add_pass . "','" . $add_name . "','" . $add_mail . "','" . $add_avt . "','" . $add_lvl . "')";
            $queryadd2 = mysql_query($sqladd2);
            echo('<script>location="add-user.php"</script>');
        }
    } else {
        echo "<script>alert('Vui lòng không để trống')</script>";
    }
}
?>
<!--END MAIN WRAPPER -->
<!--PAGE CONTENT -->
<div id="content">
    <div class="inner">
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       danh sách tài khoản
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="add-user.php" method="post">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Pass</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Avatar</th>
                                        <th>Lever</th>
                                        <th>Xóa</th>
                                        <th>Sửa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include('../host.php');
                                    mysqli_set_charset($connect, "utf8");
                                    $sql_td = mysqli_query($connect, "SELECT * FROM register");
                                    /*sử dụng vòng lặp để tìm kiếm mã môn tên môn theo id bằng check box*/
                                    $stt=1;
                                    while ($row = mysqli_fetch_array($sql_td)) {
                                        echo " <tr>";
                                        echo "<td>" . $stt++ . "</td>";
                                        echo "<td>" . $row['vuser'] . "</td>";
                                        echo "<td>" . $row['vpass'] . "</td>";
                                        echo "<td>" . $row['vname'] . "</td>";
                                        echo "<td>" . $row['vmail'] . "</td>";
                                        echo "<td>" . $row['vava'] . "</td>";
                                        echo "<td>" . $row['vlever'] . "</td>";
                                        echo "<td><input name=chk[] class='checkk' type=checkbox value='" . $row['iid_register'] . "'></td>";
                                        echo "<td><a href='adduser_editors.php?id=" . $row['iid_register'] . "'>Sửa</a></td>";
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
                                    $del = mysql_query("DELETE FROM register WHERE iid_register IN ($id)");
                                    if($del) {echo 'Xoá chuyên mục thành công <script>window.location.href = window.location.pathname;</script>';}
                                    else {
                                        echo 'Không thể xoá chuyên mục này';
                                        header("Refresh:0; url=add-user.php");
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

<!-- PAGE LEVEL SCRIPTS -->
<script src="assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script src="assets/plugins/bootstrap-wysihtml5-hack.js"></script>
<script src="assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
<script src="assets/plugins/pagedown/Markdown.Converter.js"></script>
<script src="assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
<script src="assets/plugins/Markdown.Editor-hack.js"></script>
<script src="assets/js/editorInit.js"></script>
<script src="assets/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({
        selector: 'textarea',
        height: 500,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });</script>
<script>
    $(function () {
        formWysiwyg();
    });
</script>

<!--END PAGE LEVEL SCRIPTS -->

</body>
<!-- END BODY -->
</html>
