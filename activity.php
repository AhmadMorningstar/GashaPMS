<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gasha Institute | Activities</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="activity.css" type="text/css">
    <script>
        // Function to update iframe source when a link inside it is clicked
        function updateIframeSrc(url) {
            var iframe = document.getElementById('activityIframe');
            iframe.src = "proxy.php?url=" + encodeURIComponent(url); // Set iframe to the new clicked URL
        }

        window.onload = function() {
            // Initially set the iframe src to the default URL
            var iframe = document.getElementById('activityIframe');
            iframe.src = "proxy.php?url=https://gie.gasha.edu.iq/activates-news/";

            iframe.onload = function() {
                var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;

                // Listen for clicks on links inside the iframe
                iframeDoc.querySelectorAll('a').forEach(function(link) {
                    link.addEventListener('click', function(event) {
                        event.preventDefault(); // Prevent the default link behavior
                        var clickedUrl = event.target.href; // Get the clicked URL

                        // Update iframe src with the clicked URL
                        updateIframeSrc(clickedUrl);
                    });
                });
            };
        };
    </script>
</head>
<body id="page-top">

                <!-- Navigation Bar !-->
                <nav id="mainNav" class="navbar navbar-default navbar-fixed-top" style="background:black">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="https://gie.gasha.edu.iq/computer-science/">Gasha Institute Computer Science</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="./index.php">Home</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="./jobs.php">Job Vacancy</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#" style="color: #7091e6;">Activities</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="./invitations.php">Invitations</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="./about.php">About us</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="./contact.php">Contact us</a>
                        </li>
                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- Navigation Bar !-->

    <div class="container">
        <!-- The iframe will dynamically load the page when links are clicked -->
        <iframe id="activityIframe" 
                allowfullscreen>
                
        </iframe>
    </div>

    <!-- Footer !-->
    <div class="footer">
			<div class="container">
				<div class="col-md-3 ftr_navi ftr">
					<h3>NAVIGATION</h3>
					<ul>
						<li>
							<a href="./index.php">Home</a>
						</li>
						<li>
							<a href="./jobs.php">Job Vacancy</a>
						</li>
						<li>
							<a href="#">Activities</a>
						</li>
						<li>
							<a href="./invitations.php">invitations</a>
						</li>
                        <li>
							<a href="./About.php">About us</a>
						</li>
                        <li>
							<a href="./contact.php">Contact us</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 ftr_navi ftr">
                <h3>ADMIN</h3>
					<ul>
                        <li>
						    <a href="./login.php">Admin Panel</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 get_in_touch ftr">
					<h3>GET IN TOUCH</h3>
					<p>Gasha Institute</p>
					<p><a href="https://maps.app.goo.gl/QMjYV6wdXHHcMfWo8">120m Str, Erbil, Erbil Governorate, 44001</a></p>
					<p>+964 0751 217 5799</p>
					<a href="mailto:7AlbertEinstein5@gmail.com"></a>
				</div>
				<div class="col-md-3 ftr-logo">
					<p>Copyright &copy; 2025 Gasha-Institute | Developed by
              <a href="https://linkedin.com/" target="_parent">Mardin Dldar Taha</a></P>
              <p>Supervisor: <a href="https://linkedin.com/"> Sdeeq N. Mohammed</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
        <!-- </footer> !-->


</body>
</html>
