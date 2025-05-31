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
    header("Location: ./index.php");
    exit();
}

// Handle the job creation functionality
if (isset($_POST['create_job'])) {
    $job_title = $_POST['job_title'];
    $company_name = $_POST['company_name'];
    $department = $_POST['department'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $requirements = $_POST['requirements'];
    $grade = $_POST['grade'];

    // Database connection
    $conn = new mysqli('sql108.infinityfree.com', 'if0_38250336', 'Ahm20066', 'if0_38250336_PMS');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert job into the jobs table
    $sql = "INSERT INTO jobs (job_title, company_name, department, location, description, requirements, grade)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $job_title, $company_name, $department, $location, $description, $requirements, $grade);

    if ($stmt->execute()) {
        $success_message = "Job created successfully!";
    } else {
        $error_message = "Error creating job: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Job - Panel</title>
    <link rel="stylesheet" href="createjobs.css"> <!-- Link to your CSS file -->
</head>
<body>

<header>
    <div class="nav-container">
        <nav>
            <ul>
                <li><a href="./panel.php">Dashboard</a></li>
                <li><a href="#" style="color: #adbbda;">Create Job</a></li>
                <li><a href="./createevent.php">Create Event</a></li>
                <li><a href="./viewapps.php">View Applications</a></li>
                <li><a href="./Messages.php">View Messages</a></li>
                <li><a href="?logout=true">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Main Content for Create Job -->
<main>
    <div class="card">
        <h2>Create Job</h2>
        <?php if (isset($success_message)): ?>
            <p class="success"><?= $success_message ?></p>
        <?php endif; ?>
        <?php if (isset($error_message)): ?>
            <p class="error"><?= $error_message ?></p>
        <?php endif; ?>

        <form method="POST" action="createjob.php">
            <label for="job_title">Job Title:</label>
            <input type="text" name="job_title" required>

            <label for="company_name">Company Name:</label>
            <input type="text" name="company_name" required>

            <label for="department">Department:</label>
            <input type="text" name="department" required>

            <label for="location">Location:</label>
            <input type="text" name="location" required>

            <label for="description">Job Description:</label>
            <textarea name="description" required></textarea>

            <label for="requirements">Job Requirements:</label>
            <textarea name="requirements" required></textarea>

            <label for="grade">Grade:</label>
            <input type="text" name="grade" required>

            <button type="submit" name="create_job">Create Job</button>
        </form>
    </div>
</main>

</body>
</html>
