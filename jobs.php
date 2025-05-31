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
        <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
        <title>Gasha Institute | Job Vacancy</title>
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
                            <a class="page-scroll" href="#" style="color: #7091e6;">Job Vacancy</a>
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

        <header style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
  url(./img/header.jpg);">
          <link rel="stylesheet" href="stylejobs.css" type="text/css">



        <!-- Job Vacany !-->

        <?php
// Database connection
$servername = "sql108.infinityfree.com";
$username = "if0_38250336";
$password = "Ahm20066";
$dbname = "if0_38250336_PMS";



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch job listings
$sql = "SELECT job_id, job_title, company_name, department, location, description, requirements, grade FROM jobs ORDER BY grade DESC";
$result = $conn->query($sql);
$jobs = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }
}
$totalJobs = count($jobs);
$jobsPerPage = 6;
$totalPages = ceil($totalJobs / $jobsPerPage);

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $jobsPerPage;
$currentJobs = array_slice($jobs, $offset, $jobsPerPage);
?>

<div class="job-listings">
    <h1>Job Opportunities</h1>
    <div class="job-slider">
        <div class="job-grid">
            <?php if (count($currentJobs) > 0): ?>
                <?php foreach($currentJobs as $row): ?>
                    <div class="job-card">
                        <h2><?php echo htmlspecialchars($row['job_title']); ?></h2>
                        <h3><?php echo htmlspecialchars($row['company_name']); ?></h3>
                        <p><strong>Department:</strong> <?php echo htmlspecialchars($row['department']); ?></p>
                        <p><strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
                        <p><strong>Description:</strong> <?php echo htmlspecialchars($row['description']); ?></p>
                        <p><strong>Requirements:</strong> <?php echo htmlspecialchars($row['requirements']); ?></p>
                        <p><strong>Grade Required:</strong> <?php echo htmlspecialchars($row['grade']); ?></p>
                        <button class="apply-btn" onclick="openForm(<?php echo $row['job_id']; ?>)">Apply Now</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No job listings available.</p>
            <?php endif; ?>
        </div>

        <!-- Pagination Controls -->
        <div class="pagination">
            <?php if ($currentPage > 1): ?>
                <a href="?page=<?php echo $currentPage - 1; ?>" class="pagination-btn">Previous</a>
            <?php endif; ?>
            
            <span class="pagination-info">Showing <?php echo $offset + 1; ?>-<?php echo min($offset + $jobsPerPage, $totalJobs); ?> of <?php echo $totalJobs; ?> jobs</span>
            
            <?php if ($currentPage < $totalPages): ?>
                <a href="?page=<?php echo $currentPage + 1; ?>" class="pagination-btn">Next</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Application Form (Initially Hidden) -->
<div id="apply-form-container" class="apply-form-container">
    <div class="apply-form">
        <h2>Job Application</h2>
        <form action="apply.php" method="POST">
            <input type="hidden" id="job_id" name="job_id">
            <label>First Name:</label>
            <input type="text" name="first_name" required>
            <label>Last Name:</label>
            <input type="text" name="last_name" required>
            <label>Age:</label>
            <input type="date" id="birthdate" name="birthdate" required>            <label>Gender:</label>
            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label>Location:</label>
            <select name="location">
                <option value="Hawler">Hawler</option>
                <option value="Kirkuk">Kirkuk</option>
                <option value="Sulaymani">Sulaymani</option>
                <option value="Duhok">Duhok</option>
            </select>
            <label>Country:</label>
            <input type="text" name="country" required>
            <label>Department:</label>
            <select name="department">
                <option value="Computer Science - Programming">Computer Science - Programming</option>
                <option value="Computer Science - Networking">Computer Science - Networking</option>
                <option value="Business Administration and Accounting">Business Administration and Accounting</option>
                <option value="Petroleum Technology">Petroleum Technology</option>
            </select>
            <label>Average Grade:</label>
            <input type="number" name="average_grade" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" pattern="\d*" title="Only numbers are allowed" required>
            <button type="submit">Submit Application</button>
            <button type="button" onclick="closeForm()">Cancel</button>
        </form>
    </div>
</div>

<script>
function openForm(jobId) {
    document.getElementById("apply-form-container").style.display = "block";
    document.getElementById("job_id").value = jobId;
}

function closeForm() {
    document.getElementById("apply-form-container").style.display = "none";
}

document.getElementById('applicationForm').addEventListener('submit', function(event) {
    const birthdate = document.getElementById('birthdate').value;
    const today = new Date();
    const birthDateObj = new Date(birthdate);
    
    // Calculate the age
    let age = today.getFullYear() - birthDateObj.getFullYear();
    const m = today.getMonth() - birthDateObj.getMonth();
    
    if (m < 0 || (m === 0 && today.getDate() < birthDateObj.getDate())) {
        age--;
    }
    
    // Check if the age is less than 18
    if (age < 18) {
        event.preventDefault();
        alert('You must be at least 18 years old to apply.');
    }
});

</script>

<?php $conn->close(); ?>



        <!-- End of Job Vacancy !-->


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
							<a href="#">Job Vacancy</a>
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
