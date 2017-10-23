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
    /*lấy id truyền sang*/
    $id = $_GET['id'];
    /* id trong nay la id nao */
    include('../host.php');
    mysqli_set_charset($connect, "utf8");
    mysql_query("SET NAMES 'UTF8'");
    $sql_edit = "SELECT * FROM slideshow WHERE iid_image=" . $id;
    $query_edit = mysql_query($sql_edit);
    $row = mysql_fetch_array($query_edit);
    ?>
    <!--PAGE CONTENT -->
    <div id="content">
        <form name="form" action="slideshow_editors.php?id=<?php echo $row['iid_image']; ?>" method="post" enctype="multipart/form-data">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="add-h2">Cập nhật quảng cáo trái</h2>
                    </div>
                </div>
                <label class="label-product">Hình ảnh</label>
                <img src="<?php echo $row['vpath_image'] ?>" class="img-product">
                <input class="abc-form form-control animated slideInRight" value="<?php echo $row['vpath_image']; ?>"
                       type="text" name="edit_images">
                <br>
                 <div class="form-group">
                    <input name="file" type="file" />
                     <span><B>URL </B> (http://localhost/educative/Image/tên file tải lên)</span>
                </div>
                <label class="label-product">Link</label>
                <input class="abc-form form-control animated slideInRight" value="<?php echo $row['vlink_image']; ?>"
                       type="text" name="edit_link">
                <button type="submit" class="btn btn-success sb-save" name="edit-save">Lưu thay đổi</button>
            </div>

        </form>
    </div>
    <!--END PAGE CONTENT -->
</div>
<?php
if (isset($_POST['edit-save'])) {

    $edit_images=$edit_link="";
    $edit_images=$_POST['edit_images'];
    $edit_link=$_POST['edit_link'];
    /*if($_POST['edit_idloai'] == NULL){
        echo "Xin vui lòng nhập ID Loại<br />";
    }else{

    }

    if($_POST['edit_name'] == NULL){
        echo "Xin vui lòng nhập Tên Sản Phẩm<br />";
    }else{

    }

    if($_POST['edit_giaban'] == NULL){
        echo "Xin vui lòng nhập Giá bán<br />";
    }else{

    }

    if($_POST['edit_hinhanh'] == NULL){
        echo "Xin vui lòng nhập Hình ảnh<br />";
    }else{

    }
    if($_POST['edit_soluong'] == NULL){
        echo "Xin vui lòng nhập Số Lượng<br />";
    }else{

    }
    if($_POST['area3'] == NULL){
        echo "Xin vui lòng nhập Mô tả<br />";
    }else{

    }
    if($_POST['ghichu_save'] == NULL){
        echo "Xin vui lòng nhập ghi chú<br />";
    }else{

    }*/
    $sql_save="UPDATE slideshow SET vpath_image='".$edit_images."', vlink_image='".$edit_link."' where iid_image='".$id."'";
    mysql_query($sql_save);
    if($_FILES['file']['name']!=""){
        if($_FILES['file']['type']=="image/png"||$_FILES['file']['type']=="image/jpeg"){
            if($_FILES['file']['size']>500000){
                echo("<script>alert('Kích thước quá lớn')</script>");
            }else{
                echo('Upload file thành công');
                $name=$_FILES['file']['name'];
                $path="../educative/Image/".$name;
                $type=$_FILES['file']['type'];
                $size=$_FILES['file']['size'];
                $tmp_name=$_FILES['file']['tmp_name'];
                move_uploaded_file($tmp_name,$path);


            }
        }else{
            echo('Sai định dạng');
        }
    }else{
        echo("Chưa chọn file");
    }
    echo"<script>window.location.href='slideshow_editors.php?id=".$id."'</script>";
}
?>
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
