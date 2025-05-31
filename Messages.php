<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Handle logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ./index.php");
    exit();
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");

// Database connection
$servername = "sql108.infinityfree.com";
$username = "if0_38250336"; // Change if needed
$password = "Ahm20066";     // Change if needed
$dbname = "if0_38250336_PMS";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get individual search values
$search_firstname = isset($_GET['search_firstname']) ? $_GET['search_firstname'] : '';
$search_lastname  = isset($_GET['search_lastname'])  ? $_GET['search_lastname']  : '';
$search_email     = isset($_GET['search_email'])     ? $_GET['search_email']     : '';
$search_phone     = isset($_GET['search_phone'])     ? $_GET['search_phone']     : '';
$search_userid    = isset($_GET['search_userid'])    ? $_GET['search_userid']    : '';
$search_location  = isset($_GET['search_location'])  ? $_GET['search_location']  : '';
$search_message   = isset($_GET['search_message'])   ? $_GET['search_message']   : '';
$search_date      = isset($_GET['search_date'])      ? $_GET['search_date']      : '';

// Build the SQL query with filters
$sql = "SELECT * FROM messages";
$conditions = [];

// If search by name, check both first_name and last_name
if (!empty($search_firstname)) {
    $conditions[] = "first_name LIKE '%$search_firstname%'";
}
if (!empty($search_lastname)) {
    $conditions[] = "last_name LIKE '%$search_lastname%'";
}
if (!empty($search_email)) {
    $conditions[] = "email LIKE '%$search_email%'";
}
if (!empty($search_phone)) {
    $conditions[] = "phone LIKE '%$search_phone%'";
}
if (!empty($search_userid)) {
    $conditions[] = "user_id LIKE '%$search_userid%'";
}
if (!empty($search_location)) {
    $conditions[] = "location LIKE '%$search_location%'";
}
if (!empty($search_message)) {
    $conditions[] = "message LIKE '%$search_message%'";
}
if (!empty($search_date)) {
    // Assuming created_at is in a date format; adjust if using datetime
    $conditions[] = "DATE(created_at) = '$search_date'";
}

if (count($conditions) > 0) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}
$sql .= " ORDER BY created_at DESC";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Messages - Panel</title>
    <link rel="stylesheet" href="createjobs.css"> <!-- Update if needed -->
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #ede8f5; 
            margin: 0; 
            padding: 0; 
        }
        /* Navbar Styles */
        nav {
            background-color: #3d52a0;
            padding: 10px 20px;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }
        nav ul li {
            margin-right: 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        nav ul li a.active {
            border-bottom: 2px solid #7091e6;
        }
        .container { 
            width: 80%; 
            margin: 20px auto; 
        }
        .search-box { 
            margin-bottom: 20px; 
            background: white; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .search-box input {
            padding: 10px;
            width: calc(100% - 22px);
            border: 1px solid #8697c4;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .search-box label {
            font-weight: bold;
            color: #3d52a0;
        }
        .search-box button {
            padding: 10px 20px;
            background-color: #3d52a0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
        .search-box button:hover {
            background-color: #7091e6;
        }
        .card { 
            background: white; 
            padding: 15px; 
            margin-bottom: 15px; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }
        .card p { 
            margin: 5px 0; 
        }
        .card strong { 
            color: #3d52a0; 
        }
        .pagination { 
            text-align: center; 
            margin-top: 20px; 
        }
        .pagination a { 
            padding: 10px; 
            margin: 5px; 
            text-decoration: none; 
            background: #3d52a0; 
            color: white; 
            border-radius: 5px; 
        }
        .pagination a:hover { 
            background: #7091e6; 
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav>
    <ul>
        <li><a href="./panel.php">Dashboard</a></li>
        <li><a href="./createjob.php">Create Job</a></li>
        <li><a href="./createevent.php">Create Event</a></li>
        <li><a href="./viewapps.php">View Applications</a></li>
        <li><a href="#" style="color: #7091e6;;">View Messages</a></li>
        <li><a href="?logout=true">Logout</a></li>
    </ul>
</nav>

<div class="container">
    <h2>Messages</h2>
    <form class="search-box" method="GET" action="Messages.php">
    <div>
      <label for="search_firstname">Search by First Name:</label>
      <input type="text" id="search_firstname" name="search_firstname" placeholder="Enter first name" value="<?php echo htmlspecialchars($search_firstname); ?>">
    </div>
    <div>
      <label for="search_lastname">Search by Last Name:</label>
      <input type="text" id="search_lastname" name="search_lastname" placeholder="Enter last name" value="<?php echo htmlspecialchars($search_lastname); ?>">
    </div>
        <div>
            <label for="search_email">Search by Email:</label>
            <input type="text" id="search_email" name="search_email" placeholder="Enter email" value="<?php echo htmlspecialchars($search_email); ?>">
        </div>
        <div>
            <label for="search_phone">Search by Phone:</label>
            <input type="text" id="search_phone" name="search_phone" placeholder="Enter phone number" value="<?php echo htmlspecialchars($search_phone); ?>">
        </div>
        <div>
            <label for="search_userid">Search by User ID:</label>
            <input type="text" id="search_userid" name="search_userid" placeholder="Enter user ID" value="<?php echo htmlspecialchars($search_userid); ?>">
        </div>
        <div>
            <label for="search_location">Search by Location:</label>
            <input type="text" id="search_location" name="search_location" placeholder="Enter location" value="<?php echo htmlspecialchars($search_location); ?>">
        </div>
        <div>
            <label for="search_message">Search by Message:</label>
            <input type="text" id="search_message" name="search_message" placeholder="Enter message text" value="<?php echo htmlspecialchars($search_message); ?>">
        </div>
        <div>
            <label for="search_date">Search by Date:</label>
            <input type="date" id="search_date" name="search_date" value="<?php echo htmlspecialchars($search_date); ?>">
        </div>
        <div style="margin-top:10px;">
            <button type="submit">Search</button>
            <button type="button" onclick="window.location.href='Messages.php';">Clear</button>
        </div>
    </form>
    
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<p><strong>Name:</strong> " . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
            echo "<p><strong>Phone:</strong> " . htmlspecialchars($row['phone']) . "</p>";
            echo "<p><strong>Location:</strong> " . htmlspecialchars($row['location']) . "</p>";
            echo "<p><strong>Message:</strong> " . nl2br(htmlspecialchars($row['message'])) . "</p>";
            echo "<p><strong>User ID:</strong> " . htmlspecialchars($row['user_id']) . "</p>";
            echo "<p><strong>Date:</strong> " . htmlspecialchars($row['created_at']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No messages found.</p>";
    }
    ?>
</div>

</body>
</html>
<?php
$conn->close();
?>
