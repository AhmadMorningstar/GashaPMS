<?php session_start(); // MUST be at the very top! 
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
        <title>Gasha Institute | </title>
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <!-- Footer -->
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
        <!-- Plugin CSS -->
        <link rel="stylesheet" href="css/animate.min.css" type="text/css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/creative.css" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- jQuery (Required for Bootstrap JS) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="login.css" type="text/css">
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
                            <a class="page-scroll" href="./contact.php">Contact us</a>
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
        <h2>Login Portal</h2>

        <?php if (isset($_SESSION['username'])): ?>
            <div class="card user-card">
                <p>Welcome, <strong><?= $_SESSION['username'] ?></strong>!</p>
                <a href="login.php?logout=true" class="btn logout-btn">Logout</a>
                <div class="nav-links">
                    <a href="login.php" class="nav-link">Home</a>
                    <a href="login.php?view_users=true" class="nav-link">Users</a>
                    <a href="login.php?create_user=true" class="nav-link">Create New User</a>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!isset($_SESSION['username'])): ?>
            <div class="card">
                <h2>Login</h2>
                <?php 
                if (isset($_POST['login'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // Hash the input password using sha256
                    $hashed_password = hash('sha256', $password);

                    // Database connection
                    $conn = new mysqli('sql108.infinityfree.com', 'if0_38250336', 'Ahm20066', 'if0_38250336_PMS');

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Prepare and execute SQL query to check user credentials
                    $sql = "SELECT * FROM users WHERE Username = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $user = $result->fetch_assoc();
                        // Compare the hashed password with the stored hash
                        if ($hashed_password === $user['password']) {
                            $_SESSION['username'] = $username;
                            echo '<script>alert("Login successful!"); window.location.href = "https://gashainstitute.great-site.net/panel.php";</script>';
                        } else {
                            $login_error = "Incorrect password.";
                        }
                    } else {
                        $login_error = "User not found.";
                    }

                    $conn->close();
                }
                ?>

                <?php if (isset($login_error)): ?>
                    <p class="error"><?= $login_error ?></p>
                <?php endif; ?>

                <form method="POST" action="login.php">
                    <label for="username">Username:</label>
                    <input type="text" name="username" required>
                    <label for="password">Password:</label>
                    <input type="password" name="password" required>
                    <button type="submit" name="login">Login</button>
                </form>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['create_user'])): ?>
            <div class="card">
                <h2>Create New User</h2>
                <?php if (isset($success_message)): ?>
                    <p class="success"><?= $success_message ?></p>
                <?php endif; ?>
                <?php if (isset($error_message)): ?>
                    <p class="error"><?= $error_message ?></p>
                <?php endif; ?>
                <form method="POST" action="login.php">
                    <label for="new_username">Username:</label>
                    <input type="text" name="new_username" required>
                    <label for="new_password">Password:</label>
                    <input type="password" name="new_password" required>
                    <button type="submit" name="create_user">Create User</button>
                </form>
            </div>
        <?php endif; ?>

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
							<a href="#">Home</a>
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
