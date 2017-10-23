


<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Giới Thiệu</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Educative Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 

<!--web-fonts-->
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<!--//web-fonts-->
<!--//fonts-->
<!-- js -->
</head>
<body>
<!-- banner -->
	<div class="banner about-banner-w3ls " id="home">
		<!-- header -->
		<?php 
			include('header.php'); 
		?>
	<!-- //header -->
	<h2>Liên hệ với chúng tôi</h2>
	</div>
<!-- //banner -->
<!-- contact -->
	<div class="contact-agile">
		<div class="faq">
			
			<div class="container">
				<div class="col-md-3 location-agileinfo">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
					</div>
					<h3>Address</h3>
					<h4>54 Triều Khúc , Hà Nội</h4>
					
					<h4>Việt Nam</h4>
				</div>
				<div class="col-md-3 call-agileits">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
					</div>
					<h3>Call</h3>
					<h4>01636679239</h4>
					<h4>01636679239</h4>
					<h4>01636679239</h4>
				</div>
				<div class="col-md-3 mail-wthree">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					</div>
					<h3>Email</h3>
					<h4><a href="mailto:info@example.com">phimanh2905@mail.com</a></h4>
					<h4><a href="mailto:info@example.com">example2@mail.com</a></h4>
					<h4><a href="mailto:info@example.com">example3@mail.com</a></h4>
				</div>
				<div class="col-md-3 social-w3l">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					</div>
					<h3>Social media</h3>
					<ul>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span class="text">Facebook</span></a></li>
						<li class="twt"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span class="text">Twitter</span></a></li>
						<li class="ggp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span class="text">Google+</span></a></li>	
					</ul>
				</div>
				<div class="clearfix"></div>
				<form action="#" method="post">
					<input type="text" name="your name" placeholder="FIRST NAME" required="">
					<input type="text" name="your name" placeholder="LAST NAME" required="">
					<input type="email" name="your email" placeholder="EMAIL" required="">
					<input type="text" name="subject" placeholder="SUBJECT" required="">
					<textarea  name="your message" placeholder="YOUR MESSAGE" required=""></textarea>
					<input type="submit" value="SEND MESSAGE">
				</form>
			</div>
		</div>
	</div>
	<div class="map-w3-agileits">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6147597.273763374!2d8.084369138346274!3d41.20528240044405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d4fe82448dd203%3A0xe22cf55c24635e6f!2sItaly!5e0!3m2!1sen!2sin!4v1476877496594"></iframe>
	</div>
<!-- //contact -->
<!-- Footer -->

			<div class="copyright-wthree">
				
			</div>
<!-- //Footer -->
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

	
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>



 <!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<!--js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->


<!-- script-for-menu -->
					<script>					
						$("span.menu").click(function(){
							$(".top-nav ul").slideToggle("slow" , function(){
							});
						});
					</script>
					<!-- script-for-menu -->

</body>
</html>