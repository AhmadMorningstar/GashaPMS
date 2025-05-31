<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
?>

<?php
// Database connection
$conn = new mysqli("sql108.infinityfree.com", "if0_38250336", "Ahm20066", "if0_38250336_PMS");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all events from the database
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Fetch event data into an array
$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = $row;
}

// Pagination settings
$eventsPerPage = 6;
$totalEvents = count($events);
$totalPages = ceil($totalEvents / $eventsPerPage);

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $eventsPerPage;
$currentEvents = array_slice($events, $offset, $eventsPerPage);

// Close the connection
$conn->close();
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
        <title>Gasha Institute | Invitations</title>
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
        <link rel="stylesheet" href="invitations.css" type="text/css">
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
                            <a class="page-scroll" href="#" style="color: #7091e6;">Invitations</a>
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
        <header style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
  url(./img/header.jpg);">
          <link rel="stylesheet" href="stylejobs.css" type="text/css">

          <div class="job-listings">
    <h1>Upcoming Event Invitations</h1>
    <div class="job-slider">
        <div class="job-grid">
            <?php if (count($events) > 0): ?>
                <?php foreach($events as $event): ?>
                    <div class="job-card">
                        <h2><?php echo htmlspecialchars($event['title']); ?></h2>
                        <h3><?php echo htmlspecialchars($event['company']); ?></h3>
                        <p><strong>Location:</strong> <?php echo htmlspecialchars($event['location']); ?></p>
                        <p><strong>Event Date:</strong> <?php echo htmlspecialchars($event['event_date']); ?></p>
                        <p><strong>Event End Date:</strong> <?php echo htmlspecialchars($event['event_end_date']); ?></p>
                        <p><strong>Registration End Date:</strong> <?php echo htmlspecialchars($event['end_of_registration']); ?></p>
                        <p><strong>Eligibility:</strong> <?php echo htmlspecialchars($event['eligibility']); ?></p>
                        <button class="apply-btn" onclick="openForm(<?php echo $event['event_id']; ?>)">Apply Now</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No event invitations available.</p>
            <?php endif; ?>
        </div>

        <!-- Pagination Controls -->
        <div class="pagination">
            <?php if ($currentPage > 1): ?>
                <a href="?page=<?php echo $currentPage - 1; ?>" class="pagination-btn">Previous</a>
            <?php endif; ?>
            
            <span class="pagination-info">Showing <?php echo $offset + 1; ?>-<?php echo min($offset + $eventsPerPage, $totalEvents); ?> of <?php echo $totalEvents; ?> events</span>
            
            <?php if ($currentPage < $totalPages): ?>
                <a href="?page=<?php echo $currentPage + 1; ?>" class="pagination-btn">Next</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div id="application-form" class="application-form">
            <span class="close-btn" onclick="closeForm()">&times;</span>
            <h2>Event Application</h2>
            <form id="applyForm" method="POST" action="eventapply.php">
                <input type="hidden" id="event_id" name="event_id">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>

                <label for="birthdate">Birthdate:</label>
                <input type="date" id="birthdate" name="birthdate" required>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>

                <label for="country">Country:</label>
                <input type="text" id="country" name="country" required>

                <label for="department">Department:</label>
                <input type="text" id="department" name="department" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone_number">Phone Number:</label>
                <input type="tel" id="phone_number" name="phone_number" required>

                <button type="submit">Submit Application</button>
            </form>
        </div>



    <script>
        function openForm(eventId) {
            document.getElementById('application-form').style.display = 'flex';
            document.getElementById('event_id').value = eventId;
        }

        function closeForm() {
            document.getElementById('application-form').style.display = 'none';
        }
    </script>

    </header>
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
							<a href="#">invitations</a>
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
