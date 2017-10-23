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
     <!-- PAGE vlever STYLES -->
     <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/plugins/magic/magic.css" />
     <!-- END PAGE vlever STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
        <img src="http://localhost/educative/images/2323.png" id="logoimg" alt=" Logo" />
    </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <?php
            include('../host-phpold.php');
            session_start();
            /*bien kiem tra dieu kien ten va vpass cua phan dang nhap*/
            if (isset($_SESSION['vuser']) && $_SESSION['vlever']==1 || $_SESSION['vlever']==2 || $_SESSION['vlever']==3) /*kiểm tra biến lưu đã tồn tại chưa*/ {
                /*nếu đã tồn tại chuyển đến form nhapmonhoc và tạo 1 thẻ a là logout*/
                echo("<script>location='index.php'</script>");
                header("Location: index.php");

            }else if(isset($_SESSION['vuser']) && $_SESSION['vlever']==4 ){
                echo("<script>location='../index.php'</script>");
                header("Location: ../index.php");
            } else {
                /*nếu nút đăng nhập được kick*/
                if (isset($_POST['submit-login'])) /*thực hiện các lệnh bên trong*/ {
                    $sql = mysql_query('select * from register where vuser="' . $_POST['vusername'] . '" and vpass="' . $_POST['vpassword'] . '"');
                    if (mysql_num_rows($sql) > 0) {
                        $vuserInfo = mysql_fetch_assoc($sql);
                        $_SESSION['vuser'] = $vuserInfo['vuser'];
                        $_SESSION['vlever'] = $vuserInfo['vlever'];
                        echo("<script>location='index.php'</script>");
                        header("Location: index.php");
                    }
                    /*else ngược lại in ra 1 dòng đăng nhập sai*/
                    {
                        echo "<div class='alert alert-warning alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true''>&times;</span></button>
        <strong></strong> Tên đăng nhập hoặc mật khẩu sai</div>";
                        echo "";
                    }
                } ?>
                <form action="login.php" class="form-signin" method="post">
                    <input type="text" placeholder="vusername" name="vusername" class="form-control" />
                    <input type="password" placeholder="vpassword" name="vpassword" class="form-control" />
                    <input class="btn text-muted text-center btn-danger" name="submit-login" type="submit" value="Đăng nhập">
                </form>
            <?php
            }
            ?>

        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.html" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
                <input type="email"  required="required" placeholder="Your E-mail"  class="form-control" />
                <br />
                <button class="btn text-muted text-center btn-success" type="submit">Recover password</button>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form action="index.html" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Please Fill Details To Register</p>
                 <input type="text" placeholder="First Name" class="form-control" />
                 <input type="text" placeholder="Last Name" class="form-control" />
                <input type="text" placeholder="vusername" class="form-control" />
                <input type="email" placeholder="Your E-mail" class="form-control" />
                <input type="password" placeholder="vpassword" class="form-control" />
                <input type="password" placeholder="Re type vpassword" class="form-control" />
                <button class="btn text-muted text-center btn-success" type="submit">Register</button>
            </form>
        </div>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE vlever SCRIPTS -->
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
   <script src="assets/js/login.js"></script>
      <!--END PAGE vlever SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
