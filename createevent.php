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
if (isset($_POST['create_event'])) {
    $title = $_POST['title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $event_date = $_POST['event_date'];
    $event_end_date = $_POST['event_end_date'];
    $end_of_registration = $_POST['end_of_registration'];
    $eligibility = $_POST['eligibility'];
    $created_at = date("Y-m-d H:i:s"); // Current timestamp

    // Database connection
    $conn = new mysqli('sql108.infinityfree.com', 'if0_38250336', 'Ahm20066', 'if0_38250336_PMS');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert job into the jobs table
    $sql = "INSERT INTO events (title, company, location, event_date, event_end_date, end_of_registration, eligibility, created_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $title, $company, $location, $event_date, $event_end_date, $end_of_registration, $eligibility, $created_at);

    if ($stmt->execute()) {
        $success_message = "Eveny created successfully!";
    } else {
        $error_message = "Error creating Event: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Job - PMS</title>
    <link rel="stylesheet" href="createevent.css"> <!-- Link to your CSS file -->
</head>
<body>

<header>
    <div class="nav-container">
        <nav>
            <ul>
                <li><a href="./panel.php">Dashboard</a></li>
                <li><a href="./createjob.php">Create Job</a></li>
                <li><a href="#" style="color: #adbbda;">Create Event</a></li>
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
        <h2>Create Event</h2>
        <?php if (isset($success_message)): ?>
            <p class="success"><?= $success_message ?></p>
        <?php endif; ?>
        <?php if (isset($error_message)): ?>
            <p class="error"><?= $error_message ?></p>
        <?php endif; ?>

        <form method="POST" action="createevent.php">
            <label for="title">Event Title:</label>
            <input type="text" name="title" required>

            <label for="company">Company Name:</label>
            <input type="text" name="company" required>

            <label for="location">Location:</label>
            <input type="text" name="location" required>

            <label for="event_date">Event Date:</label>
            <input type="date" name="event_date" required>

            <label for="event_end_date">Event End Date:</label>
            <input type="date" name="event_end_date" required>

            <label for="end_of_registration">End of Registration:</label>
            <input type="date" name="end_of_registration" required>

            <label for="eligibility">Eligibility:</label>
            <textarea name="eligibility" required></textarea>

            <button type="submit" name="create_event">Create Event</button>
        </form>
    </div>
</main>

</body>
</html>
