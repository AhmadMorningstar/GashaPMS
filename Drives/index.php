<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
?>

<!DOCTYPE html>
<html>
	<head>
		<!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="./favicon.ico" type="image/icon">
		<title>Placement Drives Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
		<meta name="keywords" content="Tillage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript">
			addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
		</script>
		<!-- bootstarp-css -->
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<!--// bootstarp-css -->
		<!-- css -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<!--// css -->
		<script src="js/jquery-1.11.1.min.js"></script>
		<!--fonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,800,700,600'
		rel='stylesheet' type='text/css'>
		<!--/fonts-->
		<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="js/wow.min.js"></script>
		<script>
			new WOW().init();
		</script>
	</head>
	<body>
		<!-- banner -->
		<div class="banner">
			<!-- container -->
			<div class="container">
				<div class="header">
					<div class="head-logo"></div>
					<div class="top-nav">
						<span class="menu">
							<img src="images/menu.png" alt="">
						</span>
						<ul class="nav1">
							<li class="hvr-sweep-to-bottom">
								<a href="/index.php">Gasha Institute<i>Goto Placement Homepage</i></a>
							</li>
							<li class="hvr-sweep-to-bottom active">
								<a href="/Drives/index.php">Home<i>Get the Overview of the Site</i></a>
							</li>
							<li class="hvr-sweep-to-bottom">
								<a href="/Drives/about.php">About Us<i>About Us and our Chief Architects</i></a>
							</li>
							<li class="hvr-sweep-to-bottom">
								<a href="/drives/products.php">Drives<i>View Drives</i></a>
							</li>
							<li class="hvr-sweep-to-bottom">
								<a href="mail.php">Mail Us<i>Get in Touch with us</i></a>
							</li>
							<div class="clearfix"></div>
						</ul>
						<!-- script-for-menu -->
						<script>
							$( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 500, function() {
								 // Animation complete.
								  });
								 });
						</script>
						<!-- /script-for-menu -->
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //container -->
			<div class="container">
				<script src="js/responsiveslides.min.js"></script>
				<script>
					// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
				</script>
				<div id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<div class="banner-info">
								<h2>Do What you Love with
									<span>Passion</span>
								</h2>
								<div class="line"></div>
								<p>Hold back, Our Training and Activities will get Your Script away from Your Laziness. We Dream with You to take You into the
									Reality of it. Just be Interactive and Initiate yourself to the Next Level of Placement Training</p>
							</div>
						</li>
						<li>
							<div class="banner-info">
								<h2>Enrich your Brain with Sleek efforts like a
									<span>Paradise</span>
								</h2>
								<div class="line"></div>
								<p></p>
							</div>
						</li>
						<li>
							<div class="banner-info">
								<h2>We have got all the things you need to be a
									<span>World class</span> Human Being</h2>
								<div class="line"></div>
								<p></p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- //banner -->

		<!-- specialty -->
		<div class="specialty">
			<!-- container -->
			<div class="container">
				<div class="col-md-5 specialty-info wow fadeInLeft animated" data-wow-delay="0.5s" style="visibility: visible; -webkit-animation-delay: 0.5s;">
					<h3>Our Services</h3>
					<h5>Interactive Training and Activities to help an Individual Growth along with the Team Foundation Skills</h5>
					<p>Wrokshops, Creativity Training, Learning Activities and Freedom has been Integral part to Learn the things easily. Our Professionals
						are taken Oath to Keep the Promise to make learning Better with their Intution
						<span></span>
					</p>
					
				</div>
				<div class="col-md-7 specialty-grids">
					<div class="specialty-grids-top">
						<div class="col-md-6 service-box wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
							<figure class="icon">
								<img src="images/1.png" alt="" />
							</figure>
							<h5>Skill Building</h5>
							<p>Building Skills with Standing beside to a Student since a decade. Improving Everyday of the Calendar.</p>
						</div>
						<div class="col-md-6 service-box wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
							<figure class="icon">
								<img src="images/3.png" alt="" />
							</figure>
							<h5>Workshops</h5>
							<p>Find out the number of Workshops that are freequently conducting in our Campus.</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="specialty-grids-top">
						<div class="col-md-6 service-box wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
							<figure class="icon">
								<img src="images/3.png" alt="" />
							</figure>
							<h5>Innovation and Creativity</h5>
							<p>Creating Oppourtunities and Encouraging to Create One with Our Young Scientist Award Winner as Vice-Principal.</p>
						</div>
						<div class="col-md-6 service-box wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
							<figure class="icon">
								<img src="images/4.png" alt="" />
							</figure>
							<h5>Excellence</h5>
							<p>We Follow Excellence rather than forcing to stay behind. Excellence is like a Home for us. Safe and Intutive.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //container -->
		</div>
		<!-- //specialty -->
		<!-- testimonials -->
		<div class="testimonials">
			<div class="container">
				<div class="testimonial-nfo wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h3>Our Motto</h3>
					<h5>We Just Learn with you and we give u a Platform to Improve Youirself</span>
					</h5>
				</div>
				<div class="testimonial-grids wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<div class="testimonial-grid">
						<p>
							<span>"</span>Our Institution is Built with the Endeveour of some great people and We are determined to Express ouselves with
							the Property of True Family Environment. We are Happy to make you learn. Try to Enrich Yourself and Implement to Know More
							than Us.
							<span>"</span>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- //testimonials -->
		<!-- news -->
		
				
			</div>
		</div>
		<!-- //news -->
	<!-- footer -->
	<div class="footer">
			<!-- container -->
			<div class="container">
				<div class="col-md-6 footer-left  wow fadeInLeft animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
					<ul>
						<li>
							<a href="/Drives/index.php">Home</a>
						</li>
						<li>
							<a href="/Drives/about.php">About Us</a>
						</li>
						<li>
							<a href="/Drives/products.php">Drives</a>
						</li>
						<li>
							<a href="/Drives/mail.php">Mail Us</a>
						</li>
					</ul>
					<form>
						<input type="text" placeholder="Email" required="">
						<input type="submit" value="Subscribe">
					</form>
				</div>
				<div class="col-md-3 footer-middle wow bounceIn animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: bounceIn;">
					<h3>Address</h3>
					<div class="address">
						<a href="https://maps.app.goo.gl/QMjYV6wdXHHcMfWo8"><p>120m Str, Erbil, Erbil Governorate, 44001</p></a>
					</div>
					<div class="phone">
						<p>+964 0751 217 5799</p>
					</div>
				</div>
				<div class="col-md-3 footer-right  wow fadeInRight animated animated animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInRight;">
					<h3 style="color: #ede8f5;">Gasha Institute</h3>
					<h4></h4>
					<h4 style="color: #ede8f5;"><a href="/index.php">PMS Home</a></h4></h4>
					<h4 class="wtf">Developed by <a href="https://linkedin.com/in/ahmadadilothmanmawlod" class="wtf">Ahmad Adil Othman Mawlod</a></h4>

					
					<p></p>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //container -->
		</div>
		<!-- //footer -->
		<div class="copyright">
			<!-- container -->
			<div class="container">
				<div class="copyright-right wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<ul>
						<li>
							<a href="https://x.com" class="twitter"> </a>
						</li>
						<li>
							<a href="https://Facebook.com" class="twitter facebook"> </a>
						</li>
						<li>
							<a href="https://google.com" class="twitter chrome"> </a>
						</li>
						<li>
							<a href="https://pintreast.com" class="twitter pinterest"> </a>
						</li>
						<li>
							<a href="https://linkedin.com" class="twitter linkedin"> </a>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //container -->
		</div>
	</body>

</html>