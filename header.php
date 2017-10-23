<a href="show_cart.php" id="icon_cart"></a>
<style>
    #icon_cart{
        width: 50px;
        height: 50px;
        background: url("Image/cart.png") no-repeat;
        background-size: 100%;
        right: 0;
        position: absolute;
    }

</style>
<script src="js/jqueryEasing.js"></script>
<script>
        (function($){

            $.fn.advScroll = function(option) {
                $.fn.advScroll.option = {
                    marginTop:90,
                    easing:'easeOutBack',
                    timer:100
                };

                option = $.extend({}, $.fn.advScroll.option, option);

                return this.each(function(){
                    var el = $(this);
                    $(window).scroll(function(){
                        t = parseInt($(window).scrollTop()) + option.marginTop;
                        el.stop().animate({marginTop:t},option.timer,option.easing);
                    })
                });
            };
            $('#icon_cart').advScroll({
                easing:'easeOutBack',
                timer:100
            });
        })(jQuery);

</script>
<script></script>
<!--header-->
<a href="#" id="go_top"></a>
<div class="header">
    <div class="top-header">
            <div class="container">
                <div class="top-header-left">
                    <ul class="support">
                        <li><a href="#"><label> </label></a></li>
                        <li><a href="#">24/7<span class="live"> Hỗ trợ</span></a></li>
                    </ul>
                    <ul class="support">
                        <li class="van"><a href="#"><label> </label></a></li>
                        <li><a href="#">Liên hệ sau 15 phút mua khóa học</a></li>
                    </ul>
                    <div class="clearfix"> </div>
                </div>
                <div class="top-header-right">
                 <div class="down-top">     
                          <select class="in-drop">
                              <option value="Vietnamese" class="in-of">Vietnamese</option>
                              <option value="English" class="in-of">English</option>

                            </select>
                     </div>
                    <div class="down-top top-down">
                          <select class="in-drop">
                          
                          <option value="VNĐ" class="in-of">VNĐ</option>
                          <option value="Dollar" class="in-of">Dollar</option>

                            </select>
                     </div>
                     <!---->
                    <div class="clearfix"> </div>   
                </div>
                <div class="clearfix"> </div>       
            </div>
    </div>
    <div class="bottom-header">
        <div class="container">
            <div class="header-bottom-left">
                <div class="logo">
                    <a href="index.php"> Educative</a>
                </div>
                <!--tìm kiếm-->
                <div class="search">
                    <form action="search.php" method="get">
                        <input name="search" type="text" value="" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = '';}">
                        <input name="search-submit" type="submit" value="TÌM KIẾM">
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="header-bottom-right">
                <ul id="menu-top">
                    <li><a href="contact.php">Liên hệ</a> </li>
                </ul>
                
                <?php
                include("host-phpold.php");
                session_start();
                /*kiểm tra vlever để cho phép hiển thị icon và link dẫn ở trong header*/
                if(isset($_SESSION['vuser']) && $_SESSION['vlever']==1 || $_SESSION['vlever']==2 || $_SESSION['vlever']==3 ){?>
                    <div class="account logout"><a href="logout.php"><span> </span>ĐĂNG XUẤT</a></div>
                    <div class="account"><a href="admin"><span> </span><?php echo"".$_SESSION['vuser']; ?></a></div>
                <?php
                }else if(isset($_SESSION['vuser']) && $_SESSION['vlever']==4){
                    ?>
                    <div class="account logout"><a href="logout.php"><span> </span>ĐĂNG XUẤT</a></div>
                    <div class="account"><a href="login.php"><span> </span><?php echo"".$_SESSION['vuser']; ?></a></div>
                <?php }
                else{
                    if(isset($_POST['sub-login'])){
                        $sql=mysql_query('SELECT * FROM register where vuser="'.$_POST['user-login'].'" and vpass="'.$_POST['pw-login'].'"');
                        if(mysql_num_rows($sql)>0){
                            echo " Chào bạn ".$_POST['user-login'];
                            $userInfo = mysql_fetch_assoc($sql);
                            $_SESSION['vuser'] = $userInfo['vuser'];
                            $_SESSION['vlever'] = $userInfo['vlever'];
                            header("location:index.php");
                        }else{
                            echo " <script>
                                   alert('Tên đăng nhập hoặc mật khẩu không đúng')
                                </script>";
                        }
                    }?>
                    <ul class="login">
                        <li><a href="login.php"><span> </span>ĐĂNG NHẬP</a></li>
                        |
                        <li><a href="register.php">ĐĂNG KÝ</a></li>
                    </ul>
                <?php
                }
                ?>

                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
</div>

<!---->