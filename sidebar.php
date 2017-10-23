<?php
require_once "config.php";
mysql_query("SET NAMES 'UTF8'");
mysqli_set_charset($connection, "utf8");
/*tạo dựng menu*/
function  buiding_menu($parent, $menuData)
{
    $html = "";
    if (isset($menuData['iparent'][$parent])) {
        $html .= "<ul class='menu'>";
        foreach ($menuData['iparent'][$parent] as $value)
        {
            $html .= "<li>";
            $html .= "<a href='product-child.php?id=" . $menuData['items'][$value]['iid_menu'] . "'>" . $menuData['items'][$value]['vname'] . "</a>";
            $html .= buiding_menu($value, $menuData);
            $html .= "</li><script>$(function(){
$('.menu').prev('a').attr('href','#')
})</script>";
        }
        $html .= "</ul>";
    }
    return $html;
}

$result = $db->select($connection, "SELECT * FROM menu");
foreach ($result as $value) {
    $menuData['items'][$value['iid_menu']] = $value;//Lưu dữ liệu các biến có id khác nh
    $menuData['iparent'][$value['iparent']][] = $value['iid_menu'];
}
?>
<script>
    $('.menu').find('a').attr('href','#');
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="author" content="David Evans"/>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
    <title></title>
</head>
<body>
<div class="group-side">

    <div class="sub-cate">
        <div class=" top-nav rsidebar span_1_of_left">
            <h3 class="cate"><a href="#">DANH MỤC</a></h3>
            <?php
            echo buiding_menu(0, $menuData);
            ?>
        </div>
    </div>
    <script >
        $('.menu > li > .menu').hide();
        $('.menu > li').hover(function(){
            $(this).find('.menu').slideDown();
        },function(){
            $(this).find('.menu').slideUp();
        })
    </script>

    <?php
    mysqli_set_charset($connect, "utf8");
    $sql_td = mysqli_query($connect, "SELECT * FROM banner_left");
    /*sử dụng vòng lặp để tìm kiếm mã môn tên môn theo id bằng check box*/
    while ($row = mysqli_fetch_array($sql_td)) {
        echo "<a href='". $row['vlink_image_banner'] . "'>";
        echo "<img src='" . $row['vpath_image_banner'] . "' class='img-sidebar'></a>";
    }
    ?>
</div>
</body>
</html>
