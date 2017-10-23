<!---->
<div class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="latter">
                <h6>Đăng ý nhận thông tin mới</h6>

                <div class="sub-left-right">
                    <form>
                        <input name="name-ip" id="name-ip" type="text" value="Nhập email của bạn..." onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Nhập email của bạn...';}"/>
                        <input class="ip-button-newsfeed" type="button" value="ĐĂNG KÝ" onclick="load_ajax()"/>
                    </form>
                    <script language="javascript">
                        /*sử dụng ajax để load dửi dũ liệu đến admin mà ko load lại trang*/
                        function load_ajax(){
                            $.ajax({
                                url : "ajax.php",
                                type : "post",
                                dateType:"text",
                                data : {
                                    number : $('#name-ip').val()
                                },
                                success : function (result){
                                    alert("Đăng ký nhận thông tin thành công");
                                }
                            });
                        }
                    </script>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="latter-right">
                <p>FOLLOW US</p>
                <ul class="face-in-to">
                    <li><a href="#"><span> </span></a></li>
                    <li><a href="https://www.facebook.com/biet.l.j"><span class="facebook-in"> </span></a></li>
                    <div class="clearfix"></div>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <?php
            include "host.php";
            /*cấu trúc của 1 footer địa chỉ của chi nhánh*/
            mysqli_set_charset($connect, "utf8");
            $sql_tdf = mysqli_query($connect, "SELECT * FROM address_footer");
            /*sử dụng vòng lặp tạo các footer quảng cáo chi nhánh*/
            while ($row = mysqli_fetch_array($sql_tdf)) {
                echo "<div class='footer-bottom-cate col-md-3'><h6>".$row['vname']."</h6><div class='group-footer'>";
                echo "<span>".$row['vaddress']."</span><br>";
                echo "<span>Điện thoại: ".$row['vmobile']."</span>";
                echo "</div></div>";
            }
            ?>
            <script>
                $(document).ready(function(e) {
                    $('#go_top').bind('click',function(){
                        $('html,body').animate({scrollTop:0},500);
                        return false;
                    });
                    $('#go_top').stop(false,true).fadeOut();
                    $(window).bind('scroll',function(){
                        if($(window).scrollTop()==0){
                            $('#go_top').stop(false,true).fadeOut(600);
                        }else{
                            $('#go_top').stop(false,true).fadeIn(600);
                        }
                    });
                });
            </script>
            <div class="clearfix"></div>
            <div class="col-md-12 fix-add-footer">
                <div class="add-footer">
                    <ul>
                        <li>text1</li>
                        <li>text2</li>
                        <li>Email: phimanh2905@gmail.com. Điện thoại: 01636679239</li>
                        <li>text4</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>