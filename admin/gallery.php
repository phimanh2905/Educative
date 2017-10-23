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
                    <h2 class="list-product"> Thư viện hình ảnh </h2>
                    <form class="form-upload" action="gallery.php" method="post" enctype="multipart/form-data">
                        <label class="add-product label-upload" for="upload-image">Upload ảnh</label>
                        <input type="file" name="file" id="upload-image" >
                        <input type="submit" name="upload-image" class="upload-image btn btn-success" value="Tải lên">
                    </form>
                </div>
            </div>
            <?php
            if(isset($_POST['upload-image'])){
                if($_FILES['file']['name']!=""){
                    if($_FILES['file']['type']=="image/png"||$_FILES['file']['type']=="image/jpeg"){
                        if($_FILES['file']['size']>500000){
                            echo('<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <b>Lưu ý:</b> Bạn chỉ được tải lên hình ảnh < 500Kb</div>');
                        }else{
                            $name=$_FILES['file']['name'];
                            $path="../educative/Image/".$name;
                            $type=$_FILES['file']['type'];
                            $size=$_FILES['file']['size'];
                            $tmp_name=$_FILES['file']['tmp_name'];
                            move_uploaded_file($tmp_name,$path);
                            echo('<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Tải lên thành công</div>');
                        }
                    }else{
                        echo('<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Sai định dạng (chỉ được tải lên định dạng: PNG - JPG)</div>');
                    }
                }else{
                    echo('<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Chưa chọn file</div>');
                }
            }
            ?>
            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tất cả danh sách hình ảnh
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <form action="product-list.php" method="post"> <!-- lay anh trong product-list.php-->
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>Tên hình ảnh</th>
                                            <th>Hình ảnh</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $folder_path = '../educative/Image/'; //image's folder path

                                        $num_files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);

                                        $folder = opendir($folder_path);

                                        if($num_files > 0)
                                        {
                                            while(false !== ($file = readdir($folder)))
                                            {
                                                $file_path = $folder_path.$file;
                                                $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
                                                if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp')
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><a class="style-link" href="<?php echo $file_path; ?>"><?php echo $file ?></a></td>
                                                        <td><img class="img-upload" src="<?php echo $file_path; ?>" /></td>
                                                    </tr>
                                                <?php
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "the folder was empty !";
                                        }
                                        closedir($folder);
                                        ?>

                                        </tbody>
                                    </table>
                                </form>

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
