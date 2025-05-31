<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
?>

<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Handle logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

// Database connection
$servername = "sql108.infinityfree.com";
$username = "if0_38250336";
$password = "Ahm20066";
$dbname = "if0_38250336_PMS";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search values
$userSearch = isset($_GET['userSearch']) ? $_GET['userSearch'] : '';
$jobSearch = isset($_GET['jobSearch']) ? $_GET['jobSearch'] : '';
$firstNameSearch = isset($_GET['firstNameSearch']) ? $_GET['firstNameSearch'] : '';
$lastNameSearch = isset($_GET['lastNameSearch']) ? $_GET['lastNameSearch'] : '';
$phoneSearch = isset($_GET['phoneSearch']) ? $_GET['phoneSearch'] : '';
$companySearch = isset($_GET['companySearch']) ? $_GET['companySearch'] : '';
$birthDateSearch = isset($_GET['birthDateSearch']) ? $_GET['birthDateSearch'] : '';

// Initialize the SQL query based on search criteria
$sql = "SELECT a.user_id, a.first_name, a.last_name, a.age, a.gender, a.location, a.country, 
               a.department, a.average_grade, a.email, a.phone_number, 
               j.job_id, j.job_title, j.company_name, j.department AS job_department, j.location AS job_location, 
               j.description, j.requirements, j.grade
        FROM apply a
        JOIN jobs j ON a.job_id = j.job_id";

// Add conditions for additional search filters
$conditions = [];
if ($userSearch) {
    $conditions[] = "a.user_id LIKE '%$userSearch%'";
}
if ($jobSearch) {
    $conditions[] = "j.job_id LIKE '%$jobSearch%'";
}
if ($firstNameSearch) {
    $conditions[] = "a.first_name LIKE '%$firstNameSearch%'";
}
if ($lastNameSearch) {
    $conditions[] = "a.last_name LIKE '%$lastNameSearch%'";
}
if ($phoneSearch) {
    $conditions[] = "a.phone_number LIKE '%$phoneSearch%'";
}
if ($companySearch) {
    $conditions[] = "j.company_name LIKE '%$companySearch%'";
}
if ($birthDateSearch) {
    $conditions[] = "a.age LIKE '%$birthDateSearch%'";  // Assuming 'age' is stored as a date (or use 'birth_date' if available)
}

// Apply filters if any conditions exist
if (count($conditions) > 0) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | View Applications</title>
    <link rel="stylesheet" href="viewapps.css">
</head>
<body>
    <header>
<div class="nav-container">
        <nav>
            <ul>
                <li><a href="panel.php">Dashboard</a></li>
                <li><a href="createjob.php">Create Job</a></li>
                <li><a href="createevent.php">Create Event</a></li>
                <li><a href="viewapps.php" style="color: #adbbda;">View Applications</a></li>
                <li><a href="?logout=true">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="search-container">
    <form method="GET" action="viewapps.php">
        <div class="search-fields">
            <input type="text" name="userSearch" placeholder="Enter UserID" value="<?php echo htmlspecialchars($userSearch); ?>">
            <input type="text" name="jobSearch" placeholder="Enter JobID" value="<?php echo htmlspecialchars($jobSearch); ?>">
            <input type="text" name="firstNameSearch" placeholder="Enter First Name" value="<?php echo htmlspecialchars($firstNameSearch); ?>">
            <input type="text" name="lastNameSearch" placeholder="Enter Last Name" value="<?php echo htmlspecialchars($lastNameSearch); ?>">
            <input type="text" name="phoneSearch" placeholder="Enter Phone Number" value="<?php echo htmlspecialchars($phoneSearch); ?>">
            <input type="text" name="companySearch" placeholder="Enter Company Name" value="<?php echo htmlspecialchars($companySearch); ?>">
            <input type="text" name="birthDateSearch" placeholder="Enter Birth Date" value="<?php echo htmlspecialchars($birthDateSearch); ?>">
            <button type="submit">Search</button>
            <button type="submit" name="clear" value="true">Clear</button>
        </div>
    </form>
</div>

<div class="applications-container">
    <h1>Job Applications</h1>

    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="application-card">
                <!-- Left Card - User Details -->
                <div class="user-card">
                    <h2>Applicant Details</h2>
                    <p><strong>User ID:</strong> <?php echo htmlspecialchars($row['user_id']); ?></p>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($row['first_name'] . " " . $row['last_name']); ?></p>
                    <p><strong>Birthdate:</strong> <?php echo htmlspecialchars($row['age']); ?></p>
                    <p><strong>Gender:</strong> <?php echo htmlspecialchars($row['gender']); ?></p>
                    <p><strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
                    <p><strong>Country:</strong> <?php echo htmlspecialchars($row['country']); ?></p>
                    <p><strong>Department:</strong> <?php echo htmlspecialchars($row['department']); ?></p>
                    <p><strong>Average Grade:</strong> <?php echo htmlspecialchars($row['average_grade']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($row['phone_number']); ?></p>
                </div>

                <!-- Right Card - Job Details -->
                <div class="job-card">
                    <h2>Job Details</h2>
                    <p><strong>Job ID:</strong> <?php echo htmlspecialchars($row['job_id']); ?></p>
                    <p><strong>Title:</strong> <?php echo htmlspecialchars($row['job_title']); ?></p>
                    <p><strong>Company:</strong> <?php echo htmlspecialchars($row['company_name']); ?></p>
                    <p><strong>Department:</strong> <?php echo htmlspecialchars($row['job_department']); ?></p>
                    <p><strong>Location:</strong> <?php echo htmlspecialchars($row['job_location']); ?></p>
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($row['description']); ?></p>
                    <p><strong>Requirements:</strong> <?php echo htmlspecialchars($row['requirements']); ?></p>
                    <p><strong>Required Grade:</strong> <?php echo htmlspecialchars($row['grade']); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No applications found.</p>
    <?php endif; ?>

</div>

</body>
</html>

<?php
// Clear button functionality
if (isset($_GET['clear']) && $_GET['clear'] == 'true') {
    header("Location: viewapps.php"); // Redirect to clear the search filters
    exit();
}

$conn->close();
?>
