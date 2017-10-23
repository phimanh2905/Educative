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
        <?php
        /**
         * Created by JetBrains PhpStorm.
         * User: David Evans
         * Date: 08/03/2012
         * Time: 20:11
         * To change this template use File | Settings | File Templates.
         */
        require_once "../config.php"; 
        // sua ten database trong file ../config.php
        
        $result=$db->select($connection,"SELECT * FROM menu ORDER BY iid_menu");
        foreach($result as $value){
            @$menuData['items'][$value['iid_menu']]=$value; 
            // tham so items la gi. o dau ?
            
            @$menuData['iparent'][$value['iparent']][]=$value['iid_menu'];
            // bien menuData ? 
            
        }
        function select_menu($parent,$menuData,$text="--"){
            $html="";
            if(isset($menuData['iparent'][$parent])){
                foreach($menuData['iparent'][$parent] as $value){
                    $html.="<option value='{$value}'>";
                    $html.=$text.$menuData['items'][$value]['vname'];
                    $html.="</option>";
                    $html.= select_menu($value,$menuData,$text."--");
                }
            }
            return $html;
        }
        if(isset($_POST['submit'])){

            if(!empty($_POST['menu'])){
                $menu_name=addslashes($_POST['menu']);
                $parent=addslashes($_POST['menu_id']);

                if($db->insert($connection,"INSERT INTO menu(vname,iparent) VALUE('{$menu_name}',{$parent})")==true){
                    $insert='<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Thêm menu thành công</div>';
                }
                else $insert='<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Không cập nhật được Menu</div>';
            }
            else echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Không được để trống tên Menu</div>';
        }

        ?>
<?php
        if(isset($_SESSION['vuser']) && $_SESSION['vlever']==1 ){?>

        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm mới Menu</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Danh sách Menu
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="add-menu.php" method="post">
                                            <div class="form-group">
                                                <label>Chọn cấp cha</label>
                                                <select class="form-control" name="menu_id">
                                                    <option value="0">None</option>
                                                    <?php echo select_menu(0,$menuData);?>
                                                </select><br>
                                                <label>Tên Menu</label>
                                                <input class="form-control" type="text" name="menu"/><br>
                                                <input type="submit" name="submit" value="Thêm menu" class="btn btn-success"/>
                                            </div>
                                        </form>
                                        <p><?php if(isset($insert)) echo $insert;?></p>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>




        </div>
        <!--END PAGE CONTENT -->

    </div>


    <?php
        }else if(isset($_SESSION['vuser']) && $_SESSION['vlever']==2){

        }else if(isset($_SESSION['vuser']) && $_SESSION['vlever']==3){

        }else{

        }
        ?>


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
     
</body>
     <!-- END BODY -->
</html>
