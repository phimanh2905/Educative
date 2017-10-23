<?php include "host.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Educative</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!--//theme-style-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!--fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <script src="js/jquery.min.js"></script>
    <!--script-->
</head>
<body>
<?php
include('header.php');
?>

<div class="container">

    <!---->
    <div class="main">
        <div class="reservation_top">
            <div class=" contact_right">
                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>

                <!--tạp liên hệ hiển thị địa chỉ qua google map-->
                <script type='text/javascript'></script>
                <h3>Liên hệ</h3>
                <script type="text/javascript">
                    
                    function validate()
                      {
                      
                         if( document.myForm.name-addr.value == "" )
                         {
                            alert( "Nhập name!" );
                            document.myForm.name-addr.focus() ;
                            return false;
                         }
                         
                         if( document.myForm.email-addr.value == "" )
                         {
                            alert( "Nhập Email!" );
                            document.myForm.email-addr.focus() ;
                            return false;
                         }
                         
                         if( document.myForm.content-addr.value == "" )
                         {
                            alert( "Nhập nội dung!" );
                            document.myForm.content-addr.focus() ;
                            return false;
                         }
                         
                         // if( document.myForm.Country.value == "-1" )
                         // {
                         //    alert( "Please provide your country!" );
                         //    return false;
                         // }
                         return( true );
      }
                </script>
                <div class="contact-form">
                    <form name="myForm">
                        <!--cấu trúc trong của liên hệ-->
                        <input id="name-addr" name="name-addr" type="text" class="textbox" value="Họ tên" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Họ tên';}" required>
                        <input id="email-addr" name="email-addr" type="text" class="textbox" value="Email" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Email';}" required>
                        <textarea id="content-addr" name="content-addr" value="Nội dung" onfocus="this.value= '';"
                                  onblur="if (this.value == '') {this.value = 'Nội dung';}" required>Nội dung</textarea>
                        <input type="button" value="Gửi" name="submit-add" onsubmit="return(validate());">
                        
                        <div class="clearfix"></div><br>
                        <div id="alert" class='alert alert-success alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true''>&times;</span></button>
                            <strong></strong> Gửi thông tin thành công</div>
                        <script>
                            $(function(){
                                $('#alert').hide();
                            })
                        </script>
                    </form>
                    <!--sử dụng ajax để load form trực tiếp mà ko cần tải lại trang-->
                    <script language="javascript">
                            function load_ajax_contact() {
                                $.ajax({
                                    url: "ajax.php",
                                    type: "post",
                                    dateType: "text",
                                    data: {
                                        name_addr: $('#name-addr').val(),
                                        email_addr: $('#email-addr').val(),
                                        content_addr: $('#content-addr').val()
                                    },
                                    success: function (result) {
                                        $('#alert').fadeIn();
                                    }
                                });
                            }
                    </script>

                    <address class="address">
                        <ul>
                            <li><b>Phí Hồng Mạnh</b></li>
                            <li>243 Tam Trinh</li>
                            <li><b>Email:</b> phimanh2905@gmail.com <b>Điện thoại:</b> 01636679239 </li>
                            <li></li>
                        </ul>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('sidebar.php');
    ?>
</div>
<!---->
<?php
include('footer.php');
?>
</body>
</html>