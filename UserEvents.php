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

// Get search values
$userSearch = isset($_GET['userSearch']) ? $_GET['userSearch'] : '';
$eventSearch = isset($_GET['eventSearch']) ? $_GET['eventSearch'] : '';
$firstNameSearch = isset($_GET['firstNameSearch']) ? $_GET['firstNameSearch'] : '';
$lastNameSearch = isset($_GET['lastNameSearch']) ? $_GET['lastNameSearch'] : '';
$phoneSearch = isset($_GET['phoneSearch']) ? $_GET['phoneSearch'] : '';
$companySearch = isset($_GET['companySearch']) ? $_GET['companySearch'] : '';
$birthDateSearch = isset($_GET['birthDateSearch']) ? $_GET['birthDateSearch'] : '';

// Initialize the SQL query based on search criteria
$sql = "SELECT ea.application_id, ea.first_name, ea.last_name, ea.birthdate, ea.gender, ea.location, ea.country, 
               ea.department, ea.email, ea.phone_number, 
               e.event_id, e.title, e.company, e.location AS event_location, 
               e.event_date, e.event_end_date, e.end_of_registration, e.eligibility
        FROM event_applications ea
        JOIN events e ON ea.event_id = e.event_id";

// Add conditions for additional search filters
$conditions = [];
if ($userSearch) {
    $conditions[] = "ea.application_id LIKE '%$userSearch%'";
}
if ($eventSearch) {
    $conditions[] = "e.event_id LIKE '%$eventSearch%'";
}
if ($firstNameSearch) {
    $conditions[] = "ea.first_name LIKE '%$firstNameSearch%'";
}
if ($lastNameSearch) {
    $conditions[] = "ea.last_name LIKE '%$lastNameSearch%'";
}
if ($phoneSearch) {
    $conditions[] = "ea.phone_number LIKE '%$phoneSearch%'";
}
if ($companySearch) {
    $conditions[] = "e.company LIKE '%$companySearch%'";
}
if ($birthDateSearch) {
    $conditions[] = "ea.birthdate LIKE '%$birthDateSearch%'";
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
    <title>View Event Applications</title>
    <link rel="stylesheet" href="UserEvents.css">
</head>
<body>

<div class="search-container">
    <form method="GET" action="UserEvents.php">
        <div class="search-fields">
            <input type="text" name="userSearch" placeholder="Enter UserID" value="<?php echo htmlspecialchars($userSearch); ?>">
            <input type="text" name="eventSearch" placeholder="Enter EventID" value="<?php echo htmlspecialchars($eventSearch); ?>">
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
    <h1>Event Applications</h1>

    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="application-card">
                <!-- Left Card - Applicant Details -->
                <div class="user-card">
                    <h2>Applicant Details</h2>
                    <p><strong>Application ID:</strong> <?php echo htmlspecialchars($row['application_id']); ?></p>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($row['first_name'] . " " . $row['last_name']); ?></p>
                    <p><strong>Birthdate:</strong> <?php echo htmlspecialchars($row['birthdate']); ?></p>
                    <p><strong>Gender:</strong> <?php echo htmlspecialchars($row['gender']); ?></p>
                    <p><strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
                    <p><strong>Country:</strong> <?php echo htmlspecialchars($row['country']); ?></p>
                    <p><strong>Department:</strong> <?php echo htmlspecialchars($row['department']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($row['phone_number']); ?></p>
                </div>

                <!-- Right Card - Event Details -->
                <div class="event-card">
                    <h2>Event Details</h2>
                    <p><strong>Event ID:</strong> <?php echo htmlspecialchars($row['event_id']); ?></p>
                    <p><strong>Title:</strong> <?php echo htmlspecialchars($row['title']); ?></p>
                    <p><strong>Company:</strong> <?php echo htmlspecialchars($row['company']); ?></p>
                    <p><strong>Location:</strong> <?php echo htmlspecialchars($row['event_location']); ?></p>
                    <p><strong>Event Date:</strong> <?php echo htmlspecialchars($row['event_date']); ?></p>
                    <p><strong>End Date:</strong> <?php echo htmlspecialchars($row['event_end_date']); ?></p>
                    <p><strong>End of Registration:</strong> <?php echo htmlspecialchars($row['end_of_registration']); ?></p>
                    <p><strong>Eligibility:</strong> <?php echo htmlspecialchars($row['eligibility']); ?></p>
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
    header("Location: UserEvents.php"); // Redirect to clear the search filters
    exit();
}

$conn->close();
?>
