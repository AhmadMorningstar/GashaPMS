<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
        <title>Gasha Institute | Home</title>
        <link rel="stylesheet" href="contact.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/animate.min.css" type="text/css">
        <link rel="stylesheet" href="css/creative.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


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
                            <a class="page-scroll" href="./activity.php">Activities</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="./invitations.php">Invitations</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="./about.php">About us</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#" style="color: #7091e6;">Contact us</a>
                        </li>
                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- Navigation Bar !-->

        <!-- <header> !-->
        <header>
    <div class="header-container">
        <h2>Contact Us</h2>
        
        <div class="contact-cards">
            <!-- Contact Form Card -->
            <div class="card contact-form-card">
                <form class="contact-form" method="POST" action="contact_process.php">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>

                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" required>

                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>

                    <button type="submit">Send Message</button>
                </form>
            </div>

            <!-- Contact Info Card -->
            <div class="card contact-info-card">
                <h3>Our Info</h3>
                <p><strong>Address:</strong> 120m Str, Erbil, Iraq</p>
                <p><strong>Phone:</strong> +964 0751 217 5799</p>
                <p><strong>Email:</strong> contact@gasha.edu.iq</p>
                <p><strong>Developer:</strong> Mardin D. Taha</p>
                <p><strong>Supervisor:</strong>  Sdeeq N. Mohammed</p>
            </div>

            <!-- Map Card -->
            <div class="card map-card">
                <h3>Find Us</h3>
                <iframe
                    width="100%"
                    height="250"
                    frameborder="0"
                    style="border:0"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3219.2006878083967!2d44.06319158904155!3d36.210316729630506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x400721db8c6c8ac1%3A0x60d41290f6f2bbfc!2zR2FzaGEgTm9uLWdvdmVybWVudGFsIEluc3RpdHV0ZSAo2b7blduM2YXYp9mG2q_blduMINqv25XYtNuV24wg2YbYp9it2YPZiNmF24wp!5e0!3m2!1sen!2sus!4v1739658404697!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</header>

<!-- </header> !-->
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
							<a href="./activity.php">Activities</a>
						</li>
						<li>
							<a href="./invitations.php">invitations</a>
						</li>
                        <li>
							<a href="./about.php">About us</a>
						</li>
                        <li>
							<a href="#">Contact us</a>
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
					<p>(+964) 0750 863 5253</p>
					<a href="mailto:info@gasha.edu.iq">info@gasha.edu.iq</a>
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
