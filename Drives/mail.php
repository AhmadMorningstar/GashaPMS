
<!DOCTYPE html>
<html>
<head>
	<!--favicon-->
		<link rel="shortcut icon" href="favicon.ico" type="image/icon">
		<link rel="icon" href="favicon.ico" type="image/icon">
<title>Gasha Institute | Contact Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tillage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- bootstarp-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstarp-css -->
<script src="js/jquery-1.11.1.min.js"></script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,800,700,600' rel='stylesheet' type='text/css'>
<!--/fonts-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<script>
	 new WOW().init();
</script>
</head>
<body>
	<!-- banner -->
	<div class="banner a-banner">
		<!-- container -->
		<div class="container">
			<div class="header">
				<div class="head-logo">
					
				</div>
				<div class="top-nav">
					<span class="menu"><img src="images/menu.png" alt=""></span>
					<ul class="nav1">
						<li class="hvr-sweep-to-bottom">
								<a href="/index.php">Gasha Institute<i>Goto Placement Homepage</i></a>
							</li>
						<li class="hvr-sweep-to-bottom">
								<a href="/Drives/index.php">Home<i>Get the Overview of the Site</i></a>
								<li class="hvr-sweep-to-bottom">
								<a href="/Drives/about.php">About Us<i>About Us and our Chief Architects</i></a>
								</li>
								<li class="hvr-sweep-to-bottom">
									<a href="/Drives/products.php">Drives<i>View Drives</i></a>
								</li>
								
								<li class="hvr-sweep-to-bottom active">
									<a href="/Drives/mail.php">Mail Us<i>Get in Touch with us</i></a>
								</li>
						<div class="clearfix"> </div>
					</ul>
					<!-- script-for-menu -->
							 <script>
							   $( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								  });
								 });
							</script>
						<!-- /script-for-menu -->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner -->
	<!-- mail -->
	<div class="mail">
		<!-- container -->
		<div class="container">
			<div class="map footer-middle wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3219.2006848836445!2d44.06548757637905!3d36.210316800727966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x400721db8c6c8ac1%3A0x60d41290f6f2bbfc!2zR2FzaGEgTm9uLWdvdmVybWVudGFsIEluc3RpdHV0ZSAo2b7blduM2YXYp9mG2q_blduMINqv25XYtNuV24wg2YbYp9it2YPZiNmF24wp!5e0!3m2!1sen!2siq!4v1738846176784!5m2!1sen!2siq" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>			</div>
			<div class="mail-grids">
				<div class="col-md-6 mail-grid-left wow fadeInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h1>Contact Us</h1>		
					<h2>Gasha Institute</h2>
					<h3><a href="https://maps.app.goo.gl/wEgKfHwuPMokMC2q9" class="meow">120m Str, Erbil, Erbil Governorate, 44001</a></h3>
					<h3>Google Maps Plus Code: <a href="https://www.google.com/maps/place/6369%2B46,+Erbil/" class="meow">6369+46 Erbil</a></h3>
					<h4>Get In Touch</h4>
					<p class="meoww">Telephone: <span class="meowww">+964 0751 217 5799</span></p>
					<p class="meoww">E-mail: <a href="mailto:7alberteinstein5@gmail.com">7alberteinstein5@gmail.com</a></p>
				</div>
				<div class="col-md-6 contact-form wow fadeInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
				<form id="contactForm">
    					<input type="text" name="name" placeholder="Your Name" required>
    					<input type="text" name="email" placeholder="Your Email" required>
    					<input type="text" name="subject" placeholder="Subject" required>
    					<textarea name="message" placeholder="Your Message" required></textarea>
    					<input type="submit" value="Send">
				</form>

				<script>
    document.getElementById("contactForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form submission

        // Create FormData object to send form data
        const formData = new FormData(this);

        // Make an AJAX request to submit.php
        fetch("submit.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Show the success message
            if (data.includes("Message sent successfully!")) {
                alert("Your message was sent successfully!");
            } else {
                alert("Something went wrong. Please try again.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred while sending the message.");
        });

        // Optionally reset the form after submission
        this.reset();
    });
</script>

				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //mail -->
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